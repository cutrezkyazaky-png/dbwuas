<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // <-- Wajib di-import untuk proses login

class AuthController extends Controller
{
    // Fungsi untuk memproses data pendaftaran dari form
    public function register(Request $request)
    {
        // 1. Validasi Input Pengguna
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 2. Simpan User Baru ke Database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'member',
        ]);

        // 3. Jika sukses, lempar ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Akun berhasil didaftarkan! Silakan masuk.');
    }

    // Fungsi baru untuk memproses otentikasi login
    public function login(Request $request)
    {
        // 1. Validasi Input Login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // 2. Coba mencocokkan data ke database
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Jika yang masuk adalah akun bertipe admin, lempar ke halaman panel admin
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.index');
            }

            // Jika member biasa, lempar ke dashboard aplikasi biasa
            return redirect()->intended('/dashboard');
        }

        // 3. Jika salah sandi/email, kembalikan dengan pesan eror
        return back()->withErrors([
            'email' => 'Email atau password yang dimasukkan tidak sesuai.',
        ])->onlyInput('email');
    }
}