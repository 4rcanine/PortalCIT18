<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject; // Import Subject model

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::create([
            'code' => 'CS101',
            'name' => 'Introduction to Programming',
            'description' => 'Fundamentals of programming concepts using Python.',
            'units' => 3,
            'tuition_per_unit' => 650.00
        ]);
        Subject::create([
            'code' => 'CS102',
            'name' => 'Data Structures and Algorithms',
            'description' => 'Study of fundamental data structures and algorithms.',
            'units' => 3,
            'tuition_per_unit' => 700.00
        ]);
        Subject::create([
            'code' => 'MATH101',
            'name' => 'College Algebra',
            'description' => 'Basic algebraic concepts and applications.',
            'units' => 3,
            'tuition_per_unit' => 550.00
        ]);
        Subject::create([
            'code' => 'ENG101',
            'name' => 'Purposive Communication',
            'description' => 'Developing effective communication skills.',
            'units' => 3,
            'tuition_per_unit' => 500.00
        ]);
         Subject::create([
            'code' => 'IT201',
            'name' => 'Database Management Systems 1',
            'description' => 'Introduction to database design and SQL.',
            'units' => 3,
            'tuition_per_unit' => 750.00
        ]);
        Subject::create([
            'code' => 'ACC101',
            'name' => 'Fundamentals of Accounting',
            'description' => 'Basic accounting principles and practices.',
            'units' => 3,
            'tuition_per_unit' => 600.00
        ]);
        Subject::create([
            'code' => 'CS201',
            'name' => 'Object Oriented Programming',
            'description' => 'OOP concepts using Java.',
            'units' => 3,
            'tuition_per_unit' => 700.00
        ]);
         Subject::create([
            'code' => 'WEBDEV1',
            'name' => 'Web Development Fundamentals',
            'description' => 'HTML, CSS, and basic JavaScript.',
            'units' => 3,
            'tuition_per_unit' => 680.00
        ]);

        // Add more subjects relevant to your programs
    }
}