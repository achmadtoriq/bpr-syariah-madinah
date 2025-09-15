<main x-data="fileUpload()" class="w-full mx-auto mt-14 md:mt-24 py-1">
    <div class="container mx-auto my-10 md:my-10">
        <div class="text-center">
            <h1 class="text-xl md:text-3xl font-bold">Laporan Keuangan Kami</h1>
            <!-- Bouncing dots -->
            <div class="flex justify-center gap-2 mt-3 h-5">
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:0ms]"></span>
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:200ms]"></span>
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:400ms]"></span>
            </div>
        </div>
        <div>
            <?php
            if (count($docs) > 0) {
                $tata = array();
                $tahunan = array();
                $publikasi = array();

                foreach ($docs as $value) {
                    $data = array(
                        "name" => $value['name'],
                        "path" => $value['path']
                    );

                    if ($value['type'] == 1) {
                        array_push($tahunan, $data);
                    } else if ($value['type'] == 2) {
                        array_push($tata, $data);
                    } else if ($value['type'] == 3) {
                        array_push($publikasi, $data);
                    }
                }
            }
            ?>

            <div class="space-y-4 p-5 mb-5">
                <h2 class="text-lg font-semibold inline-block border-b-4 border-blue-600 pb-1">
                    Laporan Publikasi
                </h2>
                <div class="gap-3 grid grid-cols-1 md:grid-cols-5 text-sm">
                    <?php
                    foreach ($publikasi as $value) {
                    ?>
                        <Button @click="downloadFile('<?= $value['path'] ?>')"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-3 rounded-full flex items-center justify-start gap-2">
                            <div>
                                <template x-if="loadingDownload == null">
                                    <i class="fa-solid fa-download"></i>
                                </template>
                                <template x-if="loadingDownload === '<?= $value['path'] ?>'">
                                    <svg class="animate-spin h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                    </svg>
                                </template>
                            </div>

                            <?= $value['name'] ?>
                        </Button>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="space-y-4 p-5 mb-5">
                <h2 class="text-lg font-semibold inline-block border-b-4 border-blue-600 pb-1">
                    Laporan Tata Kelola
                </h2>
                <div class="gap-3 grid grid-cols-1 md:grid-cols-5 text-sm">
                    <?php
                    foreach ($tata as $value) {
                    ?>
                        <Button @click="downloadFile('<?= $value['path'] ?>')"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-3 rounded-full flex items-center justify-start gap-2">
                            <div>
                                <template x-if="loadingDownload == null">
                                    <i class="fa-solid fa-download"></i>
                                </template>
                                <template x-if="loadingDownload === '<?= $value['path'] ?>'">
                                    <svg class="animate-spin h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                    </svg>
                                </template>
                            </div>

                            <?= $value['name'] ?>
                        </Button>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="space-y-4 p-5 mb-5">
                <h2 class="text-lg font-semibold inline-block border-b-4 border-blue-600 pb-1">
                    Laporan Tahunan
                </h2>
                <div class="gap-3 grid grid-cols-1 md:grid-cols-5 text-sm">
                    <?php
                    foreach ($tahunan as $value) {
                    ?>
                        <Button @click="downloadFile('<?= $value['path'] ?>')"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-3 rounded-full flex items-center justify-start gap-2">
                            <div>
                                <template x-if="loadingDownload == null">
                                    <i class="fa-solid fa-download"></i>
                                </template>
                                <template x-if="loadingDownload === '<?= $value['path'] ?>'">
                                    <svg class="animate-spin h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                    </svg>
                                </template>
                            </div>

                            <?= $value['name'] ?>
                        </Button>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</main>

<script src="<?= base_url('js/doc-controls.js') ?>"></script>