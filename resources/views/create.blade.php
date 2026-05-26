@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- HEADER --}}
        <div class="mb-10">
            <div class="flex items-center gap-4 mb-6">
                <a href="{{ route('targets.index') }}"
                   class="group flex items-center justify-center w-12 h-12 rounded-xl bg-slate-700/50 hover:bg-slate-600 transition-all duration-300">
                    <svg class="w-6 h-6 text-slate-300 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-bold bg-gradient-to-r from-green-500 to-emerald-500 text-white shadow-lg">
                            ✨ Target Baru
                        </span>
                    </div>
                    <h1 class="text-4xl font-bold text-white">Buat Target Impian Anda</h1>
                    <p class="text-slate-400 mt-2">Wujudkan mimpi dengan perencanaan yang terstruktur dan terukur</p>
                </div>
            </div>
        </div>

        {{-- ERROR ALERT --}}
        @if ($errors->any())
            <div class="mb-8 bg-gradient-to-br from-red-500/10 to-rose-500/10 border border-red-500/30 rounded-2xl p-6 backdrop-blur-sm">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-red-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-red-400 mb-2">Terjadi Kesalahan!</h3>
                        <ul class="space-y-1">
                            @foreach ($errors->all() as $error)
                                <li class="text-red-300/80 text-sm flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 bg-red-400 rounded-full"></span>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('targets.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-8">
            @csrf

            <div class="grid lg:grid-cols-5 gap-8">

                {{-- FOTO SECTION (Left) --}}
                <div class="lg:col-span-2">
                    <div class="sticky top-8 space-y-6">
                        {{-- IMAGE PREVIEW --}}
                        <div class="group relative rounded-3xl overflow-hidden border-2 border-slate-700/50 hover:border-green-500/50 transition-all duration-300">
                            <div class="relative aspect-square bg-gradient-to-br from-slate-700 to-slate-900 overflow-hidden">
                                <img id="preview"
                                     src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 400'%3E%3Cdefs%3E%3ClinearGradient id='grad' x1='0%25' y1='0%25' x2='100%25' y2='100%25'%3E%3Cstop offset='0%25' style='stop-color:rgb(51,65,85);stop-opacity:1' /%3E%3Cstop offset='100%25' style='stop-color:rgb(30,41,59);stop-opacity:1' /%3E%3C/linearGradient%3E%3C/defs%3E%3Crect width='400' height='400' fill='url(%23grad)'/%3E%3C/svg%3E"
                                     alt="Target Preview"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300"></div>
                            </div>

                            {{-- UPLOAD OVERLAY --}}
                            <label class="absolute inset-0 flex flex-col items-center justify-center bg-gradient-to-br from-black/40 to-black/60 opacity-0 group-hover:opacity-100 transition-all duration-300 cursor-pointer">
                                <div class="transform group-hover:scale-100 scale-90 transition-transform duration-300">
                                    <svg class="w-16 h-16 text-white mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    <p class="text-white font-bold text-center">Unggah Foto</p>
                                    <p class="text-white/70 text-sm">Klik untuk memilih</p>
                                </div>
                                <input
                                    type="file"
                                    name="photo"
                                    accept="image/*"
                                    onchange="previewImage(event)"
                                    class="hidden">
                            </label>
                        </div>

                        {{-- FILE INPUT --}}
                        <div>
                            <label class="block">
                                <span class="block text-sm font-semibold text-slate-300 mb-3 uppercase tracking-wider">
                                    📸 Pilih Foto Target (Opsional)
                                </span>
                                <input
                                    type="file"
                                    name="photo"
                                    accept="image/*"
                                    onchange="previewImage(event)"
                                    class="w-full px-4 py-3 rounded-2xl border-2 border-dashed border-slate-600 bg-slate-700/30 text-slate-300 text-sm
                                           file:bg-gradient-to-r file:from-green-500 file:to-emerald-600
                                           file:text-white file:px-6 file:py-2 file:border-0 file:rounded-lg
                                           file:mr-4 file:cursor-pointer file:font-bold file:transition-all
                                           hover:file:from-green-600 hover:file:to-emerald-700
                                           hover:border-green-500/50 focus:border-green-500
                                           focus:ring-2 focus:ring-green-500/50
                                           transition-all duration-300">
                            </label>
                            <p class="text-xs text-slate-500 mt-3 space-y-1">
                                <span class="block">✓ Format: JPG, PNG, WebP</span>
                                <span class="block">✓ Ukuran maksimal: 5MB</span>
                                <span class="block">✓ Recommended: 1:1 atau landscape ratio</span>
                            </p>
                        </div>

                        {{-- INFO CARDS --}}
                        <div class="space-y-4">
                            {{-- BENEFIT CARD 1 --}}
                            <div class="bg-gradient-to-br from-green-500/10 to-emerald-500/10 border border-green-500/20 rounded-2xl p-4 backdrop-blur-sm hover:border-green-500/40 transition-all duration-300">
                                <div class="flex gap-3">
                                    <div class="flex-shrink-0 mt-1">
                                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 10 10.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-green-300">📋 Terukur & Jelas</p>
                                        <p class="text-xs text-green-200/70 mt-1">
                                            Tentukan target nominal spesifik untuk tracking lebih akurat.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- BENEFIT CARD 2 --}}
                            <div class="bg-gradient-to-br from-blue-500/10 to-indigo-500/10 border border-blue-500/20 rounded-2xl p-4 backdrop-blur-sm hover:border-blue-500/40 transition-all duration-300">
                                <div class="flex gap-3">
                                    <div class="flex-shrink-0 mt-1">
                                        <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H3a1 1 0 00-1 1v12a1 1 0 001 1h14a1 1 0 001-1V6a1 1 0 00-1-1h3a1 1 0 000-2 2 2 0 00-2 2v12a2 2 0 01-2-2V5a1 1 0 00-1-1H5a1 1 0 00-1 1v12a1 1 0 001 1h10a1 1 0 100-2H6V5z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-blue-300">📅 Tenggat Waktu</p>
                                        <p class="text-xs text-blue-200/70 mt-1">
                                            Atur deadline untuk motivasi ekstra mencapai target.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- BENEFIT CARD 3 --}}
                            <div class="bg-gradient-to-br from-purple-500/10 to-pink-500/10 border border-purple-500/20 rounded-2xl p-4 backdrop-blur-sm hover:border-purple-500/40 transition-all duration-300">
                                <div class="flex gap-3">
                                    <div class="flex-shrink-0 mt-1">
                                        <svg class="w-5 h-5 text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-purple-300">💡 Inspiratif</p>
                                        <p class="text-xs text-purple-200/70 mt-1">
                                            Foto visual meningkatkan motivasi mencapai target.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- FORM SECTION (Right) --}}
                <div class="lg:col-span-3">
                    <div class="space-y-6">

                        {{-- TITLE INPUT --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-300 mb-3 uppercase tracking-wider">
                                📌 Judul Target <span class="text-red-400">*</span>
                            </label>
                            <input
                                type="text"
                                name="title"
                                value="{{ old('title') }}"
                                placeholder="Contoh: Liburan ke Bali, Beli Motor, Cicilan Rumah..."
                                required
                                class="w-full text-2xl font-bold bg-slate-700/30 border-2 border-slate-600 rounded-2xl px-6 py-4 text-white
                                       placeholder-slate-500 outline-none
                                       focus:border-green-500 focus:ring-2 focus:ring-green-500/30
                                       transition-all duration-300 @error('title') border-red-500 @enderror">
                            @error('title')
                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- DESCRIPTION --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-300 mb-3 uppercase tracking-wider">
                                📝 Deskripsi <span class="text-slate-500 text-xs font-normal">(Opsional)</span>
                            </label>
                            <textarea
                                name="description"
                                placeholder="Jelaskan detail target Anda, alasan, dan motivasi untuk mencapainya..."
                                rows="4"
                                class="w-full bg-slate-700/30 border-2 border-slate-600 rounded-2xl px-6 py-4 text-slate-100
                                       placeholder-slate-500 outline-none resize-none
                                       focus:border-green-500 focus:ring-2 focus:ring-green-500/30
                                       transition-all duration-300 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- DIVIDER --}}
                        <div class="pt-4 border-t border-slate-700"></div>

                        {{-- GRID INPUTS --}}
                        <div class="grid md:grid-cols-2 gap-6">

                            {{-- KATEGORI --}}
                            <div>
                                <label class="block text-sm font-bold text-slate-300 mb-3 uppercase tracking-wider">
                                    🏷️ Kategori <span class="text-red-400">*</span>
                                </label>
                                <div class="relative">
                                    <input
                                        type="text"
                                        name="category"
                                        value="{{ old('category') }}"
                                        placeholder="Contoh: Tabungan, Travel, Investasi..."
                                        required
                                        list="categories"
                                        class="w-full bg-slate-700/30 border-2 border-slate-600 rounded-2xl px-6 py-3 text-slate-100
                                               placeholder-slate-500 outline-none
                                               focus:border-green-500 focus:ring-2 focus:ring-green-500/30
                                               transition-all duration-300 @error('category') border-red-500 @enderror">
                                    <datalist id="categories">
                                        <option value="💰 Tabungan"></option>
                                        <option value="✈️ Travel"></option>
                                        <option value="🚗 Kendaraan"></option>
                                        <option value="🏠 Properti"></option>
                                        <option value="📚 Pendidikan"></option>
                                        <option value="💪 Kesehatan"></option>
                                        <option value="📱 Teknologi"></option>
                                        <option value="💍 Fashion"></option>
                                        <option value="🎓 Investasi"></option>
                                        <option value="🎮 Hobi"></option>
                                    </datalist>
                                </div>
                                @error('category')
                                    <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- DEADLINE --}}
                            <div>
                                <label class="block text-sm font-bold text-slate-300 mb-3 uppercase tracking-wider">
                                    📅 Deadline <span class="text-red-400">*</span>
                                </label>
                                <input
                                    type="date"
                                    name="deadline"
                                    value="{{ old('deadline') }}"
                                    required
                                    class="w-full bg-slate-700/30 border-2 border-slate-600 rounded-2xl px-6 py-3 text-slate-100
                                           outline-none cursor-pointer
                                           focus:border-green-500 focus:ring-2 focus:ring-green-500/30
                                           transition-all duration-300 @error('deadline') border-red-500 @enderror">
                                @error('deadline')
                                    <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- TARGET AMOUNT --}}
                            <div>
                                <label class="block text-sm font-bold text-slate-300 mb-3 uppercase tracking-wider">
                                    💰 Target Nominal <span class="text-red-400">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold text-lg">Rp</span>
                                    <input
                                        type="number"
                                        name="target_amount"
                                        value="{{ old('target_amount') }}"
                                        placeholder="Contoh: 5000000"
                                        required
                                        min="0"
                                        inputmode="numeric"
                                        class="w-full bg-slate-700/30 border-2 border-slate-600 rounded-2xl px-6 py-3 pl-12 text-slate-100
                                               placeholder-slate-500 outline-none
                                               focus:border-green-500 focus:ring-2 focus:ring-green-500/30
                                               transition-all duration-300 @error('target_amount') border-red-500 @enderror">
                                </div>
                                @error('target_amount')
                                    <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- CURRENT AMOUNT --}}
                            <div>
                                <label class="block text-sm font-bold text-slate-300 mb-3 uppercase tracking-wider">
                                    ✅ Terkumpul Saat Ini <span class="text-red-400">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold text-lg">Rp</span>
                                    <input
                                        type="number"
                                        name="current_amount"
                                        value="{{ old('current_amount', 0) }}"
                                        placeholder="Contoh: 1000000"
                                        required
                                        min="0"
                                        inputmode="numeric"
                                        class="w-full bg-slate-700/30 border-2 border-slate-600 rounded-2xl px-6 py-3 pl-12 text-slate-100
                                               placeholder-slate-500 outline-none
                                               focus:border-green-500 focus:ring-2 focus:ring-green-500/30
                                               transition-all duration-300 @error('current_amount') border-red-500 @enderror">
                                </div>
                                @error('current_amount')
                                    <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        {{-- PROGRESS PREVIEW --}}
                        <div class="bg-gradient-to-br from-emerald-500/10 to-teal-500/10 border border-emerald-500/20 rounded-2xl p-6 backdrop-blur-sm">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-bold text-slate-300 uppercase tracking-wide">Preview Progress</p>
                                    <span id="progressPercent" class="text-3xl font-bold text-emerald-400">0%</span>
                                </div>
                                <div class="w-full bg-slate-700 rounded-full h-3 overflow-hidden">
                                    <div id="progressBar" class="bg-gradient-to-r from-emerald-500 to-teal-500 h-3 rounded-full transition-all duration-300"
                                         style="width: 0%">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div>
                                        <p class="text-slate-500 text-xs uppercase tracking-wide mb-1">Sisa Target</p>
                                        <p id="sisaTarget" class="text-lg font-bold text-amber-400">Rp 0</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-slate-500 text-xs uppercase tracking-wide mb-1">Target</p>
                                        <p id="targetDisplay" class="text-lg font-bold text-emerald-400">Rp 0</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- DIVIDER --}}
                        <div class="pt-4 border-t border-slate-700"></div>

                        {{-- BUTTONS --}}
                        <div class="flex flex-col sm:flex-row gap-4 pt-6">
                            <button
                                type="submit"
                                class="flex-1 group relative inline-flex items-center justify-center gap-3 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white py-4 rounded-2xl font-bold text-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-[1.02] active:scale-95">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span>Buat Target</span>
                                <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-20 bg-white transition-opacity"></div>
                            </button>

                            <a href="{{ route('targets.index') }}"
                               class="flex-1 inline-flex items-center justify-center gap-2 border-2 border-slate-600 hover:border-slate-500 text-slate-300 hover:text-white py-4 rounded-2xl font-bold text-lg transition-all duration-300 hover:bg-slate-700/50">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                <span>Batal</span>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </form>

    </div>
