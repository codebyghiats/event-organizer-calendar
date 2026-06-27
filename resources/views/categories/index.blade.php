<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kategori - {{ $family->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen pb-20">

    <!-- Header -->
    <header class="bg-white border-b border-gray-100 sticky top-0 z-30">
        <div class="max-w-4xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('dashboard') }}" class="p-2.5 hover:bg-gray-100 rounded-xl text-gray-500 transition-colors">
                    <i class="ri-arrow-left-line text-xl"></i>
                </a>
                <div>
                    <h1 class="text-xl font-black">Kelola Kategori</h1>
                    <p class="text-xs text-gray-400 uppercase tracking-widest font-bold">{{ $family->name }}</p>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-6 pt-10">
        
        @if(session('success'))
            <div class="bg-green-50 border border-green-100 text-green-600 p-4 rounded-2xl mb-8 flex items-center gap-3">
                <i class="ri-checkbox-circle-fill text-xl"></i>
                <span class="font-bold text-sm">{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid md:grid-cols-3 gap-8">
            
            <!-- Form Tambah -->
            <div class="md:col-span-1">
                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100 sticky top-28">
                    <h3 class="font-black text-lg mb-6">Tambah Baru</h3>
                    <form action="{{ route('categories.store', $family->id) }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">Nama Kategori</label>
                            <input type="text" name="name" required placeholder="Misal: Lomba"
                                class="w-full px-5 py-3.5 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all placeholder-gray-400 text-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">Warna Default</label>
                            <input type="color" name="color" value="#3b82f6" 
                                class="w-full h-12 rounded-2xl border-none cursor-pointer bg-transparent">
                        </div>

                        <button type="submit" class="w-full py-4 bg-gray-900 text-white font-black rounded-2xl hover:bg-black transition-all active:scale-95 shadow-lg shadow-gray-200">
                            Simpan Kategori
                        </button>
                    </form>
                </div>
            </div>

            <!-- List Kategori -->
            <div class="md:col-span-2 space-y-4">
                <h3 class="font-black text-lg mb-4 ml-2">Kategori Saat Ini</h3>
                
                @forelse($categories as $category)
                    <div class="bg-white p-6 rounded-3xl border border-gray-100 flex items-center justify-between group hover:shadow-xl hover:shadow-gray-100 transition-all">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-2xl flex items-center justify-center text-white font-bold" :style="'background-color: {{ $category->color }}'">
                                {{ substr($category->name, 0, 1) }}
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">{{ $category->name }}</h4>
                                <p class="text-xs text-gray-400">Kode Warna: {{ $category->color }}</p>
                            </div>
                        </div>
                        
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-3 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-2xl transition-all">
                                <i class="ri-delete-bin-7-line text-lg"></i>
                            </button>
                        </form>
                    </div>
                @empty
                    <div class="bg-gray-50 border-2 border-dashed border-gray-200 p-12 rounded-[2.5rem] text-center">
                        <i class="ri-price-tag-3-line text-4xl text-gray-300 mb-4 inline-block"></i>
                        <p class="text-gray-500 font-medium">Belum ada kategori kegiatan.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </main>

<!-- impeccable-live-start -->
<script src="http://localhost:8400/live.js"></script>
<!-- impeccable-live-end -->
</body>
</html>
