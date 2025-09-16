<div class="container mx-auto py-5 mt-20 space-y-5">
    <h1 class="text-2xl">Welcome to Dashboard, <span class="text-red-500 font-bold"><?= session()->get('user') ?></span></h1>
    <div class="w-full grid grid-cols-4 gap-3">
        <a href="<?= base_url('upload') ?>" class="p-4 border rounded-md space-y-8">
            <div class="flex items-center justify-between">
                <button class="font-bold">Upload Galeri</button>
                <div class="border flex justify-center items-center aspect-square border-black text-xs font-bold rounded-full px-4 py-4 text-center">
                    <i class="fa-solid fa-image text-2xl text-gray-700"></i>
                </div>
            </div>
            <div class="flex gap-4 justify-center">
                <?php
                $dataImg = array(
                    1 => "Kegiatan",
                    2 => "Pengembangan",
                    3 => "Inklusi/Literasi"
                );
                foreach ($countImage as $value) {
                    if ($value['loc_id'] < 4) {
                ?>
                        <div class="flex flex-col items-center">
                            <h2 class="inline-flex items-center text-4xl justify-center p-3  border-gray-400 rounded-full font-bold">
                                <?= $value['total'] ?>
                            </h2>
                            <span class="text-sm mt-1"><?= $dataImg[$value['loc_id']] ?></span>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </a>
        <a href="<?= base_url('artikel-list') ?>" class="p-4 border rounded-sm space-y-8">
            <div class="flex items-center justify-between">
                <button class="font-bold">List Artikel</button>
                <div class="border flex justify-center items-center aspect-square border-black text-xs font-bold rounded-full px-4 py-4 text-center">
                    <i class="fa-solid fa-newspaper text-2xl text-gray-700"></i>
                </div>
            </div>
            <div class="flex gap-4 justify-center">
                <?php
                if (count($countArtikel) > 0) {
                    foreach ($countArtikel as $value) {
                ?>
                        <div class="flex flex-col items-center">
                            <h2 class="inline-flex items-center text-4xl justify-center p-3  border-gray-400 rounded-full font-bold">
                                <?= $value['total'] ?>
                            </h2>
                            <span class="text-sm mt-1 capitalize"><?= esc($value['status']) ?></span>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="flex flex-col items-center">
                        <h2 class="inline-flex items-center text-4xl justify-center p-3  border-gray-400 rounded-full font-bold">
                            0
                        </h2>
                        <span class="text-sm mt-1 capitalize">Published</span>
                    </div>
                <?php
                }
                ?>
            </div>
        </a>
        <a href="<?= base_url('docs') ?>" class="p-4 border rounded-md space-y-8">
            <div class="flex items-center justify-between">
                <button class="font-bold">Upload Laporan Keuangan</button>
                <div class="border flex justify-center items-center aspect-square border-black text-xs font-bold rounded-full px-4 py-4 text-center">
                    <i class="fa-solid fa-file text-2xl text-gray-700"></i>
                </div>
            </div>
            <div class="flex gap-4 justify-center">
                <?php
                $dataLaporan = array(
                    1 => "Tahunan & AKB",
                    2 => "Tata Kelola",
                    3 => "Publikasi"
                );
                foreach ($countDocs as $value) {
                ?>
                    <div class="flex flex-col items-center">
                        <h2 class="inline-flex items-center text-4xl justify-center p-3  border-gray-400 rounded-full font-bold">
                            <?= $value['total'] ?>
                        </h2>
                        <span class="text-sm mt-1 capitalize"><?= esc($dataLaporan[$value['type']]) ?></span>
                    </div>
                <?php
                }
                ?>
            </div>
        </a>

    </div>
</div>