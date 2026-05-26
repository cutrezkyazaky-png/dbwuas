<?php

namespace App\Http\Controllers;

use App\Models\Target;

class DashboardController extends Controller
{
    public function index()
    {
        $targets = Target::latest()->get();

        // Statistik dasar
        $active = $targets->count();
        $completed = $targets->where('progress', 100)->count();
        $ongoing = $targets->where('progress', '<', 100)->count();

        // Total uang
        $totalTarget = $targets->sum('target_amount');
        $totalCurrent = $targets->sum('current_amount');

        // Progress rata-rata
        $averageProgress = $targets->count() > 0
            ? $targets->avg('progress')
            : 0;

        // Kirim ke view
        return view('dashboard', compact(
            'targets',
            'active',
            'completed',
            'ongoing',
            'totalTarget',
            'totalCurrent',
            'averageProgress'
        ));
    }
}