<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register Form
    public function create()
    {
        return view('users.register');
    }

    // Create New user
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        // Hashing the passwrod
        $formFields['password'] = bcrypt($formFields['password']);
        
        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User Created Successfully and logged in');
    }

    // User Logout
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        return redirect('/')->with('message', 'You have been loged out Successfully');
    }

    // Show User Login form
    public function login()
    {
        return view('users.login');
    }

    // Authenticate user login
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are Now Logged In');
        }

        return back()->withErrors(['email'=> 'Invalid Credentials'])->onlyInput('email');
    }
}
