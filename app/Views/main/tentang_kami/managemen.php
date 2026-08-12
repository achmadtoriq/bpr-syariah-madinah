<?php
if (!function_exists('formatManagementItems')) {
    function formatManagementItems($raw) {
        if (empty($raw)) return [];
        $raw = trim($raw);

        // Try JSON decoding first if wrapped in brackets
        if (str_starts_with($raw, '[') && str_ends_with($raw, ']')) {
            $decoded = json_decode($raw, true);
            if (is_array($decoded)) {
                $cleaned = [];
                foreach ($decoded as $item) {
                    $clean = trim(str_replace(['\"', '\"', '\"', '\"', '\\/'], ['"', '"', '"', '"', '/'], $item));
                    $clean = stripslashes($clean);
                    if (!empty($clean)) $cleaned[] = $clean;
                }
                return $cleaned;
            }
        }

        // Fallback split by semicolon or newline
        $items = preg_split('/[;\n]+/', $raw);
        $cleaned = [];
        foreach ($items as $item) {
            $clean = trim(str_replace(['\"', '\"', '\"', '\"', '\\/'], ['"', '"', '"', '"', '/'], $item));
            $clean = stripslashes($clean);
            if (!empty($clean)) $cleaned[] = $clean;
        }
        return $cleaned;
    }
}
?>

