<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - School Planner</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/heroicons@2.0.18/outline/heroicons.js"></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <link rel="icon" type="image/png" href="{{ asset('images/schoolplanner.png') }}">
</head>

<body class="font-sans antialiased text-gray-800 bg-background overflow-x-hidden">

    <!-- Navbar (pakai component yang sama) -->
    <x-navbar></x-navbar>

    <!-- Page Header -->
    <section class="py-16 px-4 animated-bg" data-aos="fade-down">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl font-bold text-text-primary shimmer-text">
                Dashboard
            </h1>
            <p class="mt-4 text-lg text-text-secondary">
                Kelola agenda sekolah dalam satu platform
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            
            <!-- Total Families -->
            <div class="bg-white p-6 rounded-2xl shadow-soft border border-border hover:shadow-lg transition-shadow duration-300" 
                 data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-text-secondary font-medium">Total Families</p>
                        <p class="text-3xl font-bold text-primary mt-2 counter" data-target="{{ $familiesCount ?? 0 }}">0</p>
                    </div>
                    <div class="w-12 h-12 bg-primary-light rounded-xl flex items-center justify-center float-animation">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Events This Month -->
            <div class="bg-white p-6 rounded-2xl shadow-soft border border-border hover:shadow-lg transition-shadow duration-300" 
                 data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-text-secondary font-medium">Events Bulan Ini</p>
                        <p class="text-3xl font-bold text-primary mt-2 counter" data-target="{{ $eventsThisMonth ?? 0 }}">0</p>
                    </div>
                    <div class="w-12 h-12 bg-primary-medium/20 rounded-xl flex items-center justify-center float-animation">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Pending Approvals -->
            <div class="bg-white p-6 rounded-2xl shadow-soft border border-border hover:shadow-lg transition-shadow duration-300" 
                 data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-text-secondary font-medium">Pending Approval</p>
                        <p class="text-3xl font-bold text-orange-500 mt-2 counter" data-target="{{ $pendingMembers ?? 0 }}">0</p>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center float-animation">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Members -->
            <div class="bg-white p-6 rounded-2xl shadow-soft border border-border hover:shadow-lg transition-shadow duration-300" 
                 data-aos="fade-up" data-aos-delay="400">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-text-secondary font-medium">Total Members</p>
                        <p class="text-3xl font-bold text-primary mt-2 counter" data-target="{{ $totalMembers ?? 0 }}">0</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center float-animation">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Events Section -->
        <div class="bg-white rounded-2xl shadow-soft border border-border overflow-hidden mb-12" data-aos="fade-up">
            <div class="px-6 py-4 border-b border-border bg-gradient-to-r from-background to-white">
                <h2 class="text-lg font-bold text-text-primary flex items-center gap-2">
                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Event Mendatang
                </h2>
            </div>
            
            <div class="divide-y divide-border">
                @forelse($upcomingEvents ?? [] as $event)
                    <div class="px-6 py-4 hover:bg-background transition-colors duration-200" data-aos="fade-right">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h3 class="text-base font-semibold text-text-primary">
                                    {{ $event->title }}
                                </h3>
                                <div class="flex items-center gap-4 mt-2 text-sm text-text-secondary">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y, H:i') }}
                                    </span>
                                    @if(isset($event->location))
                                        <span class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            {{ $event->location }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <span class="px-3 py-1 text-xs font-medium rounded-full 
                                @if(($event->status ?? 'published') === 'approved') bg-green-100 text-green-700
                                @elseif(($event->status ?? 'published') === 'pending') bg-orange-100 text-orange-700
                                @else bg-gray-100 text-gray-700
                                @endif">
                                {{ ucfirst($event->status ?? 'published') }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-12 text-center">
                        <svg class="w-16 h-16 text-border mx-auto mb-4 float-animation" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-text-secondary">Belum ada event mendatang</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-up">
            <a href="#" class="bg-gradient-to-br from-primary to-primary-dark text-white rounded-2xl p-6 shadow-soft hover:shadow-lg transition-all duration-300 hover:-translate-y-1 float-animation">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold">Buat Event</h3>
                        <p class="text-sm text-primary-light">Tambah event baru</p>
                    </div>
                </div>
            </a>

            <a href="#" class="bg-gradient-to-br from-primary-medium to-primary text-white rounded-2xl p-6 shadow-soft hover:shadow-lg transition-all duration-300 hover:-translate-y-1 float-animation">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold">Kelola Proposal</h3>
                        <p class="text-sm text-primary-light">Review & approve</p>
                    </div>
                </div>
            </a>

            <a href="#" class="bg-gradient-to-br from-primary-light to-primary-medium text-text-primary rounded-2xl p-6 shadow-soft border border-border hover:shadow-lg transition-all duration-300 hover:-translate-y-1 float-animation">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold">Kelola Member</h3>
                        <p class="text-sm text-text-secondary">Approve & manage</p>
                    </div>
                </div>
            </a>
        </div>

    </main>

    <!-- Scroll Indicator (optional, sama kaya landing page) -->
    <div class="scroll-indicator hidden md:block">
        <div class="scroll-dot"></div>
    </div>

    <!-- Init AOS & Counter -->
    <script>
        document.addEventListener('alpine:init', () => {
            AOS.init({ duration: 1000, once: true });
            
            // Counter animation
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const duration = 1500;
                const step = target / (duration / 16);
                let current = 0;
                
                const update = () => {
                    current += step;
                    if (current < target) {
                        counter.innerText = Math.ceil(current);
                        requestAnimationFrame(update);
                    } else {
                        counter.innerText = target;
                    }
                };
                
                // Start when element is in view
                const observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting) {
                        update();
                        observer.disconnect();
                    }
                });
                observer.observe(counter);
            });
        });
    </script>

</body>
</html>