@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-950 to-indigo-950 py-10">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- HERO HEADER --}}
    <div class="relative overflow-hidden bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-700 
                rounded-3xl shadow-2xl p-8 mb-8 border border-white/10">
        
        {{-- Background decoration --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full -translate-y-48 translate-x-48"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full translate-y-32 -translate-x-32"></div>
        
        <div class="relative flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 
                                     0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 
                                     002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <span class="text-blue-200 text-sm font-medium tracking-widest uppercase">
                        Performance Board
                    </span>
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-white tracking-tight">
                    Dashboard Target
                </h1>
                <p class="text-blue-200 mt-2 text-lg">
                    Pantau & kelola semua progress target kamu secara real-time
                </p>
            </div>

            <div class="flex items-center gap-3">
                <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl px-4 py-2">
                    <p class="text-blue-200 text-xs">Last updated</p>
                    <p class="text-white font-semibold text-sm" id="lastUpdated"></p>
                </div>
                <a href="{{ route('targets.create') }}"
                   class="group flex items-center gap-2 bg-white text-indigo-700 font-bold px-6 py-3 
                          rounded-2xl hover:bg-blue-50 transition-all duration-200 shadow-lg 
                          hover:shadow-xl hover:-translate-y-0.5">
                    <svg class="w-4 h-4 group-hover:rotate-90 transition-transform duration-300" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" 
                              d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah Target
                </a>
            </div>
        </div>
    </div>

    {{-- STAT CARDS --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

        {{-- Total --}}
        <div class="stat-card group bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-3xl 
                    hover:bg-white/10 transition-all duration-300 hover:-translate-y-1 cursor-default">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-br from-slate-400 to-slate-600 
                            rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                    </svg>
                </div>
                <span class="text-slate-400 text-xs bg-white/5 px-2 py-1 rounded-lg">ALL</span>
            </div>
            <p class="text-slate-400 text-sm font-medium">Total Target</p>
            <h2 class="text-4xl font-black text-white mt-1 counter" data-target="{{ $targets->count() }}">
                0
            </h2>
            <div class="mt-3 h-1 bg-white/10 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-slate-400 to-slate-500 rounded-full w-full"></div>
            </div>
        </div>

        {{-- Active --}}
        <div class="stat-card group bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-3xl 
                    hover:bg-blue-500/10 transition-all duration-300 hover:-translate-y-1 cursor-default">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 
                            rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <span class="text-blue-400 text-xs bg-blue-500/10 px-2 py-1 rounded-lg border border-blue-500/20">
                    ACTIVE
                </span>
            </div>
            <p class="text-slate-400 text-sm font-medium">Active</p>
            <h2 class="text-4xl font-black text-blue-400 mt-1 counter" data-target="{{ $active }}">
                0
            </h2>
            <div class="mt-3 h-1 bg-white/10 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-blue-400 to-blue-500 rounded-full"
                     style="width: {{ $targets->count() > 0 ? ($active / $targets->count()) * 100 : 0 }}%">
                </div>
            </div>
        </div>

        {{-- Completed --}}
        <div class="stat-card group bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-3xl 
                    hover:bg-emerald-500/10 transition-all duration-300 hover:-translate-y-1 cursor-default">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-emerald-600 
                            rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="text-emerald-400 text-xs bg-emerald-500/10 px-2 py-1 rounded-lg border border-emerald-500/20">
                    DONE
                </span>
            </div>
            <p class="text-slate-400 text-sm font-medium">Completed</p>
            <h2 class="text-4xl font-black text-emerald-400 mt-1 counter" data-target="{{ $completed }}">
                0
            </h2>
            <div class="mt-3 h-1 bg-white/10 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-emerald-400 to-emerald-500 rounded-full"
                     style="width: {{ $targets->count() > 0 ? ($completed / $targets->count()) * 100 : 0 }}%">
                </div>
            </div>
        </div>

        {{-- Ongoing --}}
        <div class="stat-card group bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-3xl 
                    hover:bg-amber-500/10 transition-all duration-300 hover:-translate-y-1 cursor-default">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-br from-amber-400 to-orange-500 
                            rounded-2xl flex items-center justify-center shadow-lg shadow-amber-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="text-amber-400 text-xs bg-amber-500/10 px-2 py-1 rounded-lg border border-amber-500/20">
                    ON GOING
                </span>
            </div>
            <p class="text-slate-400 text-sm font-medium">Ongoing</p>
            <h2 class="text-4xl font-black text-amber-400 mt-1 counter" data-target="{{ $ongoing }}">
                0
            </h2>
            <div class="mt-3 h-1 bg-white/10 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-amber-400 to-orange-500 rounded-full"
                     style="width: {{ $targets->count() > 0 ? ($ongoing / $targets->count()) * 100 : 0 }}%">
                </div>
            </div>
        </div>

    </div>

    {{-- CHART + DONUT ROW --}}
    <div class="grid lg:grid-cols-3 gap-6 mb-8">

        {{-- Line Chart --}}
        <div class="lg:col-span-2 bg-white/5 backdrop-blur-sm border border-white/10 
                    p-6 rounded-3xl shadow-xl">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-white text-xl font-bold">Progress Overview</h2>
                    <p class="text-slate-400 text-sm mt-1">Perbandingan progress semua target</p>
                </div>
                <div class="flex gap-2">
                    <button onclick="switchChart('line')" id="btn-line"
                            class="chart-btn active-btn px-3 py-1.5 rounded-xl text-xs font-semibold transition-all">
                        Line
                    </button>
                    <button onclick="switchChart('bar')" id="btn-bar"
                            class="chart-btn px-3 py-1.5 rounded-xl text-xs font-semibold transition-all">
                        Bar
                    </button>
                </div>
            </div>
            <canvas id="progressChart" height="200"></canvas>
        </div>

        {{-- Donut Chart --}}
        <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-3xl shadow-xl">
            <div class="mb-6">
                <h2 class="text-white text-xl font-bold">Distribusi Status</h2>
                <p class="text-slate-400 text-sm mt-1">Proporsi setiap kategori</p>
            </div>
            <div class="relative flex items-center justify-center" style="height: 200px;">
                <canvas id="donutChart"></canvas>
                <div class="absolute text-center pointer-events-none">
                    <p class="text-3xl font-black text-white">{{ $targets->count() }}</p>
                    <p class="text-slate-400 text-xs">Total</p>
                </div>
            </div>
            <div class="mt-6 space-y-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-blue-400"></div>
                        <span class="text-slate-300 text-sm">Active</span>
                    </div>
                    <span class="text-white font-semibold">{{ $active }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-emerald-400"></div>
                        <span class="text-slate-300 text-sm">Completed</span>
                    </div>
                    <span class="text-white font-semibold">{{ $completed }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                        <span class="text-slate-300 text-sm">Ongoing</span>
                    </div>
                    <span class="text-white font-semibold">{{ $ongoing }}</span>
                </div>
            </div>
        </div>

    </div>

    {{-- FILTER BAR --}}
    <div class="flex flex-wrap items-center gap-3 mb-6">
        <span class="text-slate-400 text-sm font-medium">Filter:</span>
        <button onclick="filterCards('all')" 
                class="filter-btn active-filter px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200">
            All
        </button>
        <button onclick="filterCards('active')" 
                class="filter-btn px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200">
            Active
        </button>
        <button onclick="filterCards('completed')" 
                class="filter-btn px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200">
            Completed
        </button>
        <button onclick="filterCards('ongoing')" 
                class="filter-btn px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200">
            Ongoing
        </button>

        {{-- Search --}}
        <div class="ml-auto relative">
            <svg class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" 
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input type="text" id="searchInput" placeholder="Cari target..." 
                   onkeyup="searchCards()"
                   class="bg-white/5 border border-white/10 text-white placeholder-slate-500 
                          text-sm rounded-xl pl-9 pr-4 py-2 focus:outline-none focus:border-blue-500 
                          focus:bg-white/10 transition-all w-48">
        </div>
    </div>

    {{-- TARGET CARDS --}}
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5" id="targetGrid">

        @foreach($targets as $target)
        @php
            $progress  = $target->progress;
            $status    = strtolower($target->status ?? 'active');
            if ($progress >= 100) $status = 'completed';

            $gradient  = match(true) {
                $progress >= 100 => 'from-emerald-500 to-teal-600',
                $progress >= 50  => 'from-blue-500 to-indigo-600',
                default          => 'from-amber-500 to-orange-600',
            };
            $badge     = match(true) {
                $progress >= 100 => ['text-emerald-400','bg-emerald-500/10','border-emerald-500/30','Completed'],
                $progress >= 50  => ['text-blue-400',   'bg-blue-500/10',   'border-blue-500/30',   'Active'],
                default          => ['text-amber-400',  'bg-amber-500/10',  'border-amber-500/30',  'Ongoing'],
            };
        @endphp

        <div class="target-card group bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-3xl 
                    hover:bg-white/10 hover:border-white/20 transition-all duration-300 
                    hover:-translate-y-1 hover:shadow-2xl hover:shadow-black/20 cursor-pointer"
             data-status="{{ $status }}"
             data-title="{{ strtolower($target->title) }}"
             onclick="window.location='{{ route('targets.show', $target) }}'">

            {{-- Card Header --}}
            <div class="flex items-start justify-between mb-4">
                <div class="flex-1 min-w-0 pr-3">
                    <h2 class="text-white font-bold text-lg leading-tight truncate group-hover:text-blue-300 
                               transition-colors duration-200">
                        {{ $target->title }}
                    </h2>
                    <div class="flex items-center gap-2 mt-1">
                        <svg class="w-3 h-3 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 
                                     7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                        <p class="text-slate-400 text-xs">{{ $target->category }}</p>
                    </div>
                </div>
                <span class="shrink-0 text-xs font-semibold px-2.5 py-1 rounded-xl border 
                             {{ $badge[0] }} {{ $badge[1] }} {{ $badge[2] }}">
                    {{ $badge[3] }}
                </span>
            </div>

            {{-- Progress Circle + Number --}}
            <div class="flex items-center gap-4 mb-4">
                <div class="relative w-16 h-16 shrink-0">
                    <svg class="w-16 h-16 -rotate-90" viewBox="0 0 64 64">
                        <circle cx="32" cy="32" r="26" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="6"/>
                        <circle cx="32" cy="32" r="26" fill="none" 
                                stroke="url(#grad-{{ $loop->index }})" 
                                stroke-width="6"
                                stroke-linecap="round"
                                stroke-dasharray="{{ 2 * M_PI * 26 }}"
                                stroke-dashoffset="{{ 2 * M_PI * 26 * (1 - $progress / 100) }}"
                                class="progress-ring transition-all duration-1000"/>
                        <defs>
                            <linearGradient id="grad-{{ $loop->index }}" x1="0%" y1="0%" x2="100%" y2="0%">
                                @if($progress >= 100)
                                    <stop offset="0%" stop-color="#34d399"/>
                                    <stop offset="100%" stop-color="#14b8a6"/>
                                @elseif($progress >= 50)
                                    <stop offset="0%" stop-color="#60a5fa"/>
                                    <stop offset="100%" stop-color="#818cf8"/>
                                @else
                                    <stop offset="0%" stop-color="#fbbf24"/>
                                    <stop offset="100%" stop-color="#f97316"/>
                                @endif
                            </linearGradient>
                        </defs>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-white text-xs font-black">{{ $progress }}%</span>
                    </div>
                </div>

                <div class="flex-1">
                    <div class="flex justify-between text-xs text-slate-400 mb-1.5">
                        <span>Progress</span>
                        <span class="{{ $badge[0] }} font-semibold">{{ $progress }}%</span>
                    </div>
                    <div class="w-full bg-white/10 h-2 rounded-full overflow-hidden">
                        <div class="h-full rounded-full bg-gradient-to-r {{ $gradient }} 
                                    transition-all duration-1000 ease-out progress-bar"
                             style="width: 0%"
                             data-width="{{ $progress }}%">
                        </div>
                    </div>
                    @if(isset($target->deadline))
                    <p class="text-slate-500 text-xs mt-1.5 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 
                                     00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ \Carbon\Carbon::parse($target->deadline)->format('d M Y') }}
                    </p>
                    @endif
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex gap-2 pt-3 border-t border-white/5 opacity-0 group-hover:opacity-100 
                        transition-opacity duration-200">
                <a href="{{ route('targets.edit', $target) }}"
                   onclick="event.stopPropagation()"
                   class="flex-1 flex items-center justify-center gap-1.5 bg-white/10 hover:bg-blue-500/20 
                          text-slate-300 hover:text-blue-300 text-xs font-semibold py-2 rounded-xl 
                          transition-all duration-200 border border-white/10 hover:border-blue-500/30">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 
                                 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit
                </a>
                <form action="{{ route('targets.destroy', $target) }}" method="POST" 
                      onclick="event.stopPropagation()" class="flex-1">
                    @csrf @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Hapus target ini?')"
                            class="w-full flex items-center justify-center gap-1.5 bg-white/10 hover:bg-red-500/20 
                                   text-slate-300 hover:text-red-400 text-xs font-semibold py-2 rounded-xl 
                                   transition-all duration-200 border border-white/10 hover:border-red-500/30">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 
                                     7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Hapus
                    </button>
                </form>
            </div>

        </div>
        @endforeach

    </div>

    {{-- Empty State --}}
    <div id="emptyState" class="hidden text-center py-20">
        <div class="w-20 h-20 bg-white/5 rounded-3xl flex items-center justify-center mx-auto mb-4">
            <svg class="w-10 h-10 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                      d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <p class="text-slate-400 text-lg font-semibold">Tidak ada target ditemukan</p>
        <p class="text-slate-600 text-sm mt-1">Coba ubah filter atau kata kunci pencarian</p>
    </div>

    {{-- Footer --}}
    <div class="text-center mt-10 text-slate-600 text-sm">
        <p>Dashboard Target &copy; {{ date('Y') }} &bull; Built with ❤️</p>
    </div>

</div>
</div>

{{-- CHART JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .chart-btn {
        background: rgba(255,255,255,0.05);
        color: #94a3b8;
        border: 1px solid rgba(255,255,255,0.1);
    }
    .active-btn {
        background: rgba(99,102,241,0.2) !important;
        color: #a5b4fc !important;
        border-color: rgba(99,102,241,0.4) !important;
    }
    .filter-btn {
        background: rgba(255,255,255,0.05);
        color: #94a3b8;
        border: 1px solid rgba(255,255,255,0.1);
    }
    .active-filter {
        background: rgba(99,102,241,0.2) !important;
        color: #a5b4fc !important;
        border: 1px solid rgba(99,102,241,0.4) !important;
    }
</style>

<script>
    /* ──── LAST UPDATED ──── */
    document.getElementById('lastUpdated').textContent =
        new Date().toLocaleString('id-ID', {
            day:'2-digit', month:'short', year:'numeric',
            hour:'2-digit', minute:'2-digit'
        });

    /* ──── COUNTER ANIMATION ──── */
    document.querySelectorAll('.counter').forEach(el => {
        const target = +el.dataset.target;
        let count = 0;
        const step = Math.ceil(target / 30);
        const timer = setInterval(() => {
            count = Math.min(count + step, target);
            el.textContent = count;
            if (count >= target) clearInterval(timer);
        }, 40);
    });

    /* ──── PROGRESS BAR ANIMATION ──── */
    window.addEventListener('load', () => {
        document.querySelectorAll('.progress-bar').forEach(bar => {
            setTimeout(() => {
                bar.style.width = bar.dataset.width;
            }, 300);
        });
    });

    /* ──── CHART DATA ──── */
    const labels  = @json($targets->pluck('title'));
    const data    = @json($targets->pluck('progress'));
    const colors  = data.map(v =>
        v >= 100 ? 'rgba(52,211,153,0.8)' :
        v >= 50  ? 'rgba(96,165,250,0.8)' :
                   'rgba(251,191,36,0.8)'
    );

    const commonOptions = {
        responsive: true,
        plugins: {
            legend: { display: false },
            tooltip: {
                backgroundColor: 'rgba(15,23,42,0.9)',
                borderColor: 'rgba(99,102,241,0.5)',
                borderWidth: 1,
                padding: 12,
                callbacks: {
                    label: ctx => ` ${ctx.parsed.y}% progress`
                }
            }
        },
        scales: {
            x: {
                grid: { color: 'rgba(255,255,255,0.05)' },
                ticks: { color: '#94a3b8', font: { size: 11 } }
            },
            y: {
                beginAtZero: true, max: 100,
                grid: { color: 'rgba(255,255,255,0.05)' },
                ticks: {
                    color: '#ffffff', font: { size: 11 },
                    callback: v => v + '%'
                }
            }
        }
    };

    let mainChart;

    function buildChart(type) {
        if (mainChart) mainChart.destroy();
        const ctx = document.getElementById('progressChart').getContext('2d');

        const lineGrad = ctx.createLinearGradient(0, 0, 0, 300);
        lineGrad.addColorStop(0, 'rgba(99,102,241,0.4)');
        lineGrad.addColorStop(1, 'rgba(99,102,241,0)');

        mainChart = new Chart(ctx, {
            type,
            data: {
                labels,
                datasets: [{
                    label: 'Progress (%)',
                    data,
                    borderColor: '#6366f1',
                    backgroundColor: type === 'line' ? lineGrad : colors,
                    fill: type === 'line',
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: '#6366f1',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    borderRadius: type === 'bar' ? 8 : 0,
                    borderWidth: 2
                }]
            },
            options: commonOptions
        });
    }

    buildChart('line');

    function switchChart(type) {
        buildChart(type);
        document.querySelectorAll('.chart-btn').forEach(b => b.classList.remove('active-btn'));
        document.getElementById('btn-' + type).classList.add('active-btn');
    }

    /* ──── DONUT CHART ──── */
    new Chart(document.getElementById('donutChart'), {
        type: 'doughnut',
        data: {
            labels: ['Active', 'Completed', 'Ongoing'],
            datasets: [{
                data: [{{ $active }}, {{ $completed }}, {{ $ongoing }}],
                backgroundColor: [
                    'rgba(96,165,250,0.8)',
                    'rgba(52,211,153,0.8)',
                    'rgba(251,191,36,0.8)'
                ],
                borderColor: 'transparent',
                hoverOffset: 8
            }]
        },
        options: {
            responsive: true,
            cutout: '72%',
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: 'rgba(15,23,42,0.9)',
                    borderColor: 'rgba(99,102,241,0.5)',
                    borderWidth: 1,
                    padding: 10
                }
            }
        }
    });

    /* ──── FILTER ──── */
    let currentFilter = 'all';

    function filterCards(status) {
        currentFilter = status;
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active-filter'));
        event.target.classList.add('active-filter');
        applyFilters();
    }

    function searchCards() {
        applyFilters();
    }

    function applyFilters() {
        const keyword = document.getElementById('searchInput').value.toLowerCase();
        let visible = 0;

        document.querySelectorAll('.target-card').forEach(card => {
            const matchStatus = currentFilter === 'all' || card.dataset.status === currentFilter;
            const matchSearch = card.dataset.title.includes(keyword);
            const show = matchStatus && matchSearch;
            card.style.display = show ? '' : 'none';
            if (show) visible++;
        });

        document.getElementById('emptyState').classList.toggle('hidden', visible > 0);
    }
</script>

@endsection