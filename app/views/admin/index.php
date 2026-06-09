<div class="mb-8">
    <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 tracking-tight mb-2">Dashboard</h1>
    <p class="text-sm text-gray-500 font-medium">Ringkasan aktivitas platform FINDFOUND.</p>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow cursor-pointer">
        <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center text-blue-500 shrink-0">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        </div>
        <div>
            <p class="text-sm text-gray-500 font-medium mb-1">Total Pengguna</p>
            <h3 class="text-2xl font-bold text-gray-900"><?=$data['total_pengguna']?></h3>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow cursor-pointer">
        <div class="w-14 h-14 rounded-full bg-teal-50 flex items-center justify-center text-[#006D77] shrink-0">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
        </div>
        <div>
            <p class="text-sm text-gray-500 font-medium mb-1">Barang Temuan</p>
            <h3 class="text-2xl font-bold text-gray-900"><?=$data['post_temuan']?></h3>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow cursor-pointer">
        <div class="w-14 h-14 rounded-full bg-red-50 flex items-center justify-center text-red-500 shrink-0">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <div>
            <p class="text-sm text-gray-500 font-medium mb-1">Barang Hilang</p>
            <h3 class="text-2xl font-bold text-gray-900"><?=$data['post_hilang']?></h3>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow cursor-pointer">
        <div class="w-14 h-14 rounded-full bg-orange-50 flex items-center justify-center text-orange-500 shrink-0">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <p class="text-sm text-gray-500 font-medium mb-1">Kasus Selesai</p>
            <h3 class="text-2xl font-bold text-gray-900"><?= $data['kasus_selesai'] ?></h3>
        </div>
    </div>

</div>

<!-- Recent Activity & Chart placeholder -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-bold text-gray-900">Aktivitas Terbaru</h2>
            <a href="<?= BASEURL; ?>/admin/postingan" class="text-sm font-bold text-[#006D77] hover:underline">Lihat Semua</a>
        </div>
        
        <div class="space-y-4">
            <?php if (!empty($data['recent_activities'])): ?>
                <?php foreach ($data['recent_activities'] as $act): ?>
                    <div class="flex items-center gap-4 pb-4 border-b border-gray-50 last:border-0 last:pb-0">
                        <?php if ($act['status'] == 'selesai'): ?>
                            <div class="w-10 h-10 rounded-full bg-teal-100 flex items-center justify-center text-teal-600 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-900 font-medium"><?= htmlspecialchars($act['nama']) ?> menandai laporan "<?= htmlspecialchars($act['judul']) ?>" sebagai selesai.</p>
                                <p class="text-xs text-gray-500 mt-0.5"><?= date('d M Y, H:i', strtotime($act['created_at'])) ?></p>
                            </div>
                        <?php else: ?>
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-900 font-medium"><?= htmlspecialchars($act['nama']) ?> menambahkan laporan <?= htmlspecialchars($act['jenis_laporan']) ?> "<?= htmlspecialchars($act['judul']) ?>".</p>
                                <p class="text-xs text-gray-500 mt-0.5"><?= date('d M Y, H:i', strtotime($act['created_at'])) ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-sm text-gray-500">Belum ada aktivitas.</p>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <h2 class="text-lg font-bold text-gray-900 mb-6">Status Laporan</h2>
        
        <?php 
            $total_post = $data['status_aktif'] + $data['kasus_selesai'];
            $pct_aktif = $total_post > 0 ? round(($data['status_aktif'] / $total_post) * 100) : 0;
            $pct_selesai = $total_post > 0 ? round(($data['kasus_selesai'] / $total_post) * 100) : 0;
        ?>

        <div class="flex flex-col gap-5">
            <div>
                <div class="flex justify-between text-sm mb-1.5">
                    <span class="text-gray-500 font-medium">Aktif / Belum Selesai</span>
                    <span class="font-bold text-gray-900"><?= $pct_aktif ?>%</span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-2.5 overflow-hidden">
                    <div class="bg-yellow-400 h-full rounded-full transition-all duration-500" style="width: <?= $pct_aktif ?>%"></div>
                </div>
                <p class="text-[10px] text-gray-400 mt-1"><?= $data['status_aktif'] ?> laporan</p>
            </div>
            
            <div>
                <div class="flex justify-between text-sm mb-1.5">
                    <span class="text-gray-500 font-medium">Selesai / Ditemukan</span>
                    <span class="font-bold text-gray-900"><?= $pct_selesai ?>%</span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-2.5 overflow-hidden">
                    <div class="bg-teal-500 h-full rounded-full transition-all duration-500" style="width: <?= $pct_selesai ?>%"></div>
                </div>
                <p class="text-[10px] text-gray-400 mt-1"><?= $data['kasus_selesai'] ?> laporan</p>
            </div>
        </div>
    </div>
</div>
