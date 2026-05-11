    <?php
        $jenis = $data['jenis_laporan'];
        $badgeClass = ($jenis == 'hilang') ? 'bg-red-100 text-red-800' : 'bg-[#D1E9E6] text-[#006D77]';

        $pemosting = ($data['user_id'] == $_SESSION['id_user']);
        $textBtn = $pemosting ? 'Sudah Dikembalikan' : 'Hubungi Penemu via WhatsApp';
        $hrefBtn = $pemosting ? BASEURL.'/postingan/updateStatusPostingan/'.$data['id'] : "https://wa.me/".$data['whatsapp'];

        // var_dump($data);

        $status = ($data['status'] == 'selesai');
        $btnBgClass = $status ? 'bg-gray-400 cursor-not-allowed pointer-events-none' : 'bg-[#006D77] hover:bg-[#005a63]';
    ?>

    <main class="max-w-6xl mx-auto px-6 py-10 md:py-14 relative">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 md:gap-14 mb-16">
            <div class="lg:col-span-6 flex flex-col gap-4">
                <div class="relative w-full aspect-[4/3] rounded-[2rem] overflow-hidden bg-gray-100 border border-gray-100 shadow-sm">
                    <span class="<?=$badgeClass?> absolute top-5 left-5 z-10 text-[10px] font-bold px-3 py-1.5 rounded-sm uppercase tracking-widest shadow-sm">
                        <?=$jenis?>
                    </span>
                    <img src="<?=BASEURL?>/img/postingan/<?=$data['file_path']?>" alt="Jam Tangan Utama" class="w-full h-full object-cover">
                </div>
            
            </div>

            <div class="lg:col-span-6 flex flex-col">
                
                <p class="text-[10px] font-bold tracking-[0.2em] text-[#006D77] uppercase mb-3"><?=$data['nama_kategori']?></p>
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 tracking-tight leading-tight"><?=$data['judul']?></h1>
                
                <div class="flex gap-12 border-b border-gray-100 pb-6 mb-6">
                    <div>
                        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">ID Postingan</p>
                        <p class="text-sm font-bold text-gray-900">TLG-88291-JKT</p>
                    </div>
                    <div>
                        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Waktu Temuan</p>
                        <p class="text-sm font-bold text-gray-900"><?=$data['tanggal_kejadian']?></p>
                    </div>
                </div>

                <div class="mb-8">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-4">Lokasi Penemuan</p>
                    <div class="flex items-center gap-4 mb-5">
                        <div class="bg-[#D1E9E6] p-2.5 rounded-full text-[#006D77] shrink-0 mt-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                        </div>
                        <div>
                            <!-- <p class="text-sm font-bold text-gray-900 mb-1"><?=$data['lokasi_spesifik']?></p> -->
                            <p class="text-xs text-gray-500 font-medium"><?=$data['lokasi_spesifik']?></p>
                        </div>
                    </div>
                </div>

                <div class="mb-10 flex-grow">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">Deskripsi Lengkap</p>
                    <p class="text-sm text-gray-600 leading-relaxed font-medium">
                        <?=$data['deskripsi']?>
                    </p>
                </div>

                <div class="mt-auto">
                    <a href="<?=$hrefBtn?>" class="w-full <?=$btnBgClass?> text-white py-4 rounded-full text-sm font-bold flex items-center justify-center gap-2 shadow-lg shadow-teal-900/20 transition-all active:scale-[0.98]">
                        <?php if ($pemosting): ?>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                        <?php else: ?>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                        <?php endif; ?>
                        <?=$textBtn?>
                    </a>

                    <?php if ($pemosting != $_SESSION['id_user']):?>
                        <div class="mt-4 text-center">
                            <button type="button" onclick="openReportModal()" class="text-xs font-bold text-gray-400 hover:text-red-500 transition-colors flex items-center justify-center gap-1.5 mx-auto">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                Laporkan Postingan
                            </button>
                        </div>
                    <?php endif ?>
                </div>

            </div>
        </div>

        <div class="bg-gray-50 rounded-[2rem] p-8 md:p-12 border border-gray-100 flex flex-col lg:flex-row gap-10 lg:gap-16">
            <div class="lg:w-1/3">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Tips Keamanan</h3>
                <p class="text-sm text-gray-500 leading-relaxed font-medium">Kami peduli dengan keamanan komunitas FindFound. Ikuti panduan ini untuk proses pengembalian yang aman.</p>
            </div>
            <div class="lg:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">
                <div class="flex items-start gap-4">
                    <div class="shrink-0 w-10 h-10 rounded-[0.8rem] bg-orange-100 text-orange-600 flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg></div>
                    <div><h4 class="text-sm font-bold text-gray-900 mb-1.5">Verifikasi Detail</h4><p class="text-xs text-gray-500 leading-relaxed font-medium">Mintalah detail spesifik yang tidak disebutkan di deskripsi umum untuk memastikan kepemilikan.</p></div>
                </div>
            </div>
        </div>

    </main>

    <div id="reportModal" class="fixed inset-0 z-50 hidden flex items-center justify-center">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeReportModal()"></div>
        <div id="reportModalContent" class="bg-white rounded-[2rem] p-8 max-w-md w-full mx-6 relative z-10 shadow-2xl transform scale-95 opacity-0 transition-all duration-300 ease-out max-h-[90vh] overflow-y-auto no-scrollbar">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-extrabold text-gray-900 tracking-tight">Laporkan Postingan</h3>
                <button onclick="closeReportModal()" class="text-gray-400 hover:text-red-500 bg-gray-100 hover:bg-red-50 p-2 rounded-full transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <p class="text-sm text-gray-500 mb-6 font-medium leading-relaxed">
                Pilih alasan yang paling sesuai. Ini akan membantu tim FindFound meninjau postingan dengan cepat.
            </p>
            
            <form action="#" method="POST">
                
            <div class="flex flex-col gap-3 mb-6">
                    
                    <label class="cursor-pointer relative flex items-start gap-4 p-4 border-2 border-gray-100 rounded-xl bg-white hover:bg-gray-50 transition-all has-[:checked]:border-red-500 has-[:checked]:bg-red-50/30 group">
                        <input type="radio" name="alasan_lapor" value="penipuan" class="sr-only" required>
                        <div class="w-4 h-4 mt-0.5 shrink-0 rounded-full border-2 border-gray-300 transition-all group-has-[:checked]:border-[5px] group-has-[:checked]:border-red-500"></div>
                        <div>
                            <span class="block text-sm font-bold text-gray-900">Indikasi Penipuan</span>
                            <span class="block text-xs text-gray-500 mt-1 leading-relaxed">Meminta imbalan tidak wajar atau mencurigakan sebelum barang dikembalikan.</span>
                        </div>
                    </label>
                    <label class="cursor-pointer relative flex items-start gap-4 p-4 border-2 border-gray-100 rounded-xl bg-white hover:bg-gray-50 transition-all has-[:checked]:border-red-500 has-[:checked]:bg-red-50/30 group">
                        <input type="radio" name="alasan_lapor" value="spam" class="sr-only">
                        <div class="w-4 h-4 mt-0.5 shrink-0 rounded-full border-2 border-gray-300 transition-all group-has-[:checked]:border-[5px] group-has-[:checked]:border-red-500"></div>
                        <div>
                            <span class="block text-sm font-bold text-gray-900">Spam atau Palsu</span>
                            <span class="block text-xs text-gray-500 mt-1 leading-relaxed">Postingan berulang, tidak relevan, atau memuat gambar barang yang tidak nyata.</span>
                        </div>
                    </label>
                    <label class="cursor-pointer relative flex items-start gap-4 p-4 border-2 border-gray-100 rounded-xl bg-white hover:bg-gray-50 transition-all has-[:checked]:border-red-500 has-[:checked]:bg-red-50/30 group">
                        <input type="radio" name="alasan_lapor" value="lainnya" class="sr-only">
                        <div class="w-4 h-4 mt-0.5 shrink-0 rounded-full border-2 border-gray-300 transition-all group-has-[:checked]:border-[5px] group-has-[:checked]:border-red-500"></div>
                        <div>
                            <span class="block text-sm font-bold text-gray-900">Melanggar Aturan Lainnya</span>
                            <span class="block text-xs text-gray-500 mt-1 leading-relaxed">Berisi kata-kata kasar, informasi sensitif yang terekspos, dll.</span>
                        </div>
                    </label>

                </div>
                <div class="flex gap-3">
                    <button type="button" onclick="closeReportModal()" class="flex-1 py-4 rounded-full text-sm font-bold text-gray-500 bg-gray-100 hover:bg-gray-200 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 py-4 rounded-full text-sm font-bold text-white bg-red-500 hover:bg-red-600 shadow-lg shadow-red-500/20 transition-all active:scale-95 flex justify-center items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        Kirim Laporan
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script>
        const modal = document.getElementById('reportModal');
        const modalContent = document.getElementById('reportModalContent');

        function openReportModal() {
            modal.classList.remove('hidden');
            void modal.offsetWidth; 
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
            document.body.style.overflow = 'hidden';
        }

        function closeReportModal() {
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }
    </script>