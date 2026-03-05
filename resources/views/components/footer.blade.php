<!-- ================= FOOTER ================= -->
<!-- FOOTER -->
<footer class="bg-slate-900 text-slate-300">
    
    <div class="max-w-7xl mx-auto px-6 py-14">
        <div class="grid md:grid-cols-3 gap-10">

            <!-- BRAND -->
            <div>
                <h2 class="text-2xl font-bold text-white border-b-4 p-2">School Planner</h2>
                <p class="mt-4 text-slate-400 text-sm leading-relaxed">
                    <span class="font-semibold text-white">Platform manajemen agenda sekolah</span> untuk mengatur jadwal
                    OSIS, MPK, Ekstrakurikuler, dan Event Sekolah secara rapi dan profesional.
                </p>
            </div>

            <!-- NAVIGATION -->
            <div>
                <h3 class="text-white font-semibold mb-4 border-b-4 p-2">Navigasi</h3>
                <ul class="space-y-3 text-sm">
                    <li>
                        <a href="/" class="hover:text-white transition flex items-center gap-2">
                            <!-- Home Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                class="w-4 h-4" fill="none" viewBox="0 0 24 24" 
                                stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                    d="M2.25 12l8.954-8.955a1.125 1.125 0 011.591 0L21.75 12M4.5 9.75V19.5a.75.75 0 00.75.75H9.75v-6h4.5v6h4.5a.75.75 0 00.75-.75V9.75" />
                            </svg>
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kalender.public') }}" class="hover:text-white transition flex items-center gap-2">
                            <!-- Calendar Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                class="w-4 h-4" fill="none" viewBox="0 0 24 24" 
                                stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                    d="M6.75 3v2.25M17.25 3v2.25M3 8.25h18M4.5 6.75h15a1.5 1.5 0 011.5 1.5v10.5a1.5 1.5 0 01-1.5 1.5h-15a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5z" />
                            </svg>
                            Kalender
                        </a>
                    </li>
                </ul>
            </div>

            <!-- DEVELOPERS -->
            <div>
                <h3 class="text-white font-semibold mb-4 border-b-4 p-2">Tim Developer</h3>
                <ul class="space-y-3 text-sm">

                    <!-- Developer 1 -->
                    <li>
                        <a href="https://github.com/codebyghiats" target="_blank"
                           class="hover:text-white transition flex items-center gap-2 group">
                            
                            <!-- GitHub Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                viewBox="0 0 24 24" 
                                fill="currentColor" 
                                class="w-4 h-4 group-hover:text-white">
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
                                    clip-rule="evenodd" />
                            </svg>

                            Ghiats Abdurahman Rasyid
                        </a>
                    </li>

                    <!-- Developer 2 -->
                    <li>
                        <a href="https://github.com/yuusosleepy" target="_blank"
                           class="hover:text-white transition flex items-center gap-2 group">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                viewBox="0 0 24 24" 
                                fill="currentColor" 
                                class="w-4 h-4 group-hover:text-white">
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
                                    clip-rule="evenodd" />
                            </svg>
                            Yuda Indramaulida
                        </a>
                    </li>
                    <!-- Developer 3 -->
                    <li>
                        <a href="https://github.com/muhammadluthfialghifari8-coder" target="_blank"
                           class="hover:text-white transition flex items-center gap-2 group">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                viewBox="0 0 24 24" 
                                fill="currentColor" 
                                class="w-4 h-4 group-hover:text-white">
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
                                    clip-rule="evenodd" />
                            </svg>
                            Muhammad Luthfi Alghifari
                        </a>
                    </li>
                                
                </ul>
            </div>
        </div>

        <!-- BOTTOM -->
        <div class="border-t border-slate-700 mt-12 pt-6 text-center text-sm text-slate-500">
           <span class="font-semibold text-white">TR1VIUM</span> © {{ date('Y') }} School Planner |  All rights reserved.
        </div>
    </div>
</footer>