<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Ensure Auth facade is imported
use Illuminate\View\View;
use Illuminate\Validation\ValidationException; // Import ValidationException

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse // Still use LoginRequest for validation
    {
        // --- MODIFICATION START ---
        // We will manually attempt login instead of using $request->authenticate()

        // 1. Prepare credentials using 'student_id_number' from the request
        $credentials = [
            'student_id_number' => $request->student_id_number, // Get the student_id_number input
            'password' => $request->password,
        ];

        // 2. Attempt to authenticate the user using the Auth facade
        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            // Authentication failed...
            // Throw validation exception, targeting the 'student_id_number' field
            throw ValidationException::withMessages([
                'student_id_number' => __('auth.failed'), // Use student_id_number as the key
            ]);
        }

        // --- Original Breeze Logic (after successful manual authentication) ---
        // 3. Regenerate session ID
        $request->session()->regenerate();

        // 4. Redirect to intended destination (dashboard)
        return redirect()->intended(route('dashboard', absolute: false));

        /* --- Original Breeze code using $request->authenticate() (now replaced) ---
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended(route('dashboard', absolute: false));
        */
        // --- MODIFICATION END ---
    }

    /**
     * Destroy an authenticated session.
     * (No changes needed here)
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}