<main class="max-w-4xl mx-auto px-6 py-10 md:py-14">
    
    <div class="mb-12 max-w-2xl">
        <p class="text-[10px] font-bold tracking-[0.2em] text-[#006D77] uppercase mb-4">Pembaruan Informasi</p>
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4 leading-tight">Edit Postingan Anda.</h1>
        <p class="text-sm text-gray-500 leading-relaxed font-medium">
            Pastikan informasi yang Anda perbarui tetap akurat untuk mempermudah proses verifikasi komunitas.
        </p>
    </div>

    <form action="<?=BASEURL?>/aktivitas/updatePostingan/<?=$data['id']?>/<?=$data['file_path']?>" method="POST" enctype="multipart/form-data">

        <div class="relative w-full h-56 md:h-72 rounded-[2rem] overflow-hidden mb-10 group cursor-pointer border border-gray-100 shadow-sm bg-gray-100">
            <img id="preview_foto" src="<?=BASEURL?>/img/postingan/<?=$data['file_path']?>" alt="Preview Foto" class="absolute inset-0 w-full h-full object-cover opacity-40 mix-blend-multiply blur-sm group-hover:scale-105 transition-transform duration-700">
            
            <div class="absolute inset-0 bg-black/30 flex flex-col items-center justify-center text-center p-6 opacity-0 group-hover:opacity-100 transition-opacity">
                <div class="bg-white/20 backdrop-blur-md p-3.5 rounded-full mb-4 text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h3 class="font-bold text-white mb-2">Ganti Foto</h3>
                <p class="text-[11px] text-white/80 font-medium">Klik untuk memilih foto baru</p>
            </div>
            <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" id="input_foto" name="foto_postingan">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-8 mb-8">
            
            <div>
                <label class="block text-[10px] font-bold text-gray-800 mb-3 tracking-widest uppercase">Judul Laporan</label>
                <input type="text" name="judul" value="<?=$data['judul']?>" placeholder="Misal: Kunci Motor Honda Hitam" 
                       class="w-full px-5 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-xl text-sm outline-none text-gray-700 font-medium transition-all placeholder-gray-400">
            </div>

            <div>
                <label class="block text-[10px] font-bold text-gray-800 mb-3 tracking-widest uppercase">Tanggal Kejadian</label>
                <input type="date" name="tanggal" value="<?=$data['tanggal_kejadian']?>"
                       class="w-full px-5 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-xl text-sm outline-none text-gray-700 font-medium transition-all cursor-pointer">
            </div>

            <div class="md:col-span-2">
                <label class="block text-[10px] font-bold text-gray-800 mb-3 tracking-widest uppercase">Kategori Barang</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-4 flex items-center text-gray-400 pointer-events-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                    </span>
                    <select name="kategori" 
                            class="w-full pl-11 pr-10 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-xl text-sm outline-none text-gray-700 font-medium transition-all appearance-none cursor-pointer">
                        <option value="1" <?= ($data['kategori_id'] == 1) ? 'selected' : '' ?>>Elektronik</option>
                        <option value="2" <?= ($data['kategori_id'] == 2) ? 'selected' : '' ?>>Dokumen & Dompet</option>
                        <option value="3" <?= ($data['kategori_id'] == 3) ? 'selected' : '' ?>>Aksesoris & Perhiasan</option>
                        <option value="4" <?= ($data['kategori_id'] == 4) ? 'selected' : '' ?>>Pakaian</option>
                        <option value="5" <?= ($data['kategori_id'] == 5) ? 'selected' : '' ?>>Hewan Peliharaan</option>
                        <option value="6" <?= ($data['kategori_id'] == 6) ? 'selected' : '' ?>>Lainnya</option>
                    </select>
                    <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </div>

            <div class="md:col-span-2">
                <label class="block text-[10px] font-bold text-gray-800 mb-3 tracking-widest uppercase">Lokasi Spesifik</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-4 flex items-center text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </span>
                    <input type="text" name="lokasi" value="<?=$data['lokasi_spesifik']?>" placeholder="Contoh: Depan Kantin GKB" 
                           class="w-full pl-11 pr-5 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-xl text-sm outline-none text-gray-700 font-medium transition-all">
                </div>
            </div>

            <div class="md:col-span-2">
                <label class="block text-[10px] font-bold text-gray-800 mb-3 tracking-widest uppercase">Deskripsi Barang</label>
                <textarea name="deskripsi" rows="5" placeholder="Detail ciri-ciri barang..." 
                          class="w-full px-5 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-xl text-sm outline-none text-gray-700 font-medium leading-relaxed resize-none transition-all"><?= $data['deskripsi'] ?></textarea>
            </div>
        </div>

        <div class="mt-14 pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2 text-[10px] font-medium text-gray-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                Informasi Anda akan dijaga oleh tim steward kami.
            </div>
            
            <div class="flex items-center gap-6 w-full md:w-auto">
                <a href="<?=BASEURL?>/aktivitas" class="text-center font-bold text-gray-500 hover:text-gray-900 text-sm transition-colors px-2">Batal</a>
                <button type="submit" class="w-full md:w-auto bg-[#006D77] hover:bg-[#005a63] text-white px-10 py-3.5 rounded-full text-sm font-bold shadow-md shadow-teal-900/10 transition-all active:scale-95">
                    Simpan Perubahan
                </button>
            </div>
        </div>

    </form>
</main>

<script>
    document.getElementById('input_foto').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('preview_foto');
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>