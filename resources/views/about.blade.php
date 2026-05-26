@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50 py-10">

    <div class="max-w-6xl mx-auto">

        {{-- HEADER --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-blue-700 mb-3">
                About Target Impian
            </h1>

            <p class="text-gray-500 text-lg">
                Aplikasi untuk membantu kamu merencanakan, menyimpan, dan
                mewujudkan target impian.
            </p>
        </div>


        {{-- ABOUT APP --}}
        <div class="bg-white rounded-3xl shadow-md p-8 mb-8">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">
                Tentang Aplikasi
            </h2>

            <p class="text-gray-600 leading-8">
                <strong>Target Impian</strong> adalah aplikasi web yang dibuat
                untuk membantu pengguna mengatur target hidup, mencatat progres,
                menyimpan motivasi, dan memantau perkembangan menuju tujuan.
            </p>

            <p class="text-gray-600 leading-8 mt-4">
                Dengan fitur dashboard, my targets, inspiration, dan progress chart,
                pengguna bisa lebih fokus dalam mencapai cita-cita.
            </p>
        </div>


        {{-- FITUR --}}
        <div class="grid md:grid-cols-3 gap-6 mb-8">

            <div class="bg-white rounded-3xl shadow-md p-6">
                <h3 class="text-xl font-bold text-blue-600 mb-3">
                    Dashboard
                </h3>
                <p class="text-gray-600">
                    Melihat semua target secara cepat dan ringkas.
                </p>
            </div>

            <div class="bg-white rounded-3xl shadow-md p-6">
                <h3 class="text-xl font-bold text-green-600 mb-3">
                    My Targets
                </h3>
                <p class="text-gray-600">
                    Mengelola target dan melihat progress pencapaian.
                </p>
            </div>

            <div class="bg-white rounded-3xl shadow-md p-6">
                <h3 class="text-xl font-bold text-purple-600 mb-3">
                    Inspiration
                </h3>
                <p class="text-gray-600">
                    Mendapat motivasi untuk tetap semangat.
                </p>
            </div>

        </div>


        {{-- DEVELOPER --}}
        <div class="bg-white rounded-3xl shadow-md p-8 text-center">

            <div class="w-24 h-24 mx-auto rounded-full bg-blue-600 text-white
                        flex items-center justify-center text-3xl font-bold mb-4">
                E
            </div>

            <h2 class="text-2xl font-bold text-gray-800">
                Eky Vinsmoke
            </h2>

            <p class="text-gray-500 mt-2">
                Developer & Creator
            </p>

            <p class="text-gray-600 mt-4 max-w-2xl mx-auto leading-7">
                Mahasiswa Universitas Syiah Kuala yang sedang belajar
                membangun aplikasi web modern menggunakan Laravel
                dan Tailwind CSS.
            </p>

        </div>

    </div>
</div>
@endsection