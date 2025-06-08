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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('nik')->nullable();
            $table->string('pob')->nullable();
            $table->date('dob')->nullable();
            $table->string('nationality')->nullable();
            $table->string('relation')->nullable();
            $table->string('address')->nullable();
            $table->string('passport_number')->nullable();
            $table->date('passport_issued_date')->nullable();
            $table->date('passport_expired_date')->nullable();
            $table->date('visa_start_date')->nullable();
            $table->date('visa_expired_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
