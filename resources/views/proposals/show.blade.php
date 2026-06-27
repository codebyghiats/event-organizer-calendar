<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review: {{ $event->title }} - School Planner</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen" x-data="{ showActionModal: false, actionType: 'approve' }">

    <x-navbar></x-navbar>

    <div class="max-w-[1400px] mx-auto px-6 py-32">
        <div class="grid lg:grid-cols-12 gap-8 items-start">
            
            <!-- PDF Viewer (Left) -->
            <div class="lg:col-span-8 bg-white rounded-[2rem] shadow-xl border border-gray-200 overflow-hidden h-[85vh] sticky top-32">
                <div class="bg-gray-900 px-6 py-4 flex items-center justify-between text-white">
                    <div class="flex items-center gap-3">
                        <i class="ri-file-pdf-fill text-red-500 text-2xl"></i>
                        <span class="text-sm font-bold truncate max-w-xs">{{ $event->title }}.pdf</span>
                    </div>
                    <a href="{{ asset('storage/' . $event->proposal_file) }}" target="_blank" class="text-xs bg-white/10 hover:bg-white/20 px-3 py-1.5 rounded-lg transition-colors flex items-center gap-1">
                        <i class="ri-external-link-line"></i> Full Screen
                    </a>
                </div>
                <iframe src="{{ asset('storage/' . $event->proposal_file) }}#toolbar=0" class="w-full h-full border-none"></iframe>
            </div>

            <!-- Details & Actions (Right) -->
            <div class="lg:col-span-4 space-y-6">
                
                <!-- Info Card -->
                <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-200">
                    <h2 class="text-2xl font-black text-gray-900 mb-6">Detail Kegiatan</h2>
                    
                    <div class="space-y-4 mb-8">
                        <div>
                            <span class="text-[10px] uppercase font-black tracking-widest text-gray-400">Judul Agenda</span>
                            <p class="font-bold text-gray-800 text-lg">{{ $event->title }}</p>
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-black tracking-widest text-gray-400">Deskripsi</span>
                            <p class="text-sm text-gray-600 leading-relaxed">{{ $event->description ?? 'Tidak ada deskripsi.' }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-4 pt-4 border-t border-gray-50">
                            <div>
                                <span class="text-[10px] uppercase font-black tracking-widest text-gray-400">Tanggal Mulai</span>
                                <p class="text-sm font-bold text-gray-800">{{ $event->start_date->format('d M Y') }}</p>
                            </div>
                            <div>
                                <span class="text-[10px] uppercase font-black tracking-widest text-gray-400">Jam</span>
                                <p class="text-sm font-bold text-gray-800">{{ $event->start_date->format('H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons for Admin -->
                    @if(auth()->user()->familyMembers()->where('family_id', $event->family_id)->where('role', 'admin')->exists())
                        <div class="space-y-3">
                            <form action="{{ route('proposals.approve', $event->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-4 rounded-2xl shadow-lg shadow-green-100 transition-all active:scale-95 flex items-center justify-center gap-2">
                                    <i class="ri-checkbox-circle-line text-lg"></i> Setujui & Posting ke Kalender
                                </button>
                            </form>
                            
                            <div class="grid grid-cols-2 gap-3">
                                <button @click="showActionModal = true; actionType = 'revision'" class="bg-blue-50 hover:bg-blue-100 text-blue-700 font-bold py-3 rounded-2xl transition-all active:scale-95 text-sm">
                                    Minta Revisi
                                </button>
                                <button @click="showActionModal = true; actionType = 'reject'" class="bg-red-50 hover:bg-red-100 text-red-700 font-bold py-3 rounded-2xl transition-all active:scale-95 text-sm">
                                    Tolak Proposal
                                </button>
                            </div>
                            
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Hapus kegiatan ini secara permanen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full text-red-400 hover:text-red-600 text-xs font-bold py-2 mt-2 transition-colors flex items-center justify-center gap-1">
                                    <i class="ri-delete-bin-line"></i> Hapus Selamanya
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

                <!-- Status Card if OSIS viewing -->
                @if($event->status !== 'published' && $event->admin_notes)
                <div class="bg-orange-50 border border-orange-100 rounded-[2rem] p-8">
                    <h4 class="font-bold text-orange-800 flex items-center gap-2 mb-2">
                        <i class="ri-feedback-line"></i> Catatan Pembina
                    </h4>
                    <p class="text-sm text-orange-700 leading-relaxed">{{ $event->admin_notes }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- REJECT/REVISION MODAL -->
    <div x-show="showActionModal" style="display: none;" class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm" x-cloak>
        <div @click.away="showActionModal = false" class="bg-white p-10 rounded-[2.5rem] shadow-2xl w-full max-w-lg mx-4">
            <h3 class="text-2xl font-black text-gray-900 mb-2" x-text="actionType === 'revision' ? 'Permintaan Revisi' : 'Tolak Kegiatan'"></h3>
            <p class="text-gray-500 text-sm mb-8">Berikan alasan atau instruksi perbaikan untuk pengaju.</p>
            
            <form :action="'{{ url('proposals') }}/' + '{{ $event->id }}' + '/reject'" method="POST">
                @csrf
                <input type="hidden" name="action" :value="actionType">
                <textarea name="admin_notes" rows="5" required 
                    class="w-full border border-gray-200 rounded-2xl p-4 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition-all text-sm mb-6"
                    :placeholder="actionType === 'revision' ? 'Contoh: Tambahkan rincian anggaran di bab 3...' : 'Contoh: Maaf, tanggal ini sudah penuh dengan agenda sekolah...'"></textarea>
                
                <div class="flex gap-3">
                    <button type="button" @click="showActionModal = false" class="flex-1 px-6 py-4 bg-gray-50 text-gray-500 font-bold rounded-2xl hover:bg-gray-100 transition-all">Batal</button>
                    <button type="submit" class="flex-1 px-6 py-4 text-white font-bold rounded-2xl shadow-lg transition-all active:scale-95"
                        :class="actionType === 'revision' ? 'bg-blue-600 hover:bg-blue-700 shadow-blue-100' : 'bg-red-600 hover:bg-red-700 shadow-red-100'">
                        Kirim Keputusan
                    </button>
                </div>
            </form>
        </div>
    </div>

<!-- impeccable-live-start -->
<script src="http://localhost:8400/live.js"></script>
<!-- impeccable-live-end -->
</body>
</html>
