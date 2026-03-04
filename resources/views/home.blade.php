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
<section class="bg-white relative relative bg-gradient-to-b from-blue-200 via-blue-50 to-blue-200">
{{-- <div class="absolute inset-0 bg-gradient-to-br from-[#B8D9FF]/100 via-[#79ACFF]/100 to-[#3461DF]/100 opacity-60 md:opacity-40"></div> --}}
    <div class="max-w-7xl mx-auto px-6 pt-16 pb-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            
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
                    <a href="{{ route('calendarUser') }}"
                        class="px-6 sm:px-8 py-3 sm:py-3.5 rounded-xl bg-primary text-white font-semibold shadow-lg hover:bg-primary-dark transition transform hover:-translate-y-0.5 text-center">
                        Lihat Kalender
                    </a>
                    
                    <!-- Secondary Button -->
                    <a href="#"
                        class="px-8 py-3.5 rounded-xl border-2 border-gray-500 text-gray-500  font-semibold hover:border-primary hover:text-primary transition">
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
<footer class="relative bg-gray-200 py-15">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-8">
            <div class="md:col-span-2">
                <h3 class="text-text-primary font-bold text-lg mb-4 border-b-2 pb-1">School Planner</h3>
                <p class="text-sm text-footer-text/80 text-text-secondary">Kelola agenda sekolah dengan <strong class="text-primary">mudah dan efisien</strong>. Platform terpadu untuk OSIS, MPK, dan ekstrakurikuler.</p>
            </div>
            <div>
                <h4 class="text-text-primary font-bold text-lg mb-4 border-b-2 pb-1">Menu</h4>
                <ul class="space-y-2 text-sm">

                    {{-- Home --}}
                    <li>
                        <a href="#" class="flex items-center gap-3 group">
                            <!-- Box Border -->
                            <div class="w-8 h-8 flex items-center justify-center 
                            border-1 border-gray-400 rounded-lg
                        group-hover:border-primary group-hover:bg-primary
                            transition-all duration-300">
                                <!-- ICON: Awal MERAH, Hover BIRU -->
                                <svg class="w-4 h-4 text-gray-500 
                                group-hover:text-white
                                transition-colors duration-300" 
                                viewBox="0 0 24 24" fill="none" 
                                stroke="currentColor" stroke-width="1.5">
                                <path d="M22 22L2 22"></path>
                                <path d="M2 11L10.1259 4.49931C11.2216 3.62279 12.7784 3.62279 13.8741 4.49931L22 11"></path>
                                <path d="M15.5 5.5V3.5C15.5 3.22386 15.7239 3 16 3H18.5C18.7761 3 19 3.22386 19 3.5V8.5"></path>
                                <path d="M4 22V9.5"></path>
                                <path d="M20 22V9.5"></path>
                                <path d="M15 22V17C15 15.5858 15 14.8787 14.5607 14.4393C14.1213 14 13.4142 14 12 14C10.5858 14 9.87868 14 9.43934 14.4393C9 14.8787 9 15.5858 9 17V22"></path>
                                <path d="M14 9.5C14 10.6046 13.1046 11.5 12 11.5C10.8954 11.5 10 10.6046 10 9.5C10 8.39543 10.8954 7.5 12 7.5C13.1046 7.5 14 8.39543 14 9.5Z"></path>
                                </svg>
                            </div>
    
                            <!-- TEXT: Awal ABU-ABU, Hover UNGU -->
                            <span class="text-gray-500 
                            group-hover:text-black 
                            transition-colors duration-300">
                            Home
                            </span>
    
                        </a>
                    </li>

                    {{-- Kalender --}}
                    <li>
                        <a href="{{ route('calendarUser') }}" class="flex items-center gap-3 group">
    
                            <!-- Box Border -->
                            <div class="w-8 h-8 flex items-center justify-center 
                            border-1 border-gray-400 rounded-lg
                            group-hover:border-primary group-hover:bg-primary
                            transition-all duration-300">
                                <!-- ICON: Awal MERAH, Hover BIRU -->
                                <svg class="w-4 h-4 text-gray-500 group-hover:text-white transition-colors duration-300" 
                                viewBox="0 0 100.353 100.353" 
                                fill="none" 
                                stroke="currentColor" 
                                stroke-width="4" 
                                stroke-linecap="round" 
                                stroke-linejoin="round"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M32.286,42.441h-9.762c-0.829,0-1.5,0.671-1.5,1.5v9.762c0,0.828,0.671,1.5,1.5,1.5h9.762c0.829,0,1.5-0.672,1.5-1.5v-9.762C33.786,43.113,33.115,42.441,32.286,42.441z M30.786,52.203h-6.762v-6.762h6.762V52.203z"/>
                                <path d="M55.054,42.441h-9.762c-0.829,0-1.5,0.671-1.5,1.5v9.762c0,0.828,0.671,1.5,1.5,1.5h9.762c0.828,0,1.5-0.672,1.5-1.5v-9.762C56.554,43.113,55.882,42.441,55.054,42.441z M53.554,52.203h-6.762v-6.762h6.762V52.203z"/>
                                <path d="M77.12,42.441h-9.762c-0.828,0-1.5,0.671-1.5,1.5v9.762c0,0.828,0.672,1.5,1.5,1.5h9.762c0.828,0,1.5-0.672,1.5-1.5v-9.762C78.62,43.113,77.948,42.441,77.12,42.441z M75.62,52.203h-6.762v-6.762h6.762V52.203z"/>
                                <path d="M32.286,64.677h-9.762c-0.829,0-1.5,0.672-1.5,1.5v9.762c0,0.828,0.671,1.5,1.5,1.5h9.762c0.829,0,1.5-0.672,1.5-1.5v-9.762C33.786,65.349,33.115,64.677,32.286,64.677z M30.786,74.439h-6.762v-6.762h6.762V74.439z"/>
                                <path d="M55.054,64.677h-9.762c-0.829,0-1.5,0.672-1.5,1.5v9.762c0,0.828,0.671,1.5,1.5,1.5h9.762c0.828,0,1.5-0.672,1.5-1.5v-9.762C56.554,65.349,55.882,64.677,55.054,64.677z M53.554,74.439h-6.762v-6.762h6.762V74.439z"/>
                                <path d="M77.12,64.677h-9.762c-0.828,0-1.5,0.672-1.5,1.5v9.762c0,0.828,0.672,1.5,1.5,1.5h9.762c0.828,0,1.5-0.672,1.5-1.5v-9.762C78.62,65.349,77.948,64.677,77.12,64.677z M75.62,74.439h-6.762v-6.762h6.762V74.439z"/>
                                <path d="M89,13.394h-9.907c-0.013,0-0.024,0.003-0.037,0.004V11.4c0-3.268-2.658-5.926-5.926-5.926s-5.926,2.659-5.926,5.926v1.994H56.041V11.4c0-3.268-2.658-5.926-5.926-5.926s-5.926,2.659-5.926,5.926v1.994H33.025V11.4c0-3.268-2.658-5.926-5.926-5.926s-5.926,2.659-5.926,5.926v1.995c-0.005,0-0.01-0.001-0.015-0.001h-9.905c-0.829,0-1.5,0.671-1.5,1.5V92.64c0,0.828,0.671,1.5,1.5,1.5H89c0.828,0,1.5-0.672,1.5-1.5V14.894C90.5,14.065,89.828,13.394,89,13.394z M70.204,11.4c0-1.614,1.312-2.926,2.926-2.926s2.926,1.312,2.926,2.926v8.277c0,1.613-1.312,2.926-2.926,2.926s-2.926-1.312-2.926-2.926V11.4z M50.115,8.474c1.613,0,2.926,1.312,2.926,2.926v8.277c0,1.613-1.312,2.926-2.926,2.926c-1.614,0-2.926-1.312-2.926-2.926v-4.643c0.004-0.047,0.014-0.092,0.014-0.141s-0.01-0.094-0.014-0.141V11.4C47.189,9.786,48.501,8.474,50.115,8.474z M24.173,11.4c0-1.614,1.312-2.926,2.926-2.926c1.613,0,2.926,1.312,2.926,2.926v8.277c0,1.613-1.312,2.926-2.926,2.926c-1.614,0-2.926-1.312-2.926-2.926V11.4z M87.5,91.14H12.753V16.394h8.405c0.005,0,0.01-0.001,0.015-0.001v3.285c0,3.268,2.659,5.926,5.926,5.926s5.926-2.658,5.926-5.926v-3.283h11.164v3.283c0,3.268,2.659,5.926,5.926,5.926s5.926-2.658,5.926-5.926v-3.283h11.163v3.283c0,3.268,2.658,5.926,5.926,5.926s5.926-2.658,5.926-5.926V16.39c0.013,0,0.024,0.004,0.037,0.004H87.5V91.14z"/>
                                </svg>
                            </div>
    
                            <!-- TEXT: Awal ABU-ABU, Hover UNGU -->
                            <span class="text-gray-500 
                            group-hover:text-black 
                            transition-colors duration-300">
                            Kalender
                            </span>
    
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-text-primary font-bold text-lg mb-4 border-b-2 pb-1">Bantuan</h4>
                <ul class="space-y-2 text-sm">

                    {{-- About Us --}}
                    <li>
                        <a href="#" class="flex items-center gap-3 group">
    
                            <!-- Box Border -->
                            <div class="w-8 h-8 flex items-center justify-center 
                            border-1 border-gray-400 rounded-lg
                            group-hover:border-primary group-hover:bg-primary
                            transition-all duration-300">

                                <!-- ICON: Awal MERAH, Hover BIRU -->
                                <svg class="w-4 h-4 text-gray-500 group-hover:text-white transition-colors duration-300" 
                                viewBox="0 0 24 24" 
                                fill="currentColor" 
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V11C12.75 10.5858 12.4142 10.25 12 10.25C11.5858 10.25 11.25 10.5858 11.25 11V17C11.25 17.4142 11.5858 17.75 12 17.75ZM12 7C12.5523 7 13 7.44772 13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7Z"/>
                                </svg>

                            </div>
    
                            <!-- TEXT: Awal ABU-ABU, Hover UNGU -->
                            <span class="text-gray-500 
                            group-hover:text-black 
                            transition-colors duration-300">
                            About Us
                            </span>
                        </a>
                    </li>

                    {{-- Team --}}
                    <li>
                        <a href="#" class="flex items-center gap-3 group">
    
                            <!-- Box Border -->
                            <div class="w-8 h-8 flex items-center justify-center 
                            border-1 border-gray-400 rounded-lg
                            group-hover:border-primary group-hover:bg-primary
                                transition-all duration-300">
    
                                <!-- ICON: Awal MERAH, Hover BIRU -->
                                <svg class="w-4 h-4 text-gray-500 group-hover:text-white transition-colors duration-300" 
                                viewBox="0 0 512 512" 
                                fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M435.95,287.525c32.51,0,58.87-26.343,58.87-58.853c0-32.51-26.361-58.871-58.87-58.871 c-32.502,0-58.863,26.361-58.863,58.871C377.088,261.182,403.448,287.525,435.95,287.525z"/>
                                <path d="M511.327,344.251c-2.623-15.762-15.652-37.822-25.514-47.677c-1.299-1.306-7.105-1.608-8.673-0.636 c-11.99,7.374-26.074,11.714-41.19,11.714c-15.099,0-29.184-4.34-41.175-11.714c-1.575-0.972-7.373-0.67-8.672,0.636 c-2.757,2.757-5.765,6.427-8.698,10.683c7.935,14.94,14.228,30.81,16.499,44.476c2.27,13.7,1.533,26.67-2.138,38.494 c13.038,4.717,28.673,6.787,44.183,6.787C476.404,397.014,517.804,382.987,511.327,344.251z"/>
                                <path d="M254.487,262.691c52.687,0,95.403-42.716,95.403-95.402c0-52.67-42.716-95.386-95.403-95.386 c-52.678,0-95.378,42.716-95.378,95.386C159.109,219.975,201.808,262.691,254.487,262.691z"/>
                                <path d="M335.269,277.303c-2.07-2.061-11.471-2.588-14.027-1.006c-19.448,11.966-42.271,18.971-66.755,18.971 c-24.466,0-47.3-7.005-66.738-18.971c-2.555-1.583-11.956-1.055-14.026,1.006c-16.021,16.004-37.136,51.782-41.384,77.288 c-10.474,62.826,56.634,85.508,122.148,85.508c65.532,0,132.639-22.682,122.165-85.508 C372.404,329.085,351.289,293.307,335.269,277.303z"/>
                                <path d="M76.049,287.525c32.502,0,58.862-26.343,58.862-58.853c0-32.51-26.36-58.871-58.862-58.871 c-32.511,0-58.871,26.361-58.871,58.871C17.178,261.182,43.538,287.525,76.049,287.525z"/>
                                <path d="M115.094,351.733c2.414-14.353,9.225-31.253,17.764-46.88c-2.38-3.251-4.759-6.083-6.955-8.279 c-1.299-1.306-7.097-1.608-8.672-0.636c-11.991,7.374-26.076,11.714-41.182,11.714c-15.108,0-29.202-4.34-41.183-11.714 c-1.568-0.972-7.382-0.67-8.681,0.636c-9.887,9.854-22.882,31.915-25.514,47.677c-6.468,38.736,34.924,52.762,75.378,52.762 c14.437,0,29.016-1.777,41.459-5.84C113.587,379.108,112.757,365.835,115.094,351.733z"/>
                                </svg>

                            </div>
    
                            <!-- TEXT: Awal ABU-ABU, Hover UNGU -->
                            <span class="text-gray-500 
                            group-hover:text-black 
                            transition-colors duration-300">
                            Team
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-t border-white/200 mt-8 pt-8 text-left text-sm text-footer-text/60 text-text-secondary">
            <p><strong class="text-primary">TR1VIUM</strong> &copy; 2026 School Planner | All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>