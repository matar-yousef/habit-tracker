<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function viewHabits()
    {
        return view("habits.index");
    }

    public function register()
    {
        return view("auth.register");
    }

    public function store(RegisterFormRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            "name" => $validated["name"],
            "email" => $validated["email"],
            "password" => Hash::make($validated["password"])
        ]);


        Auth::login($user);
        $request->session()->regenerate();


        return redirect()->route("home");
    }

    public function login()
    {
        return view("auth.login");
    }

    public function authenticate(LoginFormRequest $request)
    {
        $validated = $request->validated();

        if (Auth::attempt($validated, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended("dashboard");
        }

        return back()->withErrors(["email" => "Invalid credentials"]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("auth.login");
    }
}
