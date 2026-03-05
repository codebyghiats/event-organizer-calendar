<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - School Planner</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-effect {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #dbeafe 100%);
        }
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 8px;
        }
        .event-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            display: inline-block;
            margin: 0 1px;
        }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="gradient-bg min-h-screen text-slate-800">

    <!-- Sidebar -->
    <aside class="fixed left-0 top-0 h-full w-64 bg-white border-r border-slate-200 z-50 hidden lg:block">
        <div class="p-6">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white">
                    <i data-lucide="calendar-check" class="w-6 h-6"></i>
                </div>
                <span class="font-bold text-xl text-slate-900">School Planner</span>
            </div>

            <nav class="space-y-2">
                <a href="#" class="flex items-center gap-3 px-4 py-3 bg-blue-50 text-blue-600 rounded-xl font-semibold">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    Dashboard
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 rounded-xl font-medium transition-colors">
                    <i data-lucide="calendar" class="w-5 h-5"></i>
                    Kalender
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 rounded-xl font-medium transition-colors">
                    <i data-lucide="users" class="w-5 h-5"></i>
                    Organisasi
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 rounded-xl font-medium transition-colors">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                    Notifikasi
                    <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">3</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 rounded-xl font-medium transition-colors">
                    <i data-lucide="settings" class="w-5 h-5"></i>
                    Pengaturan
                </a>
            </nav>
        </div>

        <div class="absolute bottom-0 left-0 right-0 p-6 border-t border-slate-200">
            <div class="flex items-center gap-3">
                <img src="https://i.pravatar.cc/150?img=11" alt="User" class="w-10 h-10 rounded-full border-2 border-blue-100">
                <div class="flex-1">
                    <p class="font-semibold text-sm text-slate-900">Ahmad Rizky</p>
                    <p class="text-xs text-slate-500">Admin OSIS</p>
                </div>
                <button class="text-slate-400 hover:text-slate-600">
                    <i data-lucide="log-out" class="w-5 h-5"></i>
                </button>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="lg:ml-64 min-h-screen">
        <!-- Top Navigation -->
        <header class="sticky top-0 z-40 glass-effect border-b border-slate-200 px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4 lg:hidden">
                    <button class="p-2 hover:bg-slate-100 rounded-lg">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                    <span class="font-bold text-lg">Dashboard</span>
                </div>
                
                <div class="hidden lg:flex items-center gap-4 flex-1 max-w-xl">
                    <div class="relative flex-1">
                        <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>
                        <input type="text" placeholder="Cari event, jadwal, atau organisasi..." 
                               class="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button class="p-2 hover:bg-slate-100 rounded-xl relative">
                        <i data-lucide="bell" class="w-5 h-5 text-slate-600"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <button class="p-2 hover:bg-slate-100 rounded-xl">
                        <i data-lucide="plus" class="w-5 h-5 text-slate-600"></i>
                    </button>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="p-6 max-w-7xl mx-auto space-y-6">
            
            <!-- Welcome Section -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-500 rounded-3xl p-8 text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/10 rounded-full translate-y-1/2 -translate-x-1/2"></div>
                
                <div class="relative z-10">
                    <p class="text-blue-100 font-medium mb-2">Selamat Datang Kembali! 👋</p>
                    <h1 class="text-3xl lg:text-4xl font-bold mb-4">Ahmad Rizky</h1>
                    <p class="text-blue-100 max-w-xl mb-6">Kamu memiliki 3 event minggu ini dan 2 tugas yang perlu dikonfirmasi. Jadwal OSIS hari ini pukul 15:00 WIB.</p>
                    
                    <div class="flex flex-wrap gap-3">
                        <button class="px-6 py-3 bg-white text-blue-600 rounded-xl font-semibold hover:bg-blue-50 transition-colors flex items-center gap-2">
                            <i data-lucide="plus-circle" class="w-5 h-5"></i>
                            Buat Event Baru
                        </button>
                        <button class="px-6 py-3 bg-blue-700/50 text-white rounded-xl font-semibold hover:bg-blue-700 transition-colors flex items-center gap-2">
                            <i data-lucide="calendar" class="w-5 h-5"></i>
                            Lihat Jadwal
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-orange-100 rounded-xl">
                            <i data-lucide="trophy" class="w-6 h-6 text-orange-600"></i>
                        </div>
                        <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">+2 minggu ini</span>
                    </div>
                    <p class="text-slate-500 text-sm font-medium mb-1">Event Aktif</p>
                    <p class="text-2xl font-bold text-slate-900">12 Event</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-blue-100 rounded-xl">
                            <i data-lucide="users" class="w-6 h-6 text-blue-600"></i>
                        </div>
                        <span class="text-xs font-medium text-slate-500 bg-slate-100 px-2 py-1 rounded-full">Aktif</span>
                    </div>
                    <p class="text-slate-500 text-sm font-medium mb-1">Organisasi</p>
                    <p class="text-2xl font-bold text-slate-900">3 Organisasi</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-purple-100 rounded-xl">
                            <i data-lucide="check-circle" class="w-6 h-6 text-purple-600"></i>
                        </div>
                        <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">95%</span>
                    </div>
                    <p class="text-slate-500 text-sm font-medium mb-1">Konfirmasi Kehadiran</p>
                    <p class="text-2xl font-bold text-slate-900">28/30</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-green-100 rounded-xl">
                            <i data-lucide="clock" class="w-6 h-6 text-green-600"></i>
                        </div>
                        <span class="text-xs font-medium text-orange-600 bg-orange-50 px-2 py-1 rounded-full">Hari Ini</span>
                    </div>
                    <p class="text-slate-500 text-sm font-medium mb-1">Jam Terisi</p>
                    <p class="text-2xl font-bold text-slate-900">6.5 Jam</p>
                </div>
            </div>

            <!-- Main Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <!-- Calendar Section -->
                <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-xl font-bold text-slate-900">Kalender Event</h2>
                            <p class="text-slate-500 text-sm mt-1">September 2026</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button class="p-2 hover:bg-slate-100 rounded-lg">
                                <i data-lucide="chevron-left" class="w-5 h-5 text-slate-600"></i>
                            </button>
                            <button class="px-4 py-2 bg-blue-50 text-blue-600 rounded-lg font-medium text-sm">Bulan</button>
                            <button class="p-2 hover:bg-slate-100 rounded-lg">
                                <i data-lucide="chevron-right" class="w-5 h-5 text-slate-600"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Calendar Header -->
                    <div class="grid grid-cols-7 gap-2 mb-2">
                        <div class="text-center text-xs font-semibold text-slate-500 py-2">MIN</div>
                        <div class="text-center text-xs font-semibold text-slate-500 py-2">SEN</div>
                        <div class="text-center text-xs font-semibold text-slate-500 py-2">SEL</div>
                        <div class="text-center text-xs font-semibold text-slate-500 py-2">RAB</div>
                        <div class="text-center text-xs font-semibold text-slate-500 py-2">KAM</div>
                        <div class="text-center text-xs font-semibold text-slate-500 py-2">JUM</div>
                        <div class="text-center text-xs font-semibold text-slate-500 py-2">SAB</div>
                    </div>

                    <!-- Calendar Days -->
                    <div class="calendar-grid" id="calendar">
                        <!-- Generated by JS -->
                    </div>

                    <!-- Filter Tags -->
                    <div class="flex flex-wrap gap-2 mt-6 pt-6 border-t border-slate-100">
                        <span class="text-sm font-medium text-slate-600 mr-2">Filter:</span>
                        <button class="px-3 py-1.5 bg-orange-100 text-orange-700 rounded-lg text-xs font-medium flex items-center gap-1.5">
                            <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                            Ekstrakurikuler
                        </button>
                        <button class="px-3 py-1.5 bg-blue-100 text-blue-700 rounded-lg text-xs font-medium flex items-center gap-1.5">
                            <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                            OSIS
                        </button>
                        <button class="px-3 py-1.5 bg-cyan-100 text-cyan-700 rounded-lg text-xs font-medium flex items-center gap-1.5">
                            <span class="w-2 h-2 bg-cyan-500 rounded-full"></span>
                            MPK
                        </button>
                        <button class="px-3 py-1.5 bg-slate-100 text-slate-600 rounded-lg text-xs font-medium flex items-center gap-1.5">
                            <span class="w-2 h-2 bg-slate-400 rounded-full"></span>
                            Sekolah
                        </button>
                    </div>
                </div>

                <!-- Upcoming Events -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-slate-900">Event Mendatang</h2>
                        <button class="text-blue-600 text-sm font-medium hover:underline">Lihat Semua</button>
                    </div>

                    <div class="space-y-4">
                        <!-- Event Item 1 -->
                        <div class="flex gap-4 p-4 bg-gradient-to-r from-orange-50 to-transparent rounded-xl border-l-4 border-orange-500">
                            <div class="flex-shrink-0 text-center">
                                <p class="text-xs font-bold text-orange-600 uppercase">SEP</p>
                                <p class="text-2xl font-bold text-slate-900">12</p>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-slate-900 mb-1">Latihan Futsal</h3>
                                <p class="text-sm text-slate-500 mb-2">15:00 - 17:00 WIB</p>
                                <div class="flex items-center gap-2">
                                    <span class="px-2 py-1 bg-orange-100 text-orange-700 text-xs rounded-md font-medium">Ekstrakurikuler</span>
                                </div>
                            </div>
                        </div>

                        <!-- Event Item 2 -->
                        <div class="flex gap-4 p-4 bg-gradient-to-r from-blue-50 to-transparent rounded-xl border-l-4 border-blue-500">
                            <div class="flex-shrink-0 text-center">
                                <p class="text-xs font-bold text-blue-600 uppercase">SEP</p>
                                <p class="text-2xl font-bold text-slate-900">15</p>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-slate-900 mb-1">Rapat OSIS</h3>
                                <p class="text-sm text-slate-500 mb-2">15:00 - 16:30 WIB</p>
                                <div class="flex items-center gap-2">
                                    <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded-md font-medium">OSIS</span>
                                    <span class="text-xs text-slate-400">• Ruang Aula</span>
                                </div>
                            </div>
                        </div>

                        <!-- Event Item 3 -->
                        <div class="flex gap-4 p-4 bg-gradient-to-r from-cyan-50 to-transparent rounded-xl border-l-4 border-cyan-500">
                            <div class="flex-shrink-0 text-center">
                                <p class="text-xs font-bold text-cyan-600 uppercase">SEP</p>
                                <p class="text-2xl font-bold text-slate-900">18</p>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-slate-900 mb-1">Musyawarah MPK</h3>
                                <p class="text-sm text-slate-500 mb-2">13:00 - 15:00 WIB</p>
                                <div class="flex items-center gap-2">
                                    <span class="px-2 py-1 bg-cyan-100 text-cyan-700 text-xs rounded-md font-medium">MPK</span>
                                </div>
                            </div>
                        </div>

                        <!-- Event Item 4 -->
                        <div class="flex gap-4 p-4 bg-gradient-to-r from-slate-50 to-transparent rounded-xl border-l-4 border-slate-400">
                            <div class="flex-shrink-0 text-center">
                                <p class="text-xs font-bold text-slate-500 uppercase">SEP</p>
                                <p class="text-2xl font-bold text-slate-900">20</p>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-slate-900 mb-1">Upacara Bendera</h3>
                                <p class="text-sm text-slate-500 mb-2">07:00 - 08:00 WIB</p>
                                <div class="flex items-center gap-2">
                                    <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs rounded-md font-medium">Sekolah</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="w-full mt-6 py-3 border-2 border-dashed border-slate-300 rounded-xl text-slate-500 font-medium hover:border-blue-400 hover:text-blue-600 transition-colors flex items-center justify-center gap-2">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                        Tambah Event
                    </button>
                </div>
            </div>

            <!-- Bottom Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- My Organizations -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-slate-900">Organisasi Saya</h2>
                        <button class="p-2 hover:bg-slate-100 rounded-lg">
                            <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-400"></i>
                        </button>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl hover:bg-slate-100 transition-colors cursor-pointer">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold text-lg">OS</div>
                                <div>
                                    <h3 class="font-bold text-slate-900">OSIS</h3>
                                    <p class="text-sm text-slate-500">Organisasi Siswa Intra Sekolah</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-slate-900">5 Event</p>
                                <p class="text-xs text-slate-500">Bulan ini</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl hover:bg-slate-100 transition-colors cursor-pointer">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-cyan-600 rounded-xl flex items-center justify-center text-white font-bold text-lg">MP</div>
                                <div>
                                    <h3 class="font-bold text-slate-900">MPK</h3>
                                    <p class="text-sm text-slate-500">Majelis Perwakilan Kelas</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-slate-900">3 Event</p>
                                <p class="text-xs text-slate-500">Bulan ini</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl hover:bg-slate-100 transition-colors cursor-pointer">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-orange-600 rounded-xl flex items-center justify-center text-white font-bold text-lg">FS</div>
                                <div>
                                    <h3 class="font-bold text-slate-900">Futsal</h3>
                                    <p class="text-sm text-slate-500">Ekstrakurikuler Futsal</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-slate-900">4 Event</p>
                                <p class="text-xs text-slate-500">Bulan ini</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-slate-900">Aksi Cepat</h2>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <button class="p-6 bg-blue-50 rounded-2xl hover:bg-blue-100 transition-colors text-left group">
                            <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center text-white mb-4 group-hover:scale-110 transition-transform">
                                <i data-lucide="calendar-plus" class="w-6 h-6"></i>
                            </div>
                            <h3 class="font-bold text-slate-900 mb-1">Buat Event</h3>
                            <p class="text-sm text-slate-500">Tambah jadwal baru</p>
                        </button>

                        <button class="p-6 bg-orange-50 rounded-2xl hover:bg-orange-100 transition-colors text-left group">
                            <div class="w-12 h-12 bg-orange-600 rounded-xl flex items-center justify-center text-white mb-4 group-hover:scale-110 transition-transform">
                                <i data-lucide="user-plus" class="w-6 h-6"></i>
                            </div>
                            <h3 class="font-bold text-slate-900 mb-1">Undang Anggota</h3>
                            <p class="text-sm text-slate-500">Tambah ke organisasi</p>
                        </button>

                        <button class="p-6 bg-purple-50 rounded-2xl hover:bg-purple-100 transition-colors text-left group">
                            <div class="w-12 h-12 bg-purple-600 rounded-xl flex items-center justify-center text-white mb-4 group-hover:scale-110 transition-transform">
                                <i data-lucide="file-text" class="w-6 h-6"></i>
                            </div>
                            <h3 class="font-bold text-slate-900 mb-1">Laporan</h3>
                            <p class="text-sm text-slate-500">Unduh rekap kegiatan</p>
                        </button>

                        <button class="p-6 bg-green-50 rounded-2xl hover:bg-green-100 transition-colors text-left group">
                            <div class="w-12 h-12 bg-green-600 rounded-xl flex items-center justify-center text-white mb-4 group-hover:scale-110 transition-transform">
                                <i data-lucide="share-2" class="w-6 h-6"></i>
                            </div>
                            <h3 class="font-bold text-slate-900 mb-1">Bagikan</h3>
                            <p class="text-sm text-slate-500">Share ke sosial media</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Generate Calendar
        const calendar = document.getElementById('calendar');
        const daysInMonth = 30;
        const startDay = 2; // Tuesday
        
        // Empty cells for start of month
        for (let i = 0; i < startDay; i++) {
            const emptyCell = document.createElement('div');
            emptyCell.className = 'h-24 rounded-xl bg-slate-50/50';
            calendar.appendChild(emptyCell);
        }

        // Days with events
        const events = {
            5: [{type: 'orange', count: 1}],
            8: [{type: 'blue', count: 1}],
            12: [{type: 'orange', count: 2}],
            15: [{type: 'blue', count: 1}, {type: 'cyan', count: 1}],
            18: [{type: 'cyan', count: 1}],
            20: [{type: 'slate', count: 1}],
            22: [{type: 'orange', count: 1}, {type: 'blue', count: 1}],
            25: [{type: 'blue', count: 2}],
            28: [{type: 'cyan', count: 1}]
        };

        const today = 8;

        for (let day = 1; day <= daysInMonth; day++) {
            const cell = document.createElement('div');
            cell.className = `h-24 rounded-xl border border-slate-100 p-2 cursor-pointer hover:border-blue-300 hover:shadow-md transition-all ${day === today ? 'bg-blue-50 border-blue-200' : 'bg-white'}`;
            
            let eventDots = '';
            if (events[day]) {
                eventDots = '<div class="flex gap-1 mt-2 flex-wrap">';
                events[day].forEach(event => {
                    const colors = {
                        orange: 'bg-orange-500',
                        blue: 'bg-blue-500',
                        cyan: 'bg-cyan-500',
                        slate: 'bg-slate-400'
                    };
                    for (let i = 0; i < event.count; i++) {
                        eventDots += `<span class="event-dot ${colors[event.type]}"></span>`;
                    }
                });
                eventDots += '</div>';
            }

            cell.innerHTML = `
                <div class="flex justify-between items-start">
                    <span class="text-sm font-semibold ${day === today ? 'text-blue-600' : 'text-slate-700'}">${day}</span>
                    ${day === today ? '<span class="text-[10px] font-bold text-blue-600 bg-blue-100 px-1.5 py-0.5 rounded">Hari Ini</span>' : ''}
                </div>
                ${eventDots}
            `;
            
            calendar.appendChild(cell);
        }
    </script>
</body>
</html>