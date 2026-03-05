<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>About Us - School Planner</title>

@vite(['resources/css/app.css','resources/js/app.js'])

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<link rel="icon" href="{{ asset('images/schoolplanner.png') }}">
</head>

<body class="font-sans antialiased text-gray-800 bg-white overflow-x-hidden">

<x-navbar></x-navbar>

<!-- ================= HERO ================= -->
<section class="about-hero-bg pt-36 pb-28">

<div class="max-w-7xl mx-auto px-6 text-center">

<h1 class="text-5xl font-extrabold mb-6"
data-aos="fade-up">
Tentang
<span class="text-blue-600">School Planner</span>
</h1>

<p class="text-gray-600 text-lg max-w-2xl mx-auto"
data-aos="fade-up"
data-aos-delay="200">

School Planner adalah platform yang membantu sekolah
mengelola agenda kegiatan seperti ekstrakurikuler,
OSIS, MPK, dan event sekolah agar lebih terorganisir
dan tidak terjadi bentrok jadwal.

</p>

</div>
</section>

<!-- ================= VISI MISI ================= -->
<section class="py-24 bg-white">

<div class="max-w-7xl mx-auto px-6">

<div class="text-center mb-16">

<h2 class="text-3xl font-bold"
data-aos="fade-up">
Visi & Tujuan
</h2>

<p class="text-gray-600 mt-4"
data-aos="fade-up"
data-aos-delay="200">

Membangun sistem yang membantu sekolah
mengelola agenda kegiatan secara terstruktur.

</p>

</div>

<div class="grid md:grid-cols-3 gap-10">

<!-- CARD 1 -->
<div class="about-card"
data-aos="fade-up">

<div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">

<svg xmlns="http://www.w3.org/2000/svg"
class="w-7 h-7 text-blue-600"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="1.5"
d="M12 6v6l4 2"/>

</svg>

</div>

<h3 class="font-semibold text-lg mb-2">
Manajemen Agenda
</h3>

<p class="text-gray-600 text-sm">
Mengatur seluruh kegiatan sekolah dalam
satu sistem kalender terpusat.
</p>

</div>

<!-- CARD 2 -->
<div class="about-card"
data-aos="fade-up"
data-aos-delay="200">

<div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center mb-6">

<svg xmlns="http://www.w3.org/2000/svg"
class="w-7 h-7 text-indigo-600"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="1.5"
d="M5 13l4 4L19 7"/>

</svg>

</div>

<h3 class="font-semibold text-lg mb-2">
Menghindari Bentrok
</h3>

<p class="text-gray-600 text-sm">
Sistem membantu mendeteksi konflik
jadwal kegiatan sekolah.
</p>

</div>

<!-- CARD 3 -->
<div class="about-card"
data-aos="fade-up"
data-aos-delay="400">

<div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center mb-6">

<svg xmlns="http://www.w3.org/2000/svg"
class="w-7 h-7 text-blue-700"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="1.5"
d="M17 20h5V4H2v16h5"/>

</svg>

</div>

<h3 class="font-semibold text-lg mb-2">
Transparansi Kegiatan
</h3>

<p class="text-gray-600 text-sm">
Semua siswa dapat melihat agenda
sekolah dengan mudah.
</p>

</div>

</div>

</div>
</section>

<!-- ================= TEAM ================= -->
<section class="py-24 bg-blue-50">

<div class="max-w-7xl mx-auto px-6">

<div class="text-center mb-16">

<h2 class="text-3xl font-bold"
data-aos="fade-up">

Developer Team

</h2>

<p class="text-blue-600 font-semibold mt-2"
data-aos="fade-up"
data-aos-delay="200">

TR1VIUM

</p>

</div>

<div class="grid md:grid-cols-3 gap-10">

<!-- DEV 1 -->
<a href="https://github.com/codebyghiats"
target="_blank"
class="team-card"
data-aos="zoom-in">

<img src="{{ asset('images/dev1.jpg') }}"
class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">

<h3 class="font-semibold">
Ghiats Abdurahman Rasyid
</h3>

