<div class="mx-auto max-w-4xl">
    <form @submit.prevent="submitForm" class="space-y-6">
        <input type="hidden" name="<?= csrf_token() ?>" x-model="csrf">

        <div>
            <label class="block text-sm font-bold text-slate-800">Upload Photo</label>
            <div class="mt-2 cursor-pointer rounded-lg border-2 border-dashed border-slate-300 bg-slate-50 p-8 text-center transition hover:border-emerald-400 hover:bg-emerald-50/50"
                @click="$refs.fileInput.click()"
                x-show="!imageUrl">
                <input type="file" accept="image/*" class="hidden" x-ref="fileInput" @change="handleFile">
                <div class="flex flex-col items-center justify-center">
                    <span class="inline-flex size-12 items-center justify-center rounded-md bg-white text-slate-500 shadow-sm">
                        <i class="fa-solid fa-plus text-lg"></i>
                    </span>
                    <p class="mt-3 text-sm font-bold text-slate-700">Upload file</p>
                    <p class="mt-1 text-xs text-slate-500">PNG, JPG, SVG, WEBP, GIF</p>
                </div>
            </div>

            <div class="relative mt-2 overflow-hidden rounded-lg border border-slate-200 bg-slate-100" x-show="imageUrl">
                <button @click="resetImage" type="button" class="absolute right-2 top-2 z-10 inline-flex size-8 items-center justify-center rounded-full bg-white text-red-600 shadow hover:bg-red-50">
                    <i class="fa-solid fa-circle-xmark"></i>
                </button>
                <img :src="imageUrl" x-ref="image" class="mx-auto max-h-96" />
            </div>
        </div>

        <div class="grid gap-5 md:grid-cols-2">
            <div class="md:col-span-2">
                <label for="role_id" class="block text-sm font-bold text-slate-800">Kategori</label>
                <div class="mt-2 grid grid-cols-1">
                    <select id="role_id" name="role_id" x-model="form.role" data-select2 data-placeholder="Pilih kategori" class="col-start-1 row-start-1 w-full appearance-none rounded-md border border-slate-300 bg-white py-2 pl-3 pr-8 text-sm text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100">
                        <option value="" disabled>Pilih kategori</option>
                        <?php
                        $categories = [
                            '1' => 'Pemegang Saham',
                            '2' => 'Dewan Komisaris',
                            '3' => 'Dewan Pengawas Syariah',
                            '4' => 'Direksi',
                        ];
                        ?>
                        <?php foreach ($categories as $key => $cat): ?>
                            <option value="<?= esc($key) ?>"><?= esc($cat) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div>
                <label for="jabatan" class="block text-sm font-bold text-slate-800">Jabatan</label>
                <input type="text" name="jabatan" x-model="form.jabatan" class="mt-2 w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100">
            </div>

            <div>
                <label for="name" class="block text-sm font-bold text-slate-800">Nama</label>
                <input type="text" name="name" x-model="form.nama" class="mt-2 w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100">
            </div>

            <div>
                <label for="kewarganegaraan" class="block text-sm font-bold text-slate-800">Kewarganegaraan</label>
                <input type="text" name="kewarganegaraan" x-model="form.kewarganegaraan" class="mt-2 w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100">
            </div>

            <div>
                <label for="tempat_lahir" class="block text-sm font-bold text-slate-800">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" x-model="form.tempat_lahir" class="mt-2 w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100">
            </div>

            <div>
                <label for="tanggal_lahir" class="block text-sm font-bold text-slate-800">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" x-model="form.tanggal_lahir" class="mt-2 w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100">
            </div>
        </div>

        <?php
        $repeaters = [
            'pendidikan' => 'Pendidikan',
            'pengalaman_kerja' => 'Pengalaman',
            'pelatihan' => 'Pelatihan',
        ];
        ?>
        <div class="grid gap-5 lg:grid-cols-3">
            <?php foreach ($repeaters as $field => $label): ?>
                <div class="rounded-lg bg-slate-50 p-4 ring-1 ring-slate-200">
                    <label class="block text-sm font-bold text-slate-800"><?= esc($label) ?></label>
                    <template x-for="(item, index) in form.<?= $field ?>" :key="index">
                        <div class="mt-2 flex gap-2">
                            <input type="text" x-model="form.<?= $field ?>[index]" class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100">
                            <button x-show="index > 0" type="button" @click="removeField('<?= $field ?>', index)" class="inline-flex size-9 shrink-0 items-center justify-center rounded-md bg-red-50 text-red-600 ring-1 ring-red-100 hover:bg-red-100">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </template>
                    <button type="button" @click="addField('<?= $field ?>')" class="mt-3 inline-flex items-center gap-2 rounded-md bg-white px-3 py-2 text-xs font-bold text-slate-700 ring-1 ring-slate-200 transition hover:text-emerald-700">
                        <i class="fa-solid fa-plus text-xs"></i>
                        <?= esc($label) ?>
                    </button>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center gap-2 rounded-md bg-emerald-600 px-5 py-2 text-sm font-bold text-white transition hover:bg-emerald-700">
                <i class="fa-solid fa-floppy-disk text-xs"></i>
                Simpan
            </button>
        </div>
    </form>

    <div x-show="message" x-text="message" class="mt-5 rounded-md bg-emerald-50 p-3 text-sm font-semibold text-emerald-700 ring-1 ring-emerald-100"></div>
</div>
