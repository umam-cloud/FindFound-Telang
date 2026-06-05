<div class="mb-6 flex items-center justify-between">
    <div>
        <div class="flex items-center gap-3 mb-2">
            <a href="<?= BASEURL; ?>/admin/aduan" class="text-gray-400 hover:text-gray-900 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 tracking-tight">Investigasi Aduan</h1>
        </div>
        <p class="text-sm text-gray-500 font-medium ml-9">Tinjau detail postingan dan pemosting sebelum mengambil tindakan.</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    
    <div class="lg:col-span-1 flex flex-col gap-6">
        
        <div class="bg-red-50 border border-red-100 rounded-2xl p-6 shadow-sm relative overflow-hidden">
            <div class="absolute -right-4 -top-4 opacity-10 text-red-500">
                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            </div>
            <h3 class="text-xs font-bold text-red-800 uppercase tracking-widest mb-3">Konteks Laporan</h3>
            <p class="text-sm text-red-900 font-medium leading-relaxed mb-4">
                Dilaporkan karena indikasi: <strong class="font-bold text-red-700 bg-red-100 px-2 py-0.5 rounded"><?= htmlspecialchars($data['aduan']['alasan']); ?></strong>
            </p>
            <div class="pt-4 border-t border-red-200/50">
                <p class="text-xs text-red-700">Dilaporkan oleh: <span class="font-bold"><?= htmlspecialchars($data['aduan']['nama_pelapor']); ?></span></p>
                <p class="text-xs text-red-600/70 mt-1">Pada: <?= $data['aduan']['created_at']; ?></p>
            </div>
        </div>

        <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
            <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Informasi Pemosting (Author)</h3>
            <div class="flex items-center gap-4 mb-5">
                <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center text-gray-500 font-bold text-xl border border-gray-200">
                    <?= substr($data['aduan']['nama_pemosting'], 0, 1); ?>
                </div>
                <div>
                    <p class="font-bold text-gray-900"><?= htmlspecialchars($data['aduan']['nama_pemosting']); ?></p>
                    <span class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2 py-1 rounded-md mt-1 inline-block">Terlapor</span>
                </div>
            </div>
            <div class="space-y-3">
                <div class="flex items-center gap-3 text-sm text-gray-600">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <?= htmlspecialchars($data['aduan']['email_pemosting']); ?>
                </div>
                <div class="flex items-center gap-3 text-sm text-gray-600">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    <?= htmlspecialchars($data['aduan']['wa_pemosting'] ?? 'Tidak ada nomor'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="lg:col-span-2">
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden flex flex-col h-full">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest">Preview Postingan (#<?= $data['aduan']['kode_postingan']; ?>)</h3>
                <span class="text-xs font-bold px-3 py-1 rounded-full <?= $data['aduan']['jenis_laporan'] == 'hilang' ? 'bg-red-100 text-red-700' : 'bg-teal-100 text-[#006D77]'; ?>">
                    Status: <?= ucfirst($data['aduan']['jenis_laporan']); ?>
                </span>
            </div>
            
            <div class="p-6 flex-1">
                <div class="flex flex-col md:flex-row gap-6">
                    <img src="<?= BASEURL; ?>/img/postingan/<?= $data['aduan']['file_path']; ?>" class="w-full md:w-48 h-48 object-cover rounded-xl border border-gray-200 shadow-sm" alt="Foto Barang">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 mb-2"><?= htmlspecialchars($data['aduan']['judul']); ?></h2>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mb-4">
                            <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> <?= htmlspecialchars($data['aduan']['lokasi_spesifik']); ?></span>
                            <span>•</span>
                            <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> <?= date('d M Y', strtotime($data['aduan']['tgl_post'])); ?></span>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                            <p class="text-sm text-gray-600 leading-relaxed break-words whitespace-pre-wrap"><?= htmlspecialchars($data['aduan']['deskripsi']); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-gray-50 border-t border-gray-100 flex flex-col sm:flex-row justify-end gap-3 mt-auto">
                <a href="<?= BASEURL; ?>/admin/abaikanLaporan/<?= $data['aduan']['id']; ?>" onclick="return confirm('Yakin ingin mengabaikan laporan ini? Laporan akan dihapus, tetapi postingan tetap ada.')" class="px-6 py-3.5 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100 hover:text-gray-900 rounded-xl text-sm font-bold transition-all text-center">
                    Abaikan Laporan
                </a>
                
                <a href="<?= BASEURL; ?>/admin/hapusPostingan/<?= $data['aduan']['postingan_id']; ?>" onclick="return confirm('PERINGATAN: Hapus postingan yang dilaporkan ini secara permanen?')" class="px-6 py-3.5 bg-red-600 hover:bg-red-700 text-white rounded-xl text-sm font-bold transition-all shadow-md shadow-red-500/30 flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Hapus Postingan (Take Down)
                </a>
            </div>
        </div>
    </div>
</div>