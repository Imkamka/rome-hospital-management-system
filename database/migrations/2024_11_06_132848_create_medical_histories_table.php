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
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users')->cascadeOnDelete();
            // Medical History
            $table->text('allergies')->nullable();
            $table->text('current_medications')->nullable();
            $table->text('current_diagnosis')->nullable();
            $table->string('reason_for_visit')->nullable(); // e.g., "fever," "checkup," "injury

            // Treatment Records
            $table->text('treatment_plans')->nullable();
            $table->date('last_visit_date')->nullable();
            $table->date('next_visit_date')->nullable();
            $table->enum('status', ['Active', 'Resolved', 'Ongoing'])->nullable();
            $table->date('prescription_date')->nullable();
            $table->text('prescription')->nullable();  // Prescription
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_histories');
    }
};