<main class="w-full bg-slate-50 text-slate-900 font-sans min-h-screen">
    <!-- 🏢 HERO BANNER SECTION (Soft Light Corporate Theme) -->
    <section class="relative bg-gradient-to-b from-blue-50/80 via-white to-slate-50 text-slate-900 pt-28 pb-16 md:pt-36 md:pb-20 border-b border-slate-200 overflow-hidden">
        <!-- Soft Background Decorative Orbs -->
        <div class="absolute top-0 right-1/4 w-[400px] h-[400px] bg-blue-200/30 blur-[120px] rounded-full pointer-events-none"></div>

        <div class="container mx-auto max-w-7xl px-5 md:px-8 relative z-10">
            <!-- Breadcrumb -->
            <nav class="flex items-center gap-2 text-xs text-slate-500 mb-4">
                <a href="<?= base_url() ?>" class="hover:text-blue-700 transition">Home</a>
                <span>/</span>
                <span>Tentang Kami</span>
                <span>/</span>
                <span class="text-blue-700 font-semibold">Manajemen Perusahaan</span>
            </nav>

            <div class="max-w-3xl space-y-4">
                <span class="inline-block rounded-full bg-blue-100 border border-blue-200 px-4 py-1.5 text-xs font-bold text-blue-800 uppercase tracking-widest">Tata Kelola BPRS Madinah</span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-slate-900">Jajaran Manajemen & Pemimpin</h1>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    Profil profesional Pemegang Saham, Dewan Komisaris, Dewan Pengawas Syariah, dan Direksi yang mengawal operasional BPRS Syariah Madinah Lamongan dengan amanah dan Good Corporate Governance.
                </p>
            </div>
        </div>
    </section>

    <!-- 👔 MANAGEMENT CONTENT SECTION -->
    <section class="py-16 md:py-24 bg-white">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 space-y-16">
            <?php 
            $roleIcons = [
                'Pemegang Saham' => 'fa-solid fa-chart-pie text-blue-600',
                'Dewan Komisaris' => 'fa-solid fa-building-columns text-blue-600',
                'Dewan Pengawas Syariah' => 'fa-solid fa-kaaba text-emerald-600',
                'Direksi' => 'fa-solid fa-user-tie text-sky-600'
            ];
            ?>

            <?php foreach ($group_management as $posisi => $pejabatList): ?>
                <div class="space-y-8 border-b border-slate-200 pb-16 last:border-0 last:pb-0">
                    <!-- Category Header -->
                    <div class="flex items-center gap-3 border-b-2 border-blue-600/20 pb-4">
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-50 border border-blue-100 text-xl">
                            <i class="<?= $roleIcons[$posisi] ?? 'fa-solid fa-users text-blue-600' ?>"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-blue-700 uppercase tracking-wider">Struktur Organisasi</span>
                            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900"><?= esc($posisi) ?></h2>
                        </div>
                    </div>

                    <!-- Pejabat Cards Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <?php foreach ($pejabatList as $p): ?>
                            <?php 
                                $listPendidikan = formatManagementItems($p['pendidikan'] ?? '');
                                $listPengalaman = formatManagementItems($p['pengalaman_kerja'] ?? '');
                                $listPelatihan = formatManagementItems($p['pelatihan'] ?? '');

                                $photoPath = !empty($p['photo']) ? trim($p['photo']) : '';
                                $photoUrl = !empty($photoPath) ? (str_starts_with($photoPath, 'http') ? $photoPath : '/' . ltrim($photoPath, '/')) : '';
                            ?>
                            <div x-data="{ openEdu: false, openExp: false, openCert: false }" class="rounded-3xl bg-slate-50/70 border border-slate-200/90 p-6 md:p-8 shadow-sm hover:shadow-xl hover:bg-white hover:border-blue-300 transition duration-300 flex flex-col md:flex-row gap-6 items-start">
                                <!-- Photo Avatar Column (Rounded-2xl Squircle) -->
                                <div class="shrink-0 space-y-3 text-center w-full md:w-auto">
                                    <div class="relative mx-auto w-32 h-32 md:w-36 md:h-36 rounded-2xl overflow-hidden shadow-md border-2 border-blue-100 bg-white group">
                                        <?php if (!empty($photoUrl)): ?>
                                            <img 
                                                src="<?= esc($photoUrl) ?>" 
                                                alt="<?= esc($p['nama']) ?>" 
                                                class="w-full h-full object-cover object-top transition duration-300 group-hover:scale-105" 
                                                onerror="this.classList.add('hidden'); this.nextElementSibling.classList.remove('hidden');"
                                            />
                                            <div class="hidden w-full h-full flex-col items-center justify-center bg-blue-50 text-blue-700 p-2 text-center">
                                                <i class="fa-solid fa-user-tie text-4xl mb-1 text-blue-600"></i>
                                                <span class="text-[11px] font-bold text-blue-900 leading-tight"><?= esc($p['nama']) ?></span>
                                            </div>
                                        <?php else: ?>
                                            <div class="w-full h-full flex flex-col items-center justify-center bg-blue-50 text-blue-700 p-2 text-center">
                                                <i class="fa-solid fa-user-tie text-4xl mb-1 text-blue-600"></i>
                                                <span class="text-[11px] font-bold text-blue-900 leading-tight"><?= esc($p['nama']) ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <span class="inline-block rounded-full bg-blue-100 px-3 py-1 text-[11px] font-bold text-blue-800 shadow-xs">
                                        <?= esc($posisi) ?>
                                    </span>
                                </div>

                                <!-- Bio & Qualifications Column -->
                                <div class="space-y-4 flex-1 w-full">
                                    <div>
                                        <h3 class="text-xl md:text-2xl font-extrabold text-slate-900 leading-tight"><?= esc($p['nama']) ?></h3>
                                        <div class="mt-1.5 inline-block px-3 py-1 rounded-lg bg-blue-50 border border-blue-200 text-xs font-bold text-blue-700">
                                            <?= esc($p['jabatan']) ?>
                                        </div>
                                    </div>

                                    <!-- Personal Info -->
                                    <div class="text-xs text-slate-600 space-y-1.5 bg-white p-3.5 rounded-2xl border border-slate-200/80 shadow-sm">
                                        <p class="flex items-center gap-2 font-medium">
                                            <i class="fa-solid fa-id-card text-blue-600"></i>
                                            <span>Kewarganegaraan: <strong><?= esc($p['kewarganegaraan']) ?></strong></span>
                                        </p>
                                        <?php if (!empty($p['tempat_lahir']) && !empty($p['tanggal_lahir'])): ?>
                                            <p class="flex items-center gap-2 text-slate-600">
                                                <i class="fa-solid fa-cake-candles text-amber-500"></i>
                                                <span>Lahir di <strong><?= esc($p['tempat_lahir']) ?></strong>, <?= date('d F Y', strtotime($p['tanggal_lahir'])) ?></span>
                                            </p>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Qualification Collapsible Accordions -->
                                    <div class="space-y-3 pt-1 text-xs">
                                        <!-- ACCORDION 1: PENDIDIKAN -->
                                        <?php if (!empty($listPendidikan)): ?>
                                            <div class="rounded-2xl border border-slate-200 bg-white overflow-hidden shadow-xs">
                                                <button @click="openEdu = !openEdu" class="w-full flex items-center justify-between p-3 text-left font-bold text-slate-900 hover:bg-blue-50/50 transition">
                                                    <span class="flex items-center gap-2">
                                                        <i class="fa-solid fa-graduation-cap text-blue-600"></i> Riwayat Pendidikan
                                                        <span class="ml-1 px-2 py-0.5 rounded-full bg-blue-100 text-[10px] text-blue-800 font-bold"><?= count($listPendidikan) ?></span>
                                                    </span>
                                                    <i class="fa-solid fa-chevron-down text-xs text-blue-600 transition-transform duration-200" :class="openEdu ? 'rotate-180' : ''"></i>
                                                </button>
                                                <div x-show="openEdu" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="p-3 pt-0 border-t border-slate-100 space-y-2">
                                                    <div class="flex flex-wrap gap-2 pt-2">
                                                        <?php foreach ($listPendidikan as $edu): ?>
                                                            <span class="px-3 py-1.5 bg-blue-50/80 border border-blue-200 text-blue-900 rounded-xl font-semibold shadow-xs flex items-center gap-1.5">
                                                                <i class="fa-solid fa-circle-check text-blue-600 text-[10px]"></i>
                                                                <?= esc($edu) ?>
                                                            </span>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <!-- ACCORDION 2: PENGALAMAN KERJA -->
                                        <?php if (!empty($listPengalaman)): ?>
                                            <div class="rounded-2xl border border-slate-200 bg-white overflow-hidden shadow-xs">
                                                <button @click="openExp = !openExp" class="w-full flex items-center justify-between p-3 text-left font-bold text-slate-900 hover:bg-blue-50/50 transition">
                                                    <span class="flex items-center gap-2">
                                                        <i class="fa-solid fa-briefcase text-blue-600"></i> Pengalaman Kerja
                                                        <span class="ml-1 px-2 py-0.5 rounded-full bg-blue-100 text-[10px] text-blue-800 font-bold"><?= count($listPengalaman) ?></span>
                                                    </span>
                                                    <i class="fa-solid fa-chevron-down text-xs text-blue-600 transition-transform duration-200" :class="openExp ? 'rotate-180' : ''"></i>
                                                </button>
                                                <div x-show="openExp" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="p-3 pt-0 border-t border-slate-100 space-y-2">
                                                    <div class="space-y-1.5 pt-2">
                                                        <?php foreach ($listPengalaman as $work): ?>
                                                            <div class="flex items-start gap-2.5 p-2.5 rounded-xl bg-slate-50 border border-slate-200/80 shadow-xs text-slate-700 leading-relaxed">
                                                                <i class="fa-solid fa-building-user text-blue-600 mt-0.5 shrink-0"></i>
                                                                <span class="font-medium"><?= esc($work) ?></span>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <!-- ACCORDION 3: PELATIHAN & SERTIFIKASI -->
                                        <?php if (!empty($listPelatihan)): ?>
                                            <div class="rounded-2xl border border-slate-200 bg-white overflow-hidden shadow-xs">
                                                <button @click="openCert = !openCert" class="w-full flex items-center justify-between p-3 text-left font-bold text-slate-900 hover:bg-amber-50/50 transition">
                                                    <span class="flex items-center gap-2">
                                                        <i class="fa-solid fa-certificate text-amber-600"></i> Pelatihan & Sertifikasi
                                                        <span class="ml-1 px-2 py-0.5 rounded-full bg-amber-100 text-[10px] text-amber-800 font-bold"><?= count($listPelatihan) ?></span>
                                                    </span>
                                                    <i class="fa-solid fa-chevron-down text-xs text-amber-600 transition-transform duration-200" :class="openCert ? 'rotate-180' : ''"></i>
                                                </button>
                                                <div x-show="openCert" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="p-3 pt-0 border-t border-slate-100 space-y-2">
                                                    <div class="space-y-1.5 pt-2">
                                                        <?php foreach ($listPelatihan as $training): ?>
                                                            <div class="flex items-start gap-2.5 p-2.5 rounded-xl bg-amber-50/50 border border-amber-200/60 shadow-xs text-slate-800 leading-relaxed">
                                                                <i class="fa-solid fa-award text-amber-600 mt-0.5 shrink-0"></i>
                                                                <span class="font-medium"><?= esc($training) ?></span>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
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
                <a href="<?= base_url('/struktur_organisasi') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-sitemap text-blue-600"></i> Struktur Organisasi
                </a>
                <a href="<?= base_url('/awards') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-trophy text-amber-500"></i> Penghargaan Infobank
                </a>
                <a href="<?= base_url('/keuangan') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-file-invoice-dollar text-emerald-600"></i> Laporan Keuangan
                </a>
            </div>
        </div>
    </section>
</main>