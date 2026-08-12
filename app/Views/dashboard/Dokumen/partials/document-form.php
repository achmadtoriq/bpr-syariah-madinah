<div class="w-full rounded-lg bg-white p-5 shadow-sm ring-1 ring-slate-200">
    <div class="mb-5 flex items-center gap-3 border-b border-slate-100 pb-4">
        <span class="inline-flex size-11 items-center justify-center rounded-md bg-amber-50 text-amber-700 ring-1 ring-amber-100">
            <i class="fa-solid fa-file-arrow-up"></i>
        </span>
        <div>
            <h2 class="font-bold text-slate-900">Upload Laporan</h2>
            <p class="text-xs text-slate-500">File yang diterima hanya PDF.</p>
        </div>
    </div>

    <div class="space-y-5">
        <div>
            <label class="block text-sm font-bold text-slate-800">Nama File</label>
            <input type="text" x-model="Name" name="name"
                class="mt-2 w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100" placeholder="Masukkan nama file" required>
        </div>

        <div>
            <label for="category_id" class="block text-sm font-bold text-slate-800">Kategori</label>
            <div class="mt-2 grid grid-cols-1">
                <select id="category_id" name="category_id" x-model="category" data-select2 data-placeholder="Pilih kategori" class="col-start-1 row-start-1 w-full appearance-none rounded-md border border-slate-300 bg-white py-2 pl-3 pr-8 text-sm text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100">
                    <option value="" disabled>Pilih kategori</option>
                    <?php
                    $categories = array(
                        "1" => "Laporan Tahunan & AKB",
                        "2" => "Laporan Tata Kelola",
                        "3" => "Laporan Publikasi",
                        "4" => "Piagam Audit"
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
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-800">Pilih File</label>
            <input type="file" accept="application/pdf" x-ref="fileInput" @change="checkFile" class="mt-2 w-full rounded-md border border-dashed border-slate-300 bg-slate-50 p-3 text-sm text-slate-700 file:mr-3 file:rounded-md file:border-0 file:bg-slate-900 file:px-3 file:py-2 file:text-sm file:font-bold file:text-white">

            <template x-if="fileName">
                <div class="mt-3 rounded-md bg-slate-50 p-3 text-sm text-slate-700 ring-1 ring-slate-200">
                    <p><strong>File:</strong> <span x-text="fileName"></span></p>
                </div>
            </template>
        </div>

        <button @click="uploadFile"
            class="inline-flex w-full items-center justify-center gap-2 rounded-md bg-emerald-600 px-4 py-2 text-sm font-bold text-white shadow-sm transition hover:bg-emerald-700 disabled:opacity-50"
            :disabled="loading">
            <i class="fa-solid fa-upload text-xs" x-show="!loading"></i>
            <span x-show="!loading">Upload</span>
            <span x-show="loading">Uploading...</span>
        </button>

        <div x-show="message" class="rounded-md p-3 text-sm font-semibold"
            :class="status === 'success' ? 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-100' : 'bg-red-50 text-red-700 ring-1 ring-red-100'">
            <p x-text="message"></p>
        </div>
    </div>
</div>
