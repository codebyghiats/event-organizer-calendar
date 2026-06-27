<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - School Planner</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        /* Inter is loaded via app.css/Vite — no duplicate @import needed */
        body { font-family: 'Inter', 'Inter Variable', ui-sans-serif, system-ui, sans-serif; }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col" style="background-color:#F4F8FF;">

    <!-- Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-30 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/schoolplanner.png') }}" alt="School Planner logo" class="h-8">
                <h1 class="text-xl font-bold text-gray-900">Selamat datang, {{ auth()->user()->name }}</h1>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="h-5 w-px bg-gray-300"></div>
                <div class="h-8 w-8 rounded-full flex items-center justify-center text-white text-xs font-bold" style="background-color:#3461DF;" title="{{ auth()->user()->name }}">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="p-2 text-gray-400 hover:text-red-500 transition-colors rounded-lg hover:bg-red-50" aria-label="Keluar">
                        <i class="ri-logout-box-r-line text-xl"></i>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full" x-data="dashboardApp()">
        
        <!-- Alerts (aria-live region so screen readers announce them) -->
        <div aria-live="polite" aria-atomic="true">
            @if(session('success'))
            <div role="alert" class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl mb-8 flex items-start gap-3">
                <i class="ri-checkbox-circle-fill text-xl" aria-hidden="true"></i>
                <div>
                    <h4 class="font-semibold text-sm">Sukses</h4>
                    <p class="text-sm opacity-90">{{ session('success') }}</p>
                </div>
            </div>
            @endif
            
            @if(session('error'))
            <div role="alert" class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl mb-8 flex items-start gap-3">
                <i class="ri-error-warning-fill text-xl" aria-hidden="true"></i>
                <div>
                    <h4 class="font-semibold text-sm">Gagal</h4>
                    <p class="text-sm opacity-90">{{ session('error') }}</p>
                </div>
            </div>
            @endif
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            
            <!-- Kolom Kiri: Daftar Family -->
            <div class="lg:col-span-2 space-y-6">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-gray-900">Unit / Organisasi</h2>
                    <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full rounded-2xl">{{ $userFamilies->count() }} Unit</span>
                </div>

                @if($userFamilies->count() > 0)
                    <div class="grid sm:grid-cols-2 gap-6">
                        @foreach($userFamilies as $family)
                        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden group">
                            
                            <!-- Dekorasi bg if admin -->
                            @if($family->pivot->role === 'admin')
                            <div class="absolute top-0 right-0 w-24 h-24 bg-blue-50 rounded-bl-full -z-0 opacity-50 transition-transform group-hover:scale-110"></div>
                            @endif

                            <div class="relative z-10">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex-1 mr-4">
                                        <h3 class="font-bold text-xl text-gray-900 line-clamp-1">{{ $family->name }}</h3>
                                        <div class="flex items-center gap-2 mt-2">
                                            @php
                                                $roleDisplay = match($family->pivot->role) {
                                                    'admin'       => ['label' => 'Pembina / Admin', 'icon' => 'ri-shield-user-fill',  'class' => 'bg-indigo-50 text-indigo-700 border border-indigo-200'],
                                                    'organisasi'  => ['label' => 'Anggota',          'icon' => 'ri-user-smile-line',  'class' => 'bg-blue-50 text-blue-700 border border-blue-200'],
                                                    default       => ['label' => 'Pemantau',          'icon' => 'ri-eye-line',         'class' => 'bg-gray-100 text-gray-600 border border-gray-200'],
                                                };
                                            @endphp
                                            <span class="text-[10px] uppercase tracking-wider font-bold px-2.5 py-1 rounded-lg {{ $roleDisplay['class'] }}">
                                                <i class="{{ $roleDisplay['icon'] }} mr-1"></i>
                                                {{ $roleDisplay['label'] }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="h-12 w-12 shrink-0 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white shadow-lg shadow-blue-200 font-bold text-xl">
                                        {{ substr($family->name, 0, 1) }}
                                    </div>
                                </div>
                                
                                <p class="text-gray-500 text-sm mb-8 line-clamp-2 min-h-[40px]">{{ $family->description ?? 'Tidak ada deskripsi.' }}</p>
                                
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('calendarOrganisasi', $family->id) }}" class="flex-1 bg-gray-50 hover:bg-gray-100 text-gray-700 text-sm font-semibold py-3 rounded-2xl text-center transition-colors border border-gray-200">
                                        Buka Kalender
                                    </a>
                                    
                                    @if($family->pivot->role === 'admin')
                                        <a href="{{ route('proposals.admin', $family->id) }}" class="flex-1 text-white text-sm font-bold py-3 rounded-2xl text-center transition-colors active:scale-95" style="background-color:#3461DF;" onmouseover="this.style.backgroundColor='#274BC8'" onmouseout="this.style.backgroundColor='#3461DF'">
                                            Review Proposal
                                        </a>
                                        <a href="{{ route('categories.index', $family->id) }}" class="p-3 bg-gray-50 hover:bg-gray-100 text-gray-600 rounded-2xl border border-gray-200 transition-colors flex items-center justify-center" title="Kelola Kategori" aria-label="Kelola Kategori">
                                            <i class="ri-price-tag-3-line"></i>
                                        </a>
                                        <button @click="openInvite('{{ url('/join-family/' . $family->invite_code_organisasi) }}', '{{ url('/join-family/' . $family->invite_code_viewer) }}')" class="bg-gray-50 hover:bg-gray-100 text-gray-600 p-3 rounded-2xl border border-gray-200 transition-colors flex items-center justify-center" aria-label="Undang Anggota">
                                            <i class="ri-user-add-line"></i>
                                        </button>
                                    @else
                                        <a href="{{ route('proposals.user') }}" class="flex-1 text-white text-sm font-bold py-3 rounded-2xl text-center transition-colors active:scale-95" style="background-color:#3461DF;" onmouseover="this.style.backgroundColor='#274BC8'" onmouseout="this.style.backgroundColor='#3461DF'">
                                            Lihat Pengajuan Saya
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white border-2 border-dashed border-gray-200 rounded-[2.5rem] p-16 text-center text-gray-500">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-50 mb-6">
                            <i class="ri-group-line text-4xl text-gray-400"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Belum ada Organisasi.</h3>
                        <p class="text-sm max-w-xs mx-auto">Silakan buat unit organisasi baru atau hubungi admin sekolah untuk link undangan.</p>
                    </div>
                @endif
            </div>

            <!-- Kolom Kanan: Actions -->
            <div class="space-y-6">
                
                <!-- BUAT UNIT -->
                <div class="bg-white rounded-3xl p-8 border border-gray-200" style="box-shadow:0 4px 6px -1px rgba(15,23,42,0.05);">
                    <div class="flex items-center gap-4 mb-5">
                        <div class="p-3 rounded-2xl" style="background-color:#EEF4FF;">
                            <i class="ri-add-circle-line text-2xl" style="color:#3461DF;"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Buat Unit Baru</h3>
                            <p class="text-gray-500 text-xs mt-0.5">Jadikan organisasimu lebih terstruktur.</p>
                        </div>
                    </div>
                    
                    <form action="{{ route('families.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="unit-name" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Nama Unit</label>
                            <input id="unit-name" type="text" name="name" required
                                minlength="3" maxlength="80"
                                placeholder="Contoh: OSIS SMA Nusantara 1"
                                aria-describedby="unit-name-hint"
                                class="w-full border text-sm rounded-2xl px-5 py-3.5 transition-all focus:outline-none" style="background-color:#F9FAFB; border-color:#E2E8F0; color:#0F172A;" onfocus="this.style.borderColor='#79ACFF'; this.style.boxShadow='0 0 0 3px rgba(52,97,223,0.12)'" onblur="this.style.borderColor='#E2E8F0'; this.style.boxShadow='none'">
                            <p id="unit-name-hint" class="text-xs text-gray-400 mt-1">3–80 karakter.</p>
                        </div>
                        <div>
                            <label for="unit-desc" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Deskripsi <span class="font-normal normal-case text-gray-400">(opsional)</span></label>
                            <textarea id="unit-desc" name="description" rows="2" placeholder="Singkat saja — satu kalimat sudah cukup." 
                                class="w-full border text-sm rounded-2xl px-5 py-3.5 transition-all focus:outline-none resize-none" style="background-color:#F9FAFB; border-color:#E2E8F0; color:#0F172A;" onfocus="this.style.borderColor='#79ACFF'; this.style.boxShadow='0 0 0 3px rgba(52,97,223,0.12)'" onblur="this.style.borderColor='#E2E8F0'; this.style.boxShadow='none'"></textarea>
                        </div>
                        <button type="submit" x-bind:disabled="submitting" x-on:click="submitting=true"
                            class="w-full text-white font-bold text-sm py-4 rounded-2xl transition-all active:scale-95 disabled:opacity-60 disabled:cursor-not-allowed"
                            style="background-color:#3461DF;"
                            onmouseover="if(!this.disabled)this.style.backgroundColor='#274BC8'"
                            onmouseout="this.style.backgroundColor='#3461DF'">
                            <span x-show="!submitting">Buat Unit</span>
                            <span x-show="submitting" class="flex items-center justify-center gap-2">
                                <i class="ri-loader-4-line animate-spin" aria-hidden="true"></i> Menyimpan…
                            </span>
                        </button>
                    </form>
                </div>

                <!-- GABUNG UNIT -->
                <div class="bg-white rounded-3xl p-8 border border-gray-200" style="box-shadow:0 4px 6px -1px rgba(15,23,42,0.05);">
                    <div class="flex items-center gap-4 mb-5">
                        <div class="p-3 rounded-2xl" style="background-color:#F4F8FF;">
                            <i class="ri-link text-2xl" style="color:#3461DF;"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Gabung Unit</h3>
                            <p class="text-gray-500 text-xs mt-0.5">Masukkan kode dari Pembina atau Admin.</p>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <label for="join-code" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider">Kode Undangan</label>
                        <input id="join-code" type="text" x-model="joinUrl"
                            placeholder="Contoh: abc123 atau URL undangan"
                            aria-describedby="join-code-error"
                            class="w-full border text-sm rounded-2xl px-5 py-3.5 transition-all focus:outline-none" style="background-color:#F9FAFB; border-color:#E2E8F0; color:#0F172A;" onfocus="this.style.borderColor='#79ACFF'; this.style.boxShadow='0 0 0 3px rgba(52,97,223,0.12)'" onblur="this.style.borderColor='#E2E8F0'; this.style.boxShadow='none'">
                        <p id="join-code-error" x-show="joinError" x-text="joinError" role="alert" class="text-xs text-red-600 flex items-center gap-1"><i class="ri-error-warning-line" aria-hidden="true"></i> <span x-text="joinError"></span></p>
                        <button @click="processJoin()" class="w-full text-white py-4 rounded-2xl transition-all font-bold text-sm active:scale-95" style="background-color:#3461DF;" onmouseover="this.style.backgroundColor='#274BC8'" onmouseout="this.style.backgroundColor='#3461DF'">
                            Gabung Sekarang
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Toast notification (copy feedback) -->
        <div
            x-show="showToast"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed bottom-6 right-6 z-50 flex items-center gap-2 bg-gray-900 text-white text-sm font-semibold px-5 py-3 rounded-2xl shadow-xl"
            role="status" aria-live="polite" style="display:none;"
        >
            <i class="ri-checkbox-circle-fill text-green-400" aria-hidden="true"></i>
            Link berhasil disalin!
        </div>

        <!-- Invite Modal -->
        <div
            x-show="showInviteModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @keydown.window.escape="showInviteModal = false"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm"
            style="display:none;"
            x-cloak
        >
            <div
                @click.away="showInviteModal = false"
                role="dialog"
                aria-modal="true"
                aria-labelledby="invite-modal-title"
                x-trap="showInviteModal"
                class="bg-white p-10 rounded-[2.5rem] shadow-2xl w-full max-w-xl transform transition-all mx-4"
            >
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 id="invite-modal-title" class="text-3xl font-bold text-gray-900">Undang Anggota</h3>
                        <p class="text-gray-500 text-sm mt-1">Bagikan link ini kepada calon anggota unit.</p>
                    </div>
                    <button @click="showInviteModal = false" aria-label="Tutup modal undangan" class="text-gray-400 hover:text-gray-900 transition-colors p-2 bg-gray-50 rounded-xl">
                        <i class="ri-close-line text-2xl" aria-hidden="true"></i>
                    </button>
                </div>

                <div class="space-y-8">
                    <!-- Organisasi Link -->
                    <div class="bg-gray-50 rounded-3xl p-6 border border-gray-100">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="text-[10px] uppercase tracking-wider font-black px-3 py-1 rounded-full border" style="background-color:#EEF4FF; color:#3461DF; border-color:#B8D9FF;">Anggota Organisasi</span>
                            <span class="text-xs text-gray-500 font-medium">Dapat mengelola jadwal.</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <input type="text" readonly :value="activeLinks.org"
                                aria-label="Link undangan anggota organisasi"
                                class="flex-1 bg-white border border-gray-200 text-xs rounded-xl px-4 py-3 text-gray-600 font-mono focus:outline-none min-w-0">
                            <button @click="copy(activeLinks.org)" class="shrink-0 bg-gray-900 text-white px-5 py-3 rounded-xl hover:bg-gray-800 transition flex items-center gap-2 text-xs font-bold">
                                <i class="ri-file-copy-line" aria-hidden="true"></i> Salin
                            </button>
                        </div>
                    </div>

                    <!-- Viewer Link -->
                    <div class="bg-gray-50 rounded-3xl p-6 border border-gray-100">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="bg-gray-200 text-gray-700 text-[10px] uppercase tracking-wider font-black px-3 py-1 rounded-full border border-gray-300">Pemantau</span>
                            <span class="text-xs text-gray-500 font-medium">Hanya dapat memantau kalender.</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <input type="text" readonly :value="activeLinks.viewer"
                                aria-label="Link undangan pemantau"
                                class="flex-1 bg-white border border-gray-200 text-xs rounded-xl px-4 py-3 text-gray-600 font-mono focus:outline-none min-w-0">
                            <button @click="copy(activeLinks.viewer)" class="shrink-0 bg-gray-900 text-white px-5 py-3 rounded-xl hover:bg-gray-800 transition flex items-center gap-2 text-xs font-bold">
                                <i class="ri-file-copy-line" aria-hidden="true"></i> Salin
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </main>

    <script>
        function dashboardApp() {
            return {
                showInviteModal: false,
                showToast: false,
                toastTimer: null,
                activeLinks: {
                    org: '',
                    viewer: ''
                },
                joinUrl: '',
                joinError: '',
                submitting: false,

                openInvite(orgLink, viewerLink) {
                    this.activeLinks.org = orgLink;
                    this.activeLinks.viewer = viewerLink;
                    this.showInviteModal = true;
                },

                copy(text) {
                    navigator.clipboard.writeText(text).then(() => {
                        // Show inline toast instead of blocking alert()
                        clearTimeout(this.toastTimer);
                        this.showToast = true;
                        this.toastTimer = setTimeout(() => { this.showToast = false; }, 2500);
                    }).catch(() => {
                        // Fallback for browsers without clipboard API
                        const el = document.createElement('textarea');
                        el.value = text;
                        el.style.position = 'fixed'; el.style.opacity = '0';
                        document.body.appendChild(el);
                        el.select();
                        document.execCommand('copy');
                        document.body.removeChild(el);
                        this.showToast = true;
                        this.toastTimer = setTimeout(() => { this.showToast = false; }, 2500);
                    });
                },

                processJoin() {
                    this.joinError = '';
                    const val = this.joinUrl.trim();

                    if (!val) {
                        this.joinError = 'Masukkan kode undangan atau URL terlebih dahulu.';
                        document.getElementById('join-code').focus();
                        return;
                    }

                    // Accept either a bare invite code (alphanumeric/hyphens) or a full URL
                    const isUrl = val.startsWith('http://') || val.startsWith('https://');
                    const isCode = /^[a-zA-Z0-9\-_]{4,64}$/.test(val);

                    if (!isUrl && !isCode) {
                        this.joinError = 'Format tidak dikenali. Gunakan kode undangan (misal: abc123) atau URL lengkap.';
                        document.getElementById('join-code').focus();
                        return;
                    }

                    const finalUrl = isUrl ? val : '/join-family/' + val;
                    window.location.href = finalUrl;
                }
            }
        }
    </script>
<!-- impeccable-live-start -->
<script src="http://localhost:8400/live.js"></script>
<!-- impeccable-live-end -->
</body>
</html>
