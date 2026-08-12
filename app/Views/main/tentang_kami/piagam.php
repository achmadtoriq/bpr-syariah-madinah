<main x-data="fileUpload()" class="w-full bg-slate-50 text-slate-900 font-sans min-h-screen">
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
                <span class="text-blue-700 font-semibold">Piagam Audit</span>
            </nav>

            <div class="max-w-3xl space-y-4">
                <span class="inline-block rounded-full bg-blue-100 border border-blue-200 px-4 py-1.5 text-xs font-bold text-blue-800 uppercase tracking-widest">
                    <i class="fa-solid fa-magnifying-glass-chart mr-1"></i> Audit & Kontrol Internal
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-slate-900">Piagam Audit Intern (Audit Charter)</h1>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    Landasan kerja, wewenang, dan kerangka independensi Satuan Kerja Audit Intern (SKAI) PT BPRS Syariah Madinah Lamongan dalam memastikan efektivitas pengendalian internal dan efisiensi operasional.
                </p>
            </div>
        </div>
    </section>

    <!-- 🔍 SEARCH BAR & AUDIT PRINCIPLES SECTION -->
    <section class="py-8 bg-white border-b border-slate-200 shadow-sm">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 space-y-8">
            <!-- Live Search Bar Component -->
            <div class="max-w-2xl mx-auto relative">
                <div class="relative flex items-center shadow-sm rounded-2xl bg-white border border-slate-300 focus-within:border-blue-600 focus-within:ring-4 focus-within:ring-blue-100 transition overflow-hidden">
                    <!-- Search Icon Container -->
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-solid fa-magnifying-glass text-base text-blue-600"></i>
                    </div>

                    <!-- Input Field -->
                    <input 
                        type="text" 
                        x-model="searchQuery" 
                        placeholder="Cari dokumen piagam audit (contoh: Piagam, SKAI, Audit)..." 
                        style="padding-left: 3.2rem !important; padding-right: 2.5rem !important;"
                        class="w-full bg-transparent py-3.5 text-sm font-medium text-slate-900 placeholder:text-slate-400 outline-none border-0 focus:ring-0"
                    />

                    <!-- Clear Button -->
                    <button 
                        x-show="searchQuery.length > 0" 
                        @click="searchQuery = ''" 
                        class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-700 text-lg font-bold transition cursor-pointer"
                        style="display: none;"
                        aria-label="Clear Search"
                    >
                        &times;
                    </button>
                </div>

                <!-- Active Search Filter Status -->
                <div x-show="searchQuery.length > 0" class="mt-2 text-xs text-slate-500 flex justify-between items-center px-3" style="display: none;">
                    <span>Menampilkan hasil pencarian untuk: <strong class="text-blue-700 font-bold" x-text="searchQuery"></strong></span>
                    <button @click="searchQuery = ''" class="text-blue-600 hover:text-blue-800 hover:underline font-bold transition">Reset Pencarian</button>
                </div>
            </div>

            <!-- 3 Audit Charter Principles Highlight -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
                <div class="p-5 rounded-2xl bg-blue-50/60 border border-blue-100 space-y-2">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-600 text-white font-bold text-lg shadow">
                        <i class="fa-solid fa-shield"></i>
                    </div>
                    <h4 class="font-bold text-slate-900 text-sm">Independensi & Objektivitas</h4>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        SKAI berada langsung di bawah pengawasan Komite Audit dan Direktur Utama untuk menjaga independensi audit secara objektif.
                    </p>
                </div>

                <div class="p-5 rounded-2xl bg-emerald-50/60 border border-emerald-100 space-y-2">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-600 text-white font-bold text-lg shadow">
                        <i class="fa-solid fa-folder-tree"></i>
                    </div>
                    <h4 class="font-bold text-slate-900 text-sm">Aksesibilitas Informasi</h4>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        SKAI memiliki wewenang penuh untuk mengakses seluruh dokumen, sistem informasi, dan fasilitas operasional bank.
                    </p>
                </div>

                <div class="p-5 rounded-2xl bg-amber-50/60 border border-amber-100 space-y-2">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-600 text-white font-bold text-lg shadow">
                        <i class="fa-solid fa-scale-balanced"></i>
                    </div>
                    <h4 class="font-bold text-slate-900 text-sm">Kepatuhan Syariah & Regulasi</h4>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Audit dilaksanakan sesuai standar profesional internal audit serta regulasi Otoritas Jasa Keuangan (OJK).
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 📄 DOCUMENT DOWNLOAD LIST SECTION -->
    <section class="py-12 md:py-20">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 space-y-8">
            <?php
            $piagam = array();
            if (!empty($docs) && count($docs) > 0) {
                foreach ($docs as $value) {
                    $data = array(
                        "name" => $value['name'],
                        "path" => $value['path']
                    );

                    if ($value['type'] == 4) {
                        array_push($piagam, $data);
                    }
                }
            }
            ?>

            <div class="flex items-center gap-3 border-b-2 border-blue-600/20 pb-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-100 text-blue-700 font-bold text-lg">
                    <i class="fa-solid fa-file-contract"></i>
                </div>
                <div>
                    <span class="text-xs font-bold text-blue-700 uppercase tracking-wider">Dokumen Resmi</span>
                    <h2 class="text-2xl font-extrabold text-slate-900">Berkas Piagam Audit Intern</h2>
                </div>
            </div>

            <?php if (!empty($piagam)): ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($piagam as $value): ?>
                        <div 
                            x-show="searchQuery === '' || '<?= strtolower(addslashes($value['name'])) ?>'.includes(searchQuery.toLowerCase())"
                            x-transition:enter="transition ease-out duration-200"
                            class="rounded-2xl bg-white border border-slate-200/90 p-5 shadow-sm hover:shadow-xl hover:border-blue-300 transition duration-300 flex flex-col justify-between space-y-4"
                        >
                            <div class="flex items-start gap-3.5">
                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-50 text-red-600 font-bold text-2xl shrink-0 border border-red-100">
                                    <i class="fa-solid fa-file-pdf"></i>
                                </div>
                                <div class="space-y-1">
                                    <h3 class="font-bold text-slate-900 text-sm leading-snug line-clamp-2 hover:text-blue-700 transition">
                                        <?= esc($value['name']) ?>
                                    </h3>
                                    <p class="text-[11px] text-slate-500 flex items-center gap-1.5">
                                        <i class="fa-solid fa-circle-check text-blue-600 text-[10px]"></i> Piagam Audit Terverifikasi
                                    </p>
                                </div>
                            </div>

                            <div class="pt-3 border-t border-slate-100">
                                <button 
                                    @click="downloadFile('<?= $value['path'] ?>')" 
                                    class="w-full py-2.5 px-4 rounded-xl bg-blue-50 hover:bg-blue-600 hover:text-white text-blue-700 font-bold text-xs border border-blue-200 shadow-xs transition flex items-center justify-center gap-2 group cursor-pointer"
                                >
                                    <template x-if="loadingDownload === null || loadingDownload !== '<?= $value['path'] ?>'">
                                        <span class="flex items-center gap-2">
                                            <i class="fa-solid fa-download group-hover:animate-bounce"></i> Unduh Piagam PDF
                                        </span>
                                    </template>
                                    <template x-if="loadingDownload === '<?= $value['path'] ?>'">
                                        <span class="flex items-center gap-2">
                                            <svg class="animate-spin h-4 w-4 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                            </svg> Mengunduh Dokumen...
                                        </span>
                                    </template>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="rounded-2xl bg-white p-8 text-center border border-slate-200 text-slate-500 text-sm space-y-2">
                    <i class="fa-solid fa-folder-open text-4xl text-slate-300"></i>
                    <p class="font-semibold text-slate-700">Belum ada dokumen piagam audit yang diunggah.</p>
                    <p class="text-xs text-slate-500">Dokumen piagam audit resmi dapat diunggah melalui panel administrator.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

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

<script src="<?= base_url('assets/js/doc-controls.js')?>"></script>