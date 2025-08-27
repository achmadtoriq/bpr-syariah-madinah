<div class="container mx-auto py-5 mt-20 space-y-5">
    <h1 class="text-2xl">Welcome to Dashboard, <span class="text-red-500 font-bold"><?= session()->get('user') ?></span></h1>
    <div class="w-full grid grid-cols-4 gap-3">
        <a href="<?= base_url('upload') ?>" class="p-4 border rounded-sm">
            <button>List Image</button>
        </a>
        <a href="<?= base_url('artikel-list') ?>" class="p-4 border rounded-sm">
            <button>List Artikel</button>
        </a>
    </div>
</div>