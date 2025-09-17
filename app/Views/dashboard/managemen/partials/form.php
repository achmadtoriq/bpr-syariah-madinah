<div class="container mx-auto py-5 mt-20 space-y-5">
    <div x-data="pemegangSahamForm()" class="max-w-4xl mx-auto p-4 border rounded">
        <div class="w-full grid grid-cols-1">
            <form @submit.prevent="submitForm" class="space-y-6">
                <!-- CSRF -->
                <input type="hidden" name="<?= csrf_token() ?>" x-model="csrf">

                <div class="sm:col-span-full">
                    <label class="block text-sm font-medium text-gray-900">Upload Photo</label>

                    <!-- Area Upload -->
                    <div class="mt-2 w-full relative border-2 border-dashed border-gray-300 rounded-md p-6 text-center cursor-pointer transition hover:bg-gray-50"
                        @click="$refs.fileInput.click()"
                        x-show="!imageUrl">
                        <input type="file" accept="image/*" class="hidden" x-ref="fileInput" @change="handleFile">
                        <div class="flex flex-col items-center justify-center">
                            <span class="text-4xl text-gray-400">+</span>
                            <p class="text-sm font-medium text-gray-700 mt-2">Upload file</p>
                            <p class="text-xs text-gray-500 mt-1">PNG, JPG, SVG, WEBP, GIF</p>
                        </div>
                    </div>

                    <!-- Preview -->
                    <div class="mt-2 relative border rounded overflow-hidden" x-show="imageUrl">
                        <button @click="resetImage" type="button" class="absolute top-1 right-1 text-xl text-black aspect-square hover:text-red-600 z-10">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </button>

                        <img :src="imageUrl" x-ref="image" class="max-h-96 mx-auto" />
                    </div>
                </div>

                <!-- Category -->
                <div class="sm:col-span-full">
                    <label for="role_id" class="block text-sm font-medium mb-2">Kategori</label>
                    <div class="mt-2 grid grid-cols-1">
                        <select id="role_id" name="role_id" x-model="form.role" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            <option value="" disabled>Pilih kategori</option>
                            <?php
                            $categories = array(
                                "1" => "Pemegang Saham",
                                "2" => "Dewan Komisaris",
                                "3" => "Dewan Pengawas Syariah",
                                "4" => "Direksi"
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

                <div class="col-span-full">
                    <label for="jabatan" class="block text-sm font-medium mb-2">Jabatan</label>
                    <input type="text" name="jabatan" x-model="form.jabatan" class="border p-2 w-full">
                </div>

                <div class="col-span-full">
                    <label for="name" class="block text-sm font-medium mb-2">Nama</label>
                    <input type="text" name="name" x-model="form.nama" class="border p-2 w-full">
                </div>

                <div class="col-span-full">
                    <label for="kewarganegaraan" class="block text-sm font-medium mb-2">Kewarganegaraan</label>
                    <input type="text" name="kewarganegaraan" x-model="form.kewarganegaraan" class="border p-2 w-full">
                </div>

                <div class="col-span-full">
                    <label for="tempat_lahir" class="block text-sm font-medium mb-2">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" x-model="form.tempat_lahir" class="border p-2 w-full">
                </div>

                <div class="col-span-full">
                    <label for="tanggal_lahir" class="block text-sm font-medium mb-2">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" x-model="form.tanggal_lahir" class="border p-2 w-full">
                </div>

                <div class="col-span-full space-y-4">
                    <!-- Pendidikan -->
                    <template x-for="(item, index) in form.pendidikan" :key="index">
                        <div class="flex gap-2 mt-1">
                            <input type="text" x-model="form.pendidikan[index]" class="border p-2 flex-1">
                            <button x-show="index > 0" type="button" @click="removeField('pendidikan', index)" class="text-red-500 font-semibold"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </template>
                    <button type="button" @click="addField('pendidikan')" class="bg-green-500 text-white font-semibold px-2 py-1 rounded mt-2">+ Pendidikan</button>
                </div>

                <div class="col-span-full space-y-4">
                    <!-- Pengalaman Kerja -->
                    <template x-for="(item, index) in form.pengalaman_kerja" :key="index">
                        <div class="flex gap-2 mt-1">
                            <input type="text" x-model="form.pengalaman_kerja[index]" class="border p-2 flex-1">
                            <button x-show="index > 0" type="button" @click="removeField('pengalaman_kerja', index)" class="text-red-500 font-semibold"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </template>
                    <button type="button" @click="addField('pengalaman_kerja')" class="bg-green-500 text-white font-semibold px-2 py-1 rounded mt-2">+ Pengalaman</button>
                </div>

                <div class="col-span-full space-y-4">
                    <!-- Pelatihan -->
                    <template x-for="(item, index) in form.pelatihan" :key="index">
                        <div class="flex gap-2 mt-1">
                            <input type="text" x-model="form.pelatihan[index]" class="border p-2 flex-1">
                            <button x-show="index > 0" type="button" @click="removeField('pelatihan', index)" class="text-red-500 font-semibold"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </template>
                    <button type="button" @click="addField('pelatihan')" class="bg-green-500 text-white font-semibold px-2 py-1 rounded mt-2">+ Pelatihan</button>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 block">
                    Simpan
                </button>
            </form>
        </div>

        <!-- Notifikasi -->
        <div x-show="message" x-text="message" class="mt-4 p-2 rounded bg-green-100 text-green-700"></div>
    </div>
</div>
<script>
    function pemegangSahamForm() {
        return {
            csrf: '<?= csrf_hash() ?>',
            message: '',
            imageFile: null,
            imageUrl: '',
            cropper: null,
            form: {
                role: '',
                jabatan: '',
                nama: '',
                kewarganegaraan: '',
                tempat_lahir: '',
                tanggal_lahir: '',
                pendidikan: [''],
                pengalaman_kerja: [''],
                pelatihan: ['']
            },

            handleFile(event) {
                const file = event.target.files[0];
                if (!file) return;

                this.imageUrl = URL.createObjectURL(file);

                this.$nextTick(() => {
                    if (this.cropper) this.cropper.destroy();

                    this.cropper = new Cropper(this.$refs.image, {
                        aspectRatio: 3 / 4,
                        viewMode: 1,
                        autoCropArea: 1,
                    });
                });
            },

            // ✅ jadikan Promise supaya bisa ditunggu
            cropImage() {
                return new Promise((resolve, reject) => {
                    if (!this.cropper) return resolve(null);

                    const canvas = this.cropper.getCroppedCanvas();
                    canvas.toBlob((blob) => {
                        if (!blob) return reject('Gagal membuat blob dari canvas');

                        let nama = this.form.nama ?
                            this.form.nama.trim()
                            .replace(/[.,]/g, '_')
                            .replace(/\s+/g, '_')
                            .replace(/[^a-zA-Z0-9_]/g, '') :
                            'cropped';

                        let fileName = `${nama}.png`;

                        this.imageFile = new File([blob], fileName, {
                            type: "image/png"
                        });

                        this.imageUrl = canvas.toDataURL();
                        this.cropper.destroy();
                        this.cropper = null;

                        resolve(this.imageFile);
                    }, "image/png");
                });
            },

            resetImage() {
                this.imageFile = null;
                this.imageUrl = '';
                if (this.cropper) {
                    this.cropper.destroy();
                    this.cropper = null;
                }
                this.$refs.fileInput.value = null;
            },

            addField(field) {
                this.form[field].push('');
            },

            removeField(field, index) {
                this.form[field].splice(index, 1);
            },

            async submitForm() {
                try {
                    // ✅ tunggu crop selesai sebelum submit
                    await this.cropImage();

                    let formData = new FormData();
                    formData.append('<?= csrf_token() ?>', this.csrf);

                    if (this.imageFile) {
                        formData.append('image', this.imageFile);
                    }

                    for (const key in this.form) {
                        if (Array.isArray(this.form[key])) {
                            this.form[key].forEach(v => formData.append(key + '[]', v));
                        } else {
                            formData.append(key, this.form[key]);
                        }
                    }

                    const res = await fetch('<?= base_url('managemen/store') ?>', {
                        method: 'POST',
                        body: formData
                    });

                    const result = await res.json();

                    if (result.status === 'success') {
                        this.message = result.message;
                        this.csrf = result.csrf;
                        this.resetImage();
                        this.form = {
                            role: '',
                            jabatan: '',
                            nama: '',
                            kewarganegaraan: '',
                            tempat_lahir: '',
                            tanggal_lahir: '',
                            pendidikan: [''],
                            pengalaman_kerja: [''],
                            pelatihan: ['']
                        };

                        // ⏱ Reload setelah 3 detik
                        setTimeout(() => history.back(), 1000);
                    }
                } catch (err) {
                    this.message = 'Terjadi kesalahan saat menyimpan';
                }
            }
        }
    }
</script>