<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Program; // Import Program
use App\Models\Subject; // Import Subject

class EnrollmentController extends Controller
{
    /**
     * Show the form for creating a new enrollment.
     */
    public function create(): View
    {
        $user = Auth::user()->load('student.program'); // Load student and their program
        $student = $user->student;

        if (!$student || !$student->program) {
            // Redirect or show error if student/program not found
            // Maybe redirect to profile completion page?
            abort(404, 'Student program information not found.'); // Or handle more gracefully
        }

        // Get the student's program
        $program = $student->program;

        // Eager load subjects associated with the student's program AND their prerequisites
        $program->load('subjects.prerequisites');

        // Get the subjects for the program
        $availableSubjects = $program->subjects;

        // TODO: Filter subjects based on prerequisites already met by the student
        // For now, we pass all subjects of the program. We'll add prerequisite checking later.
        // We also need to know which subjects the student is ALREADY enrolled in for this term.

        return view('enrollment.create', compact('student', 'program', 'availableSubjects'));
    }

     /**
      * Store a newly created enrollment in storage.
      */
     public function store(Request $request)
     {
          // TODO: Implement logic to save selected subjects
          // 1. Validate $request->input('subjects') (should be an array of subject IDs)
          // 2. Check prerequisites again on the server-side
          // 3. Calculate total tuition
          // 4. Create Enrollment record and attach subjects
          // 5. Redirect to schedule page or dashboard with success message

          dd($request->all()); // Dump request data for now
     }
}