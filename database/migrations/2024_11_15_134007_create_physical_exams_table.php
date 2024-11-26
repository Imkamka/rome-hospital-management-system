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
        Schema::create('physical_exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_record_id')->constrained('medical_records')->onDelete('cascade');
            $table->text('head_front_comment')->nullable();
            $table->text('head_side_comment')->nullable();
            $table->text('head_back_comment')->nullable();
            $table->text('torso_abdomen')->nullable();
            $table->text('upper_limbs')->nullable();
            $table->text('lower_limbs')->nullable();
            $table->text('back_glutes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physical_exams');
    }
};
