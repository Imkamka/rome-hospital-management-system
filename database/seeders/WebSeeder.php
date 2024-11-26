<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('website_details')->insert([
            'page_title' => 'Welcome to Our Website Roma Hospital Management System',
            'address' => '123 Fake Street, Faketown, FK 12345',
            'about_us' => 'Roma is a state-of-the-art hospital management system designed to streamline healthcare services and improve patient care. Our platform offers comprehensive solutions for patient management, appointment scheduling, medical records, and billing, ensuring a seamless experience for healthcare providers and patients alike.',
            'email' => 'info@roma.com',
            'mobile_number' => '+92 300 1234567',
        ]);
    }
}
