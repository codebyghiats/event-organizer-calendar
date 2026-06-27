{{-- ================= CTA =================
     Design rules applied:
     - No blur-3xl glow overlay (DESIGN DON'T — no hype effects)
     - Background: solid dark slate #0F172A (design text-primary color)
     - No gradient background (DESIGN DON'T)
     - Buttons: ds-btn-primary and plain border outline variant
--}}
<section class="py-32" style="background-color:#0F172A; border-top: 1px solid #1E293B;">

    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">

        <h2 class="text-4xl md:text-5xl font-bold leading-tight" style="color:#FFFFFF;">
            Siap Mengatur Agenda Sekolahmu?
        </h2>

        <p class="mt-6 text-lg max-w-2xl mx-auto" style="color:#94A3B8; line-height:1.5;">
            Gunakan School Planner untuk mengelola setiap kegiatan
            dengan lebih terstruktur, efisien, dan profesional.
        </p>

        <div class="mt-10 flex flex-col sm:flex-row gap-5 justify-center">

            {{-- Primary button — Academic Royal Blue --}}
            <a href="{{ route('calendarUser') }}"
               class="font-bold text-sm text-white transition-all active:scale-95"
               style="background-color:#3461DF; border-radius:16px; padding:14px 32px; display:inline-block;"
               onmouseover="this.style.backgroundColor='#274BC8'"
               onmouseout="this.style.backgroundColor='#3461DF'">
                Buka Kalender
            </a>

            {{-- Secondary outline — clean border, no glass blur --}}
            <a href="{{ route('about') }}"
               class="font-bold text-sm transition-all"
               style="border:1px solid rgba(255,255,255,0.2); border-radius:16px; padding:14px 32px; display:inline-block; color:#FFFFFF;"
               onmouseover="this.style.backgroundColor='rgba(255,255,255,0.08)'"
               onmouseout="this.style.backgroundColor='transparent'">
                Pelajari Lebih Lanjut
            </a>

        </div>

    </div>

</section>