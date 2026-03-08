<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Неверный логин или пароль']);
    }

    public function showRegisterForm() {
        return view('auth.register');
    }
    public function register(Request $request) {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $employee = Employee::create([
           'full_name' => $validated['full_name'],
           'email' => $validated['email'],
           'password' => Hash::make($validated['password']),
           'department_id' => 1,
        ]);

        Auth::login($employee);
        return redirect('/')->with('success', 'Регистрация прошла успешно');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
