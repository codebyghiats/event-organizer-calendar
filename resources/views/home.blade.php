<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Utama - School Planner</title>

    <!-- Tailwind v4 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-50">

<!-- NAVBAR -->
<div class="pt-4 px-4">
    <nav class="bg-[#F3F4F6] text-black shadow-md rounded-[20px] sticky top-4 z-50"
        x-data="{ mobileOpen: false }">

        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">

            <!-- Mobile Button -->
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button
                    @click="mobileOpen = !mobileOpen"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white">

                    <!-- Hamburger -->
                    <svg x-show="!mobileOpen" class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>

                    <!-- Close -->
                    <svg x-show="mobileOpen" class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Logo -->
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex shrink-0 items-center">
                    <span class="text-black font-bold text-lg">School Planner</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="/" class="rounded-md bg-[#F3F4F6] px-3 py-2 text-sm font-medium text-black hover:bg-black/5 hover:text-black">Home</a>
                        <a href="about" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-black/5 hover:text-black">About</a>
                        <a href="blog" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-black/5 hover:text-black">Blog</a>
                        <a href="contact" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-black/5 hover:text-black">Contact</a>
                    </div>
                </div>
            </div>

            <!-- Profile Dropdown -->
            <div class="relative ml-3" x-data="{ profileOpen: false }">
                <button
                    @click="profileOpen = !profileOpen"
                    class="flex rounded-full focus:outline-none">
                    <img class="size-8 rounded-full"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e"
                        alt="User">
                </button>

                <!-- Dropdown -->
                <div
                    x-show="profileOpen"
                    @click.outside="profileOpen = false"
                    x-transition
                    class="absolute right-0 mt-2 w-48 rounded-md bg-white py-1 shadow-lg">

                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                </div>
            </div>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileOpen" x-transition class="sm:hidden">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <a href="/" class="block rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Home</a>
            <a href="about" class="block rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">About</a>
            <a href="blog" class="block rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Blog</a>
            <a href="contact" class="block rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Contact</a>
        </div>
    </div>

</nav>

<!-- HERO SECTION -->
<div class="max-w-7xl mx-auto px-6 pt-16 pb-20 overflow-hidden">
    <div class="grid md:grid-cols-2 gap-8 items-center">

        <!-- LEFT TEXT -->
        <div class="z-10">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                Kelola Semua Agenda <br>
                Sekolah dalam Satu <br>
                Platform
            </h1>

            <p class="mt-6 text-lg text-gray-600 max-w-lg">
                Jadwal Ekstrakurikuler OSIS & MPK, hingga event besar sekolah –
                rapi, jelas dan tidak bentrok.
            </p>

            <div class="mt-8 flex gap-4">
                <a href="#"
                class="px-6 py-3 rounded-lg bg-blue-600 text-white font-medium shadow hover:bg-blue-700 transition">
                    Lihat Kalender
                </a>

                <a href="#"
                class="px-6 py-3 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-100 transition">
                    Masuk Akun
                </a>
            </div>
        </div>

        <!-- RIGHT IMAGE - LEBIH BESAR -->
        <div class="relative">
            <img src="{{ asset('images/hero.png') }}"
                class="w-[140%] max-w-none h-auto transform translate-x-[-10%] md:translate-x-0 md:w-[160%] md:translate-x-[-15%]"
                alt="School Planner App">
        </div>

    </div>
</div>