</div>

{{-- SCRIPTS --}}
<script>
function previewImage(event) {
    if (event.target.files && event.target.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const preview = document.getElementById('preview');
            preview.src = e.target.result;
            preview.classList.add('animate-pulse');
            setTimeout(() => preview.classList.remove('animate-pulse'), 500);
        };
        
        reader.readAsDataURL(event.target.files[0]);
    }
}

// Real-time Progress Calculation
function updateProgress() {
    const targetAmount = parseFloat(document.querySelector('input[name="target_amount"]').value) || 0;
    const currentAmount = parseFloat(document.querySelector('input[name="current_amount"]').value) || 0;
    
    const progress = targetAmount > 0 ? Math.round((currentAmount / targetAmount) * 100) : 0;
    const sisaTarget = Math.max(0, targetAmount - currentAmount);
    
    // Update display
    document.getElementById('progressPercent').textContent = `${Math.min(progress, 100)}%`;
    document.getElementById('progressBar').style.width = `${Math.min(progress, 100)}%`;
    document.getElementById('sisaTarget').textContent = `Rp ${new Intl.NumberFormat('id-ID').format(sisaTarget)}`;
    document.getElementById('targetDisplay').textContent = `Rp ${new Intl.NumberFormat('id-ID').format(targetAmount)}`;
    
    // Change color based on progress
    const progressBar = document.getElementById('progressBar');
    if (progress >= 100) {
        progressBar.className = 'bg-gradient-to-r from-green-500 to-emerald-500 h-3 rounded-full transition-all duration-300';
    } else if (progress >= 50) {
        progressBar.className = 'bg-gradient-to-r from-blue-500 to-indigo-500 h-3 rounded-full transition-all duration-300';
    } else if (progress > 0) {
        progressBar.className = 'bg-gradient-to-r from-amber-500 to-orange-500 h-3 rounded-full transition-all duration-300';
    } else {
        progressBar.className = 'bg-gradient-to-r from-slate-600 to-slate-500 h-3 rounded-full transition-all duration-300';
    }
}

// Add event listeners
document.addEventListener('DOMContentLoaded', function() {
    const targetInput = document.querySelector('input[name="target_amount"]');
    const currentInput = document.querySelector('input[name="current_amount"]');
    
    updateProgress();
    
    targetInput.addEventListener('input', updateProgress);
    currentInput.addEventListener('input', updateProgress);
    
    // Format large numbers while typing
    [targetInput, currentInput].forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value) {
                this.value = Math.round(this.value);
            }
        });
    });
});

// Prevent negative values
document.querySelectorAll('input[type="number"]').forEach(input => {
    input.addEventListener('change', function() {
        if (this.value < 0) {
            this.value = 0;
        }
    });
});
</script>
@endsection