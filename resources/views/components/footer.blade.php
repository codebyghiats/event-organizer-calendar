{{-- ================= FOOTER =================
     Design rules applied:
     - Background: solid dark slate #0F172A (Ink Primary)
     - No gradients, no glow effects
     - Border dividers use 1px #1E293B (subtle dark border — Border-First Rule)
     - Text: #94A3B8 (slate secondary), headings #FFFFFF
     - Links: hover to #FFFFFF transition
--}}
<footer style="background-color:#0F172A; color:#94A3B8;">

    <div class="max-w-7xl mx-auto px-6 py-14">
        <div class="grid md:grid-cols-3 gap-10">

            <!-- BRAND -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('images/schoolplanner.png') }}"
                         alt="School Planner Logo"
                         class="h-8 w-auto">
                    <h2 class="text-xl font-black" style="color:#FFFFFF;">School Planner</h2>
                </div>
                <p class="text-sm leading-relaxed" style="color:#64748B; max-width:40ch;">
                    Platform manajemen agenda sekolah untuk mengatur jadwal
                    OSIS, MPK, Ekstrakurikuler, dan Event Sekolah secara rapi dan profesional.
                </p>
            </div>

            <!-- NAVIGATION -->
            <div>
                <h3 class="font-bold mb-5 text-sm" style="color:#FFFFFF;">Navigasi</h3>
                <ul class="space-y-3 text-sm">
                    <li>
                        <a href="/" class="transition-colors flex items-center gap-2 font-medium"
                           style="color:#64748B;"
                           onmouseover="this.style.color='#FFFFFF'"
                           onmouseout="this.style.color='#64748B'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.25 12l8.954-8.955a1.125 1.125 0 011.591 0L21.75 12M4.5 9.75V19.5a.75.75 0 00.75.75H9.75v-6h4.5v6h4.5a.75.75 0 00.75-.75V9.75"/>
                            </svg>
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('calendarUser') }}" class="transition-colors flex items-center gap-2 font-medium"
                           style="color:#64748B;"
                           onmouseover="this.style.color='#FFFFFF'"
                           onmouseout="this.style.color='#64748B'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6.75 3v2.25M17.25 3v2.25M3 8.25h18M4.5 6.75h15a1.5 1.5 0 011.5 1.5v10.5a1.5 1.5 0 01-1.5 1.5h-15a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5z"/>
                            </svg>
                            Kalender
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="transition-colors flex items-center gap-2 font-medium"
                           style="color:#64748B;"
                           onmouseover="this.style.color='#FFFFFF'"
                           onmouseout="this.style.color='#64748B'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                            </svg>
                            Tentang
                        </a>
                    </li>
                </ul>
            </div>

            <!-- DEVELOPERS -->
            <div>
                <h3 class="font-bold mb-5 text-sm" style="color:#FFFFFF;">Tim Developer</h3>
                <ul class="space-y-3 text-sm">

                    <!-- Developer 1 -->
                    <li>
                        <a href="https://github.com/codebyghiats" target="_blank"
                           class="transition-colors flex items-center gap-2 font-medium group"
                           style="color:#64748B;"
                           onmouseover="this.style.color='#FFFFFF'"
                           onmouseout="this.style.color='#64748B'">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 shrink-0">
                                <path fill-rule="evenodd"
                                      d="M12 2C6.477 2 2 6.486 2 12.021c0 4.426 2.865 8.18
                                      6.839 9.504.5.092.682-.217.682-.483
                                      0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.344-3.369-1.344
                                      -.455-1.157-1.111-1.466-1.111-1.466-.909-.62.069-.608.069-.608
                                      1.004.071 1.532 1.033 1.532 1.033.893 1.53 2.341 1.088
                                      2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951
                                      0-1.093.39-1.987 1.029-2.687-.103-.253-.446-1.272.098-2.65
                                      0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004
                                      1.705.115 2.504.337 1.909-1.296 2.748-1.026
                                      2.748-1.026.546 1.378.203 2.397.1 2.65.64.7
                                      1.028 1.594 1.028 2.687 0 3.848-2.338 4.695-4.566
                                      4.944.359.31.678.921.678 1.855 0 1.338-.012
                                      2.419-.012 2.747 0 .268.18.579.688.481A10.025
                                      10.025 0 0022 12.021C22 6.486 17.523 2 12 2z"
                                      clip-rule="evenodd"/>
                            </svg>
                            Ghiats Abdurahman Rasyid
                        </a>
                    </li>

                    <!-- Developer 2 -->
                    <li>
                        <a href="https://github.com/yuusosleepy" target="_blank"
                           class="transition-colors flex items-center gap-2 font-medium"
                           style="color:#64748B;"
                           onmouseover="this.style.color='#FFFFFF'"
                           onmouseout="this.style.color='#64748B'">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 shrink-0">
                                <path fill-rule="evenodd"
                                      d="M12 2C6.477 2 2 6.486 2 12.021c0 4.426 2.865 8.18
                                      6.839 9.504.5.092.682-.217.682-.483
                                      0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.344-3.369-1.344
                                      -.455-1.157-1.111-1.466-1.111-1.466-.909-.62.069-.608.069-.608
                                      1.004.071 1.532 1.033 1.532 1.033.893 1.53 2.341 1.088
                                      2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951
                                      0-1.093.39-1.987 1.029-2.687-.103-.253-.446-1.272.098-2.65
                                      0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004
                                      1.705.115 2.504.337 1.909-1.296 2.748-1.026
                                      2.748-1.026.546 1.378.203 2.397.1 2.65.64.7
                                      1.028 1.594 1.028 2.687 0 3.848-2.338 4.695-4.566
                                      4.944.359.31.678.921.678 1.855 0 1.338-.012
                                      2.419-.012 2.747 0 .268.18.579.688.481A10.025
                                      10.025 0 0022 12.021C22 6.486 17.523 2 12 2z"
                                      clip-rule="evenodd"/>
                            </svg>
                            Yuda Indramaulida
                        </a>
                    </li>

                    <!-- Developer 3 -->
                    <li>
                        <a href="https://github.com/muhammadluthfialghifari8-coder" target="_blank"
                           class="transition-colors flex items-center gap-2 font-medium"
                           style="color:#64748B;"
                           onmouseover="this.style.color='#FFFFFF'"
                           onmouseout="this.style.color='#64748B'">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 shrink-0">
                                <path fill-rule="evenodd"
                                      d="M12 2C6.477 2 2 6.486 2 12.021c0 4.426 2.865 8.18
                                      6.839 9.504.5.092.682-.217.682-.483
                                      0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.344-3.369-1.344
                                      -.455-1.157-1.111-1.466-1.111-1.466-.909-.62.069-.608.069-.608
                                      1.004.071 1.532 1.033 1.532 1.033.893 1.53 2.341 1.088
                                      2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951
                                      0-1.093.39-1.987 1.029-2.687-.103-.253-.446-1.272.098-2.65
                                      0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004
                                      1.705.115 2.504.337 1.909-1.296 2.748-1.026
                                      2.748-1.026.546 1.378.203 2.397.1 2.65.64.7
                                      1.028 1.594 1.028 2.687 0 3.848-2.338 4.695-4.566
                                      4.944.359.31.678.921.678 1.855 0 1.338-.012
                                      2.419-.012 2.747 0 .268.18.579.688.481A10.025
                                      10.025 0 0022 12.021C22 6.486 17.523 2 12 2z"
                                      clip-rule="evenodd"/>
                            </svg>
                            Muhammad Luthfi Alghifari
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <!-- BOTTOM -->
        <div class="mt-12 pt-6 text-center text-sm" style="border-top:1px solid #1E293B; color:#475569;">
            TR1VIUM © {{ date('Y') }} School Planner. All rights reserved.
        </div>
    </div>
</footer>