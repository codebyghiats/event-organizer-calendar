    <nav class="bg-[#F3F4F6] text-black shadow-md rounded-[20px] sticky top-4 z-50"
        x-data="{ mobileOpen: false }">

        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">

            <!-- Mobile Button -->
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button
                    @click="mobileOpen = !mobileOpen"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white">

                    <!-- Hamburger -->
                    <svg x-show="!mobileOpen" class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>

                    <!-- Close -->
                    <svg x-show="mobileOpen" class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Logo -->
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex shrink-0 items-center">
                    <span class="text-black font-bold text-lg">School Planner</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="/" class="rounded-md bg-[#F3F4F6] px-3 py-2 text-sm font-medium text-black hover:bg-black/5 hover:text-black">Home</a>
                        <a href="about" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-black/5 hover:text-black">About</a>
                        <a href="blog" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-black/5 hover:text-black">Blog</a>
                        <a href="contact" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-black/5 hover:text-black">Contact</a>
                    </div>
                </div>
            </div>

            <!-- Profile Dropdown -->
            <div class="relative ml-3" x-data="{ profileOpen: false }">
                <button
                    @click="profileOpen = !profileOpen"
                    class="flex rounded-full focus:outline-none">
                </button>

                <!-- Dropdown -->
                <div
                    x-show="profileOpen"
                    @click.outside="profileOpen = false"
                    x-transition
                    class="absolute right-0 mt-2 w-48 rounded-md bg-white py-1 shadow-lg">

                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                </div>
            </div>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileOpen" x-transition class="sm:hidden">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <a href="/" class="block rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Home</a>
            <a href="about" class="block rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">About</a>
            <a href="blog" class="block rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Blog</a>
            <a href="contact" class="block rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Contact</a>
        </div>
    </div>

</nav>