<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * --------------------------
     * TAMPIL FORM LOGIN ADMIN
     * --------------------------
     */
    public function loginForm()
    {
        return view('auth.login-admin');
    }

    /**
     * --------------------------
     * PROSES LOGIN ADMIN
     * --------------------------
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi.',
            'password.required' => 'Password wajib diisi.'
        ]);

        $credentials = $request->only('email', 'password');

        // Hanya role admin yang boleh login di controller ini
        if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard')
                ->with('success', 'Login admin berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah, atau Anda tidak memiliki akses admin.'
        ])->withInput();
    }
}