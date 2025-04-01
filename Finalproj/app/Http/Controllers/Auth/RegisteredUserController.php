<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student; // Make sure this is imported
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB; // Import DB facade
use Illuminate\Support\Str; // Import Str facade
use App\Models\Program;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $programs = Program::orderBy('name')->get(); // Fetch programs
        return view('auth.register', compact('programs')); // Pass them to the view
        
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // --- Validation ---
        $request->validate([
            // 'name' => ['required', 'string', 'max:255'], // Remove default name validation
            'first_name' => ['required', 'string', 'max:255'],
            'middle_initial' => ['nullable', 'string', 'max:5'],
            'last_name' => ['required', 'string', 'max:255'],
            'year_level' => ['required', 'string', 'in:freshman,sophomore,junior'], // Adjust as needed
            'program_id' => ['required', 'integer', 'exists:programs,id'], // Add 'exists:programs,id' later
            'birthday' => ['required', 'date'],
            'sex' => ['required', 'string', 'max:50'],
            'nationality' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string'],
            'civil_status' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // --- Generate Student ID ---
        // Simple example: '25-' + 7 random digits. Make sure it's unique!
        // A more robust solution might check the DB or use a sequence.
        $studentIdNumber = null;
        do {
            // Generate a potential ID
            $randomNumber = str_pad(mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
            $potentialId = '25-' . $randomNumber;
            // Check if it already exists in users or students table
            $exists = User::where('student_id_number', $potentialId)->exists() || Student::where('student_id_number', $potentialId)->exists();
        } while ($exists); // Keep generating until a unique one is found
        $studentIdNumber = $potentialId;


        // --- Database Transaction ---
        DB::beginTransaction();

        try {
            // Create User
            $user = User::create([
                // Use first name + last name for the default 'name' field, or adjust as needed
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'student_id_number' => $studentIdNumber, // Save ID to users table too
            ]);

            // Create Student Record linked to the User
            $student = $user->student()->create([ // Use the relationship
                'student_id_number' => $studentIdNumber,
                'year_level' => $request->year_level,
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'middle_initial' => $request->middle_initial,
                'program_id' => $request->program_id, // Will be validated properly later
                'birthday' => $request->birthday,
                'sex' => $request->sex,
                'nationality' => $request->nationality,
                'address' => $request->address,
                'civil_status' => $request->civil_status,
            ]);

            // Commit the transaction
            DB::commit();

            // Trigger the Registered event (for email verification, etc.)
            event(new Registered($user));

            // Log the user in
            Auth::login($user);

            // Redirect to the intended dashboard or home page
            return redirect(route('dashboard', absolute: false)); // Assuming you have a dashboard route

        } catch (\Exception $e) {
            // Something went wrong, rollback the transaction
            DB::rollBack();

            // Log the error (optional but recommended)
            // Log::error('Registration failed: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()
                             ->withInput() // Keep the old input
                             ->withErrors(['registration_error' => 'Could not complete registration. Please try again.']); // Generic error
        }
    }
}