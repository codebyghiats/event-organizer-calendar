{{-- ================= TODAY (Hari Ini) =================
     Design rules applied:
     - No border-l-4 side-stripe borders (DESIGN DON'T)
     - Cards: flat white, 1px border #E2E8F0, no heavy shadow at rest
     - Section: solid white, bordered top/bottom
     - Event items: clean grid rows with bottom border dividers (Border-First Rule)
--}}
<section class="py-24" style="background-color:#FFFFFF; border-bottom: 1px solid #E2E8F0;">

    <div class="max-w-7xl mx-auto px-6">

        <!-- Heading -->
        <div class="text-center mb-16 max-w-2xl mx-auto" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl font-bold" style="color:#0F172A;">
                Hari Ini di Sekolah
            </h2>
            <p class="mt-4" style="color:#64748B; font-size:0.875rem; line-height:1.5;">
                Pantau kegiatan hari ini secara cepat dan jelas.
            </p>
        </div>

        <!-- Cards -->
        <div class="grid md:grid-cols-2 gap-10">

            <!-- Card 1 — Agenda Hari Ini -->
            <div data-aos="fade-up"
                 data-aos-delay="200"
                 class="bg-white rounded-3xl p-8 border transition-all duration-500 hover:-translate-y-2"
                 style="border-color:#E2E8F0; box-shadow:0 2px 8px rgba(0,0,0,0.04);"
                 onmouseenter="this.style.boxShadow='0 20px 25px -5px rgba(0,0,0,0.08)'"
                 onmouseleave="this.style.boxShadow='0 2px 8px rgba(0,0,0,0.04)'">

                <h3 class="font-bold mb-6 text-lg" style="color:#0F172A;">Agenda Hari Ini</h3>

                <div class="space-y-0 divide-y" style="border-color:#E2E8F0;">

                    {{-- Event row — no left-stripe border --}}
                    <div class="py-4 flex items-center justify-between">
                        <div>
                            <h4 class="font-semibold text-sm" style="color:#0F172A;">Ekskul Basket</h4>
                            <p class="text-xs mt-0.5" style="color:#64748B;">Extracurricular</p>
                        </div>
                        <span class="text-sm font-semibold tabular-nums" style="color:#3461DF;">15:30</span>
                    </div>

                    <div class="py-4 flex items-center justify-between">
                        <div>
                            <h4 class="font-semibold text-sm" style="color:#0F172A;">Rapat OSIS</h4>
                            <p class="text-xs mt-0.5" style="color:#64748B;">Organisasi</p>
                        </div>
                        <span class="text-sm font-semibold tabular-nums" style="color:#3461DF;">18:00</span>
                    </div>

                </div>
            </div>

            <!-- Card 2 — Event Mendatang -->
            <div data-aos="fade-up"
                 data-aos-delay="400"
                 class="bg-white rounded-3xl p-8 border transition-all duration-500 hover:-translate-y-2"
                 style="border-color:#E2E8F0; box-shadow:0 2px 8px rgba(0,0,0,0.04);"
                 onmouseenter="this.style.boxShadow='0 20px 25px -5px rgba(0,0,0,0.08)'"
                 onmouseleave="this.style.boxShadow='0 2px 8px rgba(0,0,0,0.04)'">

                <h3 class="font-bold mb-6 text-lg" style="color:#0F172A;">Event Mendatang</h3>

                <div class="space-y-0 divide-y" style="border-color:#E2E8F0;">

                    <div class="py-4 flex items-center justify-between">
                        <div>
                            <h4 class="font-semibold text-sm" style="color:#0F172A;">Lomba Pramuka</h4>
                            <p class="text-xs mt-0.5" style="color:#64748B;">Kegiatan Sekolah</p>
                        </div>
                        <span class="text-sm font-semibold tabular-nums" style="color:#3461DF;">08:00</span>
                    </div>

                    <div class="py-4 flex items-center justify-between">
                        <div>
                            <h4 class="font-semibold text-sm" style="color:#0F172A;">Upacara Sekolah</h4>
                            <p class="text-xs mt-0.5" style="color:#64748B;">Kegiatan Sekolah</p>
                        </div>
                        <span class="text-sm font-semibold tabular-nums" style="color:#3461DF;">07:00</span>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>