<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Beranda - TELANG</title>
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #F8F9FA;
        }
        /* Menyembunyikan scrollbar untuk chip filter */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="text-gray-800 relative">

    <!-- Navbar -->
    <nav class="bg-white px-8 py-5 flex items-center justify-between sticky top-0 z-40 border-b border-gray-100">
        <div class="flex items-center gap-12">
            <!-- Logo -->
            <a href="#" class="text-xl font-bold tracking-[0.2em] text-[#006D77]">FIND FOUND</a>
            
            <!-- Nav Links (Desktop) -->
            <div class="hidden md:flex gap-8 text-sm font-semibold text-gray-500">
                <a href="#" class="hover:text-gray-900 transition-colors">Archive</a>
                <a href="#" class="hover:text-gray-900 transition-colors">Report</a>
                <a href="#" class="text-gray-900 border-b-2 border-gray-900 pb-1">Activity</a>
                <a href="#" class="hover:text-gray-900 transition-colors">Profile</a>
            </div>
        </div>

        <!-- Icons -->
        <div class="flex items-center gap-5 text-gray-500">
            <button class="hover:text-gray-900"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg></button>
            <button class="hover:text-gray-900"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg></button>
            <div class="w-8 h-8 rounded-full bg-gray-200 border border-gray-300 overflow-hidden">
                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Fathan" alt="Profile" class="w-full h-full object-cover">
            </div>
        </div>
    </nav>