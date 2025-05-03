<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store()
    {
        if (RateLimiter::tooManyAttempts(request()->ip(), 5)) {
            throw ValidationException::withMessages([
                'email' => 'Too many login attempts. Please try again in 1 minute.'
            ]);
        }

        RateLimiter::increment(request()->ip());

        $validatedRequest = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($validatedRequest, true)) {
            throw ValidationException::withMessages(['email' => 'Invalid credentials']);
        }

        request()->session()->regenerate();
        request()->session()->flash('success', 'Welcome back!');

        return redirect('/');    }

    public function destroy(): RedirectResponse
    {
        Auth::logout();

        return redirect('/login');
    }
}
