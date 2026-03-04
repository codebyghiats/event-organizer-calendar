<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Utama - School Planner</title>

    <!-- Vite: Load CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine JS (CDN aman, gak konflik dengan Vite) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans antialiased text-text-primary bg-white">

<!-- NAVBAR (Opsi Clean: White Background) -->
<x-navbar></x-navbar>

<!-- HERO SECTION (Background: White) -->
<section class="bg-white relative overflow-hidden">
<div class="absolute inset-0 bg-gradient-to-br from-[#B8D9FF]/100 via-[#79ACFF]/100 to-[#3461DF]/100 opacity-60 md:opacity-40"></div>
    <div class="max-w-7xl mx-auto px-6 pt-16 pb-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            
            <!-- LEFT TEXT -->
            <div class="relative">
                <div class="absolute -inset-4 bg-gradient-to-r from-blue-100/50 to-blue-200/50 rounded-3xl blur-2xl -z-10"></div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text-primary leading-tight">
                    Kelola Semua Agenda <br>
                    <span class="text-primary">Sekolah</span> dalam Satu <br>
                    Platform
                </h1>
                
                <p class="mt-6 text-lg text-text-secondary max-w-lg">
                    Jadwal Ekstrakurikuler OSIS & MPK, hingga event besar sekolah –
                    rapi, jelas dan tidak bentrok.
                </p>
                
                <div class="mt-8 flex gap-4">
                    <!-- Primary Button -->
                    <a href="{{ route('calendarUser') }}"
                       class="px-8 py-3.5 rounded-xl bg-primary text-white font-semibold shadow-lg hover:bg-primary-dark transition transform hover:-translate-y-0.5">
                        Lihat Kalender
                    </a>
                    
                    <!-- Secondary Button -->
                    <a href="#"
                       class="px-8 py-3.5 rounded-xl border-2 border-border text-white  font-semibold hover:border-primary hover:text-primary transition">
                        Masuk Akun
                    </a>
                </div>
            </div>
            
            <!-- RIGHT IMAGE -->
            <div class="relative overflow-visible">
            <img src="{{ asset('images/hero.png') }}"
                class="w-[140%] max-w-none h-auto transform translate-x-[-10%] md:translate-x-0 md:w-[160%] md:translate-x-[-15%]"
                alt="School Planner App">
            </div>
            
        </div>
    </div>
</section>

