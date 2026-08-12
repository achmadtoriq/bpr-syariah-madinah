<?php
$galleryLabels = [
    1 => 'Kegiatan',
    2 => 'Pengembangan',
    3 => 'Inklusi/Literasi',
];

$documentLabels = [
    1 => 'Tahunan & AKB',
    2 => 'Tata Kelola',
    3 => 'Publikasi',
    4 => 'Piagam Audit',
];

$galleryTotal = array_sum(array_map(static fn ($item) => (int) ($item['total'] ?? 0), $countImage ?? []));
$articleTotal = array_sum(array_map(static fn ($item) => (int) ($item['total'] ?? 0), $countArtikel ?? []));
$documentTotal = array_sum(array_map(static fn ($item) => (int) ($item['total'] ?? 0), $countDocs ?? []));
$managementTotal = array_sum(array_map(static fn ($item) => (int) ($item['total'] ?? 0), $countManagement ?? []));

$cards = [
    [
        'title' => 'Upload Galeri',
        'desc' => 'Kelola dokumentasi kegiatan dan banner homepage.',
        'url' => base_url('upload'),
        'icon' => 'fa-image',
        'accent' => 'emerald',
        'total' => $galleryTotal,
        'items' => array_filter($countImage ?? [], static fn ($item) => (int) ($item['loc_id'] ?? 0) < 4),
        'labels' => $galleryLabels,
        'labelKey' => 'loc_id',
    ],
    [
        'title' => 'List Artikel',
        'desc' => 'Pantau artikel berdasarkan status publikasi.',
        'url' => base_url('artikel-list'),
        'icon' => 'fa-newspaper',
        'accent' => 'sky',
        'total' => $articleTotal,
        'items' => $countArtikel ?? [],
        'labels' => [],
        'labelKey' => 'status',
    ],
    [
        'title' => 'Laporan Keuangan',
        'desc' => 'Upload dan arsipkan dokumen laporan resmi.',
        'url' => base_url('docs'),
        'icon' => 'fa-file-lines',
        'accent' => 'amber',
        'total' => $documentTotal,
        'items' => $countDocs ?? [],
        'labels' => $documentLabels,
        'labelKey' => 'type',
    ],
    [
        'title' => 'Data Manajemen',
        'desc' => 'Kelola struktur pemegang saham dan pengurus.',
        'url' => base_url('managemen-list'),
        'icon' => 'fa-users-line',
        'accent' => 'rose',
        'total' => $managementTotal,
        'items' => $countManagement ?? [],
        'labels' => [],
        'labelKey' => null,
    ],
];

$accentClasses = [
    'emerald' => 'bg-emerald-50 text-emerald-700 ring-emerald-100',
    'sky' => 'bg-sky-50 text-sky-700 ring-sky-100',
    'amber' => 'bg-amber-50 text-amber-700 ring-amber-100',
    'rose' => 'bg-rose-50 text-rose-700 ring-rose-100',
];
?>

<main class="min-h-screen bg-slate-50 px-4 pb-12 pt-28 md:px-8 lg:pt-24">
    <div class="mx-auto max-w-7xl">
        <section class="rounded-lg bg-slate-900 p-6 text-white shadow-xl shadow-slate-200 md:p-8" data-aos="fade-up">
            <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
                <div>
                    <p class="text-sm font-semibold text-emerald-300">Dashboard Admin</p>
                    <h1 class="mt-2 text-3xl font-bold md:text-4xl">Selamat datang, <?= esc(session()->get('user') ?? 'admin') ?></h1>
                    <p class="mt-3 max-w-2xl text-sm leading-7 text-slate-300">Kelola konten website BPRS Syariah Madinah dari satu tempat.</p>
                </div>
                <a href="<?= base_url('/') ?>" target="_blank" class="inline-flex w-fit items-center gap-2 rounded-md bg-white px-4 py-3 text-sm font-bold text-slate-900 transition hover:bg-emerald-100">
                    <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                    Lihat Website
                </a>
            </div>
        </section>

        <section class="mt-6 grid gap-5 md:grid-cols-2 xl:grid-cols-4">
            <?php foreach ($cards as $index => $card): ?>
                <a href="<?= $card['url'] ?>" class="group rounded-lg bg-white p-5 shadow-sm ring-1 ring-slate-200 transition hover:-translate-y-1 hover:shadow-xl" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-sm font-bold text-slate-500"><?= esc($card['title']) ?></p>
                            <p class="mt-2 text-4xl font-bold text-slate-900"><?= (int) $card['total'] ?></p>
                        </div>
                        <span class="inline-flex size-12 items-center justify-center rounded-md ring-1 <?= $accentClasses[$card['accent']] ?>">
                            <i class="fa-solid <?= $card['icon'] ?>"></i>
                        </span>
                    </div>
                    <p class="mt-4 min-h-12 text-sm leading-6 text-slate-600"><?= esc($card['desc']) ?></p>
                    <div class="mt-5 space-y-2">
                        <?php if (!empty($card['items'])): ?>
                            <?php foreach ($card['items'] as $item): ?>
                                <?php
                                $rawLabel = $card['labelKey'] ? ($item[$card['labelKey']] ?? '') : 'Management';
                                $label = $card['labels'][$rawLabel] ?? $rawLabel ?: 'Management';
                                ?>
                                <div class="flex items-center justify-between rounded-md bg-slate-50 px-3 py-2 text-xs">
                                    <span class="capitalize text-slate-600"><?= esc($label) ?></span>
                                    <span class="font-bold text-slate-900"><?= (int) ($item['total'] ?? 0) ?></span>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="flex items-center justify-between rounded-md bg-slate-50 px-3 py-2 text-xs">
                                <span class="text-slate-600">Belum ada data</span>
                                <span class="font-bold text-slate-900">0</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </a>
            <?php endforeach; ?>
        </section>
    </div>
</main>
