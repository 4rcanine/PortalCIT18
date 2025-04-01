<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program; // Import the Program model

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::create(['name' => 'Bachelor of Science in Computer Science', 'code' => 'BSCS']);
        Program::create(['name' => 'Bachelor of Science in Information Technology', 'code' => 'BSIT']);
        Program::create(['name' => 'Bachelor of Science in Business Administration', 'code' => 'BSBA']);
        Program::create(['name' => 'Bachelor of Arts in Communication', 'code' => 'BACOMM']);
        // Add more programs as needed
    }
}