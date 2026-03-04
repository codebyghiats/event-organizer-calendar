<!-- ================= HERO ================= -->
<section class="relative animated-bg overflow-hidden">

    <!-- Background Blur -->
    <div class="absolute -top-40 -right-40 w-[500px] h-[500px] bg-blue-400/30 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-40 -left-40 w-[500px] h-[500px] bg-indigo-400/30 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 pt-30 pb-36">
        <div class="grid md:grid-cols-2 gap-20 items-center">

            <!-- LEFT CONTENT -->
            <div class="text-center md:text-left space-y-8">

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-[1.1] animate-fadeUp animate-delay-1">
                    Kelola Semua Agenda
                <span class="shimmer-text">Sekolah</span>
                    dalam Satu Platform
                </h1>

                <p class="text-lg text-gray-600 max-w-xl mx-auto md:mx-0 animate-fadeUp animate-delay-2">
                    Jadwal Ekstrakurikuler, OSIS & MPK, hingga event besar sekolah —
                    semuanya rapi, jelas, dan tanpa bentrok.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start animate-fadeUp animate-delay-3">
                    <a href="{{ route('calendarUser') }}"
                       class="px-8 py-4 rounded-2xl bg-blue-600 text-white font-semibold
                       shadow-lg shadow-blue-300/40 hover:shadow-blue-400/60
                       hover:-translate-y-1 transition-all duration-300 text-center">
                        Lihat Kalender
                    </a>

                    <a href="#"
                       class="px-8 py-4 rounded-2xl border border-gray-300
                       text-gray-700 font-semibold hover:bg-gray-100
                       transition-all duration-300 text-center">
                        Masuk Akun
                    </a>
                </div>

                <div class="flex flex-wrap gap-6 text-sm text-gray-500 justify-center md:justify-start mt-6 animate-fadeUp animate-delay-4">
                    <span>✔ Real-Time Update</span>
                    <span>✔ Tanpa Bentrok</span>
                    <span>✔ Gratis Digunakan</span>
                </div>

            </div>

            <!-- RIGHT IMAGE -->
            <div class="flex justify-center md:justify-end animate-fadeUp animate-delay-3">
                <img src="{{ asset('images/hero.png') }}"
                    loading="lazy"
                    decoding="async"
                    class="w-[90%] md:w-[110%] lg:w-[120%] rounded-2xl object-contain drop-shadow-2xl float-animation"
                    alt="School Planner App">
            </div>

        </div>
    </div>
</section>