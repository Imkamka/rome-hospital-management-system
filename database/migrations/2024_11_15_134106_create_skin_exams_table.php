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
        Schema::create('skin_exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_record_id')->constrained('medical_records')->onDelete('cascade');

            // Wrinkle Analysis
            $table->integer('score')->nullable();
            $table->text('wrinkle_comment')->nullable();
            // Fitzpatrick Scale
            $table->text('fitz_comment')->nullable();

            $table->string('sun_exposure')->nullable();
            $table->text('dermatological_lesion_type')->nullable();
            $table->text('sun_screen')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skin_exams');
    }
};
