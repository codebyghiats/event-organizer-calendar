<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Planner - Kelola Agenda Sekolah</title>
    <meta name="description" content="School Planner adalah platform manajemen agenda sekolah untuk OSIS, MPK, Ekstrakurikuler, dan Event Sekolah secara terstruktur.">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('images/schoolplanner.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/schoolplanner.png') }}">
</head>

{{-- Design: body bg #F4F8FF (Off-White Tint / neutral-bg) --}}
<body class="font-sans antialiased overflow-x-hidden"
      style="background-color:#F4F8FF; color:#0F172A;"
      x-data="{ showLoginModal: {{ $errors->any() ? 'true' : 'false' }} }"
      :class="{ 'overflow-hidden': showLoginModal }">

<x-navbar></x-navbar>

<x-hero></x-hero>

<x-today></x-today>

<x-features></x-features>

<x-cta></x-cta>

<x-footer></x-footer>

<!-- ================= LOGIN MODAL =================
     Design rules applied:
     - Modal bg: solid white (#FFFFFF), border-radius 32px
     - No backdrop blur on panel (DESIGN DON'T — no glassmorphic panel blurs)
     - Overlay: black/60 backdrop
     - Inputs: ds-input spec (bg #F9FAFB, border #E2E8F0, rounded 16px)
     - Labels: uppercase tracking eyebrow (OK here — input headers)
     - Primary button: #3461DF, rounded 16px
-->
<div x-show="showLoginModal"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     style="display: none;"
     class="fixed inset-0 z-[100] flex items-center justify-center"
     style="background-color:rgba(15,23,42,0.6);"
     x-cloak>

    <div @click.away="showLoginModal = false"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="w-full max-w-md mx-4 relative"
         style="background-color:#FFFFFF;
                border-radius:32px;
                border:1px solid #E2E8F0;
                padding:40px;
                box-shadow:0 25px 50px -12px rgba(15,23,42,0.15);">

        <!-- Close button -->
        <button @click="showLoginModal = false"
                class="absolute top-6 right-6 transition-colors p-2 rounded-xl"
                style="color:#64748B; background-color:#F9FAFB;"
                onmouseover="this.style.color='#0F172A'"
                onmouseout="this.style.color='#64748B'">
            <i class="ri-close-line text-2xl"></i>
        </button>

        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl mb-4"
                 style="background-color:#EEF4FF;">
                <i class="ri-user-smile-fill text-2xl" style="color:#3461DF;"></i>
            </div>
            <h1 class="text-2xl font-bold" style="color:#0F172A;">Selamat Datang</h1>
            <p class="text-sm mt-1" style="color:#64748B;">Masuk ke akunmu untuk mengelola kalender event.</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 px-4 py-3 rounded-xl text-sm"
                 style="background-color:#FEF2F2; color:#DC2626; border:1px solid #FECACA;">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email"
                       class="block text-xs font-bold uppercase tracking-widest mb-2"
                       style="color:#64748B;">Email Address</label>
                <input type="email" name="email" id="email"
                       value="{{ old('email') }}"
                       required autofocus
                       placeholder="nama@email.com"
                       class="w-full outline-none transition-all"
                       style="background-color:#F9FAFB; border:1px solid #E2E8F0; border-radius:16px;
                              padding:14px 20px; font-size:0.875rem; color:#0F172A;"
                       onfocus="this.style.borderColor='#79ACFF'; this.style.boxShadow='0 0 0 4px rgba(52,97,223,0.1)'"
                       onblur="this.style.borderColor='#E2E8F0'; this.style.boxShadow='none'">
            </div>

            <!-- Password -->
            <div>
                <label for="password"
                       class="block text-xs font-bold uppercase tracking-widest mb-2"
                       style="color:#64748B;">Password</label>
                <input type="password" name="password" id="password"
                       required
                       placeholder="••••••••"
                       class="w-full outline-none transition-all"
                       style="background-color:#F9FAFB; border:1px solid #E2E8F0; border-radius:16px;
                              padding:14px 20px; font-size:0.875rem; color:#0F172A;"
                       onfocus="this.style.borderColor='#79ACFF'; this.style.boxShadow='0 0 0 4px rgba(52,97,223,0.1)'"
                       onblur="this.style.borderColor='#E2E8F0'; this.style.boxShadow='none'">
            </div>

            <!-- Remember me -->
            <div class="flex items-center">
                <input id="remember" name="remember" type="checkbox"
                       class="h-4 w-4 rounded cursor-pointer"
                       style="accent-color:#3461DF;">
                <label for="remember" class="ml-2 text-sm font-medium cursor-pointer"
                       style="color:#64748B;">
                    Ingat Saya
                </label>
            </div>

            <!-- Submit -->
            <button type="submit"
                    class="w-full text-white font-bold text-sm transition-all active:scale-95"
                    style="background-color:#3461DF; border-radius:16px; padding:16px; border:none; cursor:pointer;"
                    onmouseover="this.style.backgroundColor='#274BC8'"
                    onmouseout="this.style.backgroundColor='#3461DF'">
                Masuk Sekarang
            </button>
        </form>

        <p class="mt-8 text-center text-sm" style="color:#64748B;">
            Belum punya akun?
            <a href="{{ route('register') }}"
               class="font-bold transition-colors"
               style="color:#3461DF;"
               onmouseover="this.style.color='#274BC8'"
               onmouseout="this.style.color='#3461DF'">Daftar sekarang</a>
        </p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 800,
            once: true,
            offset: 80
        });
    });
</script>

<!-- impeccable-live-start -->
<script src="http://localhost:8400/live.js"></script>
<!-- impeccable-live-end -->
</body>
</html>