<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
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

        // Cek apakah sudah ada template blade sesuai type
        $typeName = strtolower(Str::slug($application->type->name));
        $typeView = 'user.noc.' . $typeName . '.pdf';

        if (!view()->exists($typeView)) {
            return back()->withErrors(['msg' => 'Template surat untuk jenis aplikasi ini belum tersedia.']);
        }

        // Penyesuaian gender
        $gender = strtolower($application->user->gender);

        $salutation = match($gender) {
            'male' => 'Mr.',
            'female' => 'Ms.',
            default => '',
        };

        $pronoun1 = match($gender) {
            'male' => 'he',
            'female' => 'she',
            default => 'they',
        };

        $pronoun2 = match($gender) {
            'male' => 'his',
            'female' => 'her',
            default => 'their',
        };

        // Generate nomor surat
        $count = Application::whereYear('created_at', now()->year)->count() + 1;

        $bulanRomawi = [
            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV',
            5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII',
            9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'
        ];

        $month = now()->month;
        $year = now()->year;
        $letterNumber = "{$count}/PK/ISL/{$bulanRomawi[$month]}/{$year}";

        // Data yang akan di-passing ke view
        $data = [
            'salutation' => $salutation,
            'pronoun1' => $pronoun1,
            'pronoun2' => $pronoun2,
            'name' => $application->fullname,
            'birth_place' => $application->place_of_birth,
            'birth_date' => optional($application->date_of_birth)->format('F d, Y'),
            'passport_number' => $application->passport_number,

            'refer_letter' => $application->refer_letter,
            'refer_letter_number' => $application->refer_letter_number,
            'refer_letter_date' => optional($application->refer_letter_date)->format('F d, Y'),
            'major' => $application->major,

            'last_education' => $application->last_education,
            'graduation_date' => optional($application->graduation_date)->format('F d, Y'),
            'universitas_selanjutnya' => $application->universitas_selanjutnya,

            'surat_date' => now()->format('F d, Y'),
            'letter_number' => $letterNumber,
        ];

        $pdf = Pdf::loadView($typeView, $data);

        // Simpan file PDF ke storage
        Storage::makeDirectory('public/generated_pdfs');
        $filename = "noc_{$typeName}_" . Str::random(5) . ".pdf";
        $path = "public/generated_pdfs/{$filename}";
        Storage::put($path, $pdf->output());

        // Update ke database
        $application->update([
            'status' => 'approved',
            'noc' => $path,
            'letter_number' => $letterNumber,
        ]);

        return redirect()->back()->with('success', 'PDF NOC berhasil dibuat dan disetujui.');
    }
}