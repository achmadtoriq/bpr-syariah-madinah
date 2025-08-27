<main class="w-full mx-auto mt-24 py-1">
    <div x-data="{ activeTab: '<?= $tabs[0]['id'] ?>' }" class="container mx-auto py-1 my-14">

        <div class="text-center mb-14">
            <h1 class="text-3xl font-bold">Galeri Aktivitas Kami</h1>
            <!-- Bouncing dots -->
            <div class="flex justify-center gap-2 mt-3 h-5">
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:0ms]"></span>
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:200ms]"></span>
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:400ms]"></span>
            </div>
        </div>

        <!-- Tab Buttons -->
        <div class="justify-center flex">
            <div class="max-w-lg justify-center flex space-x-4 mb-4 border-b-2 border-blue-500">
                <?php foreach ($tabs as $tab): ?>
                    <button @click="activeTab = '<?= $tab['id'] ?>'"
                        :class="activeTab === '<?= $tab['id'] ?>' ? 'bg-blue-500 font-semibold text-white rounded-t-xl' : 'text-gray-500'"
                        class="py-2 px-4">
                        <?= esc($tab['label']) ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Tab Contents -->
        <div>
            <?php foreach ($tabs as $tab): ?>
                <div x-show="activeTab === '<?= $tab['id'] ?>'" class="transition duration-300">
                    <div class="mt-10 grid grid-cols-1 gap-x-3 gap-y-3 sm:grid-cols-4">
                        <?php
                        foreach ($tab['content'] as $value) {
                        ?>
                            <img src="<?= $value['img_path'] ?>" alt="<?= $value['alt'] ?>" class="max-w-full max-h-full rounded">
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>