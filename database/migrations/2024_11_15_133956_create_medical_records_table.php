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
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->string('record_number')->unique();
            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained('users')->onDelete('cascade');
            $table->string('consultation_type')->nullable();
            $table->string('referred_by')->nullable();
            $table->date('record_date')->nullable();
            $table->string('clinic')->nullable();
            $table->string('habits')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->string('place_of_residence')->nullable();
            $table->string('socio_economic_status')->nullable();
            $table->string('education_level')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};
