<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // 1. Ambil data untuk Stats Board secara dinamis
        $totalUsers = User::count();
        
        // Menghitung target dari tabel 'targets'
        $totalTargets = DB::table('targets')->count(); 
        
        // Diubah menjadi 0 sementara karena kolom 'status' tidak ditemukan di tabel targets kamu
        $completedTargets = 0; 

        // 2. Ambil semua data user untuk ditampilkan di tabel
        $users = User::latest()->get();

        return view('admin', compact('totalUsers', 'totalTargets', 'completedTargets', 'users'));
    }

    // Fungsi untuk mengubah Role User (jadi Admin / Member)
    public function toggleRole($id)
    {
        $user = User::findOrFail($id);
        $user->role = ($user->role === 'admin') ? 'member' : 'admin';
        $user->save();

        return redirect()->back()->with('success', 'Role user berhasil diperbarui!');
    }

    // Fungsi untuk menghapus / banned user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // Menghapus user dari database

        return redirect()->back()->with('success', 'User berhasil dihapus dari sistem!');
    }
}