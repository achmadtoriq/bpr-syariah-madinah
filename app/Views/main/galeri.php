<main x-data="{ activeTab: '<?= $tabs[0]['id'] ?>', showModal: false, modalImg: '', modalAlt: '' }" class="w-full bg-slate-50 text-slate-900 font-sans min-h-screen">
    <!-- 🏢 HERO BANNER SECTION (Soft Light Corporate Theme) -->
    <section class="relative bg-gradient-to-b from-blue-50/80 via-white to-slate-50 text-slate-900 pt-28 pb-14 md:pt-36 md:pb-16 border-b border-slate-200 overflow-hidden">
        <!-- Soft Background Decorative Orbs -->
        <div class="absolute top-0 right-1/4 w-[400px] h-[400px] bg-blue-200/30 blur-[120px] rounded-full pointer-events-none"></div>

        <div class="container mx-auto max-w-7xl px-5 md:px-8 relative z-10">
            <!-- Breadcrumb -->
            <nav class="flex items-center gap-2 text-xs text-slate-500 mb-4">
                <a href="<?= base_url() ?>" class="hover:text-blue-700 transition">Home</a>
                <span>/</span>
                <span class="text-blue-700 font-semibold">Galeri Aktivitas</span>
            </nav>

            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
                <div class="max-w-3xl space-y-4">
                    <span class="inline-block rounded-full bg-blue-100 border border-blue-200 px-4 py-1.5 text-xs font-bold text-blue-800 uppercase tracking-widest">
                        <i class="fa-solid fa-images mr-1 text-blue-600"></i> Dokumentasi Kegiatan
                    </span>
                    <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-slate-900">Galeri Aktivitas & Program</h1>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                        Dokumentasi foto kegiatan operasional, pengembangan Sumber Daya Insani (SDI), serta sosial inklusi & literasi keuangan syariah BPRS Madinah.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 🖼️ CATEGORY FILTER TABS & PHOTO GRID SECTION -->
    <section class="py-12 md:py-20">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 space-y-10">
            
            <!-- Category Filter Tabs -->
            <div class="flex justify-center">
                <div class="inline-flex flex-wrap justify-center rounded-2xl bg-white p-1.5 border border-slate-200 shadow-sm gap-1">
                    <?php 
                    $tabIcons = [
                        'madinah1' => 'fa-solid fa-camera-retro',
                        'madinah2' => 'fa-solid fa-user-graduate',
                        'madinah3' => 'fa-solid fa-book-open-reader',
                    ];
                    ?>
                    <?php foreach ($tabs as $tab): ?>
                        <button 
                            @click="activeTab = '<?= $tab['id'] ?>'" 
                            :class="activeTab === '<?= $tab['id'] ?>' ? 'bg-blue-600 text-white font-bold shadow-md' : 'text-slate-600 hover:text-blue-700 font-semibold'" 
                            class="px-5 py-2.5 text-xs rounded-xl transition-all flex items-center gap-2 cursor-pointer"
                        >
                            <i class="<?= $tabIcons[$tab['id']] ?? 'fa-solid fa-folder' ?>"></i>
                            <?= esc($tab['label']) ?>
                            <span class="ml-1 px-2 py-0.5 rounded-full text-[10px]" :class="activeTab === '<?= $tab['id'] ?>' ? 'bg-white/20 text-white font-extrabold' : 'bg-slate-100 text-slate-600 font-bold'">
                                <?= count($tab['content']) ?>
                            </span>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Tab Content Photos Grid -->
            <div>
                <?php foreach ($tabs as $tab): ?>
                    <div 
                        x-show="activeTab === '<?= $tab['id'] ?>'" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-3"
                        x-transition:enter-end="opacity-100 translate-y-0"
                    >
                        <?php if (!empty($tab['content'])): ?>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                                <?php foreach ($tab['content'] as $value): ?>
                                    <div 
                                        @click="showModal = true; modalImg = '<?= esc($value['img_path']) ?>'; modalAlt = '<?= esc(addslashes($value['alt'])) ?>'"
                                        class="group rounded-3xl bg-white border border-slate-200 p-3 shadow-sm hover:shadow-xl hover:border-blue-300 hover:-translate-y-1.5 transition duration-300 cursor-pointer flex flex-col justify-between"
                                    >
                                        <div class="space-y-3">
                                            <!-- Image Container -->
                                            <div class="relative aspect-[4/3] w-full overflow-hidden rounded-2xl bg-slate-100 border border-slate-200">
                                                <img 
                                                    src="<?= esc($value['img_path']) ?>" 
                                                    alt="<?= esc($value['alt']) ?>" 
                                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                                    onerror="this.src='/assets/madinah.png'; this.classList.add('p-8', 'object-contain');"
                                                />
                                                <div class="absolute inset-0 bg-slate-950/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center text-white">
                                                    <div class="h-12 w-12 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white font-bold text-lg shadow-lg">
                                                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Description Caption -->
                                            <?php if (!empty($value['alt'])): ?>
                                                <div class="px-2 pb-1">
                                                    <p class="text-xs font-semibold text-slate-800 line-clamp-2 leading-relaxed">
                                                        <?= esc($value['alt']) ?>
                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="rounded-3xl bg-white p-12 text-center border border-slate-200 text-slate-500 text-sm space-y-2">
                                <i class="fa-solid fa-images text-4xl text-slate-300"></i>
                                <p class="font-semibold text-slate-700">Belum ada foto dalam kategori ini.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <!-- 🖼️ LIGHTBOX MODAL FOR FULLSCREEN PHOTO VIEW -->
    <div 
        x-show="showModal" 
        x-transition:enter="transition ease-out duration-200" 
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100" 
        x-transition:leave="transition ease-in duration-150" 
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/85 backdrop-blur-md" 
        style="display: none;"
    >
        <div @click.away="showModal = false" class="relative max-w-4xl w-full bg-white rounded-3xl p-6 shadow-2xl space-y-4 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center border-b border-slate-200 pb-3">
                <h4 class="font-extrabold text-slate-900 text-base" x-text="modalAlt || 'Foto Dokumentasi Aktivitas'"></h4>
                <button @click="showModal = false" class="text-slate-400 hover:text-slate-700 text-2xl font-bold p-1">&times;</button>
            </div>
            <div class="rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 flex justify-center p-2">
                <img :src="modalImg" :alt="modalAlt" class="max-h-[70vh] w-auto object-contain rounded-xl shadow-md">
            </div>
            <div class="flex justify-between items-center pt-2">
                <p class="text-xs text-slate-500" x-text="modalAlt"></p>
                <button @click="showModal = false" class="px-5 py-2 rounded-xl bg-slate-900 text-white text-xs font-bold hover:bg-slate-800 transition">
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
                <a href="<?= base_url('/keuangan') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-file-invoice-dollar text-emerald-600"></i> Laporan Keuangan & GCG
                </a>
                <a href="<?= base_url('/awards') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-trophy text-amber-500"></i> Penghargaan Infobank
                </a>
            </div>
        </div>
    </section>
</main>