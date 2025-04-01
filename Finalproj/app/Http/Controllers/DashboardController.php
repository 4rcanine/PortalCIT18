<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View; // Make sure View is imported

class DashboardController extends Controller
{
    public function index(): View // Check the return type hint
    {
        $user = Auth::user();

        // Check if the user is actually logged in (Auth middleware should handle this, but good practice)
        if (!$user) {
             // This case should ideally not be reached due to middleware,
             // but handle it defensively. Redirecting to login is typical.
             return redirect()->route('login');
        }

        $user->load('student.program'); // Eager loading

        // vvv CHECK THIS LINE vvv
        return view('dashboard', compact('user'));
        // Make sure it's exactly compact('user') - no typos
        // Alternatively, you can write: return view('dashboard', ['user' => $user]);
    }
}