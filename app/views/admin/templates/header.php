<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title><?= $data['judul'] ?? 'Admin' ?> - FINDFOUND</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .swal2-popup { font-family: 'Plus Jakarta Sans', sans-serif !important; }
    </style>
</head>
<body class="text-gray-800 bg-gray-50 flex min-h-screen">

    <!-- Sidebar Admin Overlay -->
    <div id="admin-sidebar-overlay" class="fixed inset-0 bg-gray-900/50 z-40 hidden transition-opacity lg:hidden"></div>

    <!-- Sidebar Admin -->
    <aside id="admin-sidebar" class="w-64 bg-white border-r border-gray-100 flex flex-col fixed md:sticky top-0 left-0 h-screen z-50 transform -translate-x-full md:translate-x-0 transition-transform duration-300">
        <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center">
            <a href="<?=BASEURL?>/admin/" class="text-xl font-bold tracking-[0.2em] text-[#006D77]">ADMIN PANEL</a>
            <button id="admin-close-sidebar" class="md:hidden text-gray-500 hover:text-gray-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        
        <div class="flex flex-col gap-2 px-4 py-4 flex-1">
            <a href="<?= BASEURL; ?>/admin" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium hover:bg-gray-50 transition-colors">Dashboard</a>
            <a href="<?= BASEURL; ?>/admin/postingan/" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium hover:bg-gray-50 transition-colors">Daftar Postingan</a>
            <a href="<?= BASEURL; ?>/admin/pengguna" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium hover:bg-gray-50 transition-colors">Kelola Pengguna</a>
            <a href="<?= BASEURL; ?>/admin/aduan" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium hover:bg-gray-50 transition-colors">Aduan Masalah</a>
        </div>

        <div class="p-4 border-t border-gray-100">
            <a href="<?=BASEURL?>/home/" class="px-4 py-3 text-red-500 hover:bg-red-50 rounded-xl font-semibold text-sm transition-colors flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Kembali ke Web
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col w-full h-screen overflow-y-auto">
        <!-- Top Navbar untuk Mobile -->
        <header class="bg-white px-6 py-4 flex items-center justify-between sticky top-0 z-30 border-b border-gray-100 md:hidden">
            <a href="<?=BASEURL?>/admin/" class="text-lg font-bold tracking-[0.2em] text-[#006D77]">ADMIN PANEL</a>
            <button id="admin-mobile-menu-btn" class="text-gray-500 hover:text-gray-900 focus:outline-none p-2 rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </header>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const sidebar = document.getElementById('admin-sidebar');
                const overlay = document.getElementById('admin-sidebar-overlay');
                const mobileBtn = document.getElementById('admin-mobile-menu-btn');
                const closeBtn = document.getElementById('admin-close-sidebar');

                function toggleSidebar() {
                    sidebar.classList.toggle('-translate-x-full');
                    overlay.classList.toggle('hidden');
                }

                if (sidebar && overlay && mobileBtn) {
                    mobileBtn.addEventListener('click', toggleSidebar);
                    overlay.addEventListener('click', toggleSidebar);
                    if(closeBtn) closeBtn.addEventListener('click', toggleSidebar);
                }
            });
        </script>
        
        <!-- Top Navbar untuk Desktop -->
        <header class="bg-white px-8 py-5 hidden md:flex items-center justify-end sticky top-0 z-30 border-b border-gray-100">
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-sm font-bold text-gray-900">Administrator</p>
                    <p class="text-xs text-gray-500">Super Admin</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-[#D1E9E6] text-[#006D77] flex items-center justify-center font-bold border border-[#006D77]/20">
                    A
                </div>
            </div>
        </header>

        <!-- Dynamic Content wrapper -->
        <main class="flex-1 p-6 md:p-8 bg-gray-50">
