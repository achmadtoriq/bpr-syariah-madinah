<div class="bg-white p-6 rounded-2xl shadow-md w-full max-w-md border">
    <h1 class="text-xl font-bold mb-4 text-gray-700">Upload Laporan Keuangan</h1>

    <div class="space-y-6">
        <div class="sm:col-span-full space-y-3">
            <label class="block font-semibold">Nama File</label>
            <input type="text" x-model="Name" name="name"
                class="w-full border rounded p-2" placeholder="Masukkan nama file" required>
        </div>

        <!-- Category -->
        <div class="sm:col-span-full space-y-3">
            <label for="category_id" class="block text-sm font-medium mb-2">Kategori</label>
            <div class="mt-2 grid grid-cols-1">
                <select id="category_id" name="category_id" x-model="category" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    <option value="" disabled>Pilih kategori</option>
                    <?php
                    $categories = array(
                        "1" => "Laporan Tahunan & AKB",
                        "2" => "Laporan Tata Kelola",
                        "3" => "Laporan Publikasi"
                    );
                    ?>
                    <?php if (isset($categories) && is_array($categories)): ?>
                        <?php foreach ($categories as $key => $cat): ?>
                            <option value="<?= esc($key) ?>">
                                <?= esc($cat) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <svg viewBox="0 0 16 16" fill="currentColor" data-slot="icon" aria-hidden="true" class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4">
                    <path d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
                </svg>
            </div>
        </div>

        <div class="sm:col-span-full space-y-3">
            <!-- File Input -->
            <label class="block font-semibold">Pilih File</label>
            <input type="file" accept="application/pdf" x-ref="fileInput" @change="checkFile" class="w-full">

            <!-- Preview (Nama File Saja) -->
            <template x-if="fileName">
                <div class="text-gray-700">
                    <p><strong>File:</strong> <span x-text="fileName"></span></p>
                </div>
            </template>
        </div>
        <!-- Submit Button -->
        <button @click="uploadFile"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 disabled:opacity-50"
            :disabled="loading">
            <span x-show="!loading">Upload</span>
            <span x-show="loading">Uploading...</span>
        </button>

        <!-- Response -->
        <div x-show="message" class="mt-4 p-2 rounded-md"
            :class="status === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'">
            <p x-text="message"></p>
        </div>
    </div>
</div>