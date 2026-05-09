<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Beranda - FINDFOUND</title>
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #F8F9FA;
        }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="text-gray-800 relative">

    <?php
        $current_url = $_SERVER['REQUEST_URI'];
    ?>

    <nav class="bg-white px-8 py-5 flex items-center justify-between sticky top-0 z-40 border-b border-gray-100">
        <div class="flex items-center gap-12">
            <a href="<?=BASEURL?>/home/" class="text-xl font-bold tracking-[0.2em] text-[#006D77]">FINDFOUND</a>
            
            <div class="hidden md:flex gap-8 text-sm font-semibold text-gray-500">
                <a href="<?=BASEURL?>/home/" class="<?= (strpos($current_url, '/home') !== false) ? 'text-gray-900 border-b-2 border-gray-900 pb-1' : 'hover:text-gray-900 transition-colors' ?>">Beranda</a>
                
                <a href="<?=BASEURL?>/postingan/" class="<?= (strpos($current_url, '/postingan') !== false) ? 'text-gray-900 border-b-2 border-gray-900 pb-1' : 'hover:text-gray-900 transition-colors' ?>">Postingan</a>
                
                <a href="<?=BASEURL?>/laporan/" class="<?= (strpos($current_url, '/laporan') !== false) ? 'text-gray-900 border-b-2 border-gray-900 pb-1' : 'hover:text-gray-900 transition-colors' ?>">Laporan</a>
                
                <a href="<?=BASEURL?>/aktivitas/" class="<?= (strpos($current_url, '/aktivitas') !== false) ? 'text-gray-900 border-b-2 border-gray-900 pb-1' : 'hover:text-gray-900 transition-colors' ?>">Aktivitas</a>
            </div>
        </div>

        <div class="flex items-center gap-5 text-gray-500">
            <a href="<?=BASEURL?>/profile/" class="w-8 h-8 rounded-full bg-gray-200 border border-gray-300 overflow-hidden cursor-pointer transition-transform hover:scale-105">
                <img src="<?= !empty($_SESSION['foto_profil']) ? BASEURL . '/img/profile/' . $_SESSION['foto_profil'] : 'https://api.dicebear.com/9.x/adventurer-neutral/svg?seed=Felix'. urlencode($data['nama'] ?? 'User') .'&backgroundColor=b6e3f4' ?>" alt="Profile" class="w-full h-full object-cover">
            </a>
        </div>
    </nav>