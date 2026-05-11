<main class="max-w-7xl mx-auto px-6 py-10 md:py-14">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8">
        <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight mb-2">Temukan barang yang hilang.</h1>
            <p class="text-sm text-gray-500 font-medium"><?=$int?> Hasil ditemukan</p>
        </div>
        <div class="mt-4 md:mt-0 flex items-center gap-2 bg-gray-50/50 px-4 py-2 rounded-full border border-gray-100">
            <span class="text-[10px] font-bold uppercase tracking-widest text-gray-400">Urutan:</span>
            <select class="bg-transparent border-none text-[#006D77] font-bold text-sm focus:ring-0 outline-none cursor-pointer appearance-none pr-4 relative">
                <option value="terbaru" selected>Terbaru</option>
                <option value="terlama">Terlama</option>
            </select>
            <svg class="w-3 h-3 text-[#006D77] -ml-4 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </div>
    </div>

    <div class="relative w-full mb-12">
        <span class="absolute inset-y-0 left-6 flex items-center text-gray-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </span>
        <input type="text" placeholder="Cari barang yang hilang atau ditemukan..." class="w-full bg-white border border-gray-100 shadow-sm rounded-full py-4 pl-14 pr-6 focus:outline-none focus:ring-2 focus:ring-[#006D77] text-sm text-gray-700 transition-all">
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">
        <aside class="lg:col-span-1 flex flex-col gap-8">
            <div>
                <h3 class="text-[10px] font-bold tracking-[0.2em] uppercase text-gray-500 mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Kategori
                </h3>
                <div class="flex flex-col gap-3">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" class="w-4 h-4 rounded-sm border-gray-300 text-[#006D77] focus:ring-[#006D77]">
                        <span class="text-sm text-gray-600 group-hover:text-gray-900 transition-colors">Elektronik</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" checked class="w-4 h-4 rounded-sm border-gray-300 text-[#006D77] focus:ring-[#006D77]">
                        <span class="text-sm text-gray-900 font-medium">Dokumen & Dompet</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" class="w-4 h-4 rounded-sm border-gray-300 text-[#006D77] focus:ring-[#006D77]">
                        <span class="text-sm text-gray-600 group-hover:text-gray-900 transition-colors">Pakaian</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" class="w-4 h-4 rounded-sm border-gray-300 text-[#006D77] focus:ring-[#006D77]">
                        <span class="text-sm text-gray-600 group-hover:text-gray-900 transition-colors">Lainnya</span>
                    </label>
                </div>
            </div>

            <div>
                <h3 class="text-[10px] font-bold tracking-[0.2em] uppercase text-gray-500 mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Status
                </h3>
                <div class="flex bg-gray-100 rounded-full p-1 border border-gray-200/50">
                    <button class="flex-1 bg-[#006D77] text-white text-[10px] font-bold py-2 rounded-full shadow-sm tracking-wide">Semua</button>
                    <button class="flex-1 text-gray-500 hover:text-gray-800 text-[10px] font-bold py-2 rounded-full tracking-wide transition-colors">Hilang</button>
                    <button class="flex-1 text-gray-500 hover:text-gray-800 text-[10px] font-bold py-2 rounded-full tracking-wide transition-colors">Ditemukan</button>
                </div>
            </div>

            <div>
                <h3 class="text-[10px] font-bold tracking-[0.2em] uppercase text-gray-500 mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Rentang Waktu
                </h3>
                <div class="relative">
                    <select class="w-full bg-gray-100 border-none text-gray-700 text-xs font-bold py-3.5 px-4 rounded-xl focus:ring-2 focus:ring-[#006D77] outline-none appearance-none cursor-pointer">
                        <option value="7">7 Hari Terakhir</option>
                        <option value="30">30 Hari Terakhir</option>
                        <option value="all">Semua Waktu</option>
                    </select>
                    <span class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </div>
            </div>

            <button class="w-full bg-[#006D77] hover:bg-[#005a63] text-white py-3.5 rounded-full text-sm font-bold shadow-md transition-all active:scale-[0.98] mt-2">
                Terapkan Filter
            </button>
        </aside>

        <div class="lg:col-span-3">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($data as $post):
                    $jenis = $post['jenis_laporan'];

                    if ($jenis == 'hilang') {
                        $badgeClass = 'bg-red-100 text-red-800';
                    }else{
                        $badgeClass = 'bg-[#D1E9E6] text-[#006D77]';
                    }?>
                    <a href="<?=BASEURL?>/postingan/detailPostingan/<?=$post['id']?>" class="bg-white rounded-[1.5rem] overflow-hidden shadow-sm border border-gray-100 flex flex-col group hover:shadow-md transition-all cursor-grab" >
                        <div class="relative h-44 bg-gray-200 overflow-hidden">
                            <span class="<?=$badgeClass?> absolute top-4 left-4 z-10 text-[9px] font-bold px-2.5 py-1 rounded-sm uppercase tracking-widest shadow-sm"><?=$post['jenis_laporan']?></span>
                            <img src="<?=BASEURL?>/img/postingan/<?=$post['file_path']?>" alt="Dompet" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 flex-grow flex flex-col">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-base font-bold text-gray-900 pr-4 leading-tight"><?=$post['judul']?></h3>
                                <button class="text-gray-400 hover:text-[#006D77] transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg></button>
                            </div>
                            <p class="text-xs text-gray-500 mb-6 flex-grow leading-relaxed line-clamp-3"><?=$post['deskripsi']?></p>
                            <div class="flex items-center justify-between text-[10px] text-gray-400 font-medium pt-4 border-t border-gray-50">
                                <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> <?=$post['lokasi_spesifik']?></span>
                                <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><?=$post['tanggal_kejadian']?></span>
                            </div>
                        </div>
                    </a>
                <?php endforeach ?>
                <div class="md:col-span-2 bg-[#006D77] rounded-[1.5rem] p-8 md:p-10 text-white flex flex-col justify-center relative overflow-hidden shadow-lg mt-2">
                    <div class="absolute right-0 bottom-0 opacity-20 w-1/2 h-full pointer-events-none mix-blend-overlay">
                        <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=400" alt="Map pattern" class="w-full h-full object-cover">
                    </div>
                    
                    <div class="relative z-10 max-w-sm">
                        <p class="text-[10px] font-bold uppercase tracking-widest text-teal-200 mb-3">Informasi Komunitas</p>
                        <h2 class="text-2xl font-bold mb-4 leading-tight">Bantu tingkatkan keamanan di area Anda.</h2>
                        <p class="text-sm text-teal-50 opacity-90 leading-relaxed mb-8">
                            Aktifkan notifikasi untuk mendapatkan pemberitahuan instan saat ada barang yang hilang atau ditemukan di radius 5km dari posisi Anda.
                        </p>
                        <button class="bg-white text-[#006D77] px-6 py-3 rounded-full text-xs font-bold shadow-md hover:bg-gray-50 transition-colors w-max">
                            Aktifkan Sekarang
                        </button>
                    </div>
                </div>

            </div>
            <div class="flex justify-center items-center gap-2 mt-16">
                <button class="w-8 h-8 rounded-full bg-gray-100 text-gray-500 hover:bg-gray-200 flex items-center justify-center transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button class="w-8 h-8 rounded-full bg-[#006D77] text-white flex items-center justify-center font-bold text-xs shadow-md">1</button>
                <button class="w-8 h-8 rounded-full bg-transparent text-gray-600 hover:bg-gray-100 flex items-center justify-center font-bold text-xs transition-colors">2</button>
                <button class="w-8 h-8 rounded-full bg-transparent text-gray-600 hover:bg-gray-100 flex items-center justify-center font-bold text-xs transition-colors">3</button>
                <span class="text-gray-400 font-bold text-xs px-1">...</span>
                <button class="w-8 h-8 rounded-full bg-transparent text-gray-600 hover:bg-gray-100 flex items-center justify-center font-bold text-xs transition-colors">12</button>
                <button class="w-8 h-8 rounded-full bg-gray-100 text-gray-500 hover:bg-gray-200 flex items-center justify-center transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>

        </div>
    </div>

</main>
