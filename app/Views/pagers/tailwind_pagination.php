<?php
use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);
?>

<nav aria-label="Page navigation" class="flex items-center justify-between">
    <div class="hidden sm:block">
        <p class="text-xs text-slate-500">
            Menampilkan halaman <span class="font-bold text-slate-900"><?= $pager->getCurrentPageNumber() ?></span> dari <span class="font-bold text-slate-900"><?= $pager->getPageCount() ?></span>
        </p>
    </div>

    <div class="flex items-center gap-1.5">
        <?php if ($pager->hasPreviousPage()) : ?>
            <a href="<?= $pager->getFirst() ?>" aria-label="First" class="inline-flex size-8 items-center justify-center rounded-lg border border-slate-200 bg-white text-xs font-semibold text-slate-600 transition hover:bg-slate-100 hover:text-slate-900" title="Halaman Pertama">
                <i class="fa-solid fa-angles-left"></i>
            </a>
            <a href="<?= $pager->getPreviousPage() ?>" aria-label="Previous" class="inline-flex size-8 items-center justify-center rounded-lg border border-slate-200 bg-white text-xs font-semibold text-slate-600 transition hover:bg-slate-100 hover:text-slate-900" title="Sebelumnya">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <a href="<?= $link['uri'] ?>" class="inline-flex size-8 items-center justify-center rounded-lg text-xs font-bold transition <?= $link['active'] ? 'bg-emerald-600 text-white shadow-xs' : 'border border-slate-200 bg-white text-slate-700 hover:bg-slate-100' ?>">
                <?= $link['title'] ?>
            </a>
        <?php endforeach ?>

        <?php if ($pager->hasNextPage()) : ?>
            <a href="<?= $pager->getNextPage() ?>" aria-label="Next" class="inline-flex size-8 items-center justify-center rounded-lg border border-slate-200 bg-white text-xs font-semibold text-slate-600 transition hover:bg-slate-100 hover:text-slate-900" title="Berikutnya">
                <i class="fa-solid fa-chevron-right"></i>
            </a>
            <a href="<?= $pager->getLast() ?>" aria-label="Last" class="inline-flex size-8 items-center justify-center rounded-lg border border-slate-200 bg-white text-xs font-semibold text-slate-600 transition hover:bg-slate-100 hover:text-slate-900" title="Halaman Terakhir">
                <i class="fa-solid fa-angles-right"></i>
            </a>
        <?php endif ?>
    </div>
</nav>
