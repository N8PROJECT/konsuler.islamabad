<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'type_id', 'status', 'fullname', 'place_of_birth', 'date_of_birth',
        'nationality', 'nik', 'passport_number', 'passport_issued_date', 'passport_expired_date',
        'universitas_selanjutnya', 'renewal_for', 'name_spouse', 'pob_spouse', 'dob_spouse',
        'address_spouse', 'nik_spouse', 'nationality_spouse', 'relation_spouse',
        'passport_number_spouse', 'passport_issued_date_spouse', 'passport_expired_date_spouse',
        'name_children', 'nationality_children', 'relation_children', 'passport_number_children',
        'passport_issued_date_children', 'passport_expired_date_children', 'name_member',
        'passport_number_member', 'visa_start_date_member', 'visa_expired_date_member',
        'visa_start_date', 'visa_expired_date', 'surat_pengantar_ppmi', 'passport',
        'ektp', 'kartu_keluarga', 'ijazah', 'surat_kemampuan_finansial',
        'surat_acceptance_universitas_pakistan', 'surat_keterangan_kemenag', 'bukti_lapor_diri',
        'visa', 'bonafide', 'passport_suami_istri', 'bonafide_suami_istri',
        'passport_ayah', 'passport_ibu', 'noc', 'comment',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'passport_issued_date' => 'date',
        'passport_expired_date' => 'date',
        'dob_spouse' => 'date',
        'passport_issued_date_spouse' => 'date',
        'passport_expired_date_spouse' => 'date',
        'passport_issued_date_children' => 'date',
        'passport_expired_date_children' => 'date',
        'visa_start_date' => 'date',
        'visa_expired_date' => 'date',
        'visa_start_date_member' => 'date',
        'visa_expired_date_member' => 'date',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function members() {
        return $this->hasMany(Member::class);
    }
}
