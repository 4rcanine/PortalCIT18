<?php

namespace App\Http\Requests\Auth;

// Removed unused imports related to the removed authenticate() method
// use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Support\Facades\Auth; // No longer needed directly here
// use Illuminate\Support\Facades\RateLimiter; // No longer needed directly here (unless re-implementing)
// use Illuminate\Support\Str; // No longer needed directly here (unless re-implementing rate limit)
// use Illuminate\Validation\ValidationException; // No longer needed directly here

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Default is fine
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // --- MODIFICATION START ---
        // Change validation rules to expect 'student_id_number' instead of 'email'
        return [
            // Replace 'email' rule
            'student_id_number' => ['required', 'string'], // Basic validation for student ID
            'password' => ['required', 'string'], // Password validation remains the same
        ];
        // --- MODIFICATION END ---
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // --- MODIFICATION START ---
    // ENTIRE authenticate() METHOD IS REMOVED OR COMMENTED OUT
    // The login attempt is now handled directly in the AuthenticatedSessionController.
    /*
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        // This used $this->only('email', 'password') which is incorrect now
        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }
    */
    // --- MODIFICATION END ---


    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // --- MODIFICATION START ---
    // COMMENTED OUT / REMOVED - Rate limiting logic was tied to authenticate() and throttleKey() using email.
    // Needs to be reimplemented carefully using 'student_id_number' if required later.
    /*
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            // This needs to target 'student_id_number' if re-enabled
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }
    */
    // --- MODIFICATION END ---

    /**
     * Get the rate limiting throttle key for the request.
     */
    // --- MODIFICATION START ---
    // COMMENTED OUT / REMOVED - This used email. Needs adjustment if rate limiting is re-enabled.
    /*
    public function throttleKey(): string
    {
        // Original used: Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
        // Would need changing to:
        // return Str::transliterate(Str::lower($this->string('student_id_number')).'|'.$this->ip());
    }
    */
    // --- MODIFICATION END ---
}