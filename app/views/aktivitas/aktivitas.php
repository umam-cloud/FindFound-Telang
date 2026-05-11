<main class="max-w-5xl mx-auto px-6 py-10 md:py-14">

    <div class="mb-10">
        <p class="text-[10px] font-bold tracking-[0.2em] text-[#006D77] uppercase mb-3">Dashboard Pengguna</p>
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">Aktivitas Saya</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white p-6 md:p-8 rounded-[1.5rem] shadow-sm border border-gray-100 flex justify-between items-end hover:shadow-md transition-shadow">
            <div>
                <p class="text-[11px] font-bold text-gray-400 mb-2 uppercase tracking-widest">Aktif</p>
                <h3 class="text-4xl font-extrabold text-[#006D77] leading-none"><?=$int['status_aktif']?></h3>
            </div>
            <div class="text-[#006D77] bg-[#D1E9E6]/50 p-3 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
        </div>

        <div class="bg-white p-6 md:p-8 rounded-[1.5rem] shadow-sm border border-gray-100 flex justify-between items-end hover:shadow-md transition-shadow">
            <div>
                <p class="text-[11px] font-bold text-gray-400 mb-2 uppercase tracking-widest">Selesai</p>
                <h3 class="text-4xl font-extrabold text-[#006D77] leading-none"><?=$int['status_selesai']?></h3>
            </div>
            <div class="text-[#006D77] bg-[#D1E9E6]/50 p-3 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>

        <!-- <div class="bg-white p-6 md:p-8 rounded-[1.5rem] shadow-sm border border-gray-100 flex justify-between items-end hover:shadow-md transition-shadow">
            <div>
                <p class="text-[11px] font-bold text-gray-400 mb-2 uppercase tracking-widest">Menunggu</p>
                <h3 class="text-4xl font-extrabold text-[#006D77] leading-none">05</h3>
            </div>
            <div class="text-[#006D77] bg-[#D1E9E6]/50 p-3 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div> -->
    </div>

    <div class="flex gap-8 border-b border-gray-200 mb-8">
        <button class="pb-4 text-xs font-bold text-[#006D77] border-b-2 border-[#006D77] tracking-wide transition-colors">Postingan Saya</button>
        <button class="pb-4 text-xs font-bold text-gray-400 hover:text-gray-600 tracking-wide transition-colors">Barang Dilaporkan</button>
    </div>

    <div class="flex flex-col gap-4">
        <?php foreach ($data as $post):?>

            <div class="bg-white p-4 md:p-5 rounded-[1.5rem] shadow-sm border border-gray-100 flex flex-col md:flex-row md:items-center gap-5 hover:shadow-md transition-all group">
                <div class="w-full md:w-32 h-24 rounded-xl overflow-hidden shrink-0 bg-gray-100 relative">
                    <img src="<?=BASEURL?>/img/postingan/<?=$post['file_path']?>" alt="Dompet" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="flex-grow">
                    <h4 class="font-bold text-gray-900 text-lg mb-2"><?=$post['judul']?></h4>
                    <div class="flex items-center gap-5 text-[11px] text-gray-500 font-medium">
                        <span class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg><?=$post['tanggal_kejadian']?></span>
                        <span class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg><?=$post['lokasi_spesifik']?></span>
                    </div>
                </div>
                <div class="flex items-center justify-between md:justify-end gap-6 w-full md:w-auto mt-2 md:mt-0 pt-4 md:pt-0 border-t border-gray-50 md:border-none">
                    <span class="bg-[#D1E9E6] text-[#006D77] text-[9px] font-bold px-3 py-1.5 rounded uppercase tracking-widest">Aktif</span>
                    <button class="text-gray-400 hover:text-gray-900 transition-colors p-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg>
                    </button>
                </div>
            </div>

        <?php endforeach ?>

    </div>

    <div class="mt-12 flex justify-center">
        <button class="bg-[#006D77] hover:bg-[#005a63] text-white px-10 py-3.5 rounded-full text-sm font-bold shadow-md shadow-teal-900/20 transition-all active:scale-[0.98]">
            Muat Lebih Banyak
        </button>
    </div>

</main>