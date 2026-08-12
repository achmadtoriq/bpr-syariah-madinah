<?php
$uri = service('uri');
$arr_produk = array('/tabungan', '/deposito', '/pembiayaan', '/pelayanan');
$arr_tentang_kami = array('/profil', '/managemen', '/struktur_organisasi', '/penghargaan', '/keuangan', '/piagam');
?>

<!-- ✅ HEADER / NAVBAR (Corporate Blue Theme) -->
<header class="w-full fixed top-0 left-0 z-50 transition-all duration-300">
    <!-- Top Announcement Bar -->
    <div class="hidden md:block bg-slate-900 text-slate-300 text-xs py-2 border-b border-slate-800">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <span class="flex items-center gap-2 text-slate-300"><i class="fa-solid fa-phone text-blue-400"></i> (0322) 314 999</span>
                <span class="flex items-center gap-2 text-slate-400"><i class="fa-solid fa-clock text-amber-400"></i> Senin - Jumat: 08.00 - 15.00 WIB</span>
                <span class="flex items-center gap-2 text-blue-400 font-semibold"><i class="fa-solid fa-shield-halved"></i> Berizin & Diawasi OJK</span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="https://www.instagram.com/bprsmadinahlamongan?igsh=bjZtNjljaTJxaTJ2" target="_blank" rel="noopener noreferrer" class="hover:text-white transition flex items-center gap-1.5"><i class="fa-brands fa-instagram text-pink-400"></i> Instagram</a>
                <span class="text-slate-700">|</span>
                <a href="https://www.facebook.com/share/1VyH892rBD/" target="_blank" rel="noopener noreferrer" class="hover:text-white transition flex items-center gap-1.5"><i class="fa-brands fa-square-facebook text-blue-400"></i> Facebook</a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <div class="bg-white/95 backdrop-blur-md border-b border-slate-100 shadow-sm transition-all duration-300">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 py-3.5 flex items-center justify-between">
            <!-- Logo -->
            <a href="<?= base_url() ?>" class="flex items-center gap-3 group">
                <img src="/assets/madinah.png" alt="Logo BPRS Syariah Madinah" class="h-9 md:h-11 w-auto transition group-hover:scale-105">
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center space-x-8" x-data="{ open_kami: false, open_produk: false }">
                <a href="<?= base_url() ?>" class="text-sm font-semibold transition <?= $uri->getPath() === '/' ? 'text-blue-700 font-bold border-b-2 border-blue-600 py-1' : 'text-slate-700 hover:text-blue-600' ?>">Home</a>

                <!-- Dropdown "Tentang Kami" -->
                <div class="relative" @mouseenter="open_kami = true" @mouseleave="open_kami = false">
                    <button class="flex items-center gap-1.5 text-sm font-semibold focus:outline-none transition <?= in_array($uri->getPath(), $arr_tentang_kami) ? 'text-blue-700 font-bold border-b-2 border-blue-600 py-1' : 'text-slate-700 hover:text-blue-600' ?>">
                        Tentang Kami
                        <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200" :class="open_kami ? 'rotate-180 text-blue-600' : ''"></i>
                    </button>
                    <div x-show="open_kami" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-100" class="absolute top-full left-0 bg-white shadow-xl rounded-xl py-2 w-56 border border-slate-100 z-50">
                        <a href="<?= base_url('/profil') ?>" class="block px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-700 transition">Profil Perusahaan</a>
                        <a href="<?= base_url('/managemen') ?>" class="block px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-700 transition">Manajemen</a>
                        <a href="<?= base_url('/struktur_organisasi') ?>" class="block px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-700 transition">Struktur Organisasi</a>
                        <a href="<?= base_url('/awards') ?>" class="block px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-700 transition">Penghargaan</a>
                        <a href="<?= base_url('/keuangan') ?>" class="block px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-700 transition">Laporan Keuangan</a>
                        <a href="<?= base_url('/piagam') ?>" class="block px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-700 transition">Laporan Piagam Audit</a>
                    </div>
                </div>

                <!-- Dropdown "Produk" -->
                <div class="relative" @mouseenter="open_produk = true" @mouseleave="open_produk = false">
                    <button class="flex items-center gap-1.5 text-sm font-semibold focus:outline-none transition <?= in_array($uri->getPath(), $arr_produk) ? 'text-blue-700 font-bold border-b-2 border-blue-600 py-1' : 'text-slate-700 hover:text-blue-600' ?>">
                        Produk & Layanan
                        <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200" :class="open_produk ? 'rotate-180 text-blue-600' : ''"></i>
                    </button>
                    <div x-show="open_produk" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-100" class="absolute top-full left-0 bg-white shadow-xl rounded-xl py-2 w-56 border border-slate-100 z-50">
                        <a href="<?= base_url('/tabungan') ?>" class="block px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-700 transition flex items-center gap-2">
                            <i class="fa-solid fa-piggy-bank text-blue-600"></i> Tabungan Syariah
                        </a>
                        <a href="<?= base_url('/deposito') ?>" class="block px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-700 transition flex items-center gap-2">
                            <i class="fa-solid fa-chart-line text-amber-600"></i> Deposito Mudharabah
                        </a>
                        <a href="<?= base_url('/pembiayaan') ?>" class="block px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-700 transition flex items-center gap-2">
                            <i class="fa-solid fa-hand-holding-dollar text-sky-600"></i> Pembiayaan Syariah
                        </a>
                        <a href="<?= base_url('/pelayanan') ?>" class="block px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-700 transition flex items-center gap-2 border-t border-slate-100">
                            <i class="fa-solid fa-ellipsis text-slate-500"></i> Layanan Lainnya
                        </a>
                    </div>
                </div>

                <a href="<?= base_url('/galeri') ?>" class="text-sm font-semibold transition <?= $uri->getPath() === '/galeri' ? 'text-blue-700 font-bold border-b-2 border-blue-600 py-1' : 'text-slate-700 hover:text-blue-600' ?>">Galeri</a>
                <a href="<?= base_url('/hubungi_kami') ?>" class="text-sm font-semibold transition <?= $uri->getPath() === '/hubungi_kami' ? 'text-blue-700 font-bold border-b-2 border-blue-600 py-1' : 'text-slate-700 hover:text-blue-600' ?>">Kontak Kami</a>
            </nav>

            <!-- Quick Action CTA Buttons (Desktop) -->
            <div class="hidden md:flex items-center space-x-3">
                <a href="#simulasi" class="inline-flex items-center justify-center gap-2 rounded-xl border border-blue-600/30 bg-blue-50 px-4 py-2 text-xs font-bold text-blue-700 transition hover:bg-blue-100">
                    <i class="fa-solid fa-calculator text-blue-600"></i> Simulasi
                </a>
                <a href="<?= base_url('/hubungi_kami') ?>" class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-2 text-xs font-bold text-white shadow-md shadow-blue-600/20 transition hover:bg-blue-700 active:scale-95">
                    <i class="fa-solid fa-paper-plane"></i> Hubungi Kami
                </a>
            </div>

            <!-- Mobile Button -->
            <button class="md:hidden text-slate-700 hover:text-blue-600 focus:outline-none p-2 rounded-lg" @click="open = !open" aria-label="Toggle Mobile Menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" style="display: none;" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" class="md:hidden bg-white border-b border-slate-200 shadow-xl overflow-hidden" style="display: none;" x-data="{ openTentangKami: false, openProduk: false }">
        <div class="px-5 py-4 space-y-2 max-h-[80vh] overflow-y-auto">
            <a href="<?= base_url('/') ?>" class="block px-3 py-2.5 text-sm font-semibold text-slate-800 hover:bg-blue-50 hover:text-blue-700 rounded-lg">Home</a>

            <!-- Mobile Tentang Kami Collapse -->
            <div>
                <button @click="openTentangKami = !openTentangKami" class="w-full flex justify-between items-center px-3 py-2.5 text-sm font-semibold text-slate-800 hover:bg-blue-50 hover:text-blue-700 rounded-lg">
                    Tentang Kami
                    <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200" :class="openTentangKami ? 'rotate-180 text-blue-600' : ''"></i>
                </button>
                <div x-show="openTentangKami" x-collapse class="ml-4 space-y-1 my-1 border-l-2 border-blue-500/30 pl-3">
                    <a href="<?= base_url('/profil') ?>" class="block py-2 text-xs font-semibold text-slate-700 hover:text-blue-700">Profil Perusahaan</a>
                    <a href="<?= base_url('/managemen') ?>" class="block py-2 text-xs font-semibold text-slate-700 hover:text-blue-700">Manajemen</a>
                    <a href="<?= base_url('/struktur_organisasi') ?>" class="block py-2 text-xs font-semibold text-slate-700 hover:text-blue-700">Struktur Organisasi</a>
                    <a href="<?= base_url('/awards') ?>" class="block py-2 text-xs font-semibold text-slate-700 hover:text-blue-700">Penghargaan</a>
                    <a href="<?= base_url('/keuangan') ?>" class="block py-2 text-xs font-semibold text-slate-700 hover:text-blue-700">Laporan Keuangan</a>
                    <a href="<?= base_url('/piagam') ?>" class="block py-2 text-xs font-semibold text-slate-700 hover:text-blue-700">Laporan Piagam Audit</a>
                </div>
            </div>

            <!-- Mobile Produk Collapse -->
            <div>
                <button @click="openProduk = !openProduk" class="w-full flex justify-between items-center px-3 py-2.5 text-sm font-semibold text-slate-800 hover:bg-blue-50 hover:text-blue-700 rounded-lg">
                    Produk & Layanan
                    <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200" :class="openProduk ? 'rotate-180 text-blue-600' : ''"></i>
                </button>
                <div x-show="openProduk" x-collapse class="ml-4 space-y-1 my-1 border-l-2 border-blue-500/30 pl-3">
                    <a href="<?= base_url('/tabungan') ?>" class="block py-2 text-xs font-semibold text-slate-700 hover:text-blue-700">Tabungan Syariah</a>
                    <a href="<?= base_url('/deposito') ?>" class="block py-2 text-xs font-semibold text-slate-700 hover:text-blue-700">Deposito Mudharabah</a>
                    <a href="<?= base_url('/pembiayaan') ?>" class="block py-2 text-xs font-semibold text-slate-700 hover:text-blue-700">Pembiayaan Syariah</a>
                    <a href="<?= base_url('/pelayanan') ?>" class="block py-2 text-xs font-semibold text-slate-700 hover:text-blue-700">Layanan Lainnya</a>
                </div>
            </div>

            <a href="<?= base_url('/galeri') ?>" class="block px-3 py-2.5 text-sm font-semibold text-slate-800 hover:bg-blue-50 hover:text-blue-700 rounded-lg">Galeri</a>
            <a href="<?= base_url('/hubungi_kami') ?>" class="block px-3 py-2.5 text-sm font-semibold text-slate-800 hover:bg-blue-50 hover:text-blue-700 rounded-lg">Kontak Kami</a>

            <div class="pt-3 border-t border-slate-100 flex flex-col gap-2">
                <a href="#simulasi" class="w-full py-2.5 text-center text-xs font-bold text-blue-700 bg-blue-50 hover:bg-blue-100 rounded-xl">
                    <i class="fa-solid fa-calculator mr-1"></i> Simulasi Bagi Hasil / Angsuran
                </a>
                <a href="<?= base_url('/hubungi_kami') ?>" class="w-full py-2.5 text-center text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 rounded-xl shadow">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</header>