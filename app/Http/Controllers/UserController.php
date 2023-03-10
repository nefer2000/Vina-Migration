<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login() {
        return view('LoginSignUp.Login');
    }

    public function signUp() {
        return view('LoginSignUp.SignUp');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'     
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        //auth()->login($user);

        return redirect('/login') -> with('message', 'Account created successfully');
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login') -> with('message', 'Logout successfully');
    }

    public function process(Request $request) {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'     
        ]);

        if(auth()->attempt($validated)) {
            $request->session()->regenerate();

            return redirect('/list') -> with('message', 'Login Sucessfully!!!');
        }

        return back()->withErrors(['email' => 'Login failed!']) -> onlyInput('email');
    }
}
