<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        // validate
        $validRequest = request()->validate([
            'name' => ['required', 'min:5', 'max:254'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(8)->letters()->numbers()]
        ]);
        // create user
        $user = User::create($validRequest);

        // log in
        Auth::login($user);

        // Redirect somehwere
        return redirect('/jobs');
    }
}
