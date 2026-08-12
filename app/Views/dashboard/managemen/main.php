<main x-data="pemegangSahamForm()" class="min-h-screen bg-slate-50 px-4 pb-12 pt-28 md:px-8 lg:pt-24">
    <div class="mx-auto max-w-7xl">
        <div class="flex flex-col justify-between gap-4 md:flex-row md:items-end" data-aos="fade-up">
            <div>
                <p class="text-sm font-bold uppercase tracking-wide text-emerald-700">Manajemen</p>
                <h1 class="mt-2 text-3xl font-bold text-slate-900"><?= esc($title) ?></h1>
                <p class="mt-2 text-sm leading-6 text-slate-600">Kelola data pengurus, pemegang saham, dan struktur manajemen.</p>
            </div>
            <a href="<?= base_url('/dashboard') ?>" class="inline-flex w-fit items-center gap-2 rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-bold text-slate-700 transition hover:border-emerald-500 hover:text-emerald-700">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                Dashboard
            </a>
        </div>

        <section class="mt-6 rounded-lg bg-white p-5 shadow-sm ring-1 ring-slate-200" data-aos="fade-up" data-aos-delay="100">
        <?php
        if ($flag) {
        ?>
            <div class="mb-5 flex justify-end">
                <a href="<?= base_url('managemen-form') ?>" class="inline-flex items-center gap-2 rounded-md bg-emerald-600 px-4 py-2 text-sm font-bold text-white transition hover:bg-emerald-700">
                    <i class="fa-solid fa-plus text-xs"></i>
                    Tambah Data
                </a>
            </div>
            <div class="overflow-x-auto">
                <?= view('dashboard/managemen/partials/table_documents') ?>
            </div>
        <?php
        } else {
        ?>
            <?= view('dashboard/managemen/partials/form') ?>
        <?php
        }
        ?>
        </section>
    </div>
</main>

<script src="<?= base_url('assets/js/managemen-controls.js') ?>"></script>
