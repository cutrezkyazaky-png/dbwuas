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
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-bold bg-gradient-to-r from-amber-500 to-orange-500 text-white shadow-lg">
                            ✏️ Edit Target
                        </span>
                    </div>
                    <h1 class="text-4xl font-bold text-white">{{ $target->title }}</h1>
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
                        <h3 class="font-semibold text-red-400 mb-2">Ada Kesalahan!</h3>
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

        <form action="{{ route('targets.update', $target->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-8">
            @csrf
            @method('PUT')

            <div class="grid lg:grid-cols-5 gap-8">

                {{-- FOTO SECTION (Left) --}}
                <div class="lg:col-span-2">
                    <div class="sticky top-8 space-y-6">
                        {{-- IMAGE PREVIEW --}}
                        <div class="group relative rounded-3xl overflow-hidden border-2 border-slate-700/50 hover:border-blue-500/50 transition-all duration-300">
                            <div class="relative aspect-square bg-gradient-to-br from-slate-700 to-slate-900 overflow-hidden">
                                @if($target->photo)
                                    <img id="preview"
                                         src="{{ asset('storage/'.$target->photo) }}"
                                         alt="Target Preview"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center">
                                        <svg class="w-20 h-20 text-slate-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <p class="text-slate-500 text-center">Tidak ada foto</p>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300"></div>
                            </div>

                            {{-- UPLOAD OVERLAY --}}
                            <label class="absolute inset-0 flex flex-col items-center justify-center bg-black/50 opacity-0 group-hover:opacity-100 transition-all duration-300 cursor-pointer">
                                <div class="transform group-hover:scale-100 scale-90 transition-transform duration-300">
                                    <svg class="w-12 h-12 text-white mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    <p class="text-white font-semibold text-sm">Ganti Foto</p>
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
                                <span class="block text-sm font-semibold text-slate-300 mb-3">
                                    📸 Pilih Foto Target
                                </span>
                                <input
                                    type="file"
                                    name="photo"
                                    accept="image/*"
                                    onchange="previewImage(event)"
                                    class="w-full px-4 py-3 rounded-2xl border border-slate-600 bg-slate-700/30 text-slate-300 text-sm
                                           file:bg-gradient-to-r file:from-blue-500 file:to-indigo-600
                                           file:text-white file:px-4 file:py-2 file:border-0 file:rounded-lg
                                           file:mr-4 file:cursor-pointer file:font-semibold
                                           hover:file:from-blue-600 hover:file:to-indigo-700
                                           focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500
                                           transition-all duration-300">
                            </label>
                            <p class="text-xs text-slate-500 mt-2">
                                Format: JPG, PNG, WebP | Ukuran max: 5MB
                            </p>
                        </div>

                        {{-- INFO CARD --}}
                        <div class="bg-gradient-to-br from-blue-500/10 to-indigo-500/10 border border-blue-500/20 rounded-2xl p-4 backdrop-blur-sm">
                            <div class="flex gap-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zm-11-1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-blue-300">💡 Tips</p>
                                    <p class="text-xs text-blue-200/70 mt-1">
                                        Gunakan foto berkualitas tinggi yang mencerminkan target Anda untuk motivasi lebih.
                                    </p>
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
                                📌 Judul Target
                            </label>
                            <input
                                type="text"
                                name="title"
                                value="{{ $target->title }}"
                                placeholder="Masukkan judul target..."
                                required
                                class="w-full text-2xl font-bold bg-slate-700/30 border-2 border-slate-600 rounded-2xl px-6 py-4 text-white
                                       placeholder-slate-500 outline-none
                                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30
                                       transition-all duration-300">
                        </div>

                        {{-- DESCRIPTION --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-300 mb-3 uppercase tracking-wider">
                                📝 Deskripsi
                            </label>
                            <textarea
                                name="description"
                                placeholder="Jelaskan target Anda secara detail..."
                                rows="4"
                                class="w-full bg-slate-700/30 border-2 border-slate-600 rounded-2xl px-6 py-4 text-slate-100
                                       placeholder-slate-500 outline-none resize-none
                                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30
                                       transition-all duration-300">{{ $target->description }}</textarea>
                        </div>

                        {{-- DIVIDER --}}
                        <div class="pt-4 border-t border-slate-700"></div>

                        {{-- GRID INPUTS --}}
                        <div class="grid md:grid-cols-2 gap-6">

                            {{-- KATEGORI --}}
                            <div>
                                <label class="block text-sm font-bold text-slate-300 mb-3 uppercase tracking-wider">
                                    🏷️ Kategori
                                </label>
                                <input
                                    type="text"
                                    name="category"
                                    value="{{ $target->category }}"
                                    placeholder="Contoh: Tabungan, Investasi, Kesehatan..."
                                    required
                                    class="w-full bg-slate-700/30 border-2 border-slate-600 rounded-2xl px-6 py-3 text-slate-100
                                           placeholder-slate-500 outline-none
                                           focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30
                                           transition-all duration-300">
                            </div>

                            {{-- DEADLINE --}}
                            <div>
                                <label class="block text-sm font-bold text-slate-300 mb-3 uppercase tracking-wider">
                                    📅 Deadline
                                </label>
                                <input
                                    type="date"
                                    name="deadline"
                                    value="{{ $target->deadline }}"
                                    required
                                    class="w-full bg-slate-700/30 border-2 border-slate-600 rounded-2xl px-6 py-3 text-slate-100
                                           outline-none cursor-pointer
                                           focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30
                                           transition-all duration-300">
                            </div>

                            {{-- TARGET AMOUNT --}}
                            <div>
                                <label class="block text-sm font-bold text-slate-300 mb-3 uppercase tracking-wider">
                                    💰 Target Nominal
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-semibold">Rp</span>
                                    <input
                                        type="number"
                                        name="target_amount"
                                        value="{{ $target->target_amount }}"
                                        placeholder="Contoh: 5000000"
                                        required
                                        min="0"
                                        class="w-full bg-slate-700/30 border-2 border-slate-600 rounded-2xl px-6 py-3 pl-12 text-slate-100
                                               placeholder-slate-500 outline-none
                                               focus:border-green-500 focus:ring-2 focus:ring-green-500/30
                                               transition-all duration-300">
                                </div>
                            </div>

                            {{-- CURRENT AMOUNT --}}
                            <div>
                                <label class="block text-sm font-bold text-slate-300 mb-3 uppercase tracking-wider">
                                    ✅ Terkumpul Saat Ini
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-semibold">Rp</span>
                                    <input
                                        type="number"
                                        name="current_amount"
                                        value="{{ $target->current_amount }}"
                                        placeholder="Contoh: 2500000"
                                        required
                                        min="0"
                                        class="w-full bg-slate-700/30 border-2 border-slate-600 rounded-2xl px-6 py-3 pl-12 text-slate-100
                                               placeholder-slate-500 outline-none
                                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30
                                               transition-all duration-300">
                                </div>
                            </div>

                        </div>

                        {{-- PROGRESS PREVIEW --}}
                        <div class="bg-gradient-to-br from-indigo-500/10 to-purple-500/10 border border-indigo-500/20 rounded-2xl p-6 backdrop-blur-sm">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-bold text-slate-300">Progress Preview</p>
                                    <span id="progressPercent" class="text-2xl font-bold text-indigo-400">0%</span>
                                </div>
                                <div class="w-full bg-slate-700 rounded-full h-3 overflow-hidden">
                                    <div id="progressBar" class="bg-gradient-to-r from-indigo-500 to-purple-500 h-3 rounded-full transition-all duration-300"
                                         style="width: 0%">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4 text-xs">
                                    <div>
                                        <p class="text-slate-500">Sisa Target</p>
                                        <p id="sisaTarget" class="text-lg font-bold text-red-400">Rp 0</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-slate-500">Terkumpul</p>
                                        <p id="terkumpul" class="text-lg font-bold text-green-400">Rp 0</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- DIVIDER --}}
                        <div class="pt-4 border-t border-slate-700"></div>

                        {{-- BUTTONS --}}
                        <div class="flex gap-4 pt-6">
                            <button
                                type="submit"
                                class="flex-1 group relative inline-flex items-center justify-center gap-3 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white py-4 rounded-2xl font-bold text-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-[1.02]">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Simpan Perubahan</span>
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
    const reader = new FileReader();
    
    reader.onload = function() {
        const preview = document.getElementById('preview');
        preview.src = reader.result;
        preview.classList.add('animate-pulse');
        setTimeout(() => preview.classList.remove('animate-pulse'), 500);
    };
    
    reader.readAsDataURL(event.target.files[0]);
}

