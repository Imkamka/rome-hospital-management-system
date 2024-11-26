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
        Schema::create('website_details', function (Blueprint $table) {
            $table->id();
            $table->string('page_title')->nullable();
            $table->string('address')->nullable();
            $table->text('about_us')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('mobile_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_details');
    }
};
