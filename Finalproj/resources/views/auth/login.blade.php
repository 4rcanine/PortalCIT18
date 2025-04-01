<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Student ID Input -->
        <div>
            {{-- 1. Change the label text and 'for' attribute --}}
            <x-input-label for="student_id_number" :value="__('Student ID')" />

            {{-- 2. Change id, type, name, :value (for old input), and autocomplete (optional) --}}
            <x-text-input id="student_id_number" class="block mt-1 w-full"
                            type="text" {{-- Changed from 'email' to 'text' --}}
                            name="student_id_number" {{-- Changed from 'email' --}}
                            :value="old('student_id_number')" {{-- Changed from old('email') --}}
                            required
                            autofocus
                            autocomplete="username" {{-- Keep as username or set specific autocomplete if needed --}}
                            />

            {{-- 3. Change the error message key --}}
            <x-input-error :messages="$errors->get('student_id_number')" class="mt-2" />
                                        {{-- Changed from $errors->get('email') --}}
        </div>

        <!-- Password (No changes needed here) -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me (No changes needed here) -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>