<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Halaman Utama - School Planner</title>

    <!-- Vite: Load CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine JS (CDN aman, gak konflik dengan Vite) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans antialiased text-text-primary bg-white overflow-x-hidden">

<!-- NAVBAR (Opsi Clean: White Background) -->
<x-navbar></x-navbar>

<!-- HERO SECTION (Background: White) -->
<section class="bg-white relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-[#B8D9FF]/100 via-[#79ACFF]/100 to-[#3461DF]/100 opacity-60 md:opacity-40"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 sm:pt-10 pb-12 sm:pb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 lg:gap-12 items-center">
            
            <!-- LEFT TEXT -->
            <div class="relative order-2 md:order-1 text-center md:text-left">
                <div class="absolute -inset-4 bg-gradient-to-r from-blue-100/50 to-blue-200/50 rounded-3xl blur-2xl -z-10"></div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-text-primary leading-tight">
                    Kelola Semua Agenda <br class="hidden sm:block">
                    <span class="text-primary">Sekolah</span> dalam Satu <br class="hidden sm:block">
                    Platform
                </h1>
                
                <p class="mt-4 sm:mt-6 text-base sm:text-lg text-text-secondary max-w-lg mx-auto md:mx-0 px-2 sm:px-0">
                    Jadwal Ekstrakurikuler OSIS & MPK, hingga event besar sekolah –
                    rapi, jelas dan tidak bentrok.
                </p>
                
                <div class="mt-6 sm:mt-8 flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center md:justify-start">
                    <!-- Primary Button -->
                    <a href="#"
                    class="px-6 sm:px-8 py-3 sm:py-3.5 rounded-xl bg-primary text-white font-semibold shadow-lg hover:bg-primary-dark transition transform hover:-translate-y-0.5 text-center">
                        Lihat Kalender
                    </a>
                    
                    <!-- Secondary Button -->
                    <a href="#"
                    class="px-6 sm:px-8 py-3 sm:py-3.5 rounded-xl border-2 border-border text-text-primary font-semibold hover:border-primary hover:text-primary transition text-center">
                        Masuk Akun
                    </a>
                </div>
            </div>
            
            <!-- RIGHT IMAGE - DESKTOP BESAR, MOBILE PROPORSIONAL -->
            <div class="order-1 md:order-2 relative w-full overflow-visible">
                <img src="{{ asset('images/hero.png') }}"
                    class="w-full max-w-xs sm:max-w-sm mx-auto md:w-[140%] md:max-w-none md:translate-x-[10%] lg:w-[160%] lg:translate-x-[-15%]"
                    alt="School Planner App">
            </div>
        </div>
    </div>
</section>

