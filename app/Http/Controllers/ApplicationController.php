<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    public function index() {
        $user = auth()->user();

        $applications = Application::with('members')
            ->where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();

        return view('application.index', compact('applications'));
    }

    public function show($id) {
        $application = Application::with('members')->find($id);

        if (!$application || $application->user_id !== auth()->id()) {
            return redirect()->route('applications.index')->with('error', 'Not found or unauthorized.');
        }

        return view('application.show', compact('application'));
    }

    public function create() {
        return view('application.create');
    }

    public function store(Request $request) {
        $user = auth()->user();

        $request->validate([
            'type_id' => 'required|exists:types,id',
            'fullname' => 'required|string',
            'nationality' => 'required|string',
            'passport_number' => 'required|string',
            'passport_issued_date' => 'required|date',
            'passport_expired_date' => 'required|date',
        ]);

        switch ($request->type_id) {
            case 1: // New Student
                $request->validate([
                    'nik' => 'required|string',
                    'place_of_birth' => 'required|string',
                    'date_of_birth' => 'required|date',

                    'members' => 'nullable|array',
                    'members.*.name' => 'required|string',
                    'members.*.nik' => 'nullable|string',
                    'members.*.pob' => 'nullable|string',
                    'members.*.dob' => 'nullable|date',
                    'members.*.nationality' => 'required|string',
                    'members.*.relation' => 'required|string',
                    'members.*.address' => 'nullable|string',

                    'surat_pengantar_ppmi' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                    'passport' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                    'ektp' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                    'kartu_keluarga' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                    'ijazah' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                    'surat_kemampuan_finansial' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                    'surat_acceptance_universitas_pakistan' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                    'surat_keterangan_kemenag' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                ]);
                break;

            case 2: // IBBC
                $request->validate([
                    'visa_start_date' => 'required|date',
                    'visa_expired_date' => 'required|date',
                    'place_of_birth' => 'required|string',
                    'date_of_birth' => 'required|date',

                    'surat_pengantar_ppmi' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                    'passport' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                    'visa' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                    'bukti_lapor_diri' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                    'ijazah' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                    'surat_acceptance_universitas_pakistan' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                ]);
                break;

            case 3: // HEC
                $request->validate([
                    'visa_start_date' => 'required|date',
                    'visa_expired_date' => 'required|date',
                    'universitas_selanjutnya' => 'required|string',
                    'place_of_birth' => 'required|string',
                    'date_of_birth' => 'required|date',

                    'surat_pengantar_ppmi' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                    'passport' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                    'visa' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                    'bukti_lapor_diri' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                    'ijazah' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                    'surat_acceptance_universitas_pakistan' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                ]);
                break;

            case 4: // Renewal Visa
                $request->validate([
                    'renewal_for' => 'required|in:student,spouse,children',
                ]);

                switch ($request->renewal_for) {
                    case 'student':
                        $request->validate([
                            'visa_start_date' => 'required|date',
                            'visa_expired_date' => 'required|date',
                            'place_of_birth' => 'required|string',
                            'date_of_birth' => 'required|date',

                            'bukti_lapor_diri' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                            'bonafide' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                            'passport' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                            'visa' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                        ]);
                        break;

                    case 'spouse':
                        $request->validate([
                            'place_of_birth' => 'required|string',
                            'date_of_birth' => 'required|date',
                            'visa_start_date' => 'required|date',
                            'visa_expired_date' => 'required|date',

                            'name_spouse' => 'required|string',
                            'pob_spouse' => 'required|string',
                            'dob_spouse' => 'required|date',
                            'address_spouse' => 'required|string',
                            'nik_spouse' => 'required|string',
                            'nationality_spouse' => 'required|string',
                            'relation_spouse' => 'required|string',
                            'passport_number_spouse' => 'required|string',
                            'passport_issued_date_spouse' => 'required|date',
                            'passport_expired_date_spouse' => 'required|date',

                            'surat_pengantar_ppmi' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                            'passport' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                            'passport_suami_istri' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                            'bonafide_suami_istri' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                            'visa' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                        ]);
                        break;

                    case 'children':
                        $request->validate([
                            'visa_start_date' => 'required|date',
                            'visa_expired_date' => 'required|date',

                            'members' => 'nullable|array',
                            'members.*.name' => 'required|string',
                            'members.*.nationality' => 'required|string',
                            'members.*.relation' => 'required|string',
                            'members.*.passport_number' => 'required|string',
                            'members.*.passport_issued_date' => 'required|date',
                            'members.*.passport_expired_date' => 'required|date',

                            'surat_pengantar_ppmi' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                            'passport' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                            'passport_ayah' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                            'passport_ibu' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                            'bonafide_suami_istri' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                            'visa' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                        ]);
                        break;
                }
                break;

            case 5: // Trip
                $request->validate([
                    'place_of_birth' => 'required|string',
                    'date_of_birth' => 'required|date',

                    'members' => 'nullable|array',
                    'members.*.name' => 'required|string',
                    'members.*.relation' => 'required|string',
                    'members.*.passport_number' => 'required|string',
                    'members.*.visa_start_date' => 'required|date',
                    'members.*.visa_expired_date' => 'required|date',

                    'surat_pengantar_ppmi' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                ]);
                break;

            default:
                return response()->json(['error' => 'Invalid type_id'], 400);
        }

        $data = $request->except('members');
        $data['user_id'] = $user->id;

        $documentFields = [
            'surat_pengantar_ppmi',
            'passport',
            'ektp',
            'kartu_keluarga',
            'ijazah',
            'surat_kemampuan_finansial',
            'surat_acceptance_universitas_pakistan',
            'surat_keterangan_kemenag',
            'visa',
            'bukti_lapor_diri',
            'bonafide',
            'passport_suami_istri',
            'bonafide_suami_istri',
            'passport_ayah',
            'passport_ibu',
        ];

        foreach ($documentFields as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('documents', 'public');
            }
        }

        $application = Application::create($data);

        if ($request->has('members')) {
            foreach ($request->members as $memberData) {
                $application->members()->create($memberData);
            }
        }

        return redirect()->route('applications.show', $application->id)
                     ->with('success', 'Application created successfully.');
    }

    public function update(Request $request, Application $application) {
        $user = auth()->user();

        // dd($application->user_id);

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
            'place_of_birth' => 'sometimes|required|string',
            'date_of_birth' => 'sometimes|required|date',
        ];

        switch ((int) $request->type_id) {
            case 1:
                $rules = array_merge($rules, [
                    'nik' => 'sometimes|required|string',
                    'members' => 'nullable|array',
                    'members.*.name' => 'required|string',
                    'members.*.nik' => 'string',
                    'members.*.pob' => 'string',
                    'members.*.dob' => 'date',
                    'members.*.nationality' => 'required|string',
                    'members.*.relation' => 'required|string',
                    'members.*.address' => 'string',
                ]);
                break;

            case 2:
                $rules = array_merge($rules, [
                    'visa_start_date' => 'sometimes|required|date',
                    'visa_expired_date' => 'sometimes|required|date',
                ]);
                break;

            case 3:
                $rules = array_merge($rules, [
                    'visa_start_date' => 'sometimes|required|date',
                    'visa_expired_date' => 'sometimes|required|date',
                    'universitas_selanjutnya' => 'sometimes|required|string',
                ]);
                break;

            case 4:
                $rules['renewal_for'] = 'sometimes|required|in:student,spouse,children';
                switch ($request->renewal_for) {
                    case 'student':
                        $rules = array_merge($rules, [
                            'visa_start_date' => 'sometimes|required|date',
                            'visa_expired_date' => 'sometimes|required|date',
                        ]);
                        break;

                    case 'spouse':
                        $rules = array_merge($rules, [
                            'visa_start_date' => 'sometimes|required|date',
                            'visa_expired_date' => 'sometimes|required|date',
                            'name_spouse' => 'sometimes|required|string',
                            'pob_spouse' => 'sometimes|required|string',
                            'dob_spouse' => 'sometimes|required|date',
                            'address_spouse' => 'sometimes|required|string',
                            'nik_spouse' => 'sometimes|required|string',
                            'nationality_spouse' => 'sometimes|required|string',
                            'relation_spouse' => 'sometimes|required|string',
                            'passport_number_spouse' => 'sometimes|required|string',
                            'passport_issued_date_spouse' => 'sometimes|required|date',
                            'passport_expired_date_spouse' => 'sometimes|required|date',
                        ]);
                        break;

                    case 'children':
                        $rules = array_merge($rules, [
                            'visa_start_date' => 'sometimes|required|date',
                            'visa_expired_date' => 'sometimes|required|date',
                            'members' => 'nullable|array',
                            'members.*.name' => 'required|string',
                            'members.*.nationality' => 'required|string',
                            'members.*.relation' => 'required|string',
                            'members.*.passport_number' => 'required|string',
                            'members.*.passport_issued_date' => 'required|date',
                            'members.*.passport_expired_date' => 'required|date',
                        ]);
                        break;
                }
                break;

            case 5:
                $rules = array_merge($rules, [
                    'members' => 'nullable|array',
                    'members.*.name' => 'required|string',
                    'members.*.relation' => 'required|string',
                    'members.*.passport_number' => 'required|string',
                    'members.*.visa_start_date' => 'required|date',
                    'members.*.visa_expired_date' => 'required|date',
                ]);
                break;

            default:
                return response()->json(['error' => 'Invalid type_id'], 400);
        }

        $validated = $request->validate($rules);

        $validated['user_id'] = $user->id;
        $application->update($validated);

        if ($request->has('members')) {
            foreach ($request->members as $memberData) {
                if (isset($memberData['id'])) {
                    $application->members()->where('id', $memberData['id'])->update($memberData);
                } else {
                    $application->members()->create($memberData);
                }
            }
        }

        return redirect()->route('applications.show', $application->id)
                     ->with('success', 'Application updated successfully.');
    }

    public function cancel(Application $application) {
        $user = auth()->user();

        if ($application->user_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Update status jadi 'cancelled'
        $application->status = 'cancelled';
        $application->save();

        // Hapus semua anggota (members) terkait aplikasi ini
        $application->members()->delete();

        return redirect()->route('applications.index')
                     ->with('success', 'Application cancelled successfully.');
    }
}
