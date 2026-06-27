<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengajuan Saya - School Planner</title>
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
                <h1 class="text-3xl font-black text-gray-900 mb-2">Monitoring Proposal</h1>
                <p class="text-gray-500">Pantau status pengajuan kegiatan organisasi Anda di sini.</p>
            </div>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-sm font-bold text-blue-600 hover:text-blue-700 transition-colors">
                <i class="ri-arrow-left-line"></i> Kembali ke Dashboard
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border border-green-100 text-green-700 px-6 py-4 rounded-2xl mb-8 flex items-center gap-3">
                <i class="ri-checkbox-circle-fill text-xl"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100">
                            <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-gray-400">Kegiatan</th>
                            <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-gray-400">Unit / Organisasi</th>
                            <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-gray-400">Status</th>
                            <th class="px-8 py-5 text-xs font-black uppercase tracking-widest text-gray-400 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($proposals as $proposal)
                        <tr class="hover:bg-gray-50/30 transition-colors">
                            <td class="px-8 py-6">
                                <div class="font-bold text-gray-900">{{ $proposal->title }}</div>
                                <div class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                                    <i class="ri-calendar-line"></i> 
                                    {{ $proposal->start_date->format('d M Y, H:i') }}
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="text-sm font-medium text-gray-600">{{ $proposal->family->name }}</span>
                            </td>
                            <td class="px-8 py-6">
                                @php
                                    $statusClasses = [
                                        'pending' => 'bg-orange-100 text-orange-700 border-orange-200',
                                        'published' => 'bg-green-100 text-green-700 border-green-200',
                                        'rejected' => 'bg-red-100 text-red-700 border-red-200',
                                        'revision' => 'bg-blue-100 text-blue-700 border-blue-200',
                                    ];
                                    $statusLabels = [
                                        'pending' => 'Menunggu Review',
                                        'published' => 'Disetujui',
                                        'rejected' => 'Ditolak',
                                        'revision' => 'Butuh Revisi',
                                    ];
                                @endphp
                                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter border {{ $statusClasses[$proposal->status] ?? 'bg-gray-100' }}">
                                    {{ $statusLabels[$proposal->status] ?? $proposal->status }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('proposals.show', $proposal->id) }}" class="p-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors" title="Lihat Detail">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                    @if($proposal->status === 'revision')
                                    <button class="p-2 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-xl transition-colors" title="Edit / Revisi">
                                        <i class="ri-edit-line"></i>
                                    </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-8 py-20 text-center">
                                <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-50 rounded-full mb-4">
                                    <i class="ri-file-info-line text-3xl text-gray-300"></i>
                                </div>
                                <p class="text-gray-400 font-medium">Belum ada pengajuan kegiatan.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

<!-- impeccable-live-start -->
<script src="http://localhost:8400/live.js"></script>
<!-- impeccable-live-end -->
</body>
</html>
