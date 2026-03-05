<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard - School Planner</title>

@vite(['resources/css/app.css','resources/js/app.js'])

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<link rel="icon" href="{{ asset('images/schoolplanner.png') }}">

</head>


<body class="font-sans antialiased text-gray-800 bg-white overflow-x-hidden">

<x-navbar></x-navbar>

<!-- ================= HERO ================= -->

<section class="pt-36 pb-24 bg-white">

<div class="max-w-7xl mx-auto px-6 text-center">

<h1 class="text-5xl font-extrabold mb-6"
data-aos="fade-up">

Welcome Back,
<span class="text-blue-600">
{{ auth()->user()->name }}
</span>

</h1>

<p class="text-gray-600 text-lg max-w-2xl mx-auto"
data-aos="fade-up"
data-aos-delay="200">

Kelola family, organisasi, dan agenda kegiatan sekolah
melalui dashboard School Planner.

</p>

</div>

</section>


<!-- ================= MAIN MENU ================= -->

<section class="py-24 bg-blue-50">

<div class="max-w-7xl mx-auto px-6">

<div class="grid md:grid-cols-3 gap-10">

<!-- FAMILY -->

<a href="#"
class="dashboard-card"
data-aos="zoom-in">

<div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">

<svg xmlns="http://www.w3.org/2000/svg"
class="w-8 h-8 text-blue-600"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="1.5"
d="M17 20h5V4H2v16h5"/>

</svg>

</div>

<h3 class="text-xl font-semibold mb-2">
Family Management
</h3>

<p class="text-gray-600 text-sm">
Buat atau kelola family sekolahmu dan undang anggota organisasi.
</p>

</a>


<!-- CALENDAR -->

<a href="{{ route('calendarUser') }}"
class="dashboard-card"
data-aos="zoom-in"
data-aos-delay="200">

<div class="w-16 h-16 bg-indigo-100 rounded-xl flex items-center justify-center mb-6">

<svg xmlns="http://www.w3.org/2000/svg"
class="w-8 h-8 text-indigo-600"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="1.5"
d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>

</svg>

</div>

<h3 class="text-xl font-semibold mb-2">
School Calendar
</h3>

<p class="text-gray-600 text-sm">
Lihat agenda kegiatan sekolah dan kelola event organisasi.
</p>

</a>


<!-- ORGANIZATION -->

<a href="#"
class="dashboard-card"
data-aos="zoom-in"
data-aos-delay="400">

<div class="w-16 h-16 bg-blue-50 rounded-xl flex items-center justify-center mb-6">

<svg xmlns="http://www.w3.org/2000/svg"
class="w-8 h-8 text-blue-700"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="1.5"
d="M12 14l9-5-9-5-9 5 9 5z"/>

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="1.5"
d="M12 14l6.16-3.422A12.083 12.083 0 0112 20.055a12.083 12.083 0 01-6.16-9.477L12 14z"/>

</svg>

</div>

<h3 class="text-xl font-semibold mb-2">
Organization Panel
</h3>

<p class="text-gray-600 text-sm">
Ajukan proposal kegiatan atau kelola jadwal ekskul rutin.
</p>

</a>


</div>

</div>

</section>


<!-- ================= QUICK STATS ================= -->

<section class="py-24 bg-white">

<div class="max-w-7xl mx-auto px-6">

<div class="text-center mb-16">

<h2 class="text-3xl font-bold"
data-aos="fade-up">

Overview

</h2>

<p class="text-gray-600 mt-4"
data-aos="fade-up"
data-aos-delay="200">

Ringkasan aktivitas School Planner kamu.

</p>

</div>


<div class="grid md:grid-cols-3 gap-10">

<div class="stats-card"
data-aos="fade-up">

<h3 class="text-3xl font-bold text-blue-600">
12
</h3>

<p class="text-gray-600 mt-2">
Total Events
</p>

</div>


<div class="stats-card"
data-aos="fade-up"
data-aos-delay="200">

<h3 class="text-3xl font-bold text-blue-600">
4
</h3>

<p class="text-gray-600 mt-2">
Organizations
</p>

</div>


<div class="stats-card"
data-aos="fade-up"
data-aos-delay="400">

<h3 class="text-3xl font-bold text-blue-600">
2
</h3>

<p class="text-gray-600 mt-2">
Pending Proposals
</p>

</div>

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