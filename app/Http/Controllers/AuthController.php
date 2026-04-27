<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        $credential = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (Auth::attempt($credential, $request->remember)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // 🔥 AMBIL ROLE DENGAN AMAN
            $role = $user->role->role_name ?? null;

            // 🔥 REDIRECT BERDASARKAN ROLE
            if ($role === 'Admin') {
                return redirect()->route('admin.dashboard');
            }

            if ($role === 'User') {
                return redirect()->route('user.dashboard');
            }

            // fallback kalau role tidak ada
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->onlyInput('email');
    }
}