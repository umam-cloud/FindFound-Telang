<main class="max-w-6xl mx-auto px-6 py-10 md:py-14">
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        <div class="lg:col-span-4 flex flex-col gap-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight mb-4">Edit Profil</h1>
                <p class="text-sm text-gray-500 leading-relaxed font-medium pr-4">
                    Perbarui informasi pribadi Anda untuk menjaga kredibilitas Anda di komunitas Telang.
                </p>
            </div>

            <div class="relative w-full h-48 md:h-64 rounded-3xl overflow-hidden shadow-sm group">
                <img src="https://images.unsplash.com/photo-1555421689-d68471e189f2?q=80&w=600" alt="Keamanan Data" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-[#003D44]/90 via-[#006D77]/40 to-transparent"></div>
                
                <div class="absolute bottom-6 left-6 right-6">
                    <h3 class="text-white font-bold text-lg tracking-wide">Keamanan Data Terjamin</h3>
                </div>
            </div>
        </div>
        <div class="lg:col-span-8">
            <div class="bg-white p-8 md:p-12 rounded-[2rem] shadow-sm border border-gray-100">
                
                <form action="<?=BASEURL?>/profile/updateProfile" method="POST" enctype="multipart/form-data" class="flex flex-col h-full">
                    <div class="flex items-center gap-6 md:gap-8 mb-10 pb-10 border-b border-gray-100">
                        <div class="relative w-24 h-24 rounded-full overflow-hidden shrink-0 border-2 border-gray-100 shadow-sm">
                              <img id="preview_foto" src="<?= !empty($data['foto_profil']) ? BASEURL . '/img/profile/' . $data['foto_profil'] : 'https://api.dicebear.com/9.x/adventurer-neutral/svg?seed=Felix'. urlencode($data['nama'] ?? 'User') .'&backgroundColor=b6e3f4' ?>" alt="Avatar" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-1">Foto Profil</h3>
                            <p class="text-[11px] text-gray-500 font-medium mb-3">Gunakan foto asli untuk membangun kepercayaan.</p>

                            <input type="hidden" name="foto_lama" value="<?=$data['foto_profil'] ?? ''?>">
                            
                            <input type="file" name="foto_profil" id="input_foto" class="hidden" accept="image/png, image/jpeg, image/jpg">

                            <button type="button" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2 rounded-full text-xs font-bold transition-colors" onclick="document.getElementById('input_foto').click()">
                                Ganti Foto
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-8 mb-12">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase mb-3 tracking-widest">Nama Lengkap</label>
                            <input type="text" name="nama" value="<?=$data['nama']?? '-'?>" 
                                   class="w-full px-5 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-xl text-sm outline-none text-gray-700 font-medium transition-all">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase mb-3 tracking-widest">Alamat Email</label>
                            <input type="email" name="email" value="<?=$data['email']?? '-'?>" 
                                   class="w-full px-5 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-xl text-sm outline-none text-gray-700 font-medium transition-all">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase mb-3 tracking-widest">Nomor WhatsApp</label>
                            <input type="text" name="whatsapp" value="<?=$data['whatsapp']?? '-'?>" 
                                   class="w-full px-5 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-xl text-sm outline-none text-gray-700 font-medium transition-all">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase mb-3 tracking-widest">lokasi</label>
                            <input type="text" name="lokasi" value="<?=$data['lokasi_pilihan']?? '-'?>" 
                                   class="w-full px-5 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-xl text-sm outline-none text-gray-700 font-medium transition-all">
                        </div>

                    </div>
                    <div class="flex flex-col sm:flex-row justify-end items-center gap-3 pt-6 border-t border-gray-50 mt-auto">
                        <a href="<?=BASEURL?>/profile/" type="button" class="w-full sm:w-auto px-8 py-3.5 rounded-full text-sm font-bold text-gray-500 hover:bg-gray-100 transition-colors">
                            Batal
                        </a>
                        <button type="submit" class="w-full sm:w-auto bg-[#006D77] hover:bg-[#005a63] text-white px-8 py-3.5 rounded-full text-sm font-bold shadow-md shadow-teal-900/10 transition-all active:scale-95">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</main>

<script>
    document.getElementById('input_foto').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview_foto').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>