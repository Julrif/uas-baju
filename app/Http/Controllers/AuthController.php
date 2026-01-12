<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Page
    function login () {
        $data = [
        ];
        return view("pages.login", compact('data'));
    }

    // Logic
    function auth(Request $req)
    {
        // Validate input
        $req->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Login attempt
        if (Auth::attempt([
            'email'    => $req->email,
            'password' => $req->password
        ])) {
            $req->session()->regenerate();
            return redirect()->intended('/dashboard')
                ->with('success', 'Login berhasil!');
        }

        // Failed
        return back()->with('error', 'Email atau password salah.');
    }

    function logout() {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
