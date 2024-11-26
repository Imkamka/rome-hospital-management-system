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
        Schema::create('appointments', static function (Blueprint $table) {
            $table->id();
            $table->string('appointment_number')->unique()->nullable();
            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade'); // Assuming patients are in the users table
            $table->foreignId('doctor_id')->constrained('users')->onDelete('cascade'); // Assuming doctors are in the users table
            $table->string('appointment_date')->nullable();
            $table->string('appointment_time')->nullable();
            $table->enum('status', ['Pending', 'Approved', 'Cancelled', 'Completed', 'Follow-Up'])->default('Pending');
            $table->date('follow_up_date')->nullable();
            $table->text('follow_up_notes')->nullable(); // Status of the appointment
            $table->text('message')->nullable(); // Optional notes for the appointment
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
