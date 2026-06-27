{{-- ================= NAVBAR =================
     Design spec — Floating Navigation Bar:
     - Background: rgba(255,255,255,0.7) with backdrop-blur-xl
     - Border: 1px solid rgba(255,255,255,0.5)
     - Border-radius: 32px (rounded-[2rem])
     - Shadow: 0 25px 50px -12px rgba(15,23,42,0.05)
     - Active link: color #3461DF, bg rgba(52,97,223,0.05), border rgba(52,97,223,0.1)
     - Inactive link: color #64748B, hover color #3461DF, hover bg #F9FAFB
     - Login/Dashboard button: bg #0F172A, rounded 16px
--}}
<nav
    x-data="{ mobileOpen: false }"
    class="fixed top-8 left-1/2 -translate-x-1/2
           w-[92%] max-w-[1200px]
           z-[90]"
    style="background-color:rgba(255,255,255,0.7);
           backdrop-filter:blur(20px);
           -webkit-backdrop-filter:blur(20px);
           border:1px solid rgba(255,255,255,0.5);
           border-radius:32px;
           box-shadow:0 25px 50px -12px rgba(15,23,42,0.05);">

    <div class="px-8 lg:px-10">
        <div class="flex items-center justify-between h-20">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group transition-transform active:scale-95">
                <img src="{{ asset('images/schoolplanner.png') }}"
                     alt="School Planner Logo"
                     class="h-10 w-auto">
                <span class="font-black text-xl tracking-tight" style="color:#0F172A;">
                    School Planner
                </span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-2">

                <a href="{{ route('home') }}"
                   class="px-5 py-2.5 text-sm font-bold rounded-2xl transition-all"
                   style="{{ request()->routeIs('home')
                       ? 'color:#3461DF; background-color:rgba(52,97,223,0.05); border:1px solid rgba(52,97,223,0.1);'
                       : 'color:#64748B;' }}"
                   onmouseover="{{ !request()->routeIs('home') ? 'this.style.color=\"#3461DF\"; this.style.backgroundColor=\"#F9FAFB\"' : '' }}"
                   onmouseout="{{ !request()->routeIs('home') ? 'this.style.color=\"#64748B\"; this.style.backgroundColor=\"transparent\"' : '' }}">
                    Home
                </a>

                <a href="{{ route('about') }}"
                   class="px-5 py-2.5 text-sm font-bold rounded-2xl transition-all"
                   style="{{ request()->routeIs('about')
                       ? 'color:#3461DF; background-color:rgba(52,97,223,0.05); border:1px solid rgba(52,97,223,0.1);'
                       : 'color:#64748B;' }}"
                   onmouseover="{{ !request()->routeIs('about') ? 'this.style.color=\"#3461DF\"; this.style.backgroundColor=\"#F9FAFB\"' : '' }}"
                   onmouseout="{{ !request()->routeIs('about') ? 'this.style.color=\"#64748B\"; this.style.backgroundColor=\"transparent\"' : '' }}">
                    About us
                </a>

                <a href="{{ route('contact') }}"
                   class="px-5 py-2.5 text-sm font-bold rounded-2xl transition-all"
                   style="{{ request()->routeIs('contact')
                       ? 'color:#3461DF; background-color:rgba(52,97,223,0.05); border:1px solid rgba(52,97,223,0.1);'
                       : 'color:#64748B;' }}"
                   onmouseover="{{ !request()->routeIs('contact') ? 'this.style.color=\"#3461DF\"; this.style.backgroundColor=\"#F9FAFB\"' : '' }}"
                   onmouseout="{{ !request()->routeIs('contact') ? 'this.style.color=\"#64748B\"; this.style.backgroundColor=\"transparent\"' : '' }}">
                    Contact
                </a>

                @auth
                    <a href="{{ route('dashboard') }}"
                       class="ml-4 px-6 py-2.5 text-sm font-bold text-white rounded-2xl transition-all active:scale-95"
                       style="background-color:#3461DF;"
                       onmouseover="this.style.backgroundColor='#274BC8'"
                       onmouseout="this.style.backgroundColor='#3461DF'">
                        Dashboard
                    </a>
                @else
                    <button @click="showLoginModal = true"
                            class="ml-4 px-6 py-2.5 text-sm font-bold text-white rounded-2xl transition-all active:scale-95"
                            style="background-color:#0F172A;"
                            onmouseover="this.style.backgroundColor='#1E293B'"
                            onmouseout="this.style.backgroundColor='#0F172A'">
                        Login
                    </button>
                @endauth

            </div>

            <!-- Mobile Button -->
            <div class="md:hidden">
                <button
                    @click="mobileOpen = !mobileOpen"
                    class="p-3 rounded-2xl transition-all active:scale-90"
                    style="background-color:#F9FAFB; color:#0F172A; border:1px solid #E2E8F0;">

                    <!-- Hamburger -->
                    <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>

                    <!-- Close -->
                    <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>

                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div
        x-show="mobileOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="md:hidden px-6 pb-8">

        <div class="mt-4 space-y-2">

            <a href="{{ route('home') }}"
               class="block px-5 py-3.5 rounded-2xl text-sm font-bold transition-all"
               style="{{ request()->routeIs('home')
                   ? 'background-color:#3461DF; color:#FFFFFF;'
                   : 'color:#64748B;' }}">
                Home
            </a>

            <a href="{{ route('about') }}"
               class="block px-5 py-3.5 rounded-2xl text-sm font-bold transition-all"
               style="{{ request()->routeIs('about')
                   ? 'background-color:#3461DF; color:#FFFFFF;'
                   : 'color:#64748B;' }}">
                About us
            </a>

            <a href="{{ route('contact') }}"
               class="block px-5 py-3.5 rounded-2xl text-sm font-bold transition-all"
               style="{{ request()->routeIs('contact')
                   ? 'background-color:#3461DF; color:#FFFFFF;'
                   : 'color:#64748B;' }}">
                Contact
            </a>

            <div class="pt-4 mt-4" style="border-top:1px solid #E2E8F0;">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="block w-full text-center px-5 py-4 text-white font-bold rounded-2xl"
                       style="background-color:#3461DF;">
                        Dashboard
                    </a>
                @else
                    <button @click="showLoginModal = true; mobileOpen = false"
                            class="block w-full text-center px-5 py-4 text-white font-bold rounded-2xl"
                            style="background-color:#0F172A;">
                        Login
                    </button>
                @endauth
            </div>

        </div>
    </div>

</nav>