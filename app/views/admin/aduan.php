<div class="mb-8">
    <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 tracking-tight mb-2">Aduan Postingan</h1>
    <p class="text-sm text-gray-500 font-medium">Laporan penayangan informasi palsu atau penyalahgunaan fitur oleh pengguna.</p>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-xs font-bold uppercase tracking-widest text-gray-400">
                    <th class="px-6 py-4">Postingan Bermasalah</th>
                    <th class="px-6 py-4">Pelapor</th>
                    <th class="px-6 py-4">Alasan Aduan</th>
                    <th class="px-6 py-4">Tanggal Masuk</th>
                    <th class="px-6 py-4 text-center font-bold">Lihat Detail</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 text-sm font-medium text-gray-700">
    <?php if(empty($data['aduan'])): ?>
    <tr>
        <td colspan="5" class="px-6 py-10 text-center text-gray-400">Belum ada aduan pelanggaran dari pengguna. Aman!</td>
    </tr>
    <?php endif; ?>
    
    <?php foreach($data['aduan'] as $aduan) : ?>
    <tr class="hover:bg-gray-50/50 transition-colors">
        
        <td class="px-6 py-4">
            <span class="block font-bold text-gray-900 mb-1"><?= htmlspecialchars($aduan['judul']); ?></span>
        </td>

        <td class="px-6 py-4 text-gray-600"><?= htmlspecialchars($aduan['nama_pelapor']); ?></td>
        
        <td class="px-6 py-4">
            <span class="text-xs rounded-lg px-2.5 py-1.5 max-w-xs block">
                <?= htmlspecialchars($aduan['alasan'] ?? 'Tidak ada deskripsi alasan'); ?>
            </span>
        </td>
        
        <td class="px-6 py-4 text-gray-400 text-xs"><?= $aduan['created_at'] ?? '-'; ?></td>
        <td>
        <a href="<?= BASEURL; ?>/admin/detailAduan/<?= $aduan['id']; ?>" class="inline-block text-[11px] font-bold text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 px-2.5 py-1 rounded-md transition-colors">
                Investigasi Laporan ↗
            </a>
        </td>
        
    </tr>
    <?php endforeach; ?>
</tbody>
        </table>
    </div>
</div>