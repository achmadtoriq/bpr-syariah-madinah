<div x-data="pemegangSahamForm()" class="container mx-auto py-5 mt-20 space-y-5">
    <h1 class="text-2xl">Welcome to <?= $title ?>, <span class="text-red-500 font-bold"><?= session()->get('user') ?></span></h1>
    <div class="my-5 p-5 space-y-4">
        <?php
        if ($flag) {
        ?>
            <a href="<?= base_url('managemen-form') ?>" class="px-4 py-2 bg-green-500 text-white font-bold rounded-md ">Tambah Data</a>
            <div>
                <?= view('dashboard/managemen/partials/table_documents') ?>
            </div>
        <?php
        } else {
        ?>
            <?= view('dashboard/managemen/partials/form') ?>
        <?php
        }
        ?>
    </div>
</div>

<script src="<?= base_url('js/managemen-controls.js') ?>"></script>