<!-- ================= CTA ================= -->
<section class="py-32 relative overflow-hidden bg-slate-900 text-white">

    <!-- Gradient Glow -->
    <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 via-indigo-600/20 to-blue-600/20 blur-3xl"></div>

    <div class="relative max-w-4xl mx-auto px-6 text-center"
        data-aos="zoom-in">

        <h2 class="text-4xl md:text-5xl font-bold leading-tight">
            Siap Mengatur Agenda Sekolahmu?
        </h2>

        <p class="mt-6 text-lg text-slate-300 max-w-2xl mx-auto">
            Gunakan School Planner untuk mengelola setiap kegiatan
            dengan lebih terstruktur, efisien, dan profesional.
        </p>

        <div class="mt-10 flex flex-col sm:flex-row gap-5 justify-center">

            <a href="{{ route('kalender.public') }}"
            class="px-10 py-4 rounded-2xl bg-blue-600 
            hover:bg-blue-500 transition-all duration-300
            font-semibold shadow-xl hover:-translate-y-1">
                Buka Kalender
            </a>

            <a href="{{ route('about') }}"
            class="px-10 py-4 rounded-2xl border border-white/30 
            hover:bg-white/10 transition-all duration-300
            font-semibold">
                Pelajari Lebih Lanjut
            </a>

        </div>

    </div>
</section>