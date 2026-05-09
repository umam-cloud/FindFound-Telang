<a href="<?=BASEURL?>/laporan/" class="fixed bottom-8 right-8 z-50 bg-[#006D77] hover:bg-[#005a63] text-white px-6 py-4 rounded-full shadow-lg shadow-teal-900/30 font-bold flex items-center gap-2 transition-transform transform hover:scale-105">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
    Lapor Barang
</a>

<main class="max-w-6xl mx-auto px-6 py-12">
    
    <div class="mb-10">
        <h1 class="text-5xl font-extrabold tracking-tight text-gray-900 leading-tight">
            Temukan kembali <br>
            <span class="text-[#006D77]">barang Anda.</span>
        </h1>
    </div>

    <div class="relative max-w-2xl mb-8">
        <span class="absolute inset-y-0 left-5 flex items-center text-gray-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </span>
        <input type="text" placeholder="Cari barang yang hilang atau ditemukan..." class="w-full bg-gray-200/80 text-gray-700 rounded-full py-4 pl-14 pr-6 focus:outline-none focus:ring-2 focus:ring-[#006D77] transition-all">
    </div>

    <div class="flex gap-3 overflow-x-auto no-scrollbar mb-12 pb-2">
        <button class="bg-[#006D77] text-white px-5 py-2 rounded-full text-xs font-bold whitespace-nowrap">Semua</button>
        <button class="bg-gray-200 text-gray-600 hover:bg-gray-300 px-5 py-2 rounded-full text-xs font-bold whitespace-nowrap transition">Hilang</button>
        <button class="bg-gray-200 text-gray-600 hover:bg-gray-300 px-5 py-2 rounded-full text-xs font-bold whitespace-nowrap transition">Ditemukan</button>
        <button class="bg-gray-200 text-gray-600 hover:bg-gray-300 px-5 py-2 rounded-full text-xs font-bold whitespace-nowrap transition">Elektronik</button>
        <button class="bg-gray-200 text-gray-600 hover:bg-gray-300 px-5 py-2 rounded-full text-xs font-bold whitespace-nowrap transition">Hewan Peliharaan</button>
        <button class="bg-gray-200 text-gray-600 hover:bg-gray-300 px-5 py-2 rounded-full text-xs font-bold whitespace-nowrap transition">Pribadi</button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-gray-100 lg:col-span-2 flex flex-col md:flex-row relative">
            <div class="absolute top-6 left-6 z-10 bg-[#D1E9E6] text-[#006D77] text-[10px] font-bold px-3 py-1 rounded-sm uppercase tracking-wider">Hilang</div>
            <img src="https://images.unsplash.com/photo-1627123424574-724758594e93?q=80&w=800" alt="Dompet" class="w-full md:w-1/2 h-64 md:h-auto object-cover">
            <div class="p-8 md:p-10 flex flex-col justify-center w-full md:w-1/2">
                <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> 12 Okt 2023</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Dompet Kulit Cokelat</h3>
                <p class="text-xs text-gray-500 flex items-center gap-1 mb-4"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> Taman Suropati, Jakarta Pusat</p>
                <p class="text-sm text-gray-600 mb-8 leading-relaxed">Berisi beberapa kartu identitas atas nama Adi Satria dan sejumlah uang tunai. Terakhir terlihat di bangku taman...</p>
                <button class="bg-[#006D77] text-white px-6 py-3 rounded-full text-sm font-bold w-max hover:bg-[#005a63] transition">Hubungi Pemilik</button>
            </div>
        </div>

        <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-gray-100 relative flex flex-col">
            <div class="absolute top-6 left-6 z-10 bg-[#D1E9E6] text-[#006D77] text-[10px] font-bold px-3 py-1 rounded-sm uppercase tracking-wider">Ditemukan</div>
            <img src="https://images.unsplash.com/photo-1582139329536-e7284fece509?q=80&w=800" alt="Kunci" class="w-full h-56 object-cover">
            <div class="p-8 flex-grow flex flex-col">
                <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
                    <span>11 Okt 2023</span>
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> Stasiun Sudirman</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Kunci Apartemen</h3>
                <p class="text-sm text-gray-600 mb-8 flex-grow">Ditemukan di dekat pintu keluar Stasiun. Ada 3 kunci dan 1 gantungan kunci boneka beruang biru kecil.</p>
                <button class="bg-gray-200 text-gray-600 px-6 py-3 rounded-full text-sm font-bold w-full hover:bg-gray-300 transition">Klaim Barang</button>
            </div>
        </div>

        <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-gray-100 relative flex flex-col">
            <div class="absolute top-6 left-6 z-10 bg-[#D1E9E6] text-[#006D77] text-[10px] font-bold px-3 py-1 rounded-sm uppercase tracking-wider">Hilang</div>
            <img src="https://www.digimap.co.id/cdn/shop/files/iPhone_13_Starlight_PDP_Image_Position-1A__GBEN_32d66fbc-560a-4c84-8a65-f5a3e9896a2c.jpg?v=1717739307&width=176" alt="iPhone" class="w-full h-56 object-cover">
            <div class="p-8 flex-grow flex flex-col">
                <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
                    <span>10 Okt 2023</span>
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> Grand Indonesia</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">iPhone 13 Pro Graphite</h3>
                <p class="text-sm text-gray-600 mb-8 flex-grow">Casing transparan dengan stiker kucing di belakang. Hilang di area Food Court lantai 5 sekitar jam 7 malam.</p>
                <button class="bg-[#006D77] text-white px-6 py-3 rounded-full text-sm font-bold w-full hover:bg-[#005a63] transition">Hubungi Pemilik</button>
            </div>
        </div>

        <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-gray-100 lg:col-span-2 flex flex-col-reverse md:flex-row relative">
            <div class="absolute top-6 right-6 md:right-auto md:left-[55%] z-10 bg-[#D1E9E6] text-[#006D77] text-[10px] font-bold px-3 py-1 rounded-sm uppercase tracking-wider">Ditemukan</div>
            <div class="p-8 md:p-10 flex flex-col justify-center w-full md:w-1/2">
                <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> 09 Okt 2023</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Golden Retriever (Maddie)</h3>
                <p class="text-xs text-gray-500 flex items-center gap-1 mb-4"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> Kompleks BSD City, Tangerang</p>
                <p class="text-sm text-gray-600 mb-8 leading-relaxed">Ditemukan anjing ramah dengan kalung bertuliskan 'Maddie'. Saat ini sedang kami amankan di pos satpam Cluster...</p>
                <button class="bg-gray-200 text-gray-600 px-6 py-3 rounded-full text-sm font-bold w-max hover:bg-gray-300 transition">Klaim Barang</button>
            </div>
            <img src="https://images.unsplash.com/photo-1552053831-71594a27632d?q=80&w=800" alt="Dog" class="w-full md:w-1/2 h-64 md:h-auto object-cover">
        </div>

        <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-gray-100 relative flex flex-col">
            <div class="absolute top-6 left-6 z-10 bg-[#D1E9E6] text-[#006D77] text-[10px] font-bold px-3 py-1 rounded-sm uppercase tracking-wider">Hilang</div>
            <img src="https://images.unsplash.com/photo-1592496001020-d31bd830651f?q=80&w=800" alt="Kindle" class="w-full h-56 object-cover bg-gray-100 p-8">
            <div class="p-8 flex-grow flex flex-col">
                <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
                    <span>08 Okt 2023</span>
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> Perpustakaan Nasional</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Kindle Paperwhite</h3>
                <p class="text-sm text-gray-600 mb-8 flex-grow">Tertinggal di meja baca lantai 4. Menggunakan casing kulit warna navy dengan banyak stiker buku.</p>
                <button class="bg-[#006D77] text-white px-6 py-3 rounded-full text-sm font-bold w-full hover:bg-[#005a63] transition">Hubungi Pemilik</button>
            </div>
        </div>

    </div>

    <div class="mt-16 flex justify-center">
        <a href="<?= BASEURL; ?>/postingan" class="inline-block border-2 border-[#006D77] text-[#006D77] hover:bg-[#006D77] hover:text-white px-8 py-3 rounded-full text-sm font-bold transition-all text-center">
            Lihat Lebih Banyak Postingan
        </a>
    </div>

</main>
