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
        Schema::create('medical_record_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_record_id')->constrained('medical_records')->onDelete('cascade');

            //Pathological History
            $table->string('pathologies')->nullable();
            $table->text('pathologies_comments')->nullable();
            $table->string('allergies')->nullable();
            $table->text('allergy_comments')->nullable();
            $table->string('surgeries_hospitalizations')->nullable();
            $table->text('surgeries_hospitalizations_comments')->nullable();
            $table->string('pre_plastic_surgeries')->nullable();
            $table->text('pre_plastic_surgeries_comments')->nullable();

            //Non Pathological History
            $table->string('smoking')->nullable();
            $table->text('smoking_comments')->nullable();
            $table->string('alcohol')->nullable();
            $table->text('alcohol_comments')->nullable();
            $table->string('phy_activity')->nullable();
            $table->text('phy_activity_comments')->nullable();
            $table->timestamps();
        });
    }

    /**s
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_record_histories');
    }
};
