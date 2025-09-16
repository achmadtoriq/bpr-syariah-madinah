<div x-data="fileUpload()" class="container mx-auto py-5 mt-20 space-y-5">
    <h1 class="text-2xl">Welcome to Document, <span class="text-red-500 font-bold"><?= session()->get('user') ?></span></h1>

    <div class="grid grid-cols-1">
        <?= view('dashboard/Dokumen/partials/document-form') ?>

        <div class="w-full" id="tableContainer">
            <?= view('dashboard/Dokumen/partials/table_documents') ?>
        </div>
    </div>

</div>

<script src="<?= base_url('js/doc-controls.js') ?>"></script>