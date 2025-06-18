<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with('members')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data' => $applications,
        ]);
    }

    public function create() {
        return view('application.create');
    }

    public function show($id)
    {
        $application = Application::with('members')->where('user_id', auth()->id())->find($id);

        if (!$application) {
            return response()->json(['error' => 'Application not found'], 404);
        }

        return response()->json(['success' => true, 'data' => $application]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'user') {
            abort(403, 'Unauthorized');
        }

        // Validasi dasar
        $request->validate([
            'type_id' => 'required|exists:types,id',
            'fullname' => 'required|string',
            'nationality' => 'required|string',
            'passport_number' => 'required|string',
            'passport_issued_date' => 'required|date',
            'passport_expired_date' => 'required|date',
        ]);

        $typeId = (int) $request->type_id;

        $dynamicRules = $this->getValidationRulesByType($request, $typeId);
        $request->validate($dynamicRules);

        // Siapkan data
        $data = $request->except(['members']);
        $data['user_id'] = $user->id;

        // ✅ Upload file
        foreach ($request->allFiles() as $key => $file) {
            if (is_array($file)) continue; // skip kalau ada file array (misal file upload per-member)
            $data[$key] = $request->file($key)->store("uploads/applications/{$user->id}", 'public');
        }

        $application = Application::create($data);

        // Simpan anggota keluarga
        if ($request->has('members')) {
            foreach ($request->members as $memberData) {
                $application->members()->create($memberData);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Application submitted successfully',
            'data' => $application->load('members'),
        ], 201);
    }

    public function update(Request $request, Application $application)
    {
        $user = Auth::user();

        if ($application->user_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $rules = [
            'type_id' => 'sometimes|required|exists:types,id',
            'fullname' => 'sometimes|required|string',
            'nationality' => 'sometimes|required|string',
            'passport_number' => 'sometimes|required|string',
            'passport_issued_date' => 'sometimes|required|date',
            'passport_expired_date' => 'sometimes|required|date',
        ];

        $typeId = (int) $request->input('type_id', $application->type_id);
        $rules = array_merge($rules, $this->getValidationRulesByType($request, $typeId, true));
        $validated = $request->validate($rules);

        // Handle file updates
        foreach ($request->files->all() as $key => $file) {
            if ($application->{$key}) {
                Storage::disk('public')->delete($application->{$key});
            }
            $validated[$key] = $file->store("uploads/applications/{$user->id}", 'public');
        }

        $application->update($validated);

        // Update atau tambah members
        if ($request->has('members')) {
            foreach ($request->members as $memberData) {
                if (isset($memberData['id'])) {
                    $application->members()->where('id', $memberData['id'])->update($memberData);
                } else {
                    $application->members()->create($memberData);
                }
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Application updated successfully',
            'data' => $application->load('members'),
        ]);
    }

    public function cancel(Application $application)
    {
        if ($application->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $application->update(['status' => 'cancelled']);
        $application->members()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Application cancelled and members deleted.',
        ]);
    }

    private function getValidationRulesByType(Request $request, int $typeId, bool $isUpdate = false): array
    {
        $required = $isUpdate ? 'sometimes' : 'required';

        switch ($typeId) {
            case 1: // New Student
                return [
                    'nik' => "$required|string",
                    'place_of_birth' => "$required|string",
                    'date_of_birth' => "$required|date",
                    'surat_pengantar_ppmi' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                    'passport' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                    'ektp' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                    'kartu_keluarga' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                    'ijazah' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                    'surat_kemampuan_finansial' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                    'surat_acceptance_universitas_pakistan' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                    'surat_keterangan_kemenag' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                    'members' => 'nullable|array',
                    'members.*.name' => 'required|string',
                    'members.*.relation' => 'required|string',
                ];
            case 2: // IBBC
                return [
                    'visa_start_date' => "$required|date",
                    'visa_expired_date' => "$required|date",
                    'place_of_birth' => "$required|string",
                    'date_of_birth' => "$required|date",
                    'surat_pengantar_ppmi' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                    'passport' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                    'visa' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                    'bukti_lapor_diri' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                    'ijazah' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                    'surat_acceptance_universitas_pakistan' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                ];
            case 3: // HEC
                return [
                    'visa_start_date' => "$required|date",
                    'visa_expired_date' => "$required|date",
                    'universitas_selanjutnya' => "$required|string",
                    'place_of_birth' => "$required|string",
                    'date_of_birth' => "$required|date",
                    'surat_pengantar_ppmi' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                    'passport' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                    'visa' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                    'bukti_lapor_diri' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                    'ijazah' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                    'surat_acceptance_universitas_pakistan' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                ];
            case 4: // Renewal Visa
                $rules = ['renewal_for' => "$required|in:student,spouse,children"];
                switch ($request->renewal_for) {
                    case 'student':
                        return array_merge($rules, [
                            'visa_start_date' => "$required|date",
                            'visa_expired_date' => "$required|date",
                            'place_of_birth' => "$required|string",
                            'date_of_birth' => "$required|date",
                            'bukti_lapor_diri' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                            'bonafide' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                            'passport' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                            'visa' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                        ]);
                    case 'spouse':
                        return array_merge($rules, [
                            'name_spouse' => "$required|string",
                            'pob_spouse' => "$required|string",
                            'dob_spouse' => "$required|date",
                            'address_spouse' => "$required|string",
                            'nik_spouse' => "$required|string",
                            'nationality_spouse' => "$required|string",
                            'relation_spouse' => "$required|string",
                            'passport_number_spouse' => "$required|string",
                            'passport_issued_date_spouse' => "$required|date",
                            'passport_expired_date_spouse' => "$required|date",
                            'visa_start_date' => "$required|date",
                            'visa_expired_date' => "$required|date",
                            'surat_pengantar_ppmi' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                            'passport' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                            'passport_suami_istri' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                            'bonafide_suami_istri' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                            'visa' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                        ]);
                    case 'children':
                        return array_merge($rules, [
                            'visa_start_date' => "$required|date",
                            'visa_expired_date' => "$required|date",
                            'members' => 'nullable|array',
                            'members.*.name' => 'required|string',
                            'members.*.passport_number' => 'required|string',
                            'members.*.passport_issued_date' => 'required|date',
                            'members.*.passport_expired_date' => 'required|date',
                            'members.*.nationality' => 'required|string',
                            'members.*.relation' => 'required|string',
                            'surat_pengantar_ppmi' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                            'passport' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                            'passport_ayah' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                            'passport_ibu' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                            'bonafide_suami_istri' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                            'visa' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                        ]);
                }
            case 5: // Trip
                return [
                    'place_of_birth' => "$required|string",
                    'date_of_birth' => "$required|date",
                    'members' => 'nullable|array',
                    'members.*.name' => 'required|string',
                    'members.*.relation' => 'required|string',
                    'members.*.passport_number' => 'required|string',
                    'members.*.visa_start_date' => 'required|date',
                    'members.*.visa_expired_date' => 'required|date',
                    'surat_pengantar_ppmi' => "$required|file|mimes:pdf,jpg,jpeg,png|max:2048",
                ];
            default:
                return [];
        }
    }
}
