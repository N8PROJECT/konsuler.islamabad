<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade');
            $table->enum('status', ['pending', 'approved', 'rejected', 'reviewed', 'cancelled'])->default('pending');

            // Common fields for all types
            $table->string('fullname');
            $table->string('place_of_birth')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('nationality');
            $table->string('nik')->nullable();
            $table->string('passport_number');
            $table->date('passport_issued_date');
            $table->date('passport_expired_date');

            // Fields specific to New Admission
            $table->string('refer_letter_number')->nullable();
            $table->date('refer_letter_date')->nullable();
            $table->string('refer_letter')->nullable();
            $table->string('major')->nullable();

            // Fields specific to HEC
            $table->string('universitas_selanjutnya')->nullable();

            // Fields specific to NOC IBBC
            $table->string('last_education')->nullable();
            $table->date('graduation_date')->nullable();

            // NOC Renewal Visa
            $table->enum('renewal_for', ['student', 'spouse', 'children'])->nullable();

            // Fields specific to Renewal Visa (Spouse)
            $table->string('name_spouse')->nullable();
            $table->string('pob_spouse')->nullable();
            $table->date('dob_spouse')->nullable();
            $table->string('address_spouse')->nullable();
            $table->string('nik_spouse')->nullable();
            $table->string('nationality_spouse')->nullable();
            $table->string('relation_spouse')->nullable();
            $table->string('passport_number_spouse')->nullable();
            $table->date('passport_issued_date_spouse')->nullable();
            $table->date('passport_expired_date_spouse')->nullable();

            // Fields specific to Renewal Visa (Children)
            $table->string('name_children')->nullable();
            $table->string('nationality_children')->nullable();
            $table->string('relation_children')->nullable();
            $table->string('passport_number_children')->nullable();
            $table->date('passport_issued_date_children')->nullable();
            $table->date('passport_expired_date_children')->nullable();

            // Fields specific to for Trip
            $table->string('name_member')->nullable();
            $table->string('passport_number_member')->nullable();
            $table->date('visa_start_date_member')->nullable();
            $table->date('visa_expired_date_member')->nullable();

            // Visa Fields
            $table->date('visa_start_date')->nullable();
            $table->date('visa_expired_date')->nullable();

            // Document Uploads
            $table->string('surat_pengantar_ppmi')->nullable();
            $table->string('passport')->nullable();
            $table->string('ektp')->nullable();
            $table->string('kartu_keluarga')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('surat_kemampuan_finansial')->nullable();
            $table->string('surat_acceptance_universitas_pakistan')->nullable();
            $table->string('surat_keterangan_kemenag')->nullable();
            $table->string('bukti_lapor_diri')->nullable();
            $table->string('visa')->nullable();
            $table->string('bonafide')->nullable();
            $table->string('passport_suami_istri')->nullable();
            $table->string('bonafide_suami_istri')->nullable();
            $table->string('passport_ayah')->nullable();
            $table->string('passport_ibu')->nullable();

            $table->string('noc')->nullable();

            // Admin
            $table->string('comment')->nullable();

            $table->string('letter_number')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
