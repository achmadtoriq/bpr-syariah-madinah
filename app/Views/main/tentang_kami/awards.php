<main class="w-full bg-slate-50 text-slate-900 font-sans min-h-screen" x-data="{ openModal: false, activeImage: '', activeTitle: '', activeYear: '' }">
    <!-- 🏢 HERO BANNER SECTION (Soft Light Corporate Theme) -->
    <section class="relative bg-gradient-to-b from-blue-50/80 via-white to-slate-50 text-slate-900 pt-28 pb-14 md:pt-36 md:pb-16 border-b border-slate-200 overflow-hidden">
        <!-- Soft Background Decorative Orbs -->
        <div class="absolute top-0 right-1/4 w-[400px] h-[400px] bg-blue-200/30 blur-[120px] rounded-full pointer-events-none"></div>

        <div class="container mx-auto max-w-7xl px-5 md:px-8 relative z-10">
            <!-- Breadcrumb -->
            <nav class="flex items-center gap-2 text-xs text-slate-500 mb-4">
                <a href="<?= base_url() ?>" class="hover:text-blue-700 transition">Home</a>
                <span>/</span>
                <span>Tentang Kami</span>
                <span>/</span>
                <span class="text-blue-700 font-semibold">Penghargaan Perusahaan</span>
            </nav>

            <div class="max-w-3xl space-y-4">
                <span class="inline-block rounded-full bg-amber-100 border border-amber-200 px-4 py-1.5 text-xs font-bold text-amber-800 uppercase tracking-widest">
                    <i class="fa-solid fa-trophy mr-1 text-amber-600"></i> Rekam Jejak Prestasi
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-slate-900">Penghargaan & Apresiasi</h1>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    Bukti komitmen BPRS Syariah Madinah Lamongan dalam menjaga kinerja keuangan yang sehat, transparan, dan terpercaya secara konsisten.
                </p>
            </div>
        </div>
    </section>

    <!-- 🏆 ACHIEVEMENT HIGHLIGHT METRICS -->
    <section class="py-8 bg-white border-b border-slate-200 shadow-sm">
        <div class="container mx-auto max-w-7xl px-5 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center md:text-left">
                <div class="flex items-center justify-center md:justify-start gap-4 p-4 rounded-2xl bg-blue-50/60 border border-blue-100">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600 text-white font-bold text-xl shadow">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-extrabold text-slate-900">Predikat "Sangat Bagus"</p>
                        <p class="text-xs text-slate-500">Kinerja Keuangan versi Majalah Infobank</p>
                    </div>
                </div>

                <div class="flex items-center justify-center md:justify-start gap-4 p-4 rounded-2xl bg-amber-50/60 border border-amber-100">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-600 text-white font-bold text-xl shadow">
                        <i class="fa-solid fa-medal"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-extrabold text-slate-900">5 Tahun Berturut-turut</p>
                        <p class="text-xs text-slate-500">Sharia Finance Awards Konsisten</p>
                    </div>
                </div>

                <div class="flex items-center justify-center md:justify-start gap-4 p-4 rounded-2xl bg-emerald-50/60 border border-emerald-100">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-600 text-white font-bold text-xl shadow">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-extrabold text-slate-900">Bank Terpercaya</p>
                        <p class="text-xs text-slate-500">Berizin & Diawasi OJK serta Penjaminan LPS</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 🎖️ AWARDS GALLERY GRID SECTION -->
    <section class="py-16 md:py-24">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <span class="inline-block rounded-full bg-blue-100 px-3.5 py-1 text-xs font-bold text-blue-800 uppercase tracking-wide">Galeri Piagam</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Koleksi Sertifikat Penghargaan</h2>
                <p class="text-slate-600 text-sm">Klik pada piagam penghargaan untuk memperbesar dan melihat rincian dokumen sertifikat.</p>
            </div>

            <!-- Grid Awards Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach ($awards as $value): ?>
                    <?php 
                        $imgUrl = !empty($value['imagePath']) ? (str_starts_with($value['imagePath'], 'http') ? $value['imagePath'] : '/' . ltrim($value['imagePath'], '/')) : '';
                        $titleFull = esc($value['teks_1']) . ' ' . esc($value['predikat']);
                        $subTitle = esc($value['teks_3']);
                    ?>
                    <div class="group rounded-3xl bg-white border border-slate-200/90 p-5 shadow-sm hover:shadow-xl hover:border-amber-400 hover:-translate-y-1.5 transition duration-300 flex flex-col justify-between">
                        <div class="space-y-4">
                            <!-- Image Box with Lightbox Trigger -->
                            <div 
                                @click="openModal = true; activeImage = '<?= $imgUrl ?>'; activeTitle = '<?= esc($titleFull) ?>'; activeYear = '<?= esc($subTitle) ?>'"
                                class="relative aspect-[3/4] w-full overflow-hidden rounded-2xl bg-slate-100 border border-slate-200 cursor-pointer group/img"
                            >
                                <img 
                                    src="<?= $imgUrl ?>" 
                                    alt="<?= esc($titleFull) ?>" 
                                    class="h-full w-full object-cover transition duration-500 group-hover/img:scale-105"
                                    onerror="this.src='/assets/madinah.png'; this.classList.add('p-8', 'object-contain');"
                                >
                                <div class="absolute inset-0 bg-slate-950/40 opacity-0 group-hover/img:opacity-100 transition duration-300 flex items-center justify-center text-white">
                                    <div class="h-12 w-12 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white font-bold text-lg shadow-lg">
                                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                                    </div>
                                </div>
                                <span class="absolute top-3 right-3 rounded-full bg-amber-500 px-3 py-1 text-[10px] font-extrabold text-slate-950 shadow-md">
                                    <?= esc($value['predikat']) ?>
                                </span>
                            </div>

                            <!-- Text Description -->
                            <div class="space-y-2 text-center sm:text-left">
                                <span class="text-[11px] font-bold text-blue-700 uppercase tracking-wide inline-block">
                                    <?= esc($value['teks_1']) ?>
                                </span>
                                <h3 class="font-extrabold text-slate-900 text-lg leading-tight">
                                    <?= esc($value['predikat']) ?>
                                </h3>
                                <?php if (!empty($value['teks_2'])): ?>
                                    <p class="text-xs font-semibold text-amber-700 bg-amber-50 px-2.5 py-1 rounded-lg border border-amber-200 inline-block">
                                        <?= esc($value['teks_2']) ?>
                                    </p>
                                <?php endif; ?>
                                <p class="text-xs text-slate-500 pt-1 leading-relaxed">
                                    <?= esc($value['teks_3']) ?>
                                </p>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="pt-4 border-t border-slate-100 mt-4">
                            <button 
                                @click="openModal = true; activeImage = '<?= $imgUrl ?>'; activeTitle = '<?= esc($titleFull) ?>'; activeYear = '<?= esc($subTitle) ?>'"
                                class="w-full py-2.5 rounded-xl bg-slate-900 hover:bg-amber-600 text-white text-xs font-bold transition flex items-center justify-center gap-1.5"
                            >
                                <i class="fa-solid fa-expand text-[10px]"></i> Perbesar Sertifikat
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 🖼️ LIGHTBOX MODAL FOR CERTIFICATE ZOOM -->
    <div 
        x-show="openModal" 
        x-transition:enter="transition ease-out duration-200" 
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100" 
        x-transition:leave="transition ease-in duration-150" 
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/85 backdrop-blur-md" 
        style="display: none;"
    >
        <div @click.away="openModal = false" class="relative max-w-3xl w-full bg-white rounded-3xl p-6 shadow-2xl space-y-4 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center border-b border-slate-200 pb-3">
                <div>
                    <h4 class="font-extrabold text-slate-900 text-base" x-text="activeTitle"></h4>
                    <p class="text-xs text-slate-500" x-text="activeYear"></p>
                </div>
                <button @click="openModal = false" class="text-slate-400 hover:text-slate-700 text-2xl font-bold p-1">&times;</button>
            </div>
            <div class="rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 flex justify-center p-2">
                <img :src="activeImage" :alt="activeTitle" class="max-h-[70vh] w-auto object-contain rounded-xl shadow-md">
            </div>
            <div class="flex justify-end">
                <button @click="openModal = false" class="px-5 py-2 rounded-xl bg-slate-900 text-white text-xs font-bold hover:bg-slate-800 transition">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- 🔗 QUICK NAVIGATION FOOTER BANNER -->
    <section class="py-12 bg-slate-100 border-t border-slate-200">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 text-center space-y-6">
            <h3 class="text-xl font-bold text-slate-900">Tautan Seputar Perusahaan</h3>
            <div class="flex flex-wrap justify-center items-center gap-4">
                <a href="<?= base_url('/profil') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-building text-blue-600"></i> Profil & Sejarah BPRS
                </a>
                <a href="<?= base_url('/managemen') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-users text-blue-600"></i> Manajemen & Direksi
                </a>
                <a href="<?= base_url('/struktur_organisasi') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-sitemap text-blue-600"></i> Struktur Organisasi
                </a>
                <a href="<?= base_url('/keuangan') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-file-invoice-dollar text-emerald-600"></i> Laporan Keuangan
                </a>
            </div>
        </div>
    </section>
</main>