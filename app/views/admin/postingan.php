<div class="mb-8">
    <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 tracking-tight mb-2">Daftar Postingan</h1>
    <p class="text-sm text-gray-500 font-medium">Memantau seluruh log laporan kehilangan dan temuan barang aktif di platform.</p>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-xs font-bold uppercase tracking-widest text-gray-400">
                    <th class="px-6 py-4">Gambar</th>
                    <th class="px-6 py-4">Judul Laporan</th>
                    <th class="px-6 py-4">Kategori / Jenis</th>
                    <th class="px-6 py-4">Pemosting</th>
                    <th class="px-6 py-4">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 text-sm font-medium text-gray-700">
                <?php if(empty($data['postingan'])): ?>
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-400 font-bold">Belum ada postingan dari pengguna.</td>
                </tr>
                <?php endif; ?>

                <?php foreach($data['postingan'] as $post) : ?>
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4">
                        <img src="<?= BASEURL; ?>/img/postingan/<?= $post['file_path']; ?>" class="w-12 h-12 object-cover rounded-lg border border-gray-100" alt="Barang">
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-bold text-gray-900"><?= htmlspecialchars($post['judul']); ?></p>
                        <p class="text-xs text-gray-400 mt-0.5"><?= htmlspecialchars($post['lokasi_spesifik']); ?></p>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full <?= $post['jenis_laporan'] == 'hilang' ? 'bg-red-50 text-red-600' : 'bg-teal-50 text-[#006D77]'; ?>">
                            <?= ucfirst($post['jenis_laporan']); ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-600"><?= htmlspecialchars($post['nama']); ?></td>
                    <td class="px-6 py-4">
                        <span class="text-xs <?= $post['status'] == 'selesai' ? 'text-gray-400' : 'text-green-500 font-semibold'; ?>">
                            ● <?= ucfirst($post['status']); ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>