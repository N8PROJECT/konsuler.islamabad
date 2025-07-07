<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Str;
use App\Helpers\NocDocGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
     public function index() {
        $applications = Application::with('type', 'user')->latest()->get();

        return view('admin.dashboard', compact('applications'));
    }

    // Tampilkan detail aplikasi tertentu
    public function show($id)
    {
        $application = Application::with('members', 'type', 'user')->findOrFail($id);

        return view('admin.application-show', compact('application'));
    }

    public function comment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $application = Application::findOrFail($id);
        $application->comment = $request->comment;
        $application->status = 'reviewed';
        $application->save();

        return redirect()->route('admin.application.show', $id)
            ->with('success', 'Comment submitted and status updated to reviewed.');
    }

    public function reject($id)
    {
        $application = Application::findOrFail($id);
        $application->status = 'rejected';
        $application->save();

        return redirect()->route('admin.application.show', $id)
            ->with('success', 'Application rejected.');
    }

    public function approve($id) {
        $application = Application::with('type')->findOrFail($id);

        // Nama file template
        $typeName = strtolower(str_replace(' ', '_', $application->type->name));
        $templatePath = storage_path("app/templates/noc_{$typeName}_template.docx");

        if (!file_exists($templatePath)) {
            return back()->withErrors(['msg' => 'Template dokumen NOC tidak ditemukan.']);
        }

        $gender = $application->user->gender;

        $salutation = match(strtolower($gender)) {
            'male' => 'Mr.',
            'female' => 'Ms.',
            default => '',
        };

        $pronoun1 = match(strtolower($gender)) {
            'male' => 'he',
            'female' => 'she',
            default => 'their',
        };

        $pronoun2 = match(strtolower($gender)) {
            'male' => 'his',
            'female' => 'her',
            default => 'their',
        };

        $count = Application::whereYear('created_at', now()->year)->count() + 1;

        // Month Convert
        $bulanRomawi = [
            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV',
            5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII',
            9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'
        ];

        $month = now()->month;
        $year = now()->year;

        $letterNumber = "{$count}/PK/ISL/{$bulanRomawi[$month]}/{$year}";

        // Data untuk replace isi template
        $data = [
            'salutation' => $salutation,
            'pronoun1' => $pronoun1,
            'pronoun2' => $pronoun2,
            'name' => $application->fullname,
            'birth_place' => $application->place_of_birth,
            'birth_date' => optional($application->date_of_birth)->format('F d, Y'),
            'passport_number' => $application->passport_number,

            // New Admission
            'refer_letter_number' => $application->refer_letter_number,
            'refer_letter_date' => optional($application->refer_letter_date)->format('F d, Y'),
            'refer_letter' => $application->refer_letter,
            'major' => $application->major,
            
            // IBBC
            'last_education' => $application->last_education,
            'graduation_date' => optional($application->graduation_date)->format('F d, Y'),
            'universitas_selanjutnya' => $application->universitas_selanjutnya,
            
            'surat_date' => now()->format('F d, Y'),
            'letter_number' => $letterNumber,
            // tambah data lainnya jika perlu
        ];

        // Generate dokumen baru
        $processor = new TemplateProcessor($templatePath);

        foreach ($data as $key => $value) {
            $processor->setValue($key, $value);
        }

        // Pastikan folder tujuan ada
        Storage::makeDirectory('public/generated_docs');

        $generatedFileName = "noc_{$typeName}_" . Str::random(5) . ".docx";
        $outputPath = "generated_docs/{$generatedFileName}";

        $processor->saveAs(storage_path("app/public/{$outputPath}"));

        // Simpan path ke kolom 'noc' dan ubah status jadi approved
        $application->update([
            'status' => 'approved',
            'noc' => $outputPath,
            'letter_number' => $letterNumber,
        ]);

        return redirect()->back()->with('success', 'Permohonan telah disetujui dan NOC berhasil dibuat.');
    }
}