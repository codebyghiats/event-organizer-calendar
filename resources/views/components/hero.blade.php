{{-- ================= HERO =================
     Design rules applied:
     - No shimmer/gradient text (DESIGN DON'T)
     - No animated gradient background (DESIGN DON'T)
     - No large blur-3xl decorative orbs (DESIGN DON'T — no hype effects)
     - No float-animation on image (DESIGN DON'T — don't animate image assets on hover)
     - Background: clean #F4F8FF off-white tint
     - Borders separate sections (Border-First Rule)
--}}
<section class="relative overflow-hidden" style="background-color:#F4F8FF; border-bottom: 1px solid #E2E8F0;">

    <div class="max-w-7xl mx-auto px-6 lg:px-8 pb-32" style="padding-top: 200px;">
        <div class="grid md:grid-cols-2 gap-20 items-center">

            <!-- LEFT CONTENT -->
            <div class="text-center md:text-left space-y-8" data-aos="fade-right">

                {{-- Display heading — solid color, text-wrap: balance applied via h1 global rule --}}
                <h1 class="font-black tracking-tight leading-[1.1]"
                    style="font-size: clamp(2rem, 5vw, 3.5rem); color: #0F172A; letter-spacing: -0.02em;">
                    Kelola Semua Agenda Sekolah dalam Satu Platform
                </h1>

                <p class="text-lg max-w-xl mx-auto md:mx-0" style="color: #64748B; line-height: 1.5; max-width: 75ch;">
                    Jadwal Ekstrakurikuler, OSIS &amp; MPK, hingga event besar sekolah —
                    semuanya rapi, jelas, dan tanpa bentrok.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    {{-- Primary CTA — matches ds-btn-primary spec --}}
                    <a href="{{ auth()->check() ? route('dashboard') : route('calendarUser') }}"
                       class="inline-block text-center font-bold text-sm text-white transition-all active:scale-95 hover:opacity-90"
                       style="background-color:#3461DF; border-radius:16px; padding:14px 32px;">
                        Lihat Kalender
                    </a>

                    {{-- Secondary CTA — matches ds-btn-secondary spec --}}
                    <button @click="showLoginModal = true"
                       class="inline-block text-center font-bold text-sm text-white transition-all active:scale-95 cursor-pointer"
                       style="background-color:#0F172A; border-radius:16px; padding:14px 32px;">
                        Masuk Akun
                    </button>
                </div>

                {{-- Feature badges — flat, no gradient --}}
                <div class="flex flex-wrap gap-6 text-sm justify-center md:justify-start mt-6">
                    <span class="flex items-center gap-2 font-semibold" style="color:#64748B;">
                        <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="#3461DF" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        Real-Time Update
                    </span>
                    <span class="flex items-center gap-2 font-semibold" style="color:#64748B;">
                        <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="#3461DF" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l8 4v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z"/>
                        </svg>
                        Tanpa Bentrok
                    </span>
                    <span class="flex items-center gap-2 font-semibold" style="color:#64748B;">
                        <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="#3461DF" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Gratis Digunakan
                    </span>
                </div>

            </div>

            <!-- RIGHT IMAGE — static, no float animation per DESIGN DON'T -->
            <div class="flex justify-center md:justify-end" data-aos="fade-left" data-aos-delay="200">
                <img src="{{ asset('images/hero.png') }}"
                     loading="lazy"
                     decoding="async"
                     class="relative w-[90%] md:w-[105%] lg:w-[115%] object-contain rounded-[2rem]"
                     style="drop-shadow: 0 20px 40px rgba(15,23,42,0.10);"
                     alt="School Planner App">
            </div>

        </div>
    </div>
</section>