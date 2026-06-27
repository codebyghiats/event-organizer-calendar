<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Review Proposal - School Planner</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">

    <x-navbar></x-navbar>

    <main class="max-w-7xl mx-auto px-6 py-32">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="bg-indigo-100 text-indigo-700 text-[10px] uppercase tracking-widest font-black px-2 py-0.5 rounded-lg border border-indigo-200">Panel Pembina</span>
                    <span class="text-gray-400 text-sm">/ {{ $family->name }}</span>
                </div>
                <h1 class="text-3xl font-black text-gray-900">Pusat Persetujuan</h1>
            </div>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-sm font-bold text-gray-500 hover:text-gray-900 transition-colors">
                <i class="ri-arrow-left-line"></i> Dashboard
            </a>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-3">
                @if(session('success'))
                    <div class="bg-green-50 border border-green-100 text-green-700 px-6 py-4 rounded-2xl mb-8 flex items-center gap-3">
                        <i class="ri-checkbox-circle-fill text-xl"></i>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-8 py-6 border-b border-gray-50">
                        <h3 class="font-bold text-gray-900">Proposal Menunggu Antrean</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-gray-50/50">
                                    <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-gray-400">Kegiatan</th>
                                    <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-gray-400">Pengaju</th>
                                    <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-gray-400">Waktu Masuk</th>
                                    <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-gray-400 text-right">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse($proposals as $proposal)
                                <tr class="hover:bg-gray-50/30 transition-colors">
                                    <td class="px-8 py-6">
                                        <div class="font-bold text-gray-900">{{ $proposal->title }}</div>
                                        <div class="text-xs text-gray-500 mt-1">
                                            Kategori: {{ $proposal->category->name ?? 'Umum' }}
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xs">
                                                {{ substr($proposal->creator->name, 0, 1) }}
                                            </div>
                                            <div class="text-sm font-medium text-gray-700">{{ $proposal->creator->name }}</div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="text-sm text-gray-600">{{ $proposal->created_at->diffForHumans() }}</div>
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        <a href="{{ route('proposals.show', $proposal->id) }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-5 py-2.5 rounded-xl transition-all shadow-lg shadow-blue-100">
                                            Review Proposal <i class="ri-arrow-right-line"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-20 text-center">
                                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-50 rounded-full mb-4">
                                            <i class="ri-check-double-line text-3xl text-green-500"></i>
                                        </div>
                                        <p class="text-gray-400 font-medium">Semua pengajuan telah diproses. Kerja bagus!</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

<!-- impeccable-live-start -->
<script src="http://localhost:8400/live.js"></script>
<!-- impeccable-live-end -->
</body>
</html>