<p class="text-sm text-gray-500">
Fullstack Developer
</p>

</a>

<!-- DEV 2 -->
<a href="https://github.com/yuusosleepy"
target="_blank"
class="team-card"
data-aos="zoom-in"
data-aos-delay="200">

<img src="{{ asset('images/dev2.jpg') }}"
class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">

<h3 class="font-semibold">
Yuda Indramaulida
</h3>

<p class="text-sm text-gray-500">
Backend Developer
</p>

</a>

<!-- DEV 3 -->
<a href="https://github.com/muhammadluthfialghifari8-coder"
target="_blank"
class="team-card"
data-aos="zoom-in"
data-aos-delay="400">

<img src="{{ asset('images/dev3.jpg') }}"
class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">

<h3 class="font-semibold">
Muhammad Luthfi Alghifari
</h3>

<p class="text-sm text-gray-500">
UI/UX Designer
</p>

</a>

</div>

</div>
</section>

<<!-- ================= TECHNOLOGY STACK ================= -->
<section class="py-28 bg-white">

    <div class="max-w-6xl mx-auto px-6">

        <!-- Heading -->
        <div class="text-center max-w-2xl mx-auto mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold">
                Technology Stack
            </h2>

            <p class="text-gray-600 mt-4">
                School Planner dibangun menggunakan teknologi modern
                untuk performa yang cepat, aman, dan scalable.
            </p>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

            <!-- Laravel -->
            <div class="tech-card" data-aos="fade-up">
                <img src="https://cdn.simpleicons.org/laravel/FF2D20"
                    class="w-12 h-12"
                    loading="lazy"
                    decoding="async">
            </div>

            <!-- Tailwind -->
            <div class="tech-card" data-aos="fade-up" data-aos-delay="100">
                <img src="https://cdn.simpleicons.org/tailwindcss/06B6D4"
                    class="w-12 h-12"
                    loading="lazy"
                    decoding="async">
            </div>

            <!-- JavaScript -->
            <div class="tech-card" data-aos="fade-up" data-aos-delay="200">
                <img src="https://cdn.simpleicons.org/javascript/F7DF1E"
                    class="w-12 h-12"
                    loading="lazy"
                    decoding="async">
            </div>

            <!-- Supabase -->
            <div class="tech-card" data-aos="fade-up" data-aos-delay="300">
                <img src="https://cdn.simpleicons.org/supabase/3ECF8E"
                    class="w-12 h-12"
                    loading="lazy"
                    decoding="async">
            </div>

            <!-- Vite -->
            <div class="tech-card" data-aos="fade-up" data-aos-delay="400">
                <img src="https://cdn.simpleicons.org/vite/646CFF"
                    class="w-12 h-12"
                    loading="lazy"
                    decoding="async">
            </div>

        </div>

    </div>

</section>

<!-- ================= CTA ================= -->
<section class="py-32 relative overflow-hidden
bg-gradient-to-br from-[#0f1f4b] via-[#162a63] to-[#0b1a3a] text-white">

    <!-- subtle glow -->
    <div class="absolute inset-0 bg-blue-500/10 blur-3xl"></div>

    <div class="relative max-w-4xl mx-auto px-6 text-center"
        data-aos="zoom-in">

        <h2 class="text-4xl md:text-5xl font-bold leading-tight">
            Siap Mengatur Agenda Sekolahmu?
        </h2>

        <p class="mt-6 text-lg text-blue-100 max-w-2xl mx-auto">
            Gunakan School Planner untuk mengelola setiap kegiatan
            dengan lebih terstruktur, efisien, dan profesional.
        </p>

        <div class="mt-10 flex justify-center">

            <a href="{{ route('calendarUser') }}"
            class="px-10 py-4 rounded-2xl
            bg-blue-600 hover:bg-blue-500
            transition-all duration-300
            font-semibold shadow-xl
            hover:-translate-y-1">

                Buka Kalender

            </a>

        </div>

    </div>

</section>

<x-footer></x-footer>

<script>
AOS.init({
duration:1000,
once:true
});
</script>

</body>
</html>