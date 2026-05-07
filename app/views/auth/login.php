<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <title>Masuk ke Akun</title>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>
<body class="bg-white">
    <div class="flex min-h-screen " style="height:100vh">
        <!-- SISI KIRI: BRANDING (TELANG) -->
        <div class="hidden lg:flex lg:w-1/2 relative bg-[#5E938D] items-center justify-center p-16 overflow-hidden">
            <!-- Overlay Image (Simulasi image_a20cf4.png) -->
            <div class="absolute inset-0 opacity-30">
                <img src="https://images.unsplash.com/photo-1516733725897-1aa73b87c8e8?q=80&w=2070" alt="Lens" class="w-full h-full object-cover grayscale">
            </div>
            
            <div class="relative z-10 text-white w-full max-w-lg">
            <h2 class="text-xl font-bold tracking-[0.3em] mb-32">FIND FOUND</h2>
            <h1 class="text-6xl font-extrabold leading-[1.1] mb-8">Pengarsip<br>Barang-Barang<br>yang Hilang.</h1>
            <p class="text-lg opacity-80 leading-relaxed max-w-md">
                Tempat aman bagi barang yang tertinggal, dibangun berlandaskan kepercayaan, tanggung jawab komunitas, dan desain yang terarah.
            </p>
                
                <!-- Carousel Dots -->
                <div class="flex gap-3 mt-16">
                    <div class="h-1.5 w-10 bg-white rounded-full"></div>
                    <div class="h-1.5 w-3 bg-white/40 rounded-full"></div>
                    <div class="h-1.5 w-3 bg-white/40 rounded-full"></div>
                </div>
            </div>
        </div>

        <!-- SISI KANAN: FORM LOGIN -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-20">
            <div class="w-full max-w-md">
                <header class="mb-12">
                    <p class="text-[10px] font-bold tracking-[0.2em] text-gray-400 uppercase mb-3">Selamat Datang Kembali</p>
                    <h2 class="text-4xl font-bold text-gray-900 tracking-tight">Masuk ke Akun</h2>
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

                <form action="<?= BASEURL; ?>/auth/login/" method="POST" class="space-y-7">
                    <!-- Input Email -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase mb-3 tracking-widest">Alamat Email</label>
                        <input type="email" name="email" placeholder="archivist@telang.io" 
                               class="w-full px-5 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-sm text-sm transition-all outline-none text-gray-700 placeholder-gray-300">
                    </div>
                    

                    <!-- Input Password -->
                    <div class="relative">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase mb-3 tracking-widest">Kata Sandi</label>
                        <input type="password" name="password" placeholder="••••••••" 
                               class="w-full px-5 py-4 bg-gray-100 border-none focus:ring-2 focus:ring-[#006D77] rounded-sm text-sm transition-all outline-none text-gray-700 placeholder-gray-300">
                        <button type="button" class="absolute right-4 top-[46px] text-gray-400 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center text-xs font-bold text-gray-600 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 mr-2 rounded border-gray-300 text-[#006D77] focus:ring-[#006D77]">
                            Tetap masuk
                        </label>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="w-full py-4 bg-[#006D77] hover:bg-[#005a63] text-white font-bold rounded-lg shadow-md flex items-center justify-center gap-2 transition-all transform active:scale-[0.98]">
                        Masuk Sekarang 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>

                    <!-- OR Divider -->
                    <div class="relative py-2 flex items-center">
                        <div class="flex-grow border-t border-gray-100"></div>
                        <span class="flex-shrink mx-4 text-[10px] font-bold text-gray-300 uppercase tracking-widest">Atau</span>
                        <div class="flex-grow border-t border-gray-100"></div>
                    </div>

                    <!-- Google Button -->
                    <div id="g_id_onload"
                        data-client_id="643694449664-hk2o0r6a2v1fcsn4tb7je6h36cp6fess.apps.googleusercontent.com"
                        data-context="signin"
                        data-ux_mode="popup"
                        data-callback="handleCredentialResponse"
                        data-auto_prompt="false">
                    </div>

                    <div class="g_id_signin w-full flex justify-center"
                        data-type="standard"
                        data-shape="rectangular"
                        data-theme="outline"
                        data-text="continue_with"
                        data-size="large"
                        data-logo_alignment="left"
                        data-width="400">
                    </div>
                </form>

                <!-- Footer Sign Up -->
                <p class="mt-16 text-center text-sm font-medium text-gray-500">
                    Baru di komunitas ini? <a href="<?=BASEURL?>/auth/register" class="text-[#006D77] font-bold border-b-2 border-[#006D77] ml-1 pb-0.5 hover:text-teal-900 transition-colors">Daftar di sini</a>
                </p>
            </div>
        </div>
    </div>
    <script>
    function handleCredentialResponse(response) {
        fetch('<?= BASEURL; ?>/auth/googleAuth', { // Sesuaikan URL Controller Anda
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ token: response.credential })
        })
        .then(res => res.json())
        .then(data => {
            if(data.status === 'success') {
                // INI YANG MEMINDAHKAN HALAMAN
                window.location.href = '<?= BASEURL; ?>/home/';
            } else {
                console.error(data.message);
            }
        });
    }
</script>
</body>
</html>