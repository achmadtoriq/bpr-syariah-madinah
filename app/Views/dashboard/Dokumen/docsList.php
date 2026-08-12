<main x-data="fileUpload()" class="min-h-screen bg-slate-50 px-4 pb-12 pt-28 md:px-8 lg:pt-24">
    <div class="mx-auto max-w-7xl">
        <div class="flex flex-col justify-between gap-4 md:flex-row md:items-end" data-aos="fade-up">
            <div>
                <p class="text-sm font-bold uppercase tracking-wide text-emerald-700">Dokumen</p>
                <h1 class="mt-2 text-3xl font-bold text-slate-900">Laporan Keuangan</h1>
                <p class="mt-2 text-sm leading-6 text-slate-600">Upload, download, dan hapus dokumen laporan publik.</p>
            </div>
            <a href="<?= base_url('/dashboard') ?>" class="inline-flex w-fit items-center gap-2 rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-bold text-slate-700 transition hover:border-emerald-500 hover:text-emerald-700">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                Dashboard
            </a>
        </div>

        <section class="mt-6 grid gap-6 lg:grid-cols-[420px_1fr]">
            <div data-aos="fade-right">
                <?= view('dashboard/Dokumen/partials/document-form') ?>
            </div>

            <div class="rounded-lg bg-white p-5 shadow-sm ring-1 ring-slate-200" id="tableContainer" data-aos="fade-left">
                <?= view('dashboard/Dokumen/partials/table_documents') ?>
            </div>
        </section>
    </div>
</main>

<script src="<?= base_url('assets/js/doc-controls.js') ?>"></script>
