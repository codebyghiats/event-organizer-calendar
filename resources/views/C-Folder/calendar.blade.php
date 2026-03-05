<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender Event Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
        
        /* Custom Scrollbar untuk Sidebar */
        .sidebar-scroll::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar-scroll::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb:hover {
            background: #a1a1a1;
        }
    </style>
</head>


<body class="bg-gray-50 text-gray-800 h-screen overflow-hidden flex" x-data="calendarApp()">

<!-- Tambahkan di atas <body> atau dalam <main> -->
<nav class="bg-white border-b border-gray-200 px-6 py-3">
    <div class="flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-blue-600 hover:underline">← Kembali ke Home</a>
        
        @guest
            <div>
                <a href="{{ route('login') }}" class="text-gray-600 mr-4">Login</a>
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Register</a>
            </div>
        @else
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-600">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-sm text-red-500 hover:underline">Logout</button>
                </form>
            </div>
        @endguest
    </div>
</nav>

    <!-- Sidebar dengan Scroll -->
    <aside class="w-72 bg-white border-r border-gray-200 flex flex-col h-full shrink-0">
        <!-- Sidebar Header (Fixed) -->
        <div class="p-6 border-b border-gray-100 shrink-0">
            <img src="https://image.qwenlm.ai/public_source/f4224662-668e-41d9-9573-63ccb28b5dea/12c75979d-1049-45f2-aa20-ac7a72a5a683.png" alt="Logo" class="h-12 object-contain mb-2">
            <h2 class="font-bold text-gray-900">Kalender Sekolah</h2>
            <p class="text-xs text-gray-500">Tahun Ajaran 2025/2026</p>
        </div>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-y-auto sidebar-scroll">
            <!-- Mini Calendar -->
            <div class="p-4">
                <!-- Month/Year Navigation -->
                <div class="flex items-center justify-between mb-4">
                    <button @click="changeMiniMonth(-1)" class="p-1.5 hover:bg-gray-100 rounded-lg text-gray-600 transition-colors">
                        <i class="ri-arrow-left-s-line"></i>
                    </button>
                    <div class="flex items-center space-x-2">
                        <select x-model="miniMonth" @change="updateMiniDate()" class="text-sm font-semibold text-gray-700 bg-transparent border-none focus:ring-0 cursor-pointer">
                            <template x-for="(month, index) in monthNames" :key="index">
                                <option :value="index" x-text="month"></option>
                            </template>
                        </select>
                        <select x-model="miniYear" @change="updateMiniDate()" class="text-sm font-semibold text-gray-700 bg-transparent border-none focus:ring-0 cursor-pointer">
                            <template x-for="year in yearRange" :key="year">
                                <option :value="year" x-text="year"></option>
                            </template>
                        </select>
                    </div>
                    <button @click="changeMiniMonth(1)" class="p-1.5 hover:bg-gray-100 rounded-lg text-gray-600 transition-colors">
                        <i class="ri-arrow-right-s-line"></i>
                    </button>
                </div>

                <!-- Today Button -->
                <button @click="goToToday()" class="w-full mb-3 py-1.5 text-xs font-medium text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors">
                    Hari Ini
                </button>

                <!-- Day Headers -->
                <div class="grid grid-cols-7 gap-1 text-center text-xs text-gray-400 mb-2">
                    <div>Min</div><div>Sen</div><div>Sel</div><div>Rab</div><div>Kam</div><div>Jum</div><div>Sab</div>
                </div>

                <!-- Calendar Days -->
                <div class="grid grid-cols-7 gap-1 text-center text-sm">
                    <template x-for="day in getMiniCalendarDays()">
                        <button 
                            @click="selectDate(day)"
                            class="h-8 w-8 flex items-center justify-center rounded-full transition-all duration-200"
                            :class="{
                                'bg-blue-600 text-white shadow-md scale-110': isSelected(day),
                                'text-gray-900 hover:bg-gray-100': !isSelected(day) && day.currentMonth,
                                'text-gray-300': !day.currentMonth,
                                'bg-red-50 text-red-600': isTodayDate(day.fullDate) && !isSelected(day)
                            }"
                            x-text="day.date"></button>
                    </template>
                </div>
            </div>

            <!-- Filters Section -->
            <div class="px-6 py-4 border-t border-gray-100">
                <h3 class="font-semibold text-sm text-gray-900 mb-3">Filter</h3>
                <div class="space-y-3">
                    <label class="flex items-center space-x-3 cursor-pointer group">
                        <div class="relative flex items-center">
                            <input type="checkbox" x-model="filters.ekstrakulikuler" class="peer sr-only">
                            <div class="w-4 h-4 border border-gray-300 rounded bg-white peer-checked:bg-orange-500 peer-checked:border-orange-500 transition-colors"></div>
                            <i class="ri-checkbox-check-line absolute text-white text-xs opacity-0 peer-checked:opacity-100 left-0.5 top-0.5 pointer-events-none"></i>
                        </div>
                        <span class="text-sm text-gray-600 group-hover:text-gray-900">Ekstrakulikuler</span>
                    </label>
                    <label class="flex items-center space-x-3 cursor-pointer group">
                        <div class="relative flex items-center">
                            <input type="checkbox" x-model="filters.osis" class="peer sr-only">
                            <div class="w-4 h-4 border border-gray-300 rounded bg-white peer-checked:bg-blue-600 peer-checked:border-blue-600 transition-colors"></div>
                            <i class="ri-checkbox-check-line absolute text-white text-xs opacity-0 peer-checked:opacity-100 left-0.5 top-0.5 pointer-events-none"></i>
                        </div>
                        <span class="text-sm text-gray-600 group-hover:text-gray-900">OSIS</span>
                    </label>
                    <label class="flex items-center space-x-3 cursor-pointer group">
                        <div class="relative flex items-center">
                            <input type="checkbox" x-model="filters.mpk" class="peer sr-only">
                            <div class="w-4 h-4 border border-gray-300 rounded bg-white peer-checked:bg-blue-500 peer-checked:border-blue-500 transition-colors"></div>
                            <i class="ri-checkbox-check-line absolute text-white text-xs opacity-0 peer-checked:opacity-100 left-0.5 top-0.5 pointer-events-none"></i>
                        </div>
                        <span class="text-sm text-gray-600 group-hover:text-gray-900">MPK</span>
                    </label>
                    
                    <!-- Additional Filters (untuk demo scroll) -->
                    <label class="flex items-center space-x-3 cursor-pointer group">
                        <div class="relative flex items-center">
                            <input type="checkbox" x-model="filters.sekolah" class="peer sr-only">
                            <div class="w-4 h-4 border border-gray-300 rounded bg-white peer-checked:bg-purple-500 peer-checked:border-purple-500 transition-colors"></div>
                            <i class="ri-checkbox-check-line absolute text-white text-xs opacity-0 peer-checked:opacity-100 left-0.5 top-0.5 pointer-events-none"></i>
                        </div>
                        <span class="text-sm text-gray-600 group-hover:text-gray-900">Sekolah</span>
                    </label>
                </div>
            </div>

            <!-- Additional Info Section (untuk demo scroll) -->
            <div class="px-6 py-4 border-t border-gray-100">
                <h3 class="font-semibold text-sm text-gray-900 mb-3">Info Kalender</h3>
                <div class="space-y-2 text-xs text-gray-500">
                    <div class="flex items-center justify-between">
                        <span>Total Event</span>
                        <span class="font-medium text-gray-700">-</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span>Bulan Ini</span>
                        <span class="font-medium text-gray-700">-</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span>Minggu Ini</span>
                        <span class="font-medium text-gray-700">-</span>
                    </div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-full overflow-hidden bg-white">
        <!-- Header -->
        <header class="h-20 border-b border-gray-200 flex items-center justify-between px-8 shrink-0">
            <div class="flex items-center space-x-4">
                <h1 class="text-2xl font-medium text-gray-900">Kalender Event Sekolah</h1>
            </div>
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition-colors shadow-sm flex items-center gap-2">
                <i class="ri-add-line"></i> Tambahkan Event
            </button>
        </header>

        <!-- Calendar Controls -->
        <div class="px-8 py-4 flex items-center justify-between shrink-0">
            <div class="flex items-center space-x-2">
                <button @click="goToToday()" class="px-3 py-1.5 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-md border border-transparent hover:border-gray-200 transition-all">Hari ini</button>
                <div class="flex items-center bg-gray-50 rounded-md border border-gray-200 ml-2">
                    <button @click="navigatePeriod(-1)" class="p-1.5 hover:bg-gray-200 rounded-l-md text-gray-500 transition-colors">
                        <i class="ri-arrow-left-s-line"></i>
                    </button>
                    <div class="h-4 w-px bg-gray-300 mx-1"></div>
                    <button @click="navigatePeriod(1)" class="p-1.5 hover:bg-gray-200 rounded-r-md text-gray-500 transition-colors">
                        <i class="ri-arrow-right-s-line"></i>
                    </button>
                </div>
                <h2 class="text-lg font-medium text-gray-900 ml-4" x-text="currentPeriodLabel"></h2>
            </div>

            <div class="flex items-center bg-gray-100 p-1 rounded-lg">
                <button @click="setView('bulan')" :class="currentView === 'bulan' ? 'bg-white shadow text-gray-900' : 'text-gray-500 hover:text-gray-900'" class="px-4 py-1.5 text-sm font-medium rounded-md transition-all">Bulan</button>
                <button @click="setView('minggu')" :class="currentView === 'minggu' ? 'bg-white shadow text-gray-900' : 'text-gray-500 hover:text-gray-900'" class="px-4 py-1.5 text-sm font-medium rounded-md transition-all">Minggu</button>
                <button @click="setView('agenda')" :class="currentView === 'agenda' ? 'bg-white shadow text-gray-900' : 'text-gray-500 hover:text-gray-900'" class="px-4 py-1.5 text-sm font-medium rounded-md transition-all">Agenda</button>
                <button class="p-1.5 text-gray-500 hover:text-gray-900 ml-2">
                    <i class="ri-more-2-fill"></i>
                </button>
            </div>
        </div>

        <!-- MONTH VIEW -->
        <div x-show="currentView === 'bulan'" class="flex-1 overflow-y-auto px-8 pb-8" x-cloak>
            <div class="grid grid-cols-7 border-b border-gray-200 pb-2 mb-2">
                <template x-for="dayName in dayNamesShort">
                    <div class="text-center text-xs font-medium text-gray-500 uppercase" x-text="dayName"></div>
                </template>
            </div>
            <div class="grid grid-cols-7 gap-px bg-gray-200 border border-gray-200 rounded-lg overflow-hidden">
                <template x-for="day in getMonthViewDays()">
                    <div 
                        @click="selectDate(day)"
                        class="bg-white min-h-[100px] p-2 cursor-pointer hover:bg-gray-50 transition-colors"
                        :class="{
                            'bg-blue-50': isSelected(day),
                            'opacity-40': !day.currentMonth
                        }">
                        <div class="flex items-center justify-between mb-1">
                            <span 
                                class="text-sm font-medium w-7 h-7 flex items-center justify-center rounded-full"
                                :class="{
                                    'bg-blue-600 text-white': isTodayDate(day.fullDate),
                                    'text-gray-900': !isTodayDate(day.fullDate)
                                }"
                                x-text="day.date"></span>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- WEEK VIEW -->
        <div x-show="currentView === 'minggu'" class="flex-1 overflow-y-auto px-8 pb-8" x-cloak>
            <div class="grid grid-cols-8 border-b border-gray-200 pb-2 mb-2">
                <div class="col-span-1"></div>
                <template x-for="day in weekDays" :key="day.date.getTime()">
                    <div class="col-span-1 text-center border-l border-gray-100 pl-2">
                        <div class="text-xs font-medium text-gray-500 uppercase mb-1" x-text="getDayName(day.date)"></div>
                        <div class="text-xl font-semibold" 
                             :class="isTodayDate(day.date) ? 'bg-blue-600 text-white w-8 h-8 flex items-center justify-center rounded-full mx-auto' : 'text-gray-900'" 
                             x-text="getDayNumber(day.date)"></div>
                    </div>
                </template>
            </div>

            <div class="grid grid-cols-8 relative" style="height: 1200px;">
                <div class="col-span-1 border-r border-gray-100">
                    <template x-for="hour in 24" :key="hour">
                        <div class="h-[50px] text-xs text-gray-400 text-right pr-2 -mt-2.5 relative">
                            <span x-text="formatHour(hour)"></span>
                        </div>
                    </template>
                </div>

                <template x-for="(day, index) in weekDays" :key="index">
                    <div class="col-span-1 border-r border-gray-100 relative group hover:bg-gray-50 transition-colors">
                        <template x-for="hour in 24" :key="hour">
                            <div class="h-[50px] border-b border-gray-50 w-full absolute" :style="`top: ${(hour-1) * 50}px`"></div>
                        </template>
                        
                        <div x-show="isTodayDate(day.date)" class="absolute w-full border-t-2 border-red-500 z-10" style="top: 450px;">
                            <div class="w-2 h-2 bg-red-500 rounded-full -mt-[5px] -ml-1"></div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- AGENDA VIEW -->
        <div x-show="currentView === 'agenda'" class="flex-1 overflow-y-auto px-8 pb-8" x-cloak>
            <div class="max-w-3xl mx-auto">
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="ri-calendar-check-line text-4xl text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum Ada Event</h3>
                    <p class="text-gray-500 mb-6">Tidak ada event yang dijadwalkan untuk periode ini</p>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-lg text-sm font-medium transition-colors shadow-sm flex items-center gap-2 mx-auto">
                        <i class="ri-add-line"></i> Tambahkan Event Pertama
                    </button>
                </div>
            </div>
        </div>
    </main>

    <script>
        function calendarApp() {
            return {
                currentView: 'minggu',
                currentDate: new Date(2026, 8, 9),
                miniMonth: 8,
                miniYear: 2025,
                dayNamesShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                filters: {
                    ekstrakulikuler: true,
                    osis: true,
                    mpk: true,
                    akademik: false,
                    lomba: false,
                    libur: false
                },
                
                get yearRange() {
                    const currentYear = new Date().getFullYear();
                    const years = [];
                    for (let i = currentYear - 2; i <= currentYear + 10; i++) {
                        years.push(i);
                    }
                    return years;
                },

                get weekDays() {
                    const startOfWeek = new Date(this.currentDate);
                    const day = startOfWeek.getDay();
                    const diff = startOfWeek.getDate() - day + (day === 0 ? -6 : 1);
                    startOfWeek.setDate(diff);
                    startOfWeek.setHours(0, 0, 0, 0);
                    
                    const days = [];
                    for (let i = 0; i < 7; i++) {
                        const d = new Date(startOfWeek);
                        d.setDate(startOfWeek.getDate() + i);
                        days.push({ date: new Date(d) });
                    }
                    return days;
                },

                get currentPeriodLabel() {
                    if (this.currentView === 'bulan') {
                        return `${this.monthNames[this.miniMonth]} ${this.miniYear}`;
                    } else if (this.currentView === 'minggu') {
                        const start = this.weekDays[0].date;
                        const end = this.weekDays[6].date;
                        return `${start.getDate()} - ${end.getDate()} ${start.toLocaleString('id-ID', { month: 'short' })} ${start.getFullYear()}`;
                    } else {
                        return `${this.monthNames[this.miniMonth]} ${this.miniYear}`;
                    }
                },

                getMiniCalendarDays() {
                    const year = this.miniYear;
                    const month = this.miniMonth;
                    
                    const firstDayOfMonth = new Date(year, month, 1);
                    const lastDayOfMonth = new Date(year, month + 1, 0);
                    const daysInMonth = lastDayOfMonth.getDate();
                    const startingDay = firstDayOfMonth.getDay();

                    const days = [];
                    
                    const prevMonthLastDay = new Date(year, month, 0).getDate();
                    for (let i = startingDay - 1; i >= 0; i--) {
                        const d = new Date(year, month - 1, prevMonthLastDay - i);
                        days.push({
                            date: prevMonthLastDay - i,
                            currentMonth: false,
                            fullDate: d
                        });
                    }

                    for (let i = 1; i <= daysInMonth; i++) {
                        const d = new Date(year, month, i);
                        days.push({
                            date: i,
                            currentMonth: true,
                            fullDate: d
                        });
                    }

                    const remaining = 42 - days.length;
                    for (let i = 1; i <= remaining; i++) {
                        const d = new Date(year, month + 1, i);
                        days.push({
                            date: i,
                            currentMonth: false,
                            fullDate: d
                        });
                    }

                    return days;
                },

                getMonthViewDays() {
                    return this.getMiniCalendarDays();
                },

                getAgendaDays() {
                    if (this.currentView === 'minggu') {
                        return this.weekDays;
                    } else {
                        return this.getMiniCalendarDays().filter(d => d.currentMonth);
                    }
                },

                updateMiniDate() {
                    this.miniMonth = parseInt(this.miniMonth);
                    this.miniYear = parseInt(this.miniYear);
                },

                setView(view) {
                    this.currentView = view;
                    if (view === 'bulan' || view === 'agenda') {
                        this.miniMonth = this.currentDate.getMonth();
                        this.miniYear = this.currentDate.getFullYear();
                    }
                },

                navigatePeriod(delta) {
                    if (this.currentView === 'minggu') {
                        this.currentDate.setDate(this.currentDate.getDate() + (delta * 7));
                    } else if (this.currentView === 'bulan') {
                        this.miniMonth += delta;
                        if (this.miniMonth < 0) {
                            this.miniMonth = 11;
                            this.miniYear--;
                        } else if (this.miniMonth > 11) {
                            this.miniMonth = 0;
                            this.miniYear++;
                        }
                        this.currentDate = new Date(this.miniYear, this.miniMonth, 1);
                    } else {
                        this.miniMonth += delta;
                        if (this.miniMonth < 0) {
                            this.miniMonth = 11;
                            this.miniYear--;
                        } else if (this.miniMonth > 11) {
                            this.miniMonth = 0;
                            this.miniYear++;
                        }
                    }
                    
                    const currentYear = new Date().getFullYear();
                    if (this.miniYear < currentYear - 2 || this.miniYear > currentYear + 10) {
                        this.miniYear = currentYear;
                        this.miniMonth = new Date().getMonth();
                    }
                },

                changeMiniMonth(delta) {
                    let newMonth = this.miniMonth + delta;
                    let newYear = this.miniYear;
                    
                    if (newMonth < 0) {
                        newMonth = 11;
                        newYear--;
                    } else if (newMonth > 11) {
                        newMonth = 0;
                        newYear++;
                    }
                    
                    const currentYear = new Date().getFullYear();
                    if (newYear >= currentYear - 2 && newYear <= currentYear + 10) {
                        this.miniMonth = newMonth;
                        this.miniYear = newYear;
                    }
                },

                selectDate(dayObj) {
                    this.currentDate = new Date(dayObj.fullDate);
                    this.miniMonth = dayObj.fullDate.getMonth();
                    this.miniYear = dayObj.fullDate.getFullYear();
                },

                isSelected(dayObj) {
                    return dayObj.fullDate.toDateString() === this.currentDate.toDateString();
                },

                goToToday() {
                    const today = new Date();
                    this.currentDate = new Date(today);
                    this.miniMonth = today.getMonth();
                    this.miniYear = today.getFullYear();
                },

                getDayName(date) {
                    return date.toLocaleString('id-ID', { weekday: 'short' }).replace('.', '');
                },

                getDayNumber(date) {
                    return date.getDate();
                },

                isTodayDate(date) {
                    const today = new Date();
                    return date.getDate() === today.getDate() &&
                           date.getMonth() === today.getMonth() &&
                           date.getFullYear() === today.getFullYear();
                },

                formatHour(hour) {
                    return `${hour.toString().padStart(2, '0')}:00`;
                },

                formatFullDate(date) {
                    const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
                    return date.toLocaleString('id-ID', options);
                }
            }
        }
    </script>
</body>
</html>