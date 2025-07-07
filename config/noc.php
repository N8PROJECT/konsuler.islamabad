<?php

return [
    1 => [
        'name' => 'New Student',
        'fields' => [
            'fullname' => 'Full Name',
            'place_of_birth' => 'Place of Birth',
            'date_of_birth' => 'Date of Birth',
            'nationality' => 'Nationality',
            'passport_number' => 'Passport Number',
            'passport_issued_date' => 'Passport Issued Date',
            'passport_expired_date' => 'Passport Expired Date',
            'nik' => 'NIK',
            'refer_letter_number' => 'Refer Letter Number',
            'refer_letter_date' => 'Refer Letter Date',
            'refer_letter' => 'Refer Letter',
            'major' => 'Major',
        ],
        'members' => true,
        'documents' => [
            'passport' => 'Passport',
            'ektp' => 'E-KTP',
            'kartu_keluarga' => 'Kartu Keluarga',
            'ijazah' => 'Ijazah',
            'surat_kemampuan_finansial' => 'Surat Kemampuan Finansial',
            'surat_acceptance_universitas_pakistan' => 'Surat Acceptance Universitas Pakistan',
            'surat_keterangan_kemenag' => 'Surat Keterangan Kemenag',
        ],
    ],

    2 => [
        'name' => 'IBBC',
        'fields' => [
            'fullname' => 'Full Name',
            'nationality' => 'Nationality',
            'passport_number' => 'Passport Number',
            'passport_issued_date' => 'Passport Issued Date',
            'passport_expired_date' => 'Passport Expired Date',
            'visa_start_date' => 'Visa Start Date',
            'visa_expired_date' => 'Visa Expired Date',
            'last_education' => 'Last Education',
            'graduation_date' => 'Graduation Date',
            'universitas_selanjutnya' => 'Universitas Selanjutnya',
        ],
        'documents' => [
            'passport' => 'Passport',
            'visa' => 'Visa',
            'bonafide' => 'Surat Bonafide',
        ],
    ],

    3 => [
        'name' => 'HEC',
        'fields' => [
            'fullname' => 'Full Name',
            'nationality' => 'Nationality',
            'passport_number' => 'Passport Number',
            'passport_issued_date' => 'Passport Issued Date',
            'passport_expired_date' => 'Passport Expired Date',
            'visa_start_date' => 'Visa Start Date',
            'visa_expired_date' => 'Visa Expired Date',
            'universitas_selanjutnya' => 'Universitas Selanjutnya',
        ],
        'documents' => [
            'passport' => 'Passport',
            'visa' => 'Visa',
        ],
    ],

    4 => [
        'name' => 'Renewal Visa',
        'subtypes' => [
            'student' => [
                'fields' => [
                    'fullname' => 'Full Name',
                    'nationality' => 'Nationality',
                    'passport_number' => 'Passport Number',
                    'passport_issued_date' => 'Passport Issued Date',
                    'passport_expired_date' => 'Passport Expired Date',
                    'visa_start_date' => 'Visa Start Date',
                    'visa_expired_date' => 'Visa Expired Date',
                    'place_of_birth' => 'Place of Birth',
                    'date_of_birth' => 'Date of Birth',
                ],
                'documents' => [
                    'passport' => 'Passport',
                    'visa' => 'Visa Lama',
                    'bukti_lapor_diri' => 'Bukti Lapor Diri',
                    'bonafide' => 'Surat Bonafide',
                ],
            ],
            'spouse' => [
                'fields' => [
                    'fullname' => 'Full Name',
                    'nationality' => 'Nationality',
                    'passport_number' => 'Passport Number',
                    'passport_issued_date' => 'Passport Issued Date',
                    'passport_expired_date' => 'Passport Expired Date',
                    'visa_start_date' => 'Visa Start Date',
                    'visa_expired_date' => 'Visa Expired Date',
                    'place_of_birth' => 'Place of Birth',
                    'date_of_birth' => 'Date of Birth',

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
                ],
                'documents' => [
                    'passport' => 'Passport',
                    'visa' => 'Visa Lama',
                    'passport_suami_istri' => 'Passport Suami/Istri',
                    'bonafide_suami_istri' => 'Bonafide Suami/Istri',
                ],
            ],
            'children' => [
                'fields' => [
                    'fullname' => 'Full Name',
                    'nationality' => 'Nationality',
                    'passport_number' => 'Passport Number',
                    'passport_issued_date' => 'Passport Issued Date',
                    'passport_expired_date' => 'Passport Expired Date',
                    'visa_start_date' => 'Visa Start Date',
                    'visa_expired_date' => 'Visa Expired Date',
                ],
                'documents' => [
                    'passport' => 'Passport',
                    'visa' => 'Visa Lama',
                    'passport_ayah' => 'Passport Ayah',
                    'passport_ibu' => 'Passport Ibu',
                ],
            ],
        ],
    ],

    5 => [
        'name' => 'Trip',
        'fields' => [
            'fullname' => 'Full Name',
            'nationality' => 'Nationality',
            'passport_number' => 'Passport Number',
        ],
        'members' => true,
        'documents' => [
            'passport' => 'Passport',
            'visa' => 'Visa',
        ],
    ],
];