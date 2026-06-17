@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center py-6">
    
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl border border-gray-100 p-8 transform transition-all duration-300">
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Selamat Datang Kembali</h2>
            <p class="text-sm text-gray-500 mt-1">Silakan masuk untuk mengelola target impianmu</p>
        </div>

        <form action="{{ route('login.store') }}" method="POST" class="space-y-5">
            @csrf 
            
            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-2">
                    Alamat Email
                </label>
                <div class="relative">
                    <input type="email" id="email" name="email" required value="{{ old('email') }}"
                        class="w-full bg-gray-50/50 border border-gray-300 rounded-xl px-4 py-3 text-gray-800 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition duration-200"
                        placeholder="nama@email.com">
                </div>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div class="flex justify-between items-center mb-2">
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Password
                    </label>
                    <a href="#" class="text-xs font-medium text-blue-600 hover:underline">Lupa Password?</a>
                </div>
                <div class="relative">
                    <input type="password" id="password" name="password" required
                        class="w-full bg-gray-50/50 border border-gray-300 rounded-xl px-4 py-3 text-gray-800 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition duration-200"
                        placeholder="••••••••">
                </div>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" 
                        class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 accent-blue-600 cursor-pointer">
                    <label for="remember" class="ml-2 block text-sm text-gray-600 select-none cursor-pointer">
                        Ingat saya di perangkat ini
                    </label>
                </div>
            </div>

            <button type="submit" 
                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-3 px-4 rounded-xl transition duration-200 transform active:scale-[0.98] shadow-md hover:shadow-lg shadow-blue-500/20">
                Masuk ke Akun
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-gray-500 border-t border-gray-100 pt-5">
            Belum bergabung? 
            <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline ml-1">Daftar Akun Baru</a>
        </div>
        
    </div>
</div>
@endsection