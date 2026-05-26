@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- HERO SECTION --}}
        <div class="mb-12">
            <div class="flex flex-col md:flex-row md:justify-between md:items-end gap-8">
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-2xl flex items-center justify-center">
                            <span class="text-2xl">🎯</span>
                        </div>
                        <h1 class="text-4xl md:text-5xl font-bold text-white">
                            My Goals
                        </h1>
                    </div>
                    <p class="text-slate-400 text-lg max-w-xl">
                        Wujudkan impian Anda dengan tracking progress yang terukur dan transparan. 
                        Setiap langkah membawa Anda lebih dekat ke target.
                    </p>
                </div>

                <a href="{{ route('targets.create') }}"
                   class="group inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white px-8 py-4 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                    <span class="text-xl">+</span>
                    <span class="font-semibold">Tambah Target Baru</span>
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>

        {{-- STATISTICS SECTION --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <!-- Total Targets -->
            <div class="group relative bg-gradient-to-br from-blue-500/10 to-indigo-500/10 border border-blue-500/20 rounded-2xl p-6 backdrop-blur-sm hover:border-blue-500/40 transition-all duration-300">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/0 to-indigo-500/0 group-hover:from-blue-500/5 group-hover:to-indigo-500/5 rounded-2xl transition-all duration-300"></div>
                <div class="relative space-y-3">
                    <div class="flex items-center justify-between">
                        <p class="text-slate-400 text-sm font-medium">Total Target</p>
                        <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <span class="text-lg">📊</span>
                        </div>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-bold text-white">
                        {{ $targets->count() }}
                    </h3>
                    <p class="text-blue-400 text-xs font-medium">Target aktif</p>
                </div>
            </div>

            <!-- Total Target Amount -->
            <div class="group relative bg-gradient-to-br from-emerald-500/10 to-teal-500/10 border border-emerald-500/20 rounded-2xl p-6 backdrop-blur-sm hover:border-emerald-500/40 transition-all duration-300">
                <div class="relative space-y-3">
                    <div class="flex items-center justify-between">
                        <p class="text-slate-400 text-sm font-medium">Total Target</p>
                        <div class="w-10 h-10 bg-emerald-500/20 rounded-lg flex items-center justify-center">
                            <span class="text-lg">💰</span>
                        </div>
                    </div>
                    <h3 class="text-2xl md:text-3xl font-bold text-emerald-400">
                        Rp {{ number_format($totalTarget, 0, ',', '.') }}
                    </h3>
                    <p class="text-emerald-400/70 text-xs font-medium">Nominal keseluruhan</p>
                </div>
            </div>

            <!-- Total Collected -->
            <div class="group relative bg-gradient-to-br from-violet-500/10 to-purple-500/10 border border-violet-500/20 rounded-2xl p-6 backdrop-blur-sm hover:border-violet-500/40 transition-all duration-300">
                <div class="relative space-y-3">
                    <div class="flex items-center justify-between">
                        <p class="text-slate-400 text-sm font-medium">Terkumpul</p>
                        <div class="w-10 h-10 bg-violet-500/20 rounded-lg flex items-center justify-center">
                            <span class="text-lg">✅</span>
                        </div>
                    </div>
                    <h3 class="text-2xl md:text-3xl font-bold text-violet-400">
                        Rp {{ number_format($totalCurrent, 0, ',', '.') }}
                    </h3>
                    <p class="text-violet-400/70 text-xs font-medium">Sudah tercapai</p>
                </div>
            </div>

            <!-- Overall Progress -->
            <div class="group relative bg-gradient-to-br from-orange-500/10 to-red-500/10 border border-orange-500/20 rounded-2xl p-6 backdrop-blur-sm hover:border-orange-500/40 transition-all duration-300">
                <div class="relative space-y-3">
                    <div class="flex items-center justify-between">
                        <p class="text-slate-400 text-sm font-medium">Progress Total</p>
                        <div class="w-10 h-10 bg-orange-500/20 rounded-lg flex items-center justify-center">
                            <span class="text-lg">🚀</span>
                        </div>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-bold text-orange-400">
                        {{ $totalTarget > 0 ? round(($totalCurrent / $totalTarget) * 100) : 0 }}%
                    </h3>
                    <div class="w-full bg-slate-700 rounded-full h-2 mt-2">
                        <div class="bg-gradient-to-r from-orange-400 to-red-500 h-2 rounded-full transition-all duration-500"
                             style="width: {{ $totalTarget > 0 ? round(($totalCurrent / $totalTarget) * 100) : 0 }}%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TARGETS LIST --}}
        @if($targets->count() > 0)
            <div class="space-y-6">
                <div>
                    <h2 class="text-2xl font-bold text-white mb-6">Daftar Target Anda</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($targets as $target)
                        <div class="group relative bg-slate-800/50 border border-slate-700/50 rounded-2xl overflow-hidden hover:border-slate-600 transition-all duration-300 hover:shadow-2xl hover:shadow-blue-500/10">
                            
                            {{-- IMAGE SECTION --}}
                            @if($target->photo)
                                <div class="relative h-48 overflow-hidden bg-gradient-to-br from-slate-700 to-slate-900">
                                    <img src="{{ asset('storage/'.$target->photo) }}"
                                         alt="{{ $target->title }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-60"></div>
                                    <div class="absolute top-4 right-4 bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-2 rounded-full text-sm font-bold">
                                        {{ $target->progress }}%
                                    </div>
                                </div>
                            @else
                                <div class="relative h-48 bg-gradient-to-br from-slate-700 to-slate-900 flex items-center justify-center">
                                    <div class="text-6xl opacity-20">🎯</div>
                                    <div class="absolute top-4 right-4 bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-2 rounded-full text-sm font-bold">
                                        {{ $target->progress }}%
                                    </div>
                                </div>
                            @endif

                            {{-- CONTENT SECTION --}}
                            <div class="p-6 space-y-4">
                                {{-- TITLE & CATEGORY --}}
                                <div>
                                    <h3 class="text-xl font-bold text-white group-hover:text-blue-400 transition-colors">
                                        {{ $target->title }}
                                    </h3>
                                    <p class="text-sm text-slate-400 mt-2 inline-block bg-slate-700/50 px-3 py-1 rounded-full">
                                        {{ $target->category }}
                                    </p>
                                </div>

                                {{-- PROGRESS BAR --}}
                                <div class="space-y-2">
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="text-slate-300 font-medium">Progress</span>
                                        <span class="text-blue-400 font-bold">
                                            Rp {{ number_format($target->current_amount, 0, ',', '.') }} 
                                            <span class="text-slate-500 font-normal">/ Rp {{ number_format($target->target_amount, 0, ',', '.') }}</span>
                                        </span>
                                    </div>
                                    <div class="w-full bg-slate-700 rounded-full h-2.5 overflow-hidden">
                                        <div class="bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 h-2.5 rounded-full transition-all duration-500"
                                             style="width: {{ $target->progress }}%">
                                        </div>
                                    </div>
                                </div>

                                {{-- INFO GRID --}}
                                <div class="grid grid-cols-2 gap-3 pt-2 border-t border-slate-700/50">
                                    <div class="space-y-1">
                                        <p class="text-xs text-slate-500 uppercase tracking-wide">Deadline</p>
                                        <p class="text-sm font-semibold text-white">
                                            {{ \Carbon\Carbon::parse($target->deadline)->format('d M Y') }}
                                        </p>
                                    </div>
                                    <div class="space-y-1">
                                        <p class="text-xs text-slate-500 uppercase tracking-wide">Sisa Target</p>
                                        <p class="text-sm font-semibold text-red-400">
                                            Rp {{ number_format($target->target_amount - $target->current_amount, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>

                                {{-- MINI CHART --}}
                                <div class="pt-4 bg-slate-700/20 rounded-xl p-3">
                                    <canvas id="chart-{{ $target->id }}" class="h-24"></canvas>
                                </div>

                                {{-- ACTION BUTTONS --}}
                                <div class="flex gap-3 pt-4">
                                    <a href="{{ route('targets.edit', $target->id) }}"
                                       class="flex-1 flex items-center justify-center gap-2 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white py-3 rounded-xl font-medium transition-all duration-300 hover:shadow-lg">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </a>

                                    <form action="{{ route('targets.destroy', $target->id) }}"
                                          method="POST"
                                          class="flex-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('⚠️ Apakah Anda yakin ingin menghapus target ini? Tindakan ini tidak dapat dibatalkan.')"
                                                class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-red-500/80 to-pink-600/80 hover:from-red-600 hover:to-pink-700 text-white py-3 rounded-xl font-medium transition-all duration-300 hover:shadow-lg">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            {{-- EMPTY STATE --}}
            <div class="flex flex-col items-center justify-center py-20 bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-slate-700/50 rounded-3xl backdrop-blur-sm">
                <div class="text-8xl mb-6 animate-bounce">🎯</div>
                <h3 class="text-2xl font-bold text-white mb-3">Belum Ada Target</h3>
                <p class="text-slate-400 text-center max-w-md mb-8">
                    Mulai wujudkan impian Anda dengan membuat target pertama. Setiap target membawa Anda lebih dekat ke kesuksesan!
                </p>
                <a href="{{ route('targets.create') }}"
                   class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white px-8 py-4 rounded-2xl font-semibold shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                    <span>+</span>
                    Buat Target Pertama
                </a>
            </div>
        @endif

    </div>
</div>

{{-- SCRIPTS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const chartConfig = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                backgroundColor: 'rgba(15, 23, 42, 0.9)',
                padding: 12,
                titleColor: '#fff',
                bodyColor: '#e2e8f0',
                borderColor: 'rgba(59, 130, 246, 0.5)',
                borderWidth: 1,
                cornerRadius: 8,
                displayColors: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(148, 163, 184, 0.1)',
                    drawBorder: false
                },
                ticks: {
                    color: 'rgba(148, 163, 184, 0.7)',
                    font: {
                        size: 11
                    }
                }
            },
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    color: 'rgba(148, 163, 184, 0.7)',
                    font: {
                        size: 11
                    }
                }
            }
        }
    };

    @foreach($targets as $target)
        const ctx{{ $target->id }} = document.getElementById('chart-{{ $target->id }}');
        
        if (ctx{{ $target->id }}) {
            new Chart(ctx{{ $target->id }}, {
                type: 'line',
                data: {
                    labels: ['Mulai', 'Progress', 'Target'],
                    datasets: [{
                        label: 'Progress',
                        data: [0, {{ $target->current_amount }}, {{ $target->target_amount }}],
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59, 130, 246, 0.15)',
                        borderWidth: 2.5,
                        fill: true,
                        tension: 0.4,
                        pointRadius: 4,
                        pointBackgroundColor: '#3b82f6',
                        pointBorderColor: '#1e293b',
                        pointBorderWidth: 2,
                        pointHoverRadius: 6
                    }]
                },
                options: chartConfig
            });
        }
    @endforeach
});
</script>
@endsection