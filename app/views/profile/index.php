<main class="max-w-6xl mx-auto px-6 py-10 md:py-14">
    <div class="flex flex-col md:flex-row gap-8 mb-16 bg-white p-8 md:p-10 rounded-[2rem] shadow-sm border border-gray-100">
        <div class="w-40 h-40 md:w-48 md:h-48 rounded-[2rem] overflow-hidden shrink-0 bg-gray-100 border border-gray-200">
            <img src="<?= !empty($data['foto_profil']) ? BASEURL . '/img/profile/' . $data['foto_profil'] : 'https://api.dicebear.com/9.x/adventurer-neutral/svg?seed=Felix'. urlencode($data['nama'] ?? 'User') .'&backgroundColor=b6e3f4' ?>" alt="Foto Profil" class="w-full h-full object-cover">
        </div>
        <div class="flex flex-col justify-center w-full">
            <span class="bg-[#D1E9E6] text-[#006D77] text-[10px] font-bold px-3 py-1.5 rounded-sm uppercase tracking-wider w-max mb-4">Profil Terverifikasi</span>
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4 tracking-tight"><?=$data['nama']?></h1>
            
            <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-8 text-sm text-gray-500 font-medium mb-8">
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <?=$data['email']?>
                </span>
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    <?=$data['whatsapp']?? '-'?>
                </span>
            </div>
            
            <div class="flex items-center gap-3">
                <a href="<?=BASEURL?>/profile/editProfile" class="bg-[#006D77] hover:bg-[#005a63] text-white px-6 py-3 rounded-full text-sm font-bold flex items-center gap-2 transition-all active:scale-95 shadow-md shadow-teal-900/10">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    Edit Profil
                </a>
                <a href="<?=BASEURL?>/auth/logout" class="bg-white border border-gray-200 text-gray-700 hover:text-red-600 hover:border-red-200 hover:bg-red-50 px-6 py-3 rounded-full text-sm font-bold flex items-center gap-2 transition-all active:scale-95">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Keluar
                </a>
            </div>
        </div>
    </div>

    <div class="mb-16">
        <div class="flex justify-between items-end mb-8">
            <div>
                <p class="text-[10px] font-bold tracking-[0.2em] text-[#006D77] uppercase mb-2">Koleksi Digital</p>
                <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Postingan Saya</h2>
            </div>
            <div class="flex gap-2 text-gray-400">
                <button class="p-2 bg-gray-200 rounded text-gray-800"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M4 4h4v4H4V4zm6 0h4v4h-4V4zm6 0h4v4h-4V4zM4 10h4v4H4v-4zm6 0h4v4h-4v-4zm6 0h4v4h-4v-4zM4 16h4v4H4v-4zm6 0h4v4h-4v-4zm6 0h4v4h-4v-4z"/></svg></button>
                <button class="p-2 hover:bg-gray-100 rounded transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M3 4h18v2H3V4zm0 7h18v2H3v-2zm0 7h18v2H3v-2z"/></svg></button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-gray-100 flex flex-col group hover:shadow-md transition-shadow">
                <div class="h-48 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1627123424574-724758594e93?q=80&w=600" alt="Dompet" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-red-600 text-[9px] font-bold uppercase tracking-widest bg-red-50 px-2 py-1 rounded">Ditemukan</span>
                        <span class="text-[10px] text-gray-400 font-bold">12 Okt 2023</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Dompet Kulit Cokelat</h3>
                    <p class="text-xs text-gray-500 mb-6 flex-grow leading-relaxed">Ditemukan di area parkir utara. Berisi beberapa kartu identitas dan uang tunai.</p>
                    <div class="flex justify-between items-center pt-4 border-t border-gray-50">
                        <span class="text-[10px] font-bold text-gray-400 flex items-center gap-1.5"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> Area Parkir</span>
                        <a href="#" class="text-[11px] font-bold text-[#006D77] hover:text-teal-900 flex items-center gap-1 transition-colors">Kelola <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-gray-100 flex flex-col group hover:shadow-md transition-shadow">
                <div class="h-48 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1562040506-a9ba31eaaf97?q=80&w=600" alt="Kunci Mobil" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-[#006D77] text-[9px] font-bold uppercase tracking-widest bg-[#D1E9E6] px-2 py-1 rounded">Hilang</span>
                        <span class="text-[10px] text-gray-400 font-bold">08 Okt 2023</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Kunci Mobil Toyota</h3>
                    <p class="text-xs text-gray-500 mb-6 flex-grow leading-relaxed">Terakhir terlihat di kantin pusat saat jam makan siang. Memiliki gantungan kunci biru.</p>
                    <div class="flex justify-between items-center pt-4 border-t border-gray-50">
                        <span class="text-[10px] font-bold text-gray-400 flex items-center gap-1.5"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> Kantin Pusat</span>
                        <a href="#" class="text-[11px] font-bold text-[#006D77] hover:text-teal-900 flex items-center gap-1 transition-colors">Kelola <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-gray-100 flex flex-col group hover:shadow-md transition-shadow">
                <div class="h-48 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1511499767150-a48a237f0083?q=80&w=600" alt="Kacamata" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-80">
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-gray-500 text-[9px] font-bold uppercase tracking-widest bg-gray-100 px-2 py-1 rounded border border-gray-200">Selesai</span>
                        <span class="text-[10px] text-gray-400 font-bold">01 Okt 2023</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Kacamata Hitam Rayban</h3>
                    <p class="text-xs text-gray-500 mb-6 flex-grow leading-relaxed">Ditemukan di perpustakaan lantai 2. Sudah dikembalikan kepada pemilik sah.</p>
                    <div class="flex justify-between items-center pt-4 border-t border-gray-50">
                        <span class="text-[10px] font-bold text-gray-400 flex items-center gap-1.5"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg> Terarsip</span>
                        <a href="#" class="text-[11px] font-bold text-gray-500 hover:text-gray-900 flex items-center gap-1 transition-colors">Detail <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="relative rounded-[2rem] overflow-hidden shadow-lg h-64 md:h-[340px] flex items-center p-10 md:p-16 group">
        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=1200" alt="Community" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
        <div class="absolute inset-0 bg-gradient-to-r from-[#003D44] via-[#006D77]/90 to-transparent mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
        <div class="relative z-10 text-white max-w-xl">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 leading-tight tracking-tight">Melayani komunitas dengan integritas dan kejujuran.</h2>
            <p class="text-sm md:text-base text-teal-50 font-medium">Anda telah membantu mengembalikan <span class="font-bold text-white bg-white/20 px-2 py-0.5 rounded">12</span> barang berharga tahun ini.</p>
        </div>
    </div>

</main>