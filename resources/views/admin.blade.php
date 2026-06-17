@extends('layouts.app')

@section('content')
<style>
    body { background-color: #0b1120 !important; color: #e2e8f0 !important; }
    nav, footer { background-color: #161f38 !important; border-color: #1e293b !important; }
    nav a, nav div { color: #94a3b8 !important; }
    nav .text-gray-700 { color: #cbd5e1 !important; }
</style>

<div class="space-y-8 animate-fadeIn">
    
    @if(session('success'))
        <div class="bg-green-600 text-white p-4 rounded-xl shadow-md">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="bg-gradient-to-r from-purple-700 via-indigo-700 to-blue-700 rounded-2xl p-6 shadow-xl flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <div class="flex items-center gap-2 text-purple-200 text-xs font-bold uppercase tracking-wider mb-1">
                <span class="flex h-2 w-2 rounded-full bg-red-500 animate-pulse"></span> Control Panel
            </div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Admin Dashboard — Target Impian</h1>
            <p class="text-sm text-indigo-200 mt-1">Pantau aktivitas pengguna, kelola database wishlist, dan moderasi konten.</p>
        </div>
        <div class="bg-white/10 backdrop-blur-md px-4 py-2 rounded-xl border border-white/10 text-xs text-white">
            Status Sistem: <span class="text-green-400 font-bold">Normal</span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-[#161f38] p-5 rounded-2xl border border-gray-800 flex items-center gap-4 shadow-lg">
            <div class="w-12 h-12 bg-blue-500/10 text-blue-400 rounded-xl flex items-center justify-center text-xl font-bold">👥</div>
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase">Total Pengguna</p>
                <p class="text-2xl font-bold text-white mt-1">{{ $totalUsers }}</p>
            </div>
        </div>
        <div class="bg-[#161f38] p-5 rounded-2xl border border-gray-800 flex items-center gap-4 shadow-lg">
            <div class="w-12 h-12 bg-purple-500/10 text-purple-400 rounded-xl flex items-center justify-center text-xl font-bold">🎯</div>
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase">Target Dibuat</p>
                <p class="text-2xl font-bold text-white mt-1">{{ $totalTargets }}</p>
            </div>
        </div>
        <div class="bg-[#161f38] p-5 rounded-2xl border border-gray-800 flex items-center gap-4 shadow-lg">
            <div class="w-12 h-12 bg-green-500/10 text-green-400 rounded-xl flex items-center justify-center text-xl font-bold">✅</div>
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase">Mimpi Tercapai</p>
                <p class="text-2xl font-bold text-white mt-1">{{ $completedTargets }}</p>
            </div>
        </div>
        <div class="bg-[#161f38] p-5 rounded-2xl border border-gray-800 flex items-center gap-4 shadow-lg">
            <div class="w-12 h-12 bg-red-500/10 text-red-400 rounded-xl flex items-center justify-center text-xl font-bold">⚠️</div>
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase">Aduan Konten</p>
                <p class="text-2xl font-bold text-white mt-1">0</p>
            </div>
        </div>
    </div>

    <div class="bg-[#161f38] rounded-2xl border border-gray-800 shadow-xl overflow-hidden">
        <div class="p-6 border-b border-gray-800 flex justify-between items-center bg-[#1a2440]">
            <div>
                <h2 class="text-lg font-bold text-white">Daftar Pengguna Aktif</h2>
                <p class="text-xs text-gray-400 mt-0.5">Kelola hak akses dan status keanggotaan member.</p>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-[#0f172a] text-gray-400 text-xs font-semibold uppercase tracking-wider border-b border-gray-800">
                        <th class="py-4 px-6">Nama Pengguna</th>
                        <th class="py-4 px-6">Email</th>
                        <th class="py-4 px-6">Peran (Role)</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/60 text-sm text-gray-300">
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-800/20 transition-colors">
                        <td class="py-4 px-6 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center font-bold text-xs">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <span class="font-medium text-white">{{ $user->name }}</span>
                        </td>
                        <td class="py-4 px-6 text-gray-400">{{ $user->email }}</td>
                        <td class="py-4 px-6">
                            <span class="px-2.5 py-1 rounded-md text-xs font-semibold {{ $user->role === 'admin' ? 'bg-purple-950 text-purple-400 border border-purple-900/50' : 'bg-blue-950 text-blue-400 border border-blue-900/50' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <form action="{{ route('admin.users.toggleRole', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="p-1.5 text-gray-400 hover:text-yellow-500 bg-gray-900 border border-gray-800 rounded-lg transition" title="Ubah Role (Admin/Member)">
                                        ⚙️
                                    </button>
                                </form>

                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-gray-400 hover:text-red-500 bg-gray-900 border border-gray-800 rounded-lg transition" title="Hapus User">
                                        ❌
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection