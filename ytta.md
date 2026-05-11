<main class="max-w-6xl mx-auto px-6 py-12">
    
    <!-- Bagian Header & Filter (Tetap sama) -->
    <div class="mb-10">
        <h1 class="text-5xl font-extrabold tracking-tight text-gray-900 leading-tight">
            Temukan kembali <br>
            <span class="text-[#006D77]">barang Anda.</span>
        </h1>
    </div>

    <!-- ... (Input Search & Buttons Filter Tetap Sama) ... -->

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <?php foreach($data as $index => $post): 
            // Opsional: Siapkan variabel pendukung (Asumsi kamu punya kolom 'status' dan 'created_at')
            $status = isset($post['status']) ? $post['status'] : 'Hilang'; 
            $tanggal = isset($post['created_at']) ? date('d M Y', strtotime($post['created_at'])) : 'Tanggal tidak diketahui';
            
            // Logic untuk membedakan gaya tombol berdasarkan status
            $btnText = ($status == 'Hilang') ? 'Hubungi Pemilik' : 'Klaim Barang';
            $btnClass = ($status == 'Hilang') 
                ? 'bg-[#006D77] text-white hover:bg-[#005a63]' 
                : 'bg-gray-200 text-gray-600 hover:bg-gray-300';
        ?>

            <?php if ($index == 0): ?>
                <!-- DATA KE-1: Kartu Besar (Span 2 Kolom), Gambar di Kiri -->
                <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-gray-100 lg:col-span-2 flex flex-col md:flex-row relative">
                    <div class="absolute top-6 left-6 z-10 bg-[#D1E9E6] text-[#006D77] text-[10px] font-bold px-3 py-1 rounded-sm uppercase tracking-wider"><?= $status ?></div>
                    <img src="<?=BASEURL?>/postingan/<?=$post['file_path']?>" alt="Gambar Barang" class="w-full md:w-1/2 h-64 md:h-auto object-cover">
                    <div class="p-8 md:p-10 flex flex-col justify-center w-full md:w-1/2">
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span class="flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> 
                                <?= $tanggal ?>
                            </span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2"><?=$post['judul']?></h3>
                        <p class="text-xs text-gray-500 flex items-center gap-1 mb-4">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <?=$post['lokasi_spesifik']?>
                        </p>
                        <p class="text-sm text-gray-600 mb-8 leading-relaxed"><?=$post['deskripsi']?></p>
                        <button class="<?= $btnClass ?> px-6 py-3 rounded-full text-sm font-bold w-max transition"><?= $btnText ?></button>
                    </div>
                </div>

            <?php elseif ($index == 1 || $index == 2 || $index == 4): ?>
                <!-- DATA KE-2, 3, dan 5: Kartu Kecil (1 Kolom Vertikal) -->
                <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-gray-100 relative flex flex-col">
                    <div class="absolute top-6 left-6 z-10 bg-[#D1E9E6] text-[#006D77] text-[10px] font-bold px-3 py-1 rounded-sm uppercase tracking-wider"><?= $status ?></div>
                    <img src="<?=BASEURL?>/postingan/<?=$post['file_path']?>" alt="Gambar Barang" class="w-full h-56 object-cover">
                    <div class="p-8 flex-grow flex flex-col">
                        <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
                            <span><?= $tanggal ?></span>
                            <span class="flex items-center gap-1 truncate w-1/2 justify-end">
                                <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> 
                                <span class="truncate"><?=$post['lokasi_spesifik']?></span>
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-1"><?=$post['judul']?></h3>
                        <p class="text-sm text-gray-600 mb-8 flex-grow line-clamp-3"><?=$post['deskripsi']?></p>
                        <button class="<?= $btnClass ?> px-6 py-3 rounded-full text-sm font-bold w-full transition"><?= $btnText ?></button>
                    </div>
                </div>

            <?php elseif ($index == 3): ?>
                <!-- DATA KE-4: Kartu Besar (Span 2 Kolom), Teks Kiri, Gambar Kanan -->
                <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-gray-100 lg:col-span-2 flex flex-col-reverse md:flex-row relative">
                    <div class="absolute top-6 right-6 md:right-auto md:left-[55%] z-10 bg-[#D1E9E6] text-[#006D77] text-[10px] font-bold px-3 py-1 rounded-sm uppercase tracking-wider"><?= $status ?></div>
                    <div class="p-8 md:p-10 flex flex-col justify-center w-full md:w-1/2">
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span class="flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> 
                                <?= $tanggal ?>
                            </span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2"><?=$post['judul']?></h3>
                        <p class="text-xs text-gray-500 flex items-center gap-1 mb-4">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> 
                            <?=$post['lokasi_spesifik']?>
                        </p>
                        <p class="text-sm text-gray-600 mb-8 leading-relaxed"><?=$post['deskripsi']?></p>
                        <button class="<?= $btnClass ?> px-6 py-3 rounded-full text-sm font-bold w-max transition"><?= $btnText ?></button>
                    </div>
                    <img src="<?=BASEURL?>/postingan/<?=$post['file_path']?>" alt="Gambar Barang" class="w-full md:w-1/2 h-64 md:h-auto object-cover">
                </div>
            <?php endif; ?>

        <?php endforeach; ?>

    </div>

    <!-- ... (Tombol Lihat Lebih Banyak Tetap Sama) ... -->

</main>



<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    
    <?php foreach($data as $index => $post): 
        // Persiapan Variabel Data Dasar
        $status = isset($post['status']) ? $post['status'] : 'Hilang'; 
        $tanggal = isset($post['created_at']) ? date('d M Y', strtotime($post['created_at'])) : 'Tanggal tidak diketahui';
        
        // Logika 3 Status untuk Tombol dan Badge Keterangan
        if ($status == 'Hilang') {
            $btnText    = 'Hubungi Pemilik';
            $btnClass   = 'bg-[#006D77] text-white hover:bg-[#005a63]'; // Warna utama (Teal gelap)
            $badgeClass = 'bg-[#D1E9E6] text-[#006D77]'; // Latar Teal terang, teks Teal gelap
        } elseif ($status == 'Ditemukan') {
            $btnText    = 'Klaim Barang';
            $btnClass   = 'bg-gray-200 text-gray-700 hover:bg-gray-300'; // Warna abu-abu
            $badgeClass = 'bg-gray-200 text-gray-700'; // Latar abu-abu terang
        } else { 
            // Asumsi status ke-3 adalah 'Dikembalikan' atau 'Selesai'
            $status     = 'Dikembalikan'; // Memastikan teks badge tertulis "Dikembalikan"
            $btnText    = 'Sudah Dikembalikan';
            // Warna Hijau untuk menandakan selesai, ditambah cursor-not-allowed agar terlihat tidak bisa di-klik
            $btnClass   = 'bg-green-500 text-white cursor-not-allowed opacity-90'; 
            $badgeClass = 'bg-green-100 text-green-800'; // Latar Hijau terang, teks Hijau gelap
        }

        // Tentukan pola berulang menggunakan Modulo 4
        $pola = $index % 4; 
    ?>

        <?php if ($pola == 0): ?>
            <!-- POLA 0: Kartu Besar (Gambar Kiri) -->
            <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-gray-100 lg:col-span-2 flex flex-col md:flex-row relative">
                <!-- Perhatikan penggunaan $badgeClass di bawah ini -->
                <div class="absolute top-6 left-6 z-10 <?= $badgeClass ?> text-[10px] font-bold px-3 py-1 rounded-sm uppercase tracking-wider"><?= $status ?></div>
                <img src="<?=BASEURL?>/postingan/<?=$post['file_path']?>" alt="Gambar Barang" class="w-full md:w-1/2 h-64 md:h-auto object-cover">
                <div class="p-8 md:p-10 flex flex-col justify-center w-full md:w-1/2">
                    <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                        <span class="flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> 
                            <?= $tanggal ?>
                        </span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2"><?=$post['judul']?></h3>
                    <p class="text-xs text-gray-500 flex items-center gap-1 mb-4">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                        <?=$post['lokasi_spesifik']?>
                    </p>
                    <p class="text-sm text-gray-600 mb-8 leading-relaxed"><?=$post['deskripsi']?></p>
                    <button class="<?= $btnClass ?> px-6 py-3 rounded-full text-sm font-bold w-max transition" <?= ($status == 'Dikembalikan') ? 'disabled' : '' ?>><?= $btnText ?></button>
                </div>
            </div>

        <?php elseif ($pola == 3): ?>
            <!-- POLA 3: Kartu Besar (Gambar Kanan) -->
            <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-gray-100 lg:col-span-2 flex flex-col-reverse md:flex-row relative">
                <div class="absolute top-6 right-6 md:right-auto md:left-[55%] z-10 <?= $badgeClass ?> text-[10px] font-bold px-3 py-1 rounded-sm uppercase tracking-wider"><?= $status ?></div>
                <div class="p-8 md:p-10 flex flex-col justify-center w-full md:w-1/2">
                    <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                        <span class="flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> 
                            <?= $tanggal ?>
                        </span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2"><?=$post['judul']?></h3>
                    <p class="text-xs text-gray-500 flex items-center gap-1 mb-4">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> 
                        <?=$post['lokasi_spesifik']?>
                    </p>
                    <p class="text-sm text-gray-600 mb-8 leading-relaxed"><?=$post['deskripsi']?></p>
                    <button class="<?= $btnClass ?> px-6 py-3 rounded-full text-sm font-bold w-max transition" <?= ($status == 'Dikembalikan') ? 'disabled' : '' ?>><?= $btnText ?></button>
                </div>
                <img src="<?=BASEURL?>/postingan/<?=$post['file_path']?>" alt="Gambar Barang" class="w-full md:w-1/2 h-64 md:h-auto object-cover">
            </div>

        <?php else: ?>
            <!-- POLA 1 & 2: Kartu Kecil (Vertikal) -->
            <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-gray-100 relative flex flex-col">
                <div class="absolute top-6 left-6 z-10 <?= $badgeClass ?> text-[10px] font-bold px-3 py-1 rounded-sm uppercase tracking-wider"><?= $status ?></div>
                <img src="<?=BASEURL?>/postingan/<?=$post['file_path']?>" alt="Gambar Barang" class="w-full h-56 object-cover">
                <div class="p-8 flex-grow flex flex-col">
                    <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
                        <span><?= $tanggal ?></span>
                        <span class="flex items-center gap-1 truncate w-1/2 justify-end">
                            <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> 
                            <span class="truncate"><?=$post['lokasi_spesifik']?></span>
                        </span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-1"><?=$post['judul']?></h3>
                    <p class="text-sm text-gray-600 mb-8 flex-grow line-clamp-3"><?=$post['deskripsi']?></p>
                    <button class="<?= $btnClass ?> px-6 py-3 rounded-full text-sm font-bold w-full transition" <?= ($status == 'Dikembalikan') ? 'disabled' : '' ?>><?= $btnText ?></button>
                </div>
            </div>
            
        <?php endif; ?>

    <?php endforeach; ?>

</div>