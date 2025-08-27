<?php
$uri = service('uri');
$arr_produk = array('/tabungan', '/deposito', '/pembiayaan', '/pelayanan');
$arr_tentang_kami = array('/profil', '/managemen', '/struktur_organisasi', '/penghargaan', '/keuangan');
?>


<!-- ✅ HEADER / NAVBAR -->
<header class="w-full fixed top-0 left-0 shadow z-50 bg-white">
    <div class="bg-gradient-to-r from-blue-700 via-blue-600 to-blue-500 text-white text-xs font-medium">
        <div class="container mx-auto py-2">
            <div class="flex flex-1 justify-between items-center">
                <p class="antialiased md:subpixel-antialiased"><i class="fa-solid fa-phone"></i> (0322) 314 999</p>
                <div class="grid grid-cols-2">
                    <p class="antialiased md:subpixel-antialiased px-2"><i class="fa-brands fa-instagram"></i> Instagram</p>
                    <p class="antialiased md:subpixel-antialiased px-2"><i class="fa-brands fa-square-facebook"></i> Facebook</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">

        <!-- Logo -->
        <img src="<?= base_url('assets/madinah.png') ?>" alt="Logo" class="w-auto size-10">

        <!-- Desktop Nav -->
        <!-- Navbar -->
        <nav class="hidden md:flex space-x-12" x-data="{ open_kami: false, open_produk: false }">
            <a href="<?= base_url() ?>" class="<?= $uri->getPath() === '/' ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-500' ?>">Home</a>

            <!-- Dropdown "Tentang Kami" -->
            <div class="relative" @mouseenter="open_kami = true" @mouseleave="open_kami = false">
                <button class="focus:outline-none <?= in_array($uri->getPath(), $arr_tentang_kami) ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-500' ?> hover:bg-gray-100">
                    Tentang Kami
                </button>
                <div x-show="open_kami" x-transition class="absolute bg-white shadow-md mt-2 rounded w-52 z-50">
                    <a href="<?= base_url('/profil') ?>" class="block px-4 py-2 <?= $uri->getPath() === '/profil' ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-500' ?> hover:bg-gray-100">Profil Perusahaan</a>
                    <a href="<?= base_url('/managemen') ?>" class="block px-4 py-2 <?= $uri->getPath() === '/managemen' ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-500' ?> hover:bg-gray-100">Manajemen</a>
                    <a href="<?= base_url('/struktur_organisasi') ?>" class="block px-4 py-2 <?= $uri->getPath() === '/struktur_organisasi' ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-500' ?> hover:bg-gray-100">Struktur Ogranisasi</a>
                    <a href="<?= base_url('/awards') ?>" class="block px-4 py-2 <?= $uri->getPath() === '/awards' ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-500' ?> hover:bg-gray-100">Penghargaan</a>
                    <a href="<?= base_url('/keuangan') ?>" class="block px-4 py-2 <?= $uri->getPath() === '/keuangan' ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-500' ?> hover:bg-gray-100">Laporan Keuangan</a>
                </div>
            </div>

            <!-- Dropdown "Produk" -->
            <div class="relative" @mouseenter="open_produk = true" @mouseleave="open_produk = false">
                <button class="focus:outline-none <?= in_array($uri->getPath(), $arr_produk) ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-500' ?> hover:bg-gray-100">
                    Produk
                </button>
                <div x-show="open_produk" x-transition class="absolute bg-white shadow-md mt-2 rounded w-52 z-50">
                    <a href="<?= base_url('/tabungan') ?>" class="block px-4 py-2 <?= $uri->getPath() === '/tabungan' ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-500' ?> hover:bg-gray-100">Tabungan</a>
                    <a href="<?= base_url('/deposito') ?>" class="block px-4 py-2 <?= $uri->getPath() === '/deposito' ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-500' ?> hover:bg-gray-100">Deposito</a>
                    <a href="<?= base_url('/pembiayaan') ?>" class="block px-4 py-2 <?= $uri->getPath() === '/pembiayaan' ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-500' ?> hover:bg-gray-100">Pembiayaan</a>
                    <a href="<?= base_url('/pelayanan') ?>" class="block px-4 py-2 <?= $uri->getPath() === '/pelayanan' ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-500' ?> hover:bg-gray-100">Layanan Lainnya</a>
                </div>
            </div>

            <a href="<?= base_url('/galeri') ?>" class="<?= $uri->getPath() === '/galeri' ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-500' ?>">Galeri</a>
            <a href="<?= base_url('/berita') ?>" class="<?= $uri->getPath() === '/berita' ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-500' ?>">Berita</a>
            <a href="<?= base_url('/karir') ?>" class="<?= $uri->getPath() === '/karir' ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-500' ?>">Karir</a>
            <a href="<?= base_url('/hubungi_kami') ?>" class="<?= $uri->getPath() === '/hubungi_kami' ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-500' ?>">Kontak Kami</a>
        </nav>

        <!-- Mobile Button -->
        <button class="md:hidden text-gray-700" @click="open = !open">
            <!-- Hamburger Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Nav -->
    <div class="md:hidden px-4 pb-4" x-show="open" x-transition>
        <a href="<?= base_url('/') ?>" class="block py-2 text-gray-700 hover:text-blue-500">Home</a>
        <a href="<?= base_url('/about') ?>" class="block py-2 text-gray-700 hover:text-blue-500">About</a>
        <a href="<?= base_url('/contact') ?>" class="block py-2 text-gray-700 hover:text-blue-500">Contact</a>
    </div>
</header>