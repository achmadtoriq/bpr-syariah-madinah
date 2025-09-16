<div class="container mx-auto py-5 mt-20 space-y-5">
    <h1 class="text-2xl">Welcome to <?= $title ?>, <span class="text-red-500 font-bold"><?= session()->get('user') ?></span></h1>
    <a href="<?= base_url('managemen-form') ?>" target="_blank" class="px-4 py-2 bg-green-500 text-white font-bold rounded-md ">Tambah Data</a>
</div>