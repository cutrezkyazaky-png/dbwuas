@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 via-white to-blue-50 py-12">

    <div class="max-w-7xl mx-auto px-8">

        {{-- HEADER --}}
        <div class="mb-12">
            <div class="flex items-center gap-3 mb-4">
                <span class="text-5xl">✨</span>
                <h1 class="text-5xl font-bold bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">
                    Inspiration Hub
                </h1>
            </div>

            <p class="text-gray-600 text-lg max-w-2xl">
                Temukan inspirasi untuk terus mengejar target impianmu. Ratusan cerita sukses menanti untuk membangkitkan motivasimu.
            </p>
        </div>

        {{-- MOTIVATIONAL QUOTES SECTION --}}
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                <span>💡</span> Daily Motivations
            </h2>

            <div class="grid md:grid-cols-3 gap-6">

                <div class="group bg-gradient-to-br from-blue-500 to-blue-600 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 text-white cursor-pointer transform hover:-translate-y-2">
                    <div class="text-4xl mb-4">🎯</div>
                    <h3 class="text-xl font-bold mb-3">Dream Big</h3>
                    <p class="text-blue-100 leading-relaxed">
                        "Jangan takut bermimpi besar. Semua pencapaian besar dimulai dari mimpi kecil yang tekun dikejar."
                    </p>
                    <div class="mt-4 text-sm text-blue-200">— Motivasi Harian</div>
                </div>

                <div class="group bg-gradient-to-br from-purple-500 to-purple-600 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 text-white cursor-pointer transform hover:-translate-y-2">
                    <div class="text-4xl mb-4">📈</div>
                    <h3 class="text-xl font-bold mb-3">Stay Consistent</h3>
                    <p class="text-purple-100 leading-relaxed">
                        "Kemajuan kecil setiap hari akan menghasilkan perubahan besar. Konsistensi adalah kunci kesuksesan."
                    </p>
                    <div class="mt-4 text-sm text-purple-200">— Motivasi Harian</div>
                </div>

                <div class="group bg-gradient-to-br from-pink-500 to-rose-600 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 text-white cursor-pointer transform hover:-translate-y-2">
                    <div class="text-4xl mb-4">💪</div>
                    <h3 class="text-xl font-bold mb-3">Never Give Up</h3>
                    <p class="text-pink-100 leading-relaxed">
                        "Kegagalan bukan akhir, tapi bagian dari perjalanan menuju kesuksesan sejati."
                    </p>
                    <div class="mt-4 text-sm text-pink-200">— Motivasi Harian</div>
                </div>

            </div>
        </div>

        {{-- INSPIRATION CATEGORIES --}}
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                <span>🌟</span> Explore Your Goals
            </h2>

            <div class="grid md:grid-cols-2 gap-8">

                {{-- TRAVELING --}}
                <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="relative overflow-hidden h-72">
                        <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=600&q=80"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/30 transition-all duration-300"></div>
                    </div>

                    <div class="p-8">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-3xl">✈️</span>
                            <h3 class="text-2xl font-bold text-gray-900">Traveling Goals</h3>
                        </div>

                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Jadikan dunia sebagai tempat belajar dan pengalaman. Simpan target perjalanan impianmu dan jelajahi keindahan setiap destinasi.
                        </p>

                        <button class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 group/btn">
                            Explore Now
                            <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- CAREER --}}
                <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="relative overflow-hidden h-72">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&q=80"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/30 transition-all duration-300"></div>
                    </div>

                    <div class="p-8">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-3xl">💼</span>
                            <h3 class="text-2xl font-bold text-gray-900">Career Goals</h3>
                        </div>

                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Bangun masa depan profesional melalui target pendidikan dan karier yang terukur. Wujudkan posisi impianmu.
                        </p>

                        <button class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-500 to-purple-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 group/btn">
                            Explore Now
                            <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- HEALTH --}}
                <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="relative overflow-hidden h-72">
                        <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=600&q=80"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/30 transition-all duration-300"></div>
                    </div>

                    <div class="p-8">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-3xl">💪</span>
                            <h3 class="text-2xl font-bold text-gray-900">Healthy Lifestyle</h3>
                        </div>

                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Target kesehatan juga penting untuk masa depanmu. Mulai dari olahraga rutin hingga pola makan sehat.
                        </p>

                        <button class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 group/btn">
                            Explore Now
                            <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- FINANCIAL --}}
                <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="relative overflow-hidden h-72">
                        <img src="https://images.unsplash.com/photo-1579621970563-430f63602022?w=600&q=80"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/30 transition-all duration-300"></div>
                    </div>

                    <div class="p-8">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-3xl">💰</span>
                            <h3 class="text-2xl font-bold text-gray-900">Financial Freedom</h3>
                        </div>

                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Mulai menabung dan capai kebebasan finansialmu. Rencanakan investasi dan kelola keuangan dengan bijak.
                        </p>

                        <button class="inline-flex items-center gap-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 group/btn">
                            Explore Now
                            <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        {{-- SUCCESS STORIES CTA --}}
        <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-3xl p-12 text-white text-center shadow-xl">
            <h2 class="text-3xl font-bold mb-4">Inspirasi dari Cerita Sukses</h2>
            <p class="text-lg text-white/90 mb-6 max-w-2xl mx-auto">
                Baca kisah inspiratif dari ribuan pengguna Target Impian yang telah mewujudkan impian mereka.
            </p>
            <button class="bg-white text-purple-600 px-8 py-3 rounded-xl font-bold hover:shadow-lg transition-all duration-300 inline-flex items-center gap-2 group">
                Baca Cerita Sukses
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </button>
        </div>

    </div>
</div>
@endsection