<!-- SECTION: HARI INI DI SEKOLAH -->
<div class="bg-white py-16 ">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-8">
            
            <!-- Kolom Kiri: Hari Ini -->
            <div class="bg-gray-50 rounded-2xl p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Hari Ini di Sekolah</h2>
                <p class="text-sm text-gray-500 mb-4">Selasa, 19 April 2026</p>
                
                <div class="space-y-3">
                    <!-- Event Item -->
                    <div class="flex items-start gap-3 bg-white p-3 rounded-lg shadow-sm">
                        <div class="w-2 h-2 rounded-full bg-green-500 mt-2"></div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Ekskul Basket</h3>
                            <p class="text-xs text-gray-500">Jadwal Ekskul Minggu Ini</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-3 bg-white p-3 rounded-lg shadow-sm">
                        <div class="w-2 h-2 rounded-full bg-blue-500 mt-2"></div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Rapat Osis</h3>
                            <p class="text-xs text-gray-500">Jadwal Rapat Minggu Ini</p>
                        </div>
                    </div>
                </div>
                
                <a href="#" class="inline-block mt-4 text-sm text-blue-600 hover:underline">Lihat Kalender</a>
            </div>

            <!-- Kolom Kanan: Detail Tanggal -->
            <div class="bg-white border border-gray-200 rounded-2xl p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Selasa, 19 April 2026</h2>
                
                <div class="space-y-4">
                    <div class="flex justify-between items-center border-l-4 border-green-500 pl-4 py-2">
                        <div>
                            <h3 class="font-semibold text-gray-900">Ekskul Basket</h3>
                            <p class="text-sm text-gray-500">Minggu</p>
                        </div>
                        <span class="text-sm text-gray-600">15:30</span>
                    </div>
                    
                    <div class="flex justify-between items-center border-l-4 border-blue-500 pl-4 py-2">
                        <div>
                            <h3 class="font-semibold text-gray-900">Rapat Osis</h3>
                            <p class="text-sm text-gray-500">Minggu</p>
                        </div>
                        <span class="text-sm text-gray-600">18:00</span>
                    </div>
                    
                    <div class="flex justify-between items-center border-l-4 border-purple-500 pl-4 py-2">
                        <div>
                            <h3 class="font-semibold text-gray-900">Undangan Lomba Pramuka</h3>
                            <p class="text-sm text-gray-500">Minggu</p>
                        </div>
                        <span class="text-sm text-gray-600">08:00</span>
                    </div>
                </div>
                
                <a href="#" class="inline-block mt-4 text-sm text-blue-600 hover:underline">Lihat Kalender</a>
            </div>

        </div>
    </div>
</div>

<!-- SECTION: KELOLA KEGIATAN -->
<div class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-2xl font-bold text-center text-gray-900 mb-10">
            Kelola Semua Kegiatan Sekolah dengan Mudah
        </h2>
        
        <div class="grid md:grid-cols-3 gap-6">
            
            <!-- Card 1: Ekstrakurikuler -->
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <div class="bg-green-200 h-24 flex items-center justify-center">
                    <span class="text-green-800 font-bold text-lg">Ekstrakurikuler</span>
                </div>
                <div class="p-6">
                    <h3 class="font-semibold text-gray-900 mb-2">Jadwal Ekskul Minggu Ini</h3>
                    <p class="text-sm text-gray-500 mb-4">3 Kegiatan Tersedia</p>
                    <a href="#" class="text-sm text-blue-600 hover:underline">Lihat Jadwal →</a>
                </div>
            </div>

            <!-- Card 2: OSIS -->
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <div class="bg-blue-300 h-24 flex items-center justify-center">
                    <span class="text-blue-900 font-bold text-lg">OSIS</span>
                </div>
                <div class="p-6">
                    <h3 class="font-semibold text-gray-900 mb-2">Jadwal Ekskul Minggu Ini</h3>
                    <p class="text-sm text-gray-500 mb-4">4 Kegiatan Tersedia</p>
                    <a href="#" class="text-sm text-blue-600 hover:underline">Lihat Jadwal →</a>
                </div>
            </div>

            <!-- Card 3: MPK -->
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <div class="bg-purple-300 h-24 flex items-center justify-center">
                    <span class="text-purple-900 font-bold text-lg">MPK</span>
                </div>
                <div class="p-6">
                    <h3 class="font-semibold text-gray-900 mb-2">Jadwal Ekskul Minggu Ini</h3>
                    <p class="text-sm text-gray-500 mb-4">2 Kegiatan Tersedia</p>
                    <a href="#" class="text-sm text-blue-600 hover:underline">Lihat Jadwal →</a>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- SECTION: CTA -->
<div class="bg-white py-16">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">
            Siap melihat agenda sekolahmu?
        </h2>
        <a href="#" 
        class="inline-block px-8 py-4 rounded-full bg-blue-500 text-white font-semibold text-lg shadow-lg hover:bg-blue-600 transition transform hover:scale-105">
            Buka Kalender Sekolah
        </a>
    </div>
</div>

</body>
</html>