<!-- SECTION: HARI INI DI SEKOLAH (Background: #F4F8FF) -->
<section class="relative bg-gradient-to-t from-blue-50 via-blue-100 to-blue-200 py-12 sm:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8">
            
            <!-- Kolom Kiri: Hari Ini -->
            <div class="bg-white rounded-2xl p-4 sm:p-6 border border-border shadow-soft">
                <h2 class="text-lg sm:text-xl font-bold text-text-primary mb-4">Hari Ini di Sekolah</h2>
                <p class="text-xs sm:text-sm text-text-secondary mb-4">Selasa, 19 April 2026</p>
                
                <div class="space-y-3">
                    <!-- Event Item -->
                    <div class="flex items-start gap-3 bg-white p-3 rounded-lg border border-border hover:border-primary-light transition">
                        <div class="w-2 h-2 rounded-full bg-primary mt-2 flex-shrink-0"></div>
                        <div class="min-w-0">
                            <h3 class="font-semibold text-text-primary text-sm sm:text-base truncate">Ekskul Basket</h3>
                            <p class="text-xs text-text-secondary">Jadwal Ekskul Minggu Ini</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-3 bg-white p-3 rounded-lg border border-border hover:border-primary-light transition">
                        <div class="w-2 h-2 rounded-full bg-primary-medium mt-2 flex-shrink-0"></div>
                        <div class="min-w-0">
                            <h3 class="font-semibold text-text-primary text-sm sm:text-base truncate">Rapat OSIS</h3>
                            <p class="text-xs text-text-secondary">Jadwal Rapat Minggu Ini</p>
                        </div>
                    </div>
                </div>
                
                <a href="#" class="inline-block mt-4 text-sm text-primary font-medium hover:text-primary-dark transition">Lihat Kalender →</a>
            </div>

            <!-- Kolom Kanan: Detail Tanggal -->
            <div class="bg-white border border-border rounded-2xl p-4 sm:p-6 shadow-soft">
                <h2 class="text-lg sm:text-xl font-bold text-text-primary mb-4">Selasa, 19 April 2026</h2>
                
                <div class="space-y-3 sm:space-y-4">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center border-l-4 border-primary pl-3 sm:pl-4 py-2 gap-1 sm:gap-0">
                        <div class="min-w-0">
                            <h3 class="font-semibold text-text-primary text-sm sm:text-base">Ekskul Basket</h3>
                            <p class="text-xs sm:text-sm text-text-secondary">Minggu</p>
                        </div>
                        <span class="text-xs sm:text-sm text-text-secondary font-medium sm:font-normal">15:30</span>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center border-l-4 border-primary-medium pl-3 sm:pl-4 py-2 gap-1 sm:gap-0">
                        <div class="min-w-0">
                            <h3 class="font-semibold text-text-primary text-sm sm:text-base">Rapat OSIS</h3>
                            <p class="text-xs sm:text-sm text-text-secondary">Minggu</p>
                        </div>
                        <span class="text-xs sm:text-sm text-text-secondary font-medium sm:font-normal">18:00</span>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center border-l-4 border-primary-light pl-3 sm:pl-4 py-2 gap-1 sm:gap-0">
                        <div class="min-w-0">
                            <h3 class="font-semibold text-text-primary text-sm sm:text-base truncate">Undangan Lomba Pramuka</h3>
                            <p class="text-xs sm:text-sm text-text-secondary">Minggu</p>
                        </div>
                        <span class="text-xs sm:text-sm text-text-secondary font-medium sm:font-normal">08:00</span>
                    </div>
                </div>
                
                <a href="#" class="inline-block mt-4 text-sm text-primary font-medium hover:text-primary-dark transition">Lihat Kalender →</a>
            </div>

        </div>
    </div>
</section>

<!-- SECTION: KELOLA KEGIATAN (Background: White) -->
<section class="relative bg-gradient-to-b from-blue-50 via-blue-100 to-blue-200 py-12 sm:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl sm:text-2xl font-bold text-center text-text-primary mb-8 sm:mb-10 px-4">
            Kelola Semua Kegiatan Sekolah dengan Mudah
        </h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            
            <!-- Card 1: Ekstrakurikuler -->
            <div class="bg-white rounded-2xl border border-border shadow-soft overflow-hidden hover:shadow-lg transition">
                <div class="bg-primary-light/40 h-20 sm:h-24 flex items-center justify-center">
                    <span class="text-primary font-bold text-base sm:text-lg">Ekstrakurikuler</span>
                </div>
                <div class="p-4 sm:p-6">
                    <h3 class="font-semibold text-text-primary mb-2 text-sm sm:text-base">Jadwal Ekskul Minggu Ini</h3>
                    <p class="text-xs sm:text-sm text-text-secondary mb-4">3 Kegiatan Tersedia</p>
                    <a href="#" class="text-xs sm:text-sm text-primary font-medium hover:text-primary-dark transition">Lihat Jadwal →</a>
                </div>
            </div>

            <!-- Card 2: OSIS -->
            <div class="bg-white rounded-2xl border border-border shadow-soft overflow-hidden hover:shadow-lg transition">
                <div class="bg-primary-medium/40 h-20 sm:h-24 flex items-center justify-center">
                    <span class="text-primary font-bold text-base sm:text-lg">OSIS</span>
                </div>
                <div class="p-4 sm:p-6">
                    <h3 class="font-semibold text-text-primary mb-2 text-sm sm:text-base">Jadwal Rapat & Agenda</h3>
                    <p class="text-xs sm:text-sm text-text-secondary mb-4">4 Kegiatan Tersedia</p>
                    <a href="#" class="text-xs sm:text-sm text-primary font-medium hover:text-primary-dark transition">Lihat Jadwal →</a>
                </div>
            </div>

            <!-- Card 3: MPK -->
            <div class="bg-white rounded-2xl border border-border shadow-soft overflow-hidden hover:shadow-lg transition sm:col-span-2 lg:col-span-1">
                <div class="bg-primary/10 h-20 sm:h-24 flex items-center justify-center">
                    <span class="text-primary font-bold text-base sm:text-lg">MPK</span>
                </div>
                <div class="p-4 sm:p-6">
                    <h3 class="font-semibold text-text-primary mb-2 text-sm sm:text-base">Jadwal Pengawasan</h3>
                    <p class="text-xs sm:text-sm text-text-secondary mb-4">2 Kegiatan Tersedia</p>
                    <a href="#" class="text-xs sm:text-sm text-primary font-medium hover:text-primary-dark transition">Lihat Jadwal →</a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION: CTA (Background: #F4F8FF) -->
<section class="relative bg-gradient-to-t from-blue-50 via-blue-100 to-blue-200 py-12 sm:py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-xl sm:text-2xl font-bold text-text-primary mb-4 sm:mb-6 px-4">
            Siap melihat agenda sekolahmu?
        </h2>
        <a href="#" 
        class="inline-block px-6 sm:px-8 py-3 sm:py-4 rounded-full bg-primary text-white font-semibold text-base sm:text-lg shadow-lg hover:bg-primary-dark transition transform hover:scale-105">
            Buka Kalender Sekolah
        </a>
    </div>
</section>

<!-- FOOTER (Dark Navy) -->
<footer class="relative bg-gradient-to-b from-blue-50 via-blue-100 to-blue-200 py-12 sm:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="sm:col-span-2 lg:col-span-2">
                <h3 class="text-text-primary font-bold text-lg mb-4">School Planner</h3>
                <p class="text-xs sm:text-sm text-text-secondary leading-relaxed max-w-md">
                    Kelola agenda sekolah dengan mudah dan efisien. Platform terpadu untuk OSIS, MPK, dan ekstrakurikuler.
                </p>
            </div>
            <div>
                <h4 class="text-text-primary font-semibold mb-4 text-sm sm:text-base">Menu</h4>
                <ul class="space-y-2 text-xs sm:text-sm">
                    <li><a href="#" class="text-text-secondary hover:text-primary-dark transition">Home</a></li>
                    <li><a href="#" class="text-text-secondary hover:text-primary-dark transition">Kalender</a></li>
                    <li><a href="#" class="text-text-secondary hover:text-primary-dark transition">Tentang</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-text-primary font-semibold mb-4 text-sm sm:text-base">Bantuan</h4>
                <ul class="space-y-2 text-xs sm:text-sm">
                    <li><a href="#" class="text-text-secondary hover:text-primary-dark transition">FAQ</a></li>
                    <li><a href="#" class="text-text-secondary hover:text-primary-dark transition">Kontak</a></li>
                    <li><a href="#" class="text-text-secondary hover:text-primary-dark transition">Privasi</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-border mt-8 pt-8 text-center text-xs sm:text-sm text-text-secondary">
            <p>&copy; 2026 School Planner. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>