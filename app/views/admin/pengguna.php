<div class="mb-8">
    <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 tracking-tight mb-2">Kelola Pengguna</h1>
    <p class="text-sm text-gray-500 font-medium">Manajemen data akun mahasiswa dan masyarakat pengguna sistem.</p>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-xs font-bold uppercase tracking-widest text-gray-400">
                    <th class="px-6 py-4">Nama Pengguna</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">No. WhatsApp</th>
                    <th class="px-6 py-4">Domisili / Kos</th>
                    <th class="px-6 py-4 text-center">Tindakan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 text-sm font-medium text-gray-700">
                <?php foreach($data['users'] as $user) : ?>
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4 font-bold text-gray-900"><?= htmlspecialchars($user['nama']); ?></td>
                    <td class="px-6 py-4 text-gray-500"><?= htmlspecialchars($user['email']); ?></td>
                    <td class="px-6 py-4 font-mono text-xs"><?= htmlspecialchars($user['whatsapp']); ?></td>
                    <td class="px-6 py-4 text-xs text-gray-400"><?= htmlspecialchars($user['lokasi_pilihan'] ?? 'Belum Diatur'); ?></td>
                    <td class="px-6 py-4 text-center">
                        <a href="javascript:void(0);" onclick="
                            Swal.fire({
                                title: 'Konfirmasi',
                                text: 'Blokir dan hapus akun ini? Semua postingannya juga akan terhapus.',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#006D77',
                                confirmButtonText: 'Hapus',
                                cancelButtonText: 'Batal'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '<?= BASEURL; ?>/admin/hapusPengguna/<?= $user['id']; ?>';
                                }
                            });
                        " class="text-red-600 hover:underline text-xs font-bold">
                            Hapus Akun
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>