<nav 
    x-data="{ mobileOpen: false }"
    class="fixed top-6 left-1/2 -translate-x-1/2 
    w-[97%] max-w-[1200px]
    bg-white/25 backdrop-blur-xl
    border border-white/30
    shadow-lg shadow-blue-200/10
    rounded-2xl
    z-50">

    <div class="px-8">
        <div class="flex items-center justify-between h-16">

            <!-- Logo -->
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/schoolplanner.png') }}" 
                    alt="School Planner Logo" 
                    class="h-9 w-auto">
                <span class="font-semibold text-lg text-gray-800 tracking-tight">
                    School Planner
                </span>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-8">

                <a href="/" 
                class="px-4 py-2 text-sm font-medium text-blue-600
                bg-white/40 backdrop-blur-md
                rounded-xl border border-white/40 shadow-sm">
                Home
                </a>

                <a href="about" 
                class="text-sm font-medium text-gray-700
                transition duration-300 hover:text-blue-600">
                About
                </a>

                <a href="blog" 
                class="text-sm font-medium text-gray-700
                transition duration-300 hover:text-blue-600">
                Blog
                </a>

                <a href="contact" 
                class="text-sm font-medium text-gray-700
                transition duration-300 hover:text-blue-600">
                Contact
                </a>

            </div>

            <!-- Mobile Button -->
            <div class="md:hidden">
                <button
                    @click="mobileOpen = !mobileOpen"
                    class="p-2 rounded-xl bg-white/40 backdrop-blur-md border border-white/30">

                    <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>

                    <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M6 18L18 6M6 6l12 12"/>
                    </svg>

                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Dropdown -->
    <div x-show="mobileOpen"
        x-transition
        class="md:hidden px-6 pb-6">

        <div class="mt-4 space-y-3">

            <a href="/" 
            class="block px-4 py-2 rounded-xl text-sm font-medium 
            bg-white/40 backdrop-blur-md border border-white/30">
            Home
            </a>

            <a href="about" 
            class="block px-4 py-2 rounded-xl text-sm font-medium 
            text-gray-700
            hover:bg-white/30 hover:backdrop-blur-md
            border border-transparent hover:border-white/30
            transition">
            About
            </a>

            <a href="blog" 
            class="block px-4 py-2 rounded-xl text-sm font-medium 
            text-gray-700
            hover:bg-white/30 hover:backdrop-blur-md
            border border-transparent hover:border-white/30
            transition">
            Blog
            </a>

            <a href="contact" 
            class="block px-4 py-2 rounded-xl text-sm font-medium 
            text-gray-700
            hover:bg-white/30 hover:backdrop-blur-md
            border border-transparent hover:border-white/30
            transition">
            Contact
            </a>

        </div>
    </div>

</nav>