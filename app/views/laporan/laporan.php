<main class="max-w-4xl mx-auto px-6 py-10 md:py-14">
 
    <div class="mb-12 max-w-2xl">
        <p class="text-[10px] font-bold tracking-[0.2em] text-[#006D77] uppercase mb-4">Formulir Pelaporan</p>
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4 leading-tight">Bagikan Informasi<br>Untuk Komunitas.</h1>
        <p class="text-sm text-gray-500 leading-relaxed font-medium">
            Setiap detail yang Anda berikan mempercepat proses penemuan dan pengembalian barang ke pemiliknya yang sah.
        </p>
    </div>

    <form action="#" method="POST">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
            
            <label class="cursor-pointer relative group">
                <input type="radio" name="jenis_laporan" value="hilang" class="peer sr-only" checked>
                <div class="p-6 md:p-8 rounded-2xl border-2 border-gray-100 bg-gray-50 transition-all hover:bg-gray-100 peer-checked:border-[#006D77] peer-checked:bg-white peer-checked:shadow-sm">
                    <div class="mb-4 text-gray-400 peer-checked:text-[#006D77]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Barang Hilang</h3>
                    <p class="text-xs text-gray-500">Saya kehilangan sesuatu dan ingin mencarinya.</p>
                </div>
            </label>

            <label class="cursor-pointer relative group">
                <input type="radio" name="jenis_laporan" value="temuan" class="peer sr-only">
                <div class="p-6 md:p-8 rounded-2xl border-2 border-gray-100 bg-gray-50 transition-all hover:bg-gray-100 peer-checked:border-[#006D77] peer-checked:bg-white peer-checked:shadow-sm">
                    <div class="mb-4 text-gray-400 group-hover:text-gray-500 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Barang Temuan</h3>
                    <p class="text-xs text-gray-500">Saya menemukan barang milik orang lain.</p>
                </div>
            </label>
        </div>

        <div class="relative w-full h-56 md:h-72 rounded-[2rem] overflow-hidden mb-10 group cursor-pointer border border-gray-100 shadow-sm bg-gray-100">
            <img src="https://images.unsplash.com/photo-1627123424574-724758594e93?q=80&w=800" alt="Upload Background" class="absolute inset-0 w-full h-full object-cover opacity-40 mix-blend-multiply blur-sm group-hover:scale-105 transition-transform duration-700">
            
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-6">
                <div class="bg-[#D1E9E6]/90 p-3.5 rounded-full mb-4 text-[#006D77] shadow-sm group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Bukti Visual</h3>
                <p class="text-[11px] text-gray-600 font-medium leading-relaxed max-w-xs">Unggah foto barang yang jelas. Maksimal 10MB<br>(JPG, PNG).</p>
            </div>
            <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-8 mb-8">
            
            <div>
                <label class="block text-[10px] font-bold text-gray-800 mb-3 tracking-widest">Judul Laporan</label>
                <input type="text" name="judul" placeholder="Misal: Kunci Motor Honda Hitam" 
                       class="w-full px-5 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-xl text-sm outline-none text-gray-700 font-medium transition-all placeholder-gray-400">
            </div>

            <div>
                <label class="block text-[10px] font-bold text-gray-800 mb-3 tracking-widest">Tanggal Kejadian</label>
                <div class="relative">
                    <input type="date" name="tanggal" 
                           class="w-full px-5 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-xl text-sm outline-none text-gray-700 font-medium transition-all cursor-pointer appearance-none">
                </div>
            </div>

            <div class="md:col-span-2">
                <label class="block text-[10px] font-bold text-gray-800 mb-3 tracking-widest">Lokasi di Telang</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-4 flex items-center text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </span>
                    <input type="text" name="lokasi" placeholder="Sebutkan area spesifik (Contoh: Taman Depan, Lorong A3)" 
                           class="w-full pl-11 pr-5 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-xl text-sm outline-none text-gray-700 font-medium transition-all placeholder-gray-400">
                </div>
            </div>

            <div class="md:col-span-2">
                <label class="block text-[10px] font-bold text-gray-800 mb-3 tracking-widest">Deskripsi Barang</label>
                <textarea name="deskripsi" rows="5" placeholder="Berikan ciri-ciri khusus barang tersebut untuk membantu verifikasi..." 
                          class="w-full px-5 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-xl text-sm outline-none text-gray-700 font-medium leading-relaxed resize-none transition-all placeholder-gray-400"></textarea>
            </div>
        </div>

        <div class="relative w-full h-28 md:h-32 rounded-2xl overflow-hidden cursor-pointer group border border-gray-100 shadow-sm bg-gray-200">
            <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=800" alt="Map Texture" class="absolute inset-0 w-full h-full object-cover opacity-50 grayscale group-hover:scale-105 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
            
            <div class="absolute bottom-4 left-5 flex items-center gap-2">
                <div class="bg-white/20 backdrop-blur-sm p-1.5 rounded">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                </div>
                <span class="text-white text-[11px] font-medium tracking-wide">Klik untuk menandai koordinat lokasi spesifik</span>
            </div>
        </div>

        <div class="mt-14 pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2 text-[10px] font-medium text-gray-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                Informasi Anda akan dijaga oleh tim steward kami.
            </div>
            
            <div class="flex items-center gap-6 w-full md:w-auto">
                <button type="button" class="font-bold text-gray-500 hover:text-gray-900 text-sm transition-colors px-2">Batal</button>
                <button type="submit" class="w-full md:w-auto bg-[#006D77] hover:bg-[#005a63] text-white px-8 py-3.5 rounded-full text-sm font-bold shadow-md shadow-teal-900/10 transition-all active:scale-95">
                    Kirim Postingan
                </button>
            </div>
        </div>

    </form>
</main>