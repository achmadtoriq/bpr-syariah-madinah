<main class="w-full mx-auto mt-14 md:mt-24 py-1">
    <div class="container mx-auto my-5 md:my-10 px-5">
        <div class="text-center mb-7 md:mb-14">
            <h1 class="text-xl md:text-3xl font-bold">Managemen Kami</h1>
            <!-- Bouncing dots -->
            <div class="flex justify-center gap-2 mt-3 h-5">
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:0ms]"></span>
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:200ms]"></span>
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:400ms]"></span>
            </div>
        </div>

        <div class="container mx-auto p-6 space-y-8">

            <?php foreach ($group_management as $posisi => $pejabatList): ?>
                <div class="border rounded-md">
                    <p class="bg-gray-400 text-white rounded-t-md p-2 font-semibold"><?= esc($posisi) ?></p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-10 justify-center md:gap-y-4 p-5">

                        <?php foreach ($pejabatList as $p):
                        ?>
                            <div class="grid grid-cols-1 md:grid-cols-5 gap-3">
                                <img src="<?= base_url($p['photo']) ?>" alt="" class="object-cover rounded-full border p-1" />
                                <div class="space-y-4 col-span-4">
                                    <div class="space-y-1">
                                        <h2 class="text-xl md:text-2xl font-bold"><?= esc($p['nama']) ?></h2>
                                        <p class="text-base"><?= esc($p['jabatan']) ?></p>
                                    </div>
                                    <p><?= esc($p['kewarganegaraan']) ?>, lahir di <?= esc($p['tempat_lahir']) . ' ' . date('d F Y', strtotime($p['tanggal_lahir'])) ?> </p>
                                    <div class="flex flex-1 gap-2">
                                        <p class="font-bold">Pendidikan:</p>
                                        <ul class="list-outside list-disc ml-5">
                                            <?php
                                            if ($p['pendidikan'] != '') {
                                                $pendidikan = explode(";", $p['pendidikan']);
                                                foreach ($pendidikan as $edu) :
                                            ?>
                                                    <li><?= esc($edu) ?></li>
                                            <?php
                                                endforeach;
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="font-bold">Pengalaman Kerja:</p>
                                        <ul class="list-outside list-disc ml-8">
                                            <?php
                                            if ($p['pengalaman_kerja'] != "") {
                                                $pengalaman_kerja = explode(";", $p['pengalaman_kerja']);
                                                foreach ($pengalaman_kerja as $work) :
                                            ?>
                                                    <li><?= esc($work) ?></li>
                                            <?php
                                                endforeach;
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="font-bold">Pelatihan:</p>
                                        <ul class="list-outside list-disc ml-8">
                                            <?php
                                            if ($p['pelatihan'] != '') {
                                                $pelatihan = explode(";", $p['pelatihan']);
                                                foreach ($pelatihan as $training) :
                                            ?>
                                                    <li><?= esc($training) ?></li>
                                            <?php
                                                endforeach;
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;
                        ?>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</main>