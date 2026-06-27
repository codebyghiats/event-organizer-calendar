<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Contact - School Planner</title>

@vite(['resources/css/app.css','resources/js/app.js'])

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<link rel="icon" href="{{ asset('images/schoolplanner.png') }}">

</head>

<body class="font-sans antialiased text-gray-800 bg-white overflow-x-hidden">

<x-navbar></x-navbar>


<!-- ================= HERO ================= -->
<section class="pt-36 pb-24 bg-gradient-to-b from-blue-50 to-white">

<div class="max-w-6xl mx-auto px-6 text-center">

<h1 class="text-5xl font-extrabold mb-6"
data-aos="fade-up">

Contact
<span class="text-blue-600">TR1VIUM</span>

</h1>

<p class="text-gray-600 text-lg max-w-2xl mx-auto"
data-aos="fade-up"
data-aos-delay="200">

Punya pertanyaan, saran, atau ingin berkolaborasi?
Tim TR1VIUM siap membantu kamu.

</p>

</div>

</section>


<!-- ================= CONTACT SECTION ================= -->
<section class="py-24 bg-white">

<div class="max-w-7xl mx-auto px-6">

<div class="grid md:grid-cols-2 gap-16">


<!-- ================= CONTACT INFO ================= -->
<div>

<h2 class="text-3xl font-bold mb-10"
data-aos="fade-up">

Contact Information

</h2>


<div class="space-y-6">

<!-- Email -->
<div class="about-card"
data-aos="fade-up">

<div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-4">

<svg xmlns="http://www.w3.org/2000/svg"
class="w-6 h-6 text-blue-600"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="1.5"
d="M16 12H8m8 0l-4-4m4 4l-4 4"/>

</svg>

</div>

<h3 class="font-semibold">
Email
</h3>

<p class="text-gray-600 text-sm">
support@tr1vium.com
</p>

</div>


<!-- Phone -->
<div class="about-card"
data-aos="fade-up"
data-aos-delay="150">

<div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center mb-4">

<svg xmlns="http://www.w3.org/2000/svg"
class="w-6 h-6 text-indigo-600"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="1.5"
d="M3 5h2l3 7-1 2a11 11 0 005 5l2-1 7 3v2"/>

</svg>

</div>

<h3 class="font-semibold">
Phone
</h3>

<p class="text-gray-600 text-sm">
+62 812 3456 7890
</p>

</div>


<!-- Location -->
<div class="about-card"
data-aos="fade-up"
data-aos-delay="300">

<div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center mb-4">

<svg xmlns="http://www.w3.org/2000/svg"
class="w-6 h-6 text-blue-700"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="1.5"
d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="1.5"
d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>

</svg>

</div>

<h3 class="font-semibold">
Location
</h3>

<p class="text-gray-600 text-sm">
Indonesia
</p>

</div>

</div>


<!-- SOCIAL -->
<div class="mt-10"
data-aos="fade-up"
data-aos-delay="400">

<h3 class="font-semibold mb-4">
Follow TR1VIUM
</h3>

<div class="flex gap-4">

<a href="#"
class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
Instagram
</a>

<a href="#"
class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
Github
</a>

<a href="#"
class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
LinkedIn
</a>

</div>

</div>

</div>


<!-- ================= CONTACT FORM ================= -->
<div data-aos="fade-left">

<h2 class="text-3xl font-bold mb-10">
Send Message
</h2>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
{{ session('success') }}
</div>

@endif


<form action="{{ route('contact.send') }}" method="POST"
class="space-y-6">

@csrf


<div>

<label class="block mb-2 font-medium">
Name
</label>

<input type="text" name="name"

class="w-full border border-gray-200 rounded-xl px-4 py-3
focus:ring-2 focus:ring-blue-500 focus:outline-none">

</div>


<div>

<label class="block mb-2 font-medium">
Email
</label>

<input type="email" name="email"

class="w-full border border-gray-200 rounded-xl px-4 py-3
focus:ring-2 focus:ring-blue-500 focus:outline-none">

</div>


<div>

<label class="block mb-2 font-medium">
Subject
</label>

<input type="text" name="subject"

class="w-full border border-gray-200 rounded-xl px-4 py-3
focus:ring-2 focus:ring-blue-500 focus:outline-none">

</div>


<div>

<label class="block mb-2 font-medium">
Message
</label>

<textarea name="message" rows="4"

class="w-full border border-gray-200 rounded-xl px-4 py-3
focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>

</div>


<button type="submit"

class="w-full py-4 rounded-xl
bg-blue-600 hover:bg-blue-500
text-white font-semibold
transition-all duration-300
shadow-lg hover:-translate-y-1">

Send Message

</button>


</form>

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

<!-- impeccable-live-start -->
<script src="http://localhost:8400/live.js"></script>
<!-- impeccable-live-end -->
</body>
</html>