<?php
$uri = service('uri');
$path = trim($uri->getPath(), '/');
$user = session()->get('user') ?? 'admin';

$navItems = [
    ['label' => 'Dashboard', 'url' => base_url('dashboard'), 'icon' => 'fa-gauge-high', 'active' => $path === 'dashboard'],
    ['label' => 'Email Inbox', 'url' => base_url('inbox'), 'icon' => 'fa-inbox', 'active' => str_starts_with($path, 'inbox')],
    ['label' => 'Galeri', 'url' => base_url('upload'), 'icon' => 'fa-image', 'active' => $path === 'upload'],
    ['label' => 'Artikel', 'url' => base_url('artikel-list'), 'icon' => 'fa-newspaper', 'active' => str_starts_with($path, 'artikel')],
    ['label' => 'Dokumen', 'url' => base_url('docs'), 'icon' => 'fa-file-lines', 'active' => str_starts_with($path, 'docs')],
    ['label' => 'Manajemen', 'url' => base_url('managemen-list'), 'icon' => 'fa-users-line', 'active' => str_starts_with($path, 'managemen')],
];
?>

<header class="fixed left-0 top-0 z-50 w-full border-b border-slate-200 bg-white/95 shadow-sm backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 md:px-8">
        <div class="flex h-16 items-center justify-between gap-4">
            <a href="<?= base_url('/dashboard') ?>" class="flex items-center gap-3">
                <span class="flex size-10 items-center justify-center rounded-md bg-slate-900 text-sm font-bold text-white">DM</span>
                <span class="hidden text-sm font-bold text-slate-900 sm:block">Dashboard Madinah</span>
            </a>

            <nav class="hidden items-center gap-1 lg:flex">
                <?php foreach ($navItems as $item): ?>
                    <a href="<?= $item['url'] ?>" class="inline-flex items-center gap-2 rounded-md px-3 py-2 text-sm font-semibold transition <?= $item['active'] ? 'bg-emerald-50 text-emerald-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' ?>">
                        <i class="fa-solid <?= $item['icon'] ?> text-xs"></i>
                        <?= esc($item['label']) ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="flex items-center gap-3">
                <div class="hidden text-right sm:block">
                    <p class="text-xs text-slate-500">Masuk sebagai</p>
                    <p class="max-w-36 truncate text-sm font-bold capitalize text-slate-900"><?= esc($user) ?></p>
                </div>
                <a href="<?= base_url('logout') ?>" class="inline-flex size-10 items-center justify-center rounded-md border border-red-200 bg-red-50 text-red-700 transition hover:bg-red-100" title="Logout">
                    <i class="fa-solid fa-power-off"></i>
                </a>
            </div>
        </div>

        <nav class="flex gap-2 overflow-x-auto border-t border-slate-100 py-2 lg:hidden">
            <?php foreach ($navItems as $item): ?>
                <a href="<?= $item['url'] ?>" class="inline-flex shrink-0 items-center gap-2 rounded-md px-3 py-2 text-xs font-semibold transition <?= $item['active'] ? 'bg-emerald-50 text-emerald-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' ?>">
                    <i class="fa-solid <?= $item['icon'] ?> text-xs"></i>
                    <?= esc($item['label']) ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </div>
</header>
