<div class="container mx-auto mt-28">

    <!-- <h1 class="text-2xl uppercase font-bold mb-5 text-center">Form Upload Gambar</h1> -->

    <div class="max-w-2xl mx-auto p-5 border border-gray-200 rounded-md" x-data="imageCropper()" x-init="init()">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
            <template x-if="success">
                <div x-transition class="p-2 bg-green-100 sm:col-span-full rounded-md">
                    <p class="text-base" x-text="success"></p>
                </div>
            </template>

            <template x-if="error">
                <div x-transition class="p-2 bg-red-100 sm:col-span-full rounded-md">
                    <p class="text-base" x-text="error"></p>
                </div>
            </template>

            <div class="sm:col-span-full">
                <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                <div class="mt-2">
                    <input id="description" type="text" name="description" required autocomplete="description" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" x-model="description" />
                </div>
            </div>

            <!-- Category -->
            <div class="sm:col-span-full">
                <label for="category_id" class="block text-sm font-medium mb-2">Kategori</label>
                <div class="mt-2 grid grid-cols-1">
                    <select id="category_id" name="category_id" x-model="category" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        <option value="" disabled>Pilih kategori</option>
                        <?php 
                            $categories = array(
                                "1" => "Kegiatan",
                                "2" => "Pengembangan SDI",
                                "3" => "Inklusi & Literasi"
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

            <!-- <div class="sm:col-span-full">
                <label for="email" class="block text-sm/6 font-medium text-gray-900">Aspect Ratio</label>
                <div class="flex justify-between items-center gap-6 mt-2 px-5">
                    <label class="flex items-center gap-1">
                        <input type="radio" name="aspect" value="1" x-model="aspectRatio">
                        <span>1:1</span>
                    </label>
                    <label class="flex items-center gap-1">
                        <input type="radio" name="aspect" value="4/3" x-model="aspectRatio">
                        <span class="text-blue-600 font-semibold">4:3</span>
                    </label>
                    <label class="flex items-center gap-1">
                        <input type="radio" name="aspect" value="16/9" x-model="aspectRatio">
                        <span>16:9</span>
                    </label>
                    <label class="flex items-center gap-1">
                        <input type="radio" name="aspect" value="null" x-model="aspectRatio">
                        <span>Free</span>
                    </label>
                </div>
            </div> -->

            <div class="sm:col-span-full">
                <label for="country" class="block text-sm/6 font-medium text-gray-900">Upload Image</label>
                <div
                    class="mt-2 w-full relative border-2 border-dashed border-gray-300 rounded-md p-6 text-center cursor-pointer transition hover:bg-gray-50"
                    @click="$refs.fileInput.click()"
                    x-show="!imageUrl">
                    <input type="file" accept="image/*" class="hidden" x-ref="fileInput" @change="handleFile">
                    <div class="flex flex-col items-center justify-center">
                        <span class="text-4xl text-gray-400">+</span>
                        <p class="text-sm font-medium text-gray-700 mt-2">Upload file</p>
                        <p class="text-xs text-gray-500 mt-1">PNG, JPG, SVG, WEBP, GIF</p>
                    </div>
                </div>

                <div class="mt-2 relative border rounded overflow-hidden" x-show="imageUrl">
                    <!-- Close Button -->
                    <button @click="reset" class="absolute top-1 right-1 text-xl text-black aspect-square hover:text-red-600 z-10">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </button>

                    <img :src="imageUrl" x-ref="image" class="max-h-96 mx-auto" />
                </div>
            </div>

            <div class="col-span-full" x-show="imageUrl">
                <div class="mt-2 flex justify-between gap-2">
                    <button @click="showPreview" class="w-full px-4 py-2 bg-blue-500 text-white rounded shadow">Preview</button>
                    <button @click="submit" class="w-full px-4 py-2 bg-green-600 text-white rounded shadow">Upload</button>
                </div>
            </div>

        </div>

        <!-- Fullscreen Preview -->
        <template x-if="previewUrl">
            <div class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50" @click.self="previewUrl = null">
                <img :src="previewUrl" class="max-w-full max-h-full rounded shadow-xl">
            </div>
        </template>

    </div>



    <!-- Load Image -->
    <div class="w-full border border-gray-200 rounded-md p-5 mt-5">
        <p class="text-xl font-bold">Data Hasil Upload</p>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
            <?php
            if (count($images) > 0) {
                foreach ($images as $value) {
            ?>
                    <div class="relative" x-data x-ref="img<?= $value['id'] ?>">
                        <button
                            @click.prevent="removeImage($refs.img<?= $value['id'] ?>, <?= $value['id'] ?>)"
                            class="absolute top-1 right-1 text-red-600 z-10 flex justify-center items-center p-1 rounded-full text-xs bg-white aspect-square">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                        <img src="<?= base_url($value['image_url']) ?>" alt="<?= $value['description'] ?>" class="max-w-full max-h-full rounded">
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="sm:col-span-6">
                    <p class="text-center text-gray-400">Tidak ada data</p>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

</div>

<script>
    function imageCropper() {
        return {
            imageUrl: null,
            previewUrl: null,
            aspectRatio: '16/9', // default selected
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
                this.description = null
                this.category = null
            },

            submit() {
                const canvas = this.cropper.getCroppedCanvas();
                canvas.toBlob((blob) => {
                    const formData = new FormData();
                    formData.append('image', blob, 'cropped.png');
                    formData.append('description', this.description)
                    formData.append('category', this.category)

                    fetch('/upload/proses', {
                            method: 'POST',
                            body: formData,
                            credentials: 'include', // WAJIB supaya cookie terkirim
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest' // agar isAJAX() == true
                            }
                        })
                        .then(async res => {
                            if (!res.ok) {
                                // Manual throw error dengan status

                                const data = await res.json(); // <- ini penting!
                                throw {
                                    status: res.status,
                                    message: data.message
                                };
                            }


                            return res.json();
                        })
                        .then(data => {
                            this.success = data.message;
                            this.reset()
                            // ⏱ Reload setelah 3 detik
                            setTimeout(() => location.reload(), 1000);
                        })
                        .catch(err => {
                            if (err.status === 401) {
                                window.location.href = '/login';
                            } else {
                                this.error = err.message;
                                this.reset()
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
                    el.remove(); // hapus dari DOM
                } else {
                    alert('Gagal menghapus gambar.');
                }
            })
            .catch(err => {
                alert('Terjadi kesalahan.');
            });
    }
</script>