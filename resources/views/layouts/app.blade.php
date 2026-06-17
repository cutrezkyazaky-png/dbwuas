<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Target Impian - Wujudkan Impian Anda</title>
    @vite(['resources/css/app.css'])
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='75' font-size='75' fill='%231e40af'>🎯</text></svg>">
</head>

<body class="bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-white/80 backdrop-blur-md shadow-lg border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-8 py-4">
            <div class="flex items-center justify-between">

                <!-- Logo -->
                <a href="{{ route('targets.index') }}"
                   class="flex items-center gap-3 group">
                    <div class="text-3xl transform group-hover:scale-110 transition-transform duration-300">
                        🎯
                    </div>
                    <div>
                        <div class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                            Target Impian
                        </div>
                        <div class="text-xs text-gray-500 font-medium">Wujudkan Mimpi Anda</div>
                    </div>
                </a>

                <!-- Menu Tengah -->
                <div class="flex items-center gap-1">
                    @php
                        $menus = [
                            ['route' => 'dashboard', 'label' => 'Home', 'icon' => '🏠'],
                            ['route' => 'targets.my', 'label' => 'My Targets', 'icon' => '📋'],
                            ['route' => 'inspiration', 'label' => 'Inspiration', 'icon' => '✨'],
                            ['route' => 'about', 'label' => 'About', 'icon' => 'ℹ️'],
                        ]
                    @endphp

                    @foreach($menus as $menu)
                        <a href="{{ route($menu['route']) }}"
                           class="px-4 py-2 rounded-lg text-gray-700 font-medium hover:bg-blue-100 hover:text-blue-600 transition-all duration-300 flex items-center gap-2 group">
                            <span class="text-lg group-hover:scale-110 transition-transform">{{ $menu['icon'] }}</span>
                            {{ $menu['label'] }}
                        </a>
                    @endforeach
                </div>

                <!-- User Profile -->
                <div class="flex items-center gap-4">
                    <button class="p-2 rounded-lg hover:bg-gray-100 transition-all duration-300">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </button>

                    <div class="flex items-center gap-3 pl-4 border-l border-gray-200">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center font-bold shadow-lg hover:shadow-xl transition-shadow cursor-pointer">
                            E
                        </div>
                        <div>
                            <div class="font-semibold text-gray-700">Eky</div>
                            <div class="text-xs text-gray-500">Member</div>
                        </div>
                    </div>

                    <!-- Dropdown Menu -->
                    <div class="relative group">
                        <button class="p-2 rounded-lg hover:bg-gray-100 transition-all">
                            <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 border border-gray-100">
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 first:rounded-t-xl">
                                👤 Profile
                            </a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">
                                ⚙️ Settings
                            </a>
                            <hr class="my-2">
                            <a href="#" class="block px-4 py-2 text-red-600 hover:bg-red-50 last:rounded-b-xl">
                                🚪 Logout
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="max-w-7xl mx-auto px-8 py-12">
        <div class="animate-fadeIn">
            @yield('content')
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="border-t border-gray-200 bg-white/50 backdrop-blur-md mt-20">
        <div class="max-w-7xl mx-auto px-8 py-8">
            <div class="grid grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="font-bold text-gray-900 mb-4">Target Impian</h3>
                    <p class="text-sm text-gray-600">Bantu Anda mewujudkan impian melalui target yang terukur dan terencana.</p>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900 mb-4">Navigasi</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-blue-600 transition">Home</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">My Targets</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Inspiration</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900 mb-4">Bantuan</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-blue-600 transition">FAQ</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Support</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900 mb-4">Legal</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-blue-600 transition">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-200 pt-8 flex items-center justify-between">
                <p class="text-sm text-gray-600">© 2026 Target Impian. All rights reserved.</p>
                <div class="flex gap-4">
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition">f</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition">𝕏</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition">in</a>
                </div>
            </div>
        </div>
    </footer>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out;
        }
    </style>

</body>
</html>