// Real-time Progress Calculation
function updateProgress() {
    const targetAmount = parseFloat(document.querySelector('input[name="target_amount"]').value) || 0;
    const currentAmount = parseFloat(document.querySelector('input[name="current_amount"]').value) || 0;
    
    const progress = targetAmount > 0 ? Math.round((currentAmount / targetAmount) * 100) : 0;
    const sisaTarget = Math.max(0, targetAmount - currentAmount);
    
    // Update display
    document.getElementById('progressPercent').textContent = `${progress}%`;
    document.getElementById('progressBar').style.width = `${progress}%`;
    document.getElementById('sisaTarget').textContent = `Rp ${new Intl.NumberFormat('id-ID').format(sisaTarget)}`;
    document.getElementById('terkumpul').textContent = `Rp ${new Intl.NumberFormat('id-ID').format(currentAmount)}`;
    
    // Change color based on progress
    const progressBar = document.getElementById('progressBar');
    if (progress >= 100) {
        progressBar.className = 'bg-gradient-to-r from-green-500 to-emerald-500 h-3 rounded-full transition-all duration-300';
    } else if (progress >= 50) {
        progressBar.className = 'bg-gradient-to-r from-blue-500 to-indigo-500 h-3 rounded-full transition-all duration-300';
    } else {
        progressBar.className = 'bg-gradient-to-r from-amber-500 to-orange-500 h-3 rounded-full transition-all duration-300';
    }
}

// Add event listeners
document.addEventListener('DOMContentLoaded', function() {
    updateProgress();
    
    document.querySelector('input[name="target_amount"]').addEventListener('input', updateProgress);
    document.querySelector('input[name="current_amount"]').addEventListener('input', updateProgress);
});
</script>
@endsection