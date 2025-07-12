<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function applications() {
        $user = auth()->user();

        $onProcess = Application::with('members')
            ->where('user_id', $user->id)
            ->where('status', 'Pending')
            ->orderByDesc('created_at')
            ->get();

        $recently = Application::where('user_id', auth()->id())
            ->whereIn('status', ['approved', 'rejected', 'reviewed', 'cancelled'])
            ->latest()
            ->get();

        return view('user.applications', compact('onProcess', 'recently'));
    }

    public function show($id) {
        $application = Application::with(['members', 'type'])
            ->where('user_id', auth()->id()) // keamanan
            ->findOrFail($id);

        $fieldSets = [
            1 => [
                'fields' => [
                    'nik' => 'NIK',
                    'place_of_birth' => 'Place of Birth',
                    'date_of_birth' => 'Date of Birth',
                    'passport_number' => 'Passport Number',
                    'passport_issued_date' => 'Passport Issued Date',
                    'passport_expired_date' => 'Passport Expired Date',
                    'nationality' => 'Nationality',
                    'refer_letter_number' => 'Refer Letter Number',
                    'refer_letter_date' => 'Refer Letter Date',
                    'refer_letter' => 'Refer Letter',
                    'universitas_selanjutnya' => 'Next University',
                    'major' => 'Major',
                ],
                'documents' => [
                    'surat_pengantar_ppmi' => 'Surat Pengantar PPMI',
                    'passport' => 'Passport',
                    'ektp' => 'E-KTP',
                    'kartu_keluarga' => 'Kartu Keluarga',
                    'ijazah' => 'Ijazah',
                    'surat_kemampuan_finansial' => 'Surat Kemampuan Finansial',
                    'surat_acceptance_universitas_pakistan' => 'Surat Acceptance Universitas Pakistan',
                    'surat_keterangan_kemenag' => 'Surat Keterangan Kemenag',
                ]
            ],
            2 => [
                'fields' => [
                    'place_of_birth' => 'Place of Birth',
                    'date_of_birth' => 'Date of Birth',
                    'visa_start_date' => 'Visa Start Date',
                    'visa_expired_date' => 'Visa Expired Date',
                    'passport_number' => 'Passport Number',
                    'passport_issued_date' => 'Passport Issued Date',
                    'passport_expired_date' => 'Passport Expired Date',
                    'nationality' => 'Nationality',
                    'last_education' => 'Last Education',
                    'graduation_date' => 'Graduation Date',
                    'universitas_selanjutnya' => 'Next University',
                ],
                'documents' => [
                    'surat_pengantar_ppmi' => 'Surat Pengantar PPMI',
                    'passport' => 'Passport',
                    'visa' => 'Visa',
                    'bukti_lapor_diri' => 'Bukti Lapor Diri',
                    'ijazah' => 'Ijazah',
                    'surat_acceptance_universitas_pakistan' => 'Surat Acceptance Universitas Pakistan',
                ]
            ],
            3 => [
                'fields' => [
                    'universitas_selanjutnya' => 'Universitas Selanjutnya',
                    'place_of_birth' => 'Place of Birth',
                    'date_of_birth' => 'Date of Birth',
                    'visa_start_date' => 'Visa Start Date',
                    'visa_expired_date' => 'Visa Expired Date',
                    'passport_number' => 'Passport Number',
                    'passport_issued_date' => 'Passport Issued Date',
                    'passport_expired_date' => 'Passport Expired Date',
                    'nationality' => 'Nationality',
                ],
                'documents' => [
                    'surat_pengantar_ppmi' => 'Surat Pengantar PPMI',
                    'passport' => 'Passport',
                    'visa' => 'Visa',
                    'bukti_lapor_diri' => 'Bukti Lapor Diri',
                    'ijazah' => 'Ijazah',
                    'surat_acceptance_universitas_pakistan' => 'Surat Acceptance Universitas Pakistan',
                ]
            ],
            4 => [ // Renewal Visa
                'fields' => [ /* default student */ ],
                'documents' => [ /* default student */ ],

                'subtypes' => [
                    'student' => [
                        'fields' => [ /* khusus student */ ],
                        'documents' => [ /* khusus student */ ]
                    ],
                    'spouse' => [
                        'fields' => [
                            'renewal_for' => 'Renewal For',
                            'name_spouse' => 'Name of Spouse',
                            'pob_spouse' => 'Place of Birth (Spouse)',
                            'dob_spouse' => 'Date of Birth (Spouse)',
                            'address_spouse' => 'Address (Spouse)',
                            'nik_spouse' => 'NIK (Spouse)',
                            'nationality_spouse' => 'Nationality (Spouse)',
                            'relation_spouse' => 'Relation (Spouse)',
                            'passport_number_spouse' => 'Passport Number (Spouse)',
                            'passport_issued_date_spouse' => 'Passport Issued Date (Spouse)',
                            'passport_expired_date_spouse' => 'Passport Expired Date (Spouse)',
                            'place_of_birth' => 'Place of Birth',
                            'date_of_birth' => 'Date of Birth',
                            'visa_start_date' => 'Visa Start Date',
                            'visa_expired_date' => 'Visa Expired Date',
                            'passport_number' => 'Passport Number',
                            'passport_issued_date' => 'Passport Issued Date',
                            'passport_expired_date' => 'Passport Expired Date',
                            'nationality' => 'Nationality',
                        ],
                        'documents' => [
                            'passport' => 'Passport',
                            'visa' => 'Visa',
                            'surat_pengantar_ppmi' => 'Surat Pengantar PPMI',
                            'passport_suami_istri' => 'Passport Suami/Istri',
                            'bonafide_suami_istri' => 'Bonafide Suami/Istri',
                        ]
                    ],
                    'children' => [
                        'fields' => [
                            'name_children' => 'Name of Children',
                            'nationality_children' => 'Nationality (Children)',
                            'relation_children' => 'Relation (Children)',
                            'passport_number_children' => 'Passport Number (Children)',
                            'passport_issued_date_children' => 'Passport Issued Date (Children)',
                            'passport_expired_date_children' => 'Passport Expired Date (Children)',
                            'place_of_birth' => 'Place of Birth',
                            'date_of_birth' => 'Date of Birth',
                            'visa_start_date' => 'Visa Start Date',
                            'visa_expired_date' => 'Visa Expired Date',
                            'passport_number' => 'Passport Number',
                            'passport_issued_date' => 'Passport Issued Date',
                            'passport_expired_date' => 'Passport Expired Date',
                            'nationality' => 'Nationality',
                        ],
                        'documents' => [
                            'passport' => 'Passport',
                            'visa' => 'Visa',
                            'surat_pengantar_ppmi' => 'Surat Pengantar PPMI',
                            'passport_ayah' => 'Passport Ayah',
                            'passport_ibu' => 'Passport Ibu',
                        ]
                    ]
                ]
            ],

            5 => [
                'fields' => [
                    'place_of_birth' => 'Place of Birth',
                    'date_of_birth' => 'Date of Birth',
                    'passport_number' => 'Passport Number',
                    'passport_issued_date' => 'Passport Issued Date',
                    'passport_expired_date' => 'Passport Expired Date',
                    'nationality' => 'Nationality',
                ],
                'documents' => [
                    'surat_pengantar_ppmi' => 'Surat Pengantar PPMI',
                ]
            ],
        ];

        return view('user.application-show', compact('application', 'fieldSets'));
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
            case 1: // New Admission
                $request->validate([
                    'nik' => 'required|string',
                    'place_of_birth' => 'required|string',
                    'date_of_birth' => 'required|date',
                    'refer_letter_number' => 'required|string',
                    'refer_letter_date' => 'required|date',
                    'refer_letter' => 'required|string',
                    'universitas_selanjutnya' => 'required|string',
                    'major' => 'required|string',

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
                    'surat_keterangan_kemenag' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                ]);
                break;

            case 2: // IBBC
                $request->validate([
                    'visa_start_date' => 'required|date',
                    'visa_expired_date' => 'required|date',
                    'place_of_birth' => 'required|string',
                    'date_of_birth' => 'required|date',
                    'last_education' => 'required|string',
                    'graduation_date' => 'required|date',
                    'universitas_selanjutnya' => 'required|string',

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

        // dd($application);

        return redirect()->route('applications')->with('success', 'Application created successfully.');
    }

    public function edit(Application $application)
    {
        if ($application->user_id !== auth()->id() || $application->status !== 'reviewed') {
            abort(403);
        }

        $fieldSets = config('noc');

        return view('user.application-edit', compact('application', 'fieldSets'));
    }

    public function update(Request $request, Application $application) {
        // dd($request->all());
        $user = auth()->user();

        if ($application->user_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        if ($application->status !== 'reviewed') {
            return redirect()->route('applications.show', $application->id)
                ->with('error', 'You can only edit application when status is reviewed.');
        }

        $rules = [
            'type_id' => 'required|exists:types,id',
            'fullname' => 'required|string',
            'nationality' => 'required|string',
            'passport_number' => 'required|string',
            'passport_issued_date' => 'required|date',
            'passport_expired_date' => 'required|date',
        ];

        $typeId = (int) $request->type_id;

        switch ($typeId) {
            case 1: // New Admission
                $rules = array_merge($rules, [
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
                ]);
                break;

            case 2: // IBBC
                $rules = array_merge($rules, [
                    'visa_start_date' => 'required|date',
                    'visa_expired_date' => 'required|date',
                    'place_of_birth' => 'required|string',
                    'date_of_birth' => 'required|date',
                    'last_education' => 'required|string',
                    'graduation_date' => 'required|date',
                    'universitas_selanjutnya' => 'required|string',
                ]);
                break;

            case 3: // HEC
                $rules = array_merge($rules, [
                    'visa_start_date' => 'required|date',
                    'visa_expired_date' => 'required|date',
                    'universitas_selanjutnya' => 'required|string',
                    'place_of_birth' => 'required|string',
                    'date_of_birth' => 'required|date',
                ]);
                break;

            case 4: // Renewal Visa
                $rules['renewal_for'] = 'required|in:student,spouse,children';

                switch ($request->renewal_for) {
                    case 'student':
                        $rules = array_merge($rules, [
                            'visa_start_date' => 'required|date',
                            'visa_expired_date' => 'required|date',
                            'place_of_birth' => 'required|string',
                            'date_of_birth' => 'required|date',
                        ]);
                        break;

                    case 'spouse':
                        $rules = array_merge($rules, [
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
                        ]);
                        break;

                    case 'children':
                        $rules = array_merge($rules, [
                            'visa_start_date' => 'required|date',
                            'visa_expired_date' => 'required|date',

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

            case 5: // Trip
                $rules = array_merge($rules, [
                    'place_of_birth' => 'required|string',
                    'date_of_birth' => 'required|date',

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

        // ✅ Update document uploads
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
                // Hapus file lama kalau ada
                if ($application->$field) {
                    Storage::disk('public')->delete($application->$field);
                }

                // Upload file baru
                $validated[$field] = $request->file($field)->store('documents', 'public');
            }
        }

        // Update data aplikasi
        $application->update($validated);

        // ✅ Update atau tambah family members
        if ($request->has('members')) {
            foreach ($request->members as $memberData) {
                if (isset($memberData['id'])) {
                    $application->members()->where('id', $memberData['id'])->update($memberData);
                } else {
                    $application->members()->create($memberData);
                }
            }
        }
        $application->status = 'pending';
        $application->save();
        

        return redirect()->route('application.show', $application->id)
            ->with('success', 'Application updated successfully.');
    }

    public function destroy(Application $application) {
        $user = auth()->user();

        if ($application->user_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Update status jadi 'cancelled'
        $application->status = 'cancelled';
        $application->save();

        // Hapus semua anggota (members) terkait aplikasi ini
        $application->members()->delete();

        return redirect()->route('applications')
                     ->with('success', 'Application cancelled successfully.');
    }

    public function download($id) {
        $application = Application::findOrFail($id);

        if (!$application->noc || !Storage::disk('public')->exists($application->noc)) {
            abort(404, 'File NOC tidak ditemukan.');
        }

        $filePath = storage_path('app/public/' . $application->noc);
        $downloadName = 'noc_' . strtolower(str_replace(' ', '_', $application->type->name)) . '_' . $application->id . '.pdf';

        return response()->download($filePath, $downloadName);
    }
}
