<main class="min-h-screen bg-slate-50 px-4 pb-12 pt-28 md:px-8 lg:pt-24">
    <div class="mx-auto max-w-7xl">
        <div class="flex flex-col justify-between gap-4 md:flex-row md:items-end" data-aos="fade-up">
            <div>
                <p class="text-sm font-bold uppercase tracking-wide text-emerald-700">Galeri</p>
                <h1 class="mt-2 text-3xl font-bold text-slate-900">Upload Gambar</h1>
                <p class="mt-2 text-sm leading-6 text-slate-600">Tambahkan dokumentasi kegiatan, banner homepage, dan foto profil.</p>
            </div>
            <a href="<?= base_url('/dashboard') ?>" class="inline-flex w-fit items-center gap-2 rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-bold text-slate-700 transition hover:border-emerald-500 hover:text-emerald-700">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                Dashboard
            </a>
        </div>

        <section class="mt-6 grid gap-6 lg:grid-cols-[420px_1fr]">
            <div class="rounded-lg bg-white p-5 shadow-sm ring-1 ring-slate-200" x-data="imageCropper()" x-init="init()" data-aos="fade-right">
                <div class="mb-5 flex items-center gap-3 border-b border-slate-100 pb-4">
                    <span class="inline-flex size-11 items-center justify-center rounded-md bg-emerald-50 text-emerald-700 ring-1 ring-emerald-100">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                    </span>
                    <div>
                        <h2 class="font-bold text-slate-900">Form Upload</h2>
                        <p class="text-xs text-slate-500">Gambar akan dipotong sesuai kategori.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-5">
                    <template x-if="success">
                        <div x-transition class="rounded-md bg-emerald-50 p-3 text-sm font-semibold text-emerald-700 ring-1 ring-emerald-100">
                            <p x-text="success"></p>
                        </div>
                    </template>

                    <template x-if="error">
                        <div x-transition class="rounded-md bg-red-50 p-3 text-sm font-semibold text-red-700 ring-1 ring-red-100">
                            <p x-text="error"></p>
                        </div>
                    </template>

                    <div>
                        <label for="description" class="block text-sm font-bold text-slate-800">Deskripsi</label>
                        <input id="description" type="text" name="description" required autocomplete="description" class="mt-2 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100" x-model="description" />
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-bold text-slate-800">Kategori</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="category_id" name="category_id" x-model="category" data-select2 data-placeholder="Pilih kategori" class="col-start-1 row-start-1 w-full appearance-none rounded-md border border-slate-300 bg-white py-2 pl-3 pr-8 text-sm text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100">
                                <option value="" disabled>Pilih kategori</option>
                                <?php
                                $categories = [
                                    '1' => 'Kegiatan',
                                    '2' => 'Pengembangan SDI',
                                    '3' => 'Inklusi & Literasi',
                                    '4' => 'Banner Homepage',
                                    '5' => 'Pas Photo',
                                ];
                                ?>
                                <?php foreach ($categories as $key => $cat): ?>
                                    <option value="<?= esc($key) ?>"><?= esc($cat) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-800">Upload Image</label>
                        <div class="mt-2 cursor-pointer rounded-lg border-2 border-dashed border-slate-300 bg-slate-50 p-8 text-center transition hover:border-emerald-400 hover:bg-emerald-50/50" @click="$refs.fileInput.click()" x-show="!imageUrl">
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
                            <button @click="reset" class="absolute right-2 top-2 z-10 inline-flex size-8 items-center justify-center rounded-full bg-white text-red-600 shadow hover:bg-red-50">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </button>
                            <img :src="imageUrl" x-ref="image" class="mx-auto max-h-96" />
                        </div>
                    </div>

                    <div x-show="imageUrl">
                        <div class="flex gap-3">
                            <button @click="showPreview" class="w-full rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-bold text-slate-700 shadow-sm transition hover:border-sky-500 hover:text-sky-700">Preview</button>
                            <button @click="submit" class="w-full rounded-md bg-emerald-600 px-4 py-2 text-sm font-bold text-white shadow-sm transition hover:bg-emerald-700">Upload</button>
                        </div>
                    </div>
                </div>

                <template x-if="previewUrl">
                    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 p-4" @click.self="previewUrl = null">
                        <img :src="previewUrl" class="max-h-full max-w-full rounded-lg shadow-xl">
                    </div>
                </template>
            </div>

            <div class="rounded-lg bg-white p-5 shadow-sm ring-1 ring-slate-200" data-aos="fade-left">
                <div class="flex items-center justify-between gap-4 border-b border-slate-100 pb-4">
                    <div>
                        <h2 class="font-bold text-slate-900">Data Hasil Upload</h2>
                        <p class="text-xs text-slate-500"><?= count($images) ?> gambar tersedia</p>
                    </div>
                </div>

                <div class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">
                    <?php if (count($images) > 0): ?>
                        <?php foreach ($images as $value): ?>
                            <div class="group relative overflow-hidden rounded-lg bg-slate-100 ring-1 ring-slate-200" x-data x-ref="img<?= $value['id'] ?>">
                                <button
                                    @click.prevent="removeImage($refs.img<?= $value['id'] ?>, <?= $value['id'] ?>)"
                                    class="absolute right-2 top-2 z-10 inline-flex size-8 items-center justify-center rounded-full bg-white text-xs text-red-600 opacity-100 shadow transition hover:bg-red-50 md:opacity-0 md:group-hover:opacity-100">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                                <img src="<?= base_url($value['image_url']) ?>" alt="<?= esc($value['description']) ?>" class="aspect-[4/3] w-full object-cover">
                                <div class="p-3">
                                    <p class="truncate text-sm font-semibold text-slate-800"><?= esc($value['description']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-span-full rounded-lg border border-dashed border-slate-300 p-10 text-center text-sm text-slate-500">
                            Tidak ada data.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
</main>

<script>
    function imageCropper() {
        return {
            imageUrl: null,
            previewUrl: null,
            aspectRatio: '16/9',
            cropper: null,
            description: null,
            category: '',
            success: '',
            error: '',

            init() {
                this.$watch('aspectRatio', () => {
                    if (this.cropper) {
                        this.cropper.setAspectRatio(this.aspectRatio === 'null' ? NaN : eval(this.aspectRatio));
                    }
                });
            },

            handleFile(event) {
                const file = event.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = (e) => {
                    this.imageUrl = e.target.result;
                    this.$nextTick(() => this.initCropper());
                };
                reader.readAsDataURL(file);
            },

            initCropper() {
                this.success = '';
                this.error = '';
                if (this.cropper) this.cropper.destroy();
                const image = this.$refs.image;

                switch (this.category) {
                    case '4':
                        this.aspectRatio = '21/9';
                        break;
                    case '5':
                        this.aspectRatio = '3/4';
                        break;
                    default:
                        break;
                }

                this.cropper = new Cropper(image, {
                    aspectRatio: eval(this.aspectRatio),
                    viewMode: 1,
                    autoCropArea: 1,
                });
            },

            showPreview() {
                if (!this.cropper) return;
                const canvas = this.cropper.getCroppedCanvas();
                this.previewUrl = canvas.toDataURL();
            },

            reset() {
                this.imageUrl = null;
                this.previewUrl = null;
                if (this.cropper) {
                    this.cropper.destroy();
                    this.cropper = null;
                }
                this.$refs.fileInput.value = null;
                this.description = null;
                this.category = null;
            },

            submit() {
                const canvas = this.cropper.getCroppedCanvas();
                canvas.toBlob((blob) => {
                    const formData = new FormData();
                    formData.append('image', blob, 'cropped.png');
                    formData.append('description', this.description);
                    formData.append('category', this.category);

                    fetch('/upload/proses', {
                            method: 'POST',
                            body: formData,
                            credentials: 'include',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(async res => {
                            if (!res.ok) {
                                const data = await res.json();
                                throw {
                                    status: res.status,
                                    message: data.message
                                };
                            }

                            return res.json();
                        })
                        .then(data => {
                            this.success = data.message;
                            this.reset();
                            setTimeout(() => location.reload(), 1000);
                        })
                        .catch(err => {
                            if (err.status === 401) {
                                window.location.href = '/login';
                            } else {
                                this.error = err.message;
                                this.reset();
                            }
                        });
                }, 'image/png');
            }
        };
    }

    function removeImage(el, id) {
        if (!confirm('Yakin ingin menghapus gambar ini?')) return;

        fetch('/upload/delete/' + id, {
                method: 'DELETE'
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    el.remove();
                } else {
                    alert('Gagal menghapus gambar.');
                }
            })
            .catch(() => {
                alert('Terjadi kesalahan.');
            });
    }
</script>
