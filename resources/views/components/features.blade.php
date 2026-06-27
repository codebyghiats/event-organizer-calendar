{{-- ================= FEATURES =================
     Design rules applied:
     - Section background: solid white (#FFFFFF) — no gradient
     - Icon backgrounds: flat, no bg-gradient-to-br (DESIGN DON'T — no hype effects)
     - Icons: solid bg-blue-50/100, single color
     - Border-First Rule: section separated by 1px #E2E8F0 border
     - Heading: solid color, text-wrap:balance
--}}
<section class="py-28" style="background-color:#FFFFFF; border-top: 1px solid #E2E8F0; border-bottom: 1px solid #E2E8F0;">

    <div class="max-w-7xl mx-auto px-6">

        <!-- Heading -->
        <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
            <h2 class="text-4xl font-bold leading-tight" style="color:#0F172A;">
                Kelola Semua Kegiatan Tanpa Ribet
            </h2>
            <p class="mt-5 text-lg" style="color:#64748B; line-height:1.5;">
                Dari ekstrakurikuler hingga event besar sekolah,
                semua terorganisir dalam satu sistem yang terintegrasi.
            </p>
        </div>

        <!-- Feature Grid -->
        <div class="grid md:grid-cols-3 gap-10">

            <!-- Feature 1 -->
            <div data-aos="fade-up"
                 data-aos-delay="100"
                 class="group bg-white p-10 rounded-3xl border border-gray-100
                        transition-all duration-500 hover:-translate-y-2"
                 style="box-shadow:0 2px 8px rgba(0,0,0,0.04);"
                 onmouseenter="this.style.boxShadow='0 20px 25px -5px rgba(0,0,0,0.08),0 8px 10px -6px rgba(0,0,0,0.04)'"
                 onmouseleave="this.style.boxShadow='0 2px 8px rgba(0,0,0,0.04)'">

                {{-- Flat icon bg — no gradient per design rules --}}
                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-6"
                     style="background-color:#EEF4FF;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none"
                         viewBox="0 0 24 24" stroke="#3461DF" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>

                <h3 class="font-bold text-lg mb-3" style="color:#0F172A;">Kalender Terpusat</h3>
                <p style="color:#64748B; font-size:0.875rem; line-height:1.5;">
                    Semua agenda terkumpul dalam satu tampilan yang mudah dipantau.
                </p>

            </div>

            <!-- Feature 2 -->
            <div data-aos="fade-up"
                 data-aos-delay="250"
                 class="group bg-white p-10 rounded-3xl border border-gray-100
                        transition-all duration-500 hover:-translate-y-2"
                 style="box-shadow:0 2px 8px rgba(0,0,0,0.04);"
                 onmouseenter="this.style.boxShadow='0 20px 25px -5px rgba(0,0,0,0.08),0 8px 10px -6px rgba(0,0,0,0.04)'"
                 onmouseleave="this.style.boxShadow='0 2px 8px rgba(0,0,0,0.04)'">

                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-6"
                     style="background-color:#EEF4FF;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none"
                         viewBox="0 0 24 24" stroke="#3461DF" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>

                <h3 class="font-bold text-lg mb-3" style="color:#0F172A;">Update Real-Time</h3>
                <p style="color:#64748B; font-size:0.875rem; line-height:1.5;">
                    Perubahan jadwal langsung terlihat tanpa perlu refresh manual.
                </p>

            </div>

            <!-- Feature 3 -->
            <div data-aos="fade-up"
                 data-aos-delay="400"
                 class="group bg-white p-10 rounded-3xl border border-gray-100
                        transition-all duration-500 hover:-translate-y-2"
                 style="box-shadow:0 2px 8px rgba(0,0,0,0.04);"
                 onmouseenter="this.style.boxShadow='0 20px 25px -5px rgba(0,0,0,0.08),0 8px 10px -6px rgba(0,0,0,0.04)'"
                 onmouseleave="this.style.boxShadow='0 2px 8px rgba(0,0,0,0.04)'">

                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-6"
                     style="background-color:#EEF4FF;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none"
                         viewBox="0 0 24 24" stroke="#3461DF" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 3l8 4v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z"/>
                    </svg>
                </div>

                <h3 class="font-bold text-lg mb-3" style="color:#0F172A;">Minim Bentrok</h3>
                <p style="color:#64748B; font-size:0.875rem; line-height:1.5;">
                    Sistem membantu menghindari jadwal yang bertabrakan.
                </p>

            </div>

        </div>

    </div>
</section>