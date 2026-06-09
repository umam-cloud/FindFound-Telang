<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Beranda - FINDFOUND</title>
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #F8F9FA;
        }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .swal2-popup { font-family: 'Plus Jakarta Sans', sans-serif !important; }
    </style>
</head>
<body class="text-gray-800 relative">

    <?php if (isset($_SESSION['swal_success'])): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Berhasil!',
                text: '<?= $_SESSION['swal_success'] ?>',
                icon: 'success',
                confirmButtonColor: '#006D77'
            });
        });
    </script>
    <?php unset($_SESSION['swal_success']); endif; ?>

    <?php if (isset($_SESSION['swal_error'])): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Gagal!',
                text: '<?= $_SESSION['swal_error'] ?>',
                icon: 'error',
                confirmButtonColor: '#006D77'
            });
        });
    </script>
    <?php unset($_SESSION['swal_error']); endif; ?>

    <?php
        $current_url = $_SERVER['REQUEST_URI'];
    ?>

    <nav class="bg-white px-6 md:px-8 py-4 md:py-5 flex items-center justify-between sticky top-0 z-40 border-b border-gray-100">
        <div class="flex items-center gap-12">
            <a href="<?=BASEURL?>/home/" class="text-xl font-bold tracking-[0.2em] text-[#006D77]">FINDFOUND</a>
            
            <div class="hidden md:flex gap-8 text-sm font-semibold text-gray-500">
                <a href="<?=BASEURL?>/home/" class="<?= (strpos($current_url, '/home') !== false) ? 'text-gray-900 border-b-2 border-gray-900 pb-1' : 'hover:text-gray-900 transition-colors' ?>">Beranda</a>
                
                <a href="<?=BASEURL?>/postingan/" class="<?= (strpos($current_url, '/postingan') !== false) ? 'text-gray-900 border-b-2 border-gray-900 pb-1' : 'hover:text-gray-900 transition-colors' ?>">Postingan</a>
                
                <a href="<?=BASEURL?>/laporan/" class="<?= (strpos($current_url, '/laporan') !== false) ? 'text-gray-900 border-b-2 border-gray-900 pb-1' : 'hover:text-gray-900 transition-colors' ?>">Laporan</a>
                
                <a href="<?=BASEURL?>/aktivitas/" class="<?= (strpos($current_url, '/aktivitas') !== false) ? 'text-gray-900 border-b-2 border-gray-900 pb-1' : 'hover:text-gray-900 transition-colors' ?>">Aktivitas</a>
            </div>
        </div>

        <div class="flex items-center gap-4 md:gap-5 text-gray-500">
            <button id="mobile-menu-btn" class="md:hidden flex items-center justify-center p-2 text-gray-600 hover:text-gray-900 focus:outline-none transition-colors rounded-lg hover:bg-gray-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>

            <a href="<?=BASEURL?>/profile/" class="w-8 h-8 md:w-9 md:h-9 rounded-full bg-gray-200 border border-gray-300 overflow-hidden cursor-pointer transition-transform hover:scale-105 shrink-0">
                <img src="<?= !empty($_SESSION['foto_profil']) ? BASEURL . '/img/profile/' . $_SESSION['foto_profil'] : 'https://api.dicebear.com/9.x/adventurer-neutral/svg?seed=Felix'. urlencode($data['nama'] ?? 'User') .'&backgroundColor=b6e3f4' ?>" alt="Profile" class="w-full h-full object-cover">
            </a>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-gray-100 absolute top-full w-full left-0 shadow-lg z-30 transition-all duration-300">
            <div class="flex flex-col px-6 py-4 gap-2 text-sm font-semibold text-gray-500">
                <a href="<?=BASEURL?>/home/" class="<?= (strpos($current_url, '/home') !== false) ? 'text-[#006D77] bg-teal-50/50 rounded-lg p-3' : 'hover:text-gray-900 hover:bg-gray-50 p-3 rounded-lg transition-colors' ?>">Beranda</a>
                <a href="<?=BASEURL?>/postingan/" class="<?= (strpos($current_url, '/postingan') !== false) ? 'text-[#006D77] bg-teal-50/50 rounded-lg p-3' : 'hover:text-gray-900 hover:bg-gray-50 p-3 rounded-lg transition-colors' ?>">Postingan</a>
                <a href="<?=BASEURL?>/laporan/" class="<?= (strpos($current_url, '/laporan') !== false) ? 'text-[#006D77] bg-teal-50/50 rounded-lg p-3' : 'hover:text-gray-900 hover:bg-gray-50 p-3 rounded-lg transition-colors' ?>">Laporan</a>
                <a href="<?=BASEURL?>/aktivitas/" class="<?= (strpos($current_url, '/aktivitas') !== false) ? 'text-[#006D77] bg-teal-50/50 rounded-lg p-3' : 'hover:text-gray-900 hover:bg-gray-50 p-3 rounded-lg transition-colors' ?>">Aktivitas</a>
            </div>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            if(mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>