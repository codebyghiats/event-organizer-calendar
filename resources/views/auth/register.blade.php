<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - School Planner</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden">
        <div class="flex flex-col md:flex-row">
            
            <!-- Left Side - Blue Gradient -->
            <div class="gradient-login md:w-5/12 p-12 flex flex-col items-center justify-center text-white relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-white/10 to-transparent"></div>
                
                <div class="relative z-10 text-center">
                    <div class="w-32 h-32 mx-auto mb-6 flex items-center justify-center">
                            <img src="{{ asset('images/schoolplanner.png') }}" alt="School Planner Logo" class="w-full h-full object-contain">
                    </div>
                    <h1 class="text-3xl font-bold mb-2">School Planner</h1>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="md:w-7/12 p-12 md:p-16">
                <div class="mb-10">
                    <h2 class="text-4xl font-bold text-text-primary mb-2">Buat Akun</h2>
                    <p class="text-text-secondary">Daftar untuk mulai menggunakan aplikasi</p>
                </div>

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700 text-sm">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register.store') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    <div>
                        <label for="name" class="block text-sm font-semibold text-text-primary mb-2">Nama Lengkap</label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}"
                               placeholder="Masukan nama lengkap"
                               required
                               class="input-field w-full px-5 py-3.5 border border-border rounded-xl bg-background/30 text-text-primary placeholder-text-secondary/60 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-text-primary mb-2">Email</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}"
                               placeholder="example@gmail.com"
                               required
                               class="input-field w-full px-5 py-3.5 border border-border rounded-xl bg-background/30 text-text-primary placeholder-text-secondary/60 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-text-primary mb-2">Password</label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               placeholder="Minimal 8 karakter"
                               required
                               class="input-field w-full px-5 py-3.5 border border-border rounded-xl bg-background/30 text-text-primary placeholder-text-secondary/60 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-text-primary mb-2">Konfirmasi Password</label>
                        <input type="password" 
                               id="password_confirmation" 
                               name="password_confirmation" 
                               placeholder="Ulangi password"
                               required
                               class="input-field w-full px-5 py-3.5 border border-border rounded-xl bg-background/30 text-text-primary placeholder-text-secondary/60 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition">
                    </div>

                    <div class="flex items-start">
                        <input type="checkbox" 
                               id="agree_terms" 
                               name="agree_terms"
                               required
                               class="mt-1 w-4 h-4 rounded border-border text-primary focus:ring-primary/20 mr-2">
                        <label for="agree_terms" class="text-sm text-text-secondary">
                            Saya setuju dengan <a href="#" class="text-primary hover:text-primary-dark font-medium">Syarat & Ketentuan</a> yang berlaku
                        </label>
                    </div>

                    <button type="submit" class="btn-primary w-full py-4 px-6 text-text-primary font-semibold rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                        Daftar
                    </button>
                </form>

                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-border"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white text-text-secondary">Atau daftar dengan</span>
                        </div>
                    </div>

                    <button type="button" class="mt-6 w-full flex items-center justify-center px-6 py-3.5 border border-border rounded-xl bg-white text-text-primary hover:bg-background/50 transition duration-200 shadow-soft">
                        <svg class="h-5 w-5 mr-3" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        Google
                    </button>
                </div>

                <p class="mt-10 text-center text-sm text-text-secondary">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-primary hover:text-primary-dark font-semibold transition">Masuk disini</a>
                </p>
                <!-- Back to Home Button -->
                <div class="mt-4 text-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-gray-700 transition text-sm font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>