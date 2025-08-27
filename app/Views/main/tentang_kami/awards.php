<main class="w-full mx-auto mt-24 py-1 mb-20">
    <div class="container mx-auto my-10">
        <div class="text-center">
            <h1 class="text-3xl font-bold">Penghargaan Kami</h1>
            <!-- Bouncing dots -->
            <div class="flex justify-center gap-2 mt-3 h-5">
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:0ms]"></span>
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:200ms]"></span>
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:400ms]"></span>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-x-5 gap-y-10 my-10">
            <?php
            foreach ($awards as $value) {
            ?>
                <div class="grid grid-cols-1 gap-y-1 text-center">
                    <img src="<?= $value['imagePath'] ?>" alt="">
                    <div>
                        <p class="text-base"><?= $value["teks_1"] ?> <span class="font-bold"><?= $value["predikat"] ?></span></p>
                        <?php
                        if ($value["teks_2"] != '') {
                        ?>
                            <p class="text-base"><?= $value["teks_2"] ?></p>
                        <?php
                        }
                        ?>
                        <p class="text-xs text-blue-500"><?= $value["teks_3"] ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</main>