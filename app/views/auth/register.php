<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <title>Daftar Akun Baru </title>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        /* Menyembunyikan scrollbar untuk Chrome, Safari dan Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="bg-white">
    <div class="flex min-h-screen" style="height:100vh">
        <!-- SISI KIRI: BRANDING (Identik Persis dengan Login) -->
        <div class="hidden lg:flex lg:w-1/2 relative bg-[#5E938D] items-center justify-center p-16 overflow-hidden">
            <!-- Background Image Overlay (Sama dengan image_a20cf4.png) -->
            <div class="absolute inset-0 opacity-30">
                <img src="https://images.unsplash.com/photo-1516733725897-1aa73b87c8e8?q=80&w=2070" alt="Lens" class="w-full h-full object-cover grayscale">
            </div>
            
            <div class="relative z-10 text-white w-full max-w-lg">
                <h2 class="text-xl font-bold tracking-[0.3em] mb-32">FIND FOUND</h2>
                <h1 class="text-6xl font-extrabold leading-[1.1] mb-8">Membantu<br>Menemukan<br>Kembali.</h1>
                <p class="text-lg opacity-80 leading-relaxed max-w-md">
                    Bergabunglah dengan komunitas Ethical Archivist untuk mengembalikan barang yang hilang kepada pemiliknya dengan penuh integritas.
                </p>
                
                <!-- Carousel Dots (Sama dengan Login) -->
                <div class="flex gap-3 mt-16">
                    <div class="h-1.5 w-10 bg-white rounded-full"></div>
                    <div class="h-1.5 w-3 bg-white/40 rounded-full"></div>
                    <div class="h-1.5 w-3 bg-white/40 rounded-full"></div>
                </div>
            </div>
        </div>

        <!-- SISI KANAN: FORM REGISTER -->
        <div class="w-full lg:w-1/2 relative flex items-center justify-center p-8 sm:p-20">
            
            <!-- Badge Status (Sesuai image_a1a3d5.png) -->
            <div class="absolute top-8 right-8">
                <div class="flex items-center gap-2 bg-[#D1E9E6] px-4 py-2 rounded-sm border border-[#A8D1CD]">
                    <div class="w-2 h-2 bg-[#006D77] rounded-full animate-pulse"></div>
                    <span class="text-[9px] font-bold text-[#006D77] uppercase tracking-wider">Status: Pendaftaran Dibuka</span>
                </div>
            </div>

            <div class="w-full max-w-md">
                <header class="mb-12 text-left">
                    <p class="text-[10px] font-bold tracking-[0.2em] text-[#006D77] uppercase mb-3">Pendaftaran Pengguna</p>
                    <h2 class="text-4xl font-bold text-gray-900 tracking-tight">Daftar Akun Baru</h2>
                </header>

                <?php if (isset($_SESSION['err'])):?>
                    <div class="flex items-start gap-3 p-3 rounded-lg bg-red-50 border border-red-200 mb-5">
                    <svg class="w-5 h-5 text-red-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-sm text-red-700"><?= $_SESSION['err'] ?></p>
                    </div>
                    <?php unset($_SESSION['err'])?>
                <?php endif?>

                <form action="<?= BASEURL; ?>/auth/register" method="POST" class="space-y-5">
                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase mb-2 tracking-widest">Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="Masukkan nama lengkap Anda" 
                               class="w-full px-5 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-sm text-sm outline-none text-gray-700 placeholder-gray-300 transition-all">
                    </div>

                    <!-- Alamat Email -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase mb-2 tracking-widest">Alamat Email</label>
                        <input type="email" name="email" placeholder="contoh@email.com" 
                               class="w-full px-5 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-sm text-sm outline-none text-gray-700 placeholder-gray-300 transition-all">
                    </div>

                    <!-- Nomor WhatsApp -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase mb-2 tracking-widest">Nomor WhatsApp</label>
                        <input type="text" name="whatsapp" placeholder="+62 812 XXXX XXXX" 
                               class="w-full px-5 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-sm text-sm outline-none text-gray-700 placeholder-gray-300 transition-all">
                    </div>

                    <!-- Password Grid -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase mb-2 tracking-widest">Kata Sandi</label>
                        <input type="password" name="password" placeholder="••••••••" 
                                class="w-full px-5 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-sm text-sm outline-none text-gray-700 placeholder-gray-300 transition-all">
                    </div>

                    <!-- Agreement -->
                    <div class="flex items-start pt-2">
                        <input type="checkbox" required class="mt-1 w-4 h-4 mr-3 rounded-sm border-gray-300 text-[#006D77] focus:ring-[#006D77]">
                        <p class="text-[10px] leading-relaxed text-gray-500 font-medium">
                            Dengan mendaftar, saya menyetujui Ketentuan Layanan dan Kebijakan Privasi Telang.
                        </p>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full py-4 bg-[#006D77] hover:bg-[#005a63] text-white font-bold rounded-lg shadow-md flex items-center justify-center transition-all transform active:scale-[0.98] mt-4">
                        Daftar Sekarang
                    </button>
                </form>

                <!-- Footer -->
                <div class="mt-12 text-center">
                    <p class="text-sm font-medium text-gray-500">
                        Sudah punya akun? <a href="<?= BASEURL; ?>/auth/" class="text-[#006D77] font-bold border-b-2 border-[#006D77] ml-1 pb-0.5 hover:text-teal-900 transition-colors">Masuk di sini</a>
                    </p>
                    
                    <!-- Safety Icons -->
                    <div class="mt-10 flex justify-center gap-10 opacity-20 grayscale">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/></svg>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3z"/></svg>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>