<!-- SECTION: HARI INI DI SEKOLAH (Background: #F4F8FF) -->
<section class="relative bg-gradient-to-t from-blue-50 via-blue-100 to-blue-200 py-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-8">
            
            <!-- Kolom Kiri: Hari Ini -->
            <div class="bg-white rounded-2xl p-6 border border-border shadow-soft">
                <h2 class="text-xl font-bold text-text-primary mb-4">Hari Ini di Sekolah</h2>
                <p class="text-sm text-text-secondary mb-4">Selasa, 19 April 2026</p>
                
                <div class="space-y-3">
                    <!-- Event Item -->
                    <div class="flex items-start gap-3 bg-white p-3 rounded-lg border border-border hover:border-primary-light transition">
                        <div class="w-2 h-2 rounded-full bg-primary mt-2"></div>
                        <div>
                            <h3 class="font-semibold text-text-primary">Ekskul Basket</h3>
                            <p class="text-xs text-text-secondary">Jadwal Ekskul Minggu Ini</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-3 bg-white p-3 rounded-lg border border-border hover:border-primary-light transition">
                        <div class="w-2 h-2 rounded-full bg-primary-medium mt-2"></div>
                        <div>
                            <h3 class="font-semibold text-text-primary">Rapat OSIS</h3>
                            <p class="text-xs text-text-secondary">Jadwal Rapat Minggu Ini</p>
                        </div>
                    </div>
                </div>
                
                <a href="#" class="inline-block mt-4 text-sm text-primary font-medium hover:text-primary-dark transition">Lihat Kalender →</a>
            </div>

            <!-- Kolom Kanan: Detail Tanggal -->
            <div class="bg-white border border-border rounded-2xl p-6 shadow-soft">
                <h2 class="text-xl font-bold text-text-primary mb-4">Selasa, 19 April 2026</h2>
                
                <div class="space-y-4">
                    <div class="flex justify-between items-center border-l-4 border-primary pl-4 py-2">
                        <div>
                            <h3 class="font-semibold text-text-primary">Ekskul Basket</h3>
                            <p class="text-sm text-text-secondary">Minggu</p>
                        </div>
                        <span class="text-sm text-text-secondary">15:30</span>
                    </div>
                    
                    <div class="flex justify-between items-center border-l-4 border-primary-medium pl-4 py-2">
                        <div>
                            <h3 class="font-semibold text-text-primary">Rapat OSIS</h3>
                            <p class="text-sm text-text-secondary">Minggu</p>
                        </div>
                        <span class="text-sm text-text-secondary">18:00</span>
                    </div>
                    
                    <div class="flex justify-between items-center border-l-4 border-primary-light pl-4 py-2">
                        <div>
                            <h3 class="font-semibold text-text-primary">Undangan Lomba Pramuka</h3>
                            <p class="text-sm text-text-secondary">Minggu</p>
                        </div>
                        <span class="text-sm text-text-secondary">08:00</span>
                    </div>
                </div>
                
                <a href="#" class="inline-block mt-4 text-sm text-primary font-medium hover:text-primary-dark transition">Lihat Kalender →</a>
            </div>

        </div>
    </div>
</section>

<!-- SECTION: KELOLA KEGIATAN (Background: White) -->
<section class="relative bg-gradient-to-b from-blue-50 via-blue-100 to-blue-200 py-16">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-2xl font-bold text-center text-text-primary mb-10">
            Kelola Semua Kegiatan Sekolah dengan Mudah
        </h2>
        
        <div class="grid md:grid-cols-3 gap-6">
            
            <!-- Card 1: Ekstrakurikuler -->
            <div class="bg-white rounded-2xl border border-border shadow-soft overflow-hidden hover:shadow-lg transition">
                <div class="bg-primary-light/40 h-24 flex items-center justify-center">
                    <span class="text-primary font-bold text-lg">Ekstrakurikuler</span>
                </div>
                <div class="p-6">
                    <h3 class="font-semibold text-text-primary mb-2">Jadwal Ekskul Minggu Ini</h3>
                    <p class="text-sm text-text-secondary mb-4">3 Kegiatan Tersedia</p>
                    <a href="#" class="text-sm text-primary font-medium hover:text-primary-dark transition">Lihat Jadwal →</a>
                </div>
            </div>

            <!-- Card 2: OSIS -->
            <div class="bg-white rounded-2xl border border-border shadow-soft overflow-hidden hover:shadow-lg transition">
                <div class="bg-primary-medium/40 h-24 flex items-center justify-center">
                    <span class="text-primary font-bold text-lg">OSIS</span>
                </div>
                <div class="p-6">
                    <h3 class="font-semibold text-text-primary mb-2">Jadwal Rapat & Agenda</h3>
                    <p class="text-sm text-text-secondary mb-4">4 Kegiatan Tersedia</p>
                    <a href="#" class="text-sm text-primary font-medium hover:text-primary-dark transition">Lihat Jadwal →</a>
                </div>
            </div>

            <!-- Card 3: MPK -->
            <div class="bg-white rounded-2xl border border-border shadow-soft overflow-hidden hover:shadow-lg transition">
                <div class="bg-primary/10 h-24 flex items-center justify-center">
                    <span class="text-primary font-bold text-lg">MPK</span>
                </div>
                <div class="p-6">
                    <h3 class="font-semibold text-text-primary mb-2">Jadwal Pengawasan</h3>
                    <p class="text-sm text-text-secondary mb-4">2 Kegiatan Tersedia</p>
                    <a href="#" class="text-sm text-primary font-medium hover:text-primary-dark transition">Lihat Jadwal →</a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION: CTA (Background: #F4F8FF) -->
<section class="relative bg-gradient-to-t from-blue-50 via-blue-100 to-blue-200 py-16">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-2xl font-bold text-text-primary mb-6">
            Siap melihat agenda sekolahmu?
        </h2>
        <a href="#" 
           class="inline-block px-8 py-4 rounded-full bg-primary text-white font-semibold text-lg shadow-lg hover:bg-primary-dark transition transform hover:scale-105">
            Buka Kalender Sekolah
        </a>
    </div>
</section>

<!-- FOOTER (Dark Navy) -->
<footer class="relative bg-gradient-to-b from-blue-50 via-blue-100 to-blue-200 py-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-8">
            <div class="md:col-span-2">
                <h3 class="text-text-primary font-bold text-lg mb-4">School Planner</h3>
                <p class="text-sm text-footer-text/80 text-text-secondary">Kelola agenda sekolah dengan mudah dan efisien. Platform terpadu untuk OSIS, MPK, dan ekstrakurikuler.</p>
            </div>
            <div>
                <h4 class="text-text-primary font-semibold mb-4">Menu</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-text-primary hover:text-primary-dark transition">Home</a></li>
                    <li><a href="#" class="text-text-primary hover:text-primary-dark transition">Kalender</a></li>
                    <li><a href="#" class="text-text-primary hover:text-primary-dark transition">Tentang</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-text-primary font-semibold mb-4">Bantuan</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-text-primary hover:text-primary-dark transition">FAQ</a></li>
                    <li><a href="#" class="text-text-primary hover:text-primary-dark transition">Kontak</a></li>
                    <li><a href="#" class="text-text-primary hover:text-primary-dark transition">Privasi</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-white/10 mt-8 pt-8 text-center text-sm text-footer-text/60 text-text-secondary">
            <p>&copy; 2026 School Planner. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>