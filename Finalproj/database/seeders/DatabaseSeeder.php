<?php

namespace Database\Seeders;

use App\Models\Program; // Import Program
use App\Models\Subject; // Import Subject
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB facade for potential raw queries or cleanup

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('programs')->truncate();
        // Clear pivot tables before seeding to avoid duplicates on re-runs
        DB::table('program_subject')->truncate();
        DB::table('subject_prerequisites')->truncate();


        // Call individual seeders
        $this->call([
            ProgramSeeder::class,
            SubjectSeeder::class,
        ]);

        // --- Link Subjects to Programs & Set Prerequisites ---

        // Find Programs
$progCS = Program::where('code', 'BSCS')->first();
$progIT = Program::where('code', 'BSIT')->first();
$progBA = Program::where('code', 'BSBA')->first();

// Find Subjects
$subjMath101 = Subject::where('code', 'MATH101')->first();
$subjEng101 = Subject::where('code', 'ENG101')->first();
$subjWebDev1 = Subject::where('code', 'WEBDEV1')->first();
$subjCS101 = Subject::where('code', 'CS101')->first();
$subjCS102 = Subject::where('code', 'CS102')->first();
$subjIT201 = Subject::where('code', 'IT201')->first();
$subjCS201 = Subject::where('code', 'CS201')->first();
$subjAcc101 = Subject::where('code', 'ACC101')->first();

// --- Assign Subjects to Programs (with checks) ---
$sharedSubjects = [];
if ($subjMath101) $sharedSubjects[] = $subjMath101->id;
if ($subjEng101) $sharedSubjects[] = $subjEng101->id;
if ($subjWebDev1) $sharedSubjects[] = $subjWebDev1->id;

$csSubjects = [];
if ($subjCS101) $csSubjects[] = $subjCS101->id;
if ($subjCS102) $csSubjects[] = $subjCS102->id;
if ($subjIT201) $csSubjects[] = $subjIT201->id;
if ($subjCS201) $csSubjects[] = $subjCS201->id;

$itSubjects = [];
if ($subjCS101) $itSubjects[] = $subjCS101->id; // Overlap
if ($subjIT201) $itSubjects[] = $subjIT201->id; // Overlap

$baSubjects = [];
// Assuming MATH101, ENG101 already checked in $sharedSubjects
if ($subjAcc101) $baSubjects[] = $subjAcc101->id;


if (!empty($sharedSubjects)) {
    if ($progCS) $progCS->subjects()->attach($sharedSubjects);
    if ($progIT) $progIT->subjects()->attach($sharedSubjects);
    if ($progBA) $progBA->subjects()->attach(array_intersect($sharedSubjects, [$subjMath101?->id, $subjEng101?->id])); // BA only gets Math/Eng shared
}

if (!empty($csSubjects)) {
    if ($progCS) $progCS->subjects()->attach($csSubjects);
}

if (!empty($itSubjects)) {
     if ($progIT) $progIT->subjects()->attach($itSubjects);
}

if (!empty($baSubjects)) {
     if ($progBA) $progBA->subjects()->attach($baSubjects);
}


// --- Define Prerequisites (with checks) ---
if ($subjCS101 && $subjCS102) {
    $subjCS102->prerequisites()->attach($subjCS101->id);
}
if ($subjCS101 && $subjCS201) {
    $subjCS201->prerequisites()->attach($subjCS101->id);
}
if ($subjCS101 && $subjIT201) {
    $subjIT201->prerequisites()->attach($subjCS101->id);
}

         // Add more complex prereqs as needed...
    }
}