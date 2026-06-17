@extends('layouts.app') 

@section('content')
<div class="flex items-center justify-center py-6">
    
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl border border-gray-100 p-8 transform transition-all duration-300">
        
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Mulai Target Impianmu</h2>
            <p class="text-sm text-gray-500 mt-1">Daftar akun baru untuk mencatat semua mimpimu</p>
        </div>

        <form action="{{ route('register.store') }}" method="POST" class="space-y-5">
            @csrf 

            <div>
                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-2">
                    Nama Lengkap
                </label>
                <input type="text" id="name" name="name" required value="{{ old('name') }}"
                    class="w-full bg-gray-50/50 border border-gray-300 rounded-xl px-4 py-3 text-gray-800 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition duration-200"
                    placeholder="Nama Anda">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-2">
                    Alamat Email
                </label>
                <input type="email" id="email" name="email" required value="{{ old('email') }}"
                    class="w-full bg-gray-50/50 border border-gray-300 rounded-xl px-4 py-3 text-gray-800 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition duration-200"
                    placeholder="nama@email.com">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-2">
                    Password
                </label>
                <input type="password" id="password" name="password" required
                    class="w-full bg-gray-50/50 border border-gray-300 rounded-xl px-4 py-3 text-gray-800 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition duration-200"
                    placeholder="••••••••">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-2">
                    Konfirmasi Password
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full bg-gray-50/50 border border-gray-300 rounded-xl px-4 py-3 text-gray-800 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition duration-200"
                    placeholder="••••••••">
            </div>

            <button type="submit" 
                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-3 px-4 rounded-xl transition duration-200 transform active:scale-[0.98] shadow-md hover:shadow-lg shadow-blue-500/20">
                Daftar Akun
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-gray-500 border-t border-gray-100 pt-5">
            Sudah punya akun? 
            <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline ml-1">Masuk Sekarang</a>
        </div>

    </div>
</div>
@endsection