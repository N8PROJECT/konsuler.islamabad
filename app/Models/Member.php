<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id', 'name', 'nik', 'pob', 'dob', 'nationality',
        'relation', 'address', 'passport_number', 'passport_issued_date',
        'passport_expired_date', 'visa_start_date', 'visa_expired_date',
    ];

    protected $casts = [
        'dob' => 'date',
        'passport_issued_date' => 'date',
        'passport_expired_date' => 'date',
        'visa_start_date' => 'date',
        'visa_expired_date' => 'date',
    ];

    public function application() {
        return $this->belongsTo(Application::class);
    }
}
