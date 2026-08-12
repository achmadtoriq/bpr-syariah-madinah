<main class="min-h-screen bg-slate-50 px-4 pb-12 pt-28 md:px-8 lg:pt-24">
    <div class="mx-auto max-w-7xl" x-data="articleForm()">
        <div class="mb-6 flex flex-col justify-between gap-4 md:flex-row md:items-end" data-aos="fade-up">
            <div>
                <p class="text-sm font-bold uppercase tracking-wide text-emerald-700">Artikel</p>
                <h1 class="mt-2 text-3xl font-bold text-slate-900">Buat Artikel</h1>
                <p class="mt-2 text-sm leading-6 text-slate-600">Tulis konten, pilih kategori, dan atur status publikasi.</p>
            </div>
            <a href="<?= base_url('artikel-list') ?>" class="inline-flex w-fit items-center gap-2 rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-bold text-slate-700 transition hover:border-emerald-500 hover:text-emerald-700">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                Daftar Artikel
            </a>
        </div>

        <!-- Flash errors (CI4 validation) -->
        <?php if (session('errors')): ?>
            <div class="mb-4 rounded-xl border border-red-300 bg-red-50 p-4 text-sm">
                <ul class="list-disc list-inside text-red-700">
                    <?php foreach (session('errors') as $e): ?>
                        <li><?= esc($e) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('/artikel/store') ?>" method="POST" enctype="multipart/form-data" class="rounded-lg bg-white p-5 shadow-sm ring-1 ring-slate-200 md:p-6" data-aos="fade-up" data-aos-delay="100">
            <?= csrf_field() ?>

            <div class="grid gap-8 lg:grid-cols-[380px_1fr]">
                <aside class="space-y-5 lg:sticky lg:top-24 lg:self-start">
                    <div class="rounded-lg bg-slate-50 p-4 ring-1 ring-slate-200">
                        <h2 class="font-bold text-slate-900">Informasi Artikel</h2>
                        <p class="mt-1 text-xs leading-5 text-slate-500">Judul, kategori, tag, thumbnail, dan status publikasi.</p>
                    </div>

                    <div>
                        <label for="title" class="block text-sm font-bold text-slate-800">Judul</label>
                        <div class="mt-2">
                            <input
                                id="title"
                                type="text"
                                name="title"
                                @input="slug = toSlug($event.target.value)"
                                value="<?= old('title') ?>"
                                required
                                autocomplete="title"
                                class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100"
                                placeholder="Masukkan judul artikel"
                                x-model="title" />
                        </div>
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-bold text-slate-800">Slug</label>
                        <div class="mt-2">
                            <input
                                id="slug"
                                type="text"
                                name="slug"
                                value="<?= old('slug') ?>"
                                required
                                autocomplete="slug"
                                class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100"
                                x-model="slug" />
                        </div>
                        <p class="mt-1 text-xs text-slate-500">Otomatis dari judul, bisa disunting manual.</p>
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-bold text-slate-800">Kategori</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="category_id" name="category_id" autocomplete="category_id" data-select2 data-placeholder="Pilih kategori" class="col-start-1 row-start-1 w-full appearance-none rounded-md border border-slate-300 bg-white py-2 pl-3 pr-8 text-sm text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100">
                                <option value="" disabled <?= old('category_id') ? '' : 'selected' ?>>Pilih kategori</option>
                                <?php /** @var array $categories */ ?>
                                <?php if (isset($categories) && is_array($categories)): ?>
                                    <?php foreach ($categories as $cat): ?>
                                        <option value="<?= esc($cat['id']) ?>" <?= old('category_id') == $cat['id'] ? 'selected' : '' ?>>
                                            <?= esc($cat['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-800">Tag</label>
                        <div class="flex gap-2">
                            <input
                                id="tagsInput"
                                type="text"
                                name="tagsInput"
                                @keydown.enter.prevent="addTags()"
                                @keydown.comma.prevent="addTags()"
                                autocomplete="tagsInput"
                                class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100"
                                x-model="tagsInput"
                                placeholder="Misal: berita, syariah" />
                            <button type="button" @click="addTags()" class="inline-flex shrink-0 items-center justify-center rounded-md bg-slate-900 px-3 py-2 text-sm font-bold text-white transition hover:bg-emerald-700">
                                <i class="fa-solid fa-plus text-xs"></i>
                            </button>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-3">
                            <template x-for="(t, i) in tags" :key="i">
                                <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700 ring-1 ring-emerald-100">
                                    <span x-text="t"></span>
                                    <button type="button" @click="removeTag(i)" class="text-emerald-500 hover:text-red-600">&times;</button>
                                </span>
                            </template>
                        </div>

                        <template x-for="(t, i) in tags" :key="'hidden-'+i">
                            <input type="hidden" name="tags[]" :value="t">
                        </template>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-800">Thumbnail</label>
                        <div class="mt-2 grid gap-3">
                            <div class="flex aspect-[16/9] w-full items-center justify-center overflow-hidden rounded-lg bg-slate-100 ring-1 ring-slate-200">
                                <template x-if="thumbnailPreview">
                                    <img :src="thumbnailPreview" alt="Preview" class="h-full w-full object-cover">
                                </template>
                                <template x-if="!thumbnailPreview">
                                    <div class="text-center text-slate-400">
                                        <i class="fa-solid fa-image text-2xl"></i>
                                        <p class="mt-2 text-xs">Preview thumbnail</p>
                                    </div>
                                </template>
                            </div>
                            <input type="file" name="thumbnail" accept="image/*" @change="onFileChange"
                                class="block w-full rounded-md border border-dashed border-slate-300 bg-slate-50 p-3 text-sm text-slate-700 file:mr-3 file:rounded-md file:border-0 file:bg-slate-900 file:px-3 file:py-2 file:text-sm file:font-bold file:text-white">
                            <p class="text-xs text-slate-500">PNG/JPG maks. 2MB.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="status" class="block text-sm font-bold text-slate-800">Status</label>
                            <div class="mt-2 grid grid-cols-1">
                                <select id="status" name="status" autocomplete="country-name" data-select2 data-placeholder="Pilih status" class="col-start-1 row-start-1 w-full appearance-none rounded-md border border-slate-300 bg-white py-2 pl-3 pr-8 text-sm text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100">
                                    <?php $st = old('status') ?: 'draft'; ?>
                                    <option value="draft" <?= $st === 'draft' ? 'selected' : '' ?>>Draft</option>
                                    <option value="published" <?= $st === 'published' ? 'selected' : '' ?>>Published</option>
                                    <option value="archived" <?= $st === 'archived' ? 'selected' : '' ?>>Archived</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-800">Tanggal Publish</label>
                            <input type="datetime-local" name="published_at"
                                value="<?= old('published_at') ?>"
                                class="mt-2 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100">
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-5">
                        <a href="<?= site_url('/artikel-list') ?>" class="rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-bold text-slate-700 transition hover:border-emerald-500 hover:text-emerald-700">Batal</a>
                        <button type="submit" class="inline-flex items-center gap-2 rounded-md bg-emerald-600 px-5 py-2 text-sm font-bold text-white transition hover:bg-emerald-700">
                            <i class="fa-solid fa-floppy-disk text-xs"></i>
                            Simpan
                        </button>
                    </div>
                </aside>

                <div class="space-y-6">
                    <div class="rounded-lg bg-slate-50 p-4 ring-1 ring-slate-200">
                        <h2 class="font-bold text-slate-900">Konten Artikel</h2>
                        <p class="mt-1 text-xs leading-5 text-slate-500">Gunakan editor untuk membuat artikel lengkap dengan gambar, tabel, dan format teks.</p>
                    </div>

                    <div class="overflow-hidden rounded-lg ring-1 ring-slate-200">
                        <textarea id="editor" class="block w-full rounded-md bg-white px-3 py-2 text-sm text-slate-900 outline-none"
                            placeholder="Tulis artikel di sini..."></textarea>
                        <input type="hidden" name="content" x-model="content" required>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<style>
    [x-cloak] {
        display: none !important;
    }

    .ck.ck-editor {
        width: 100% !important;
    }

    .ck.ck-editor__main {
        background: #ffffff;
    }

    .ck-editor__editable {
        position: relative !important;
        min-height: 520px !important;
        max-height: 680px !important;
        overflow-y: auto !important;
        padding: 1.25rem !important;
        font-size: 1rem !important;
        line-height: 1.75 !important;
    }

    .ck.ck-toolbar {
        border-color: #e2e8f0 !important;
        border-top-left-radius: 0.5rem !important;
        border-top-right-radius: 0.5rem !important;
    }

    .ck.ck-editor__main > .ck-editor__editable {
        border-color: #e2e8f0 !important;
        border-bottom-left-radius: 0.5rem !important;
        border-bottom-right-radius: 0.5rem !important;
    }

    @media (max-width: 1023px) {
        .ck-editor__editable {
            min-height: 420px !important;
        }
    }
</style>
<script src="<?= base_url('assets/ckeditor5-46.0.0/ckeditor5/ckeditor5.umd.js') ?>"></script>

<script>
    const {
        ClassicEditor,
        Autoformat,
        AutoImage,
        Autosave,
        BlockQuote,
        Bold,
        CloudServices,
        Essentials,
        Heading,
        ImageBlock,
        ImageCaption,
        ImageInline,
        ImageInsert,
        ImageInsertViaUrl,
        ImageResize,
        ImageStyle,
        ImageTextAlternative,
        ImageToolbar,
        ImageUpload,
        Indent,
        IndentBlock,
        Italic,
        Link,
        LinkImage,
        List,
        ListProperties,
        MediaEmbed,
        Paragraph,
        PasteFromOffice,
        Table,
        TableCaption,
        TableCellProperties,
        TableColumnResize,
        TableProperties,
        TableToolbar,
        TextTransformation,
        TodoList,
        Underline
    } = window.CKEDITOR;

    class ArticleImageUploadAdapter {
        constructor(loader) {
            this.loader = loader;
            this.xhr = null;
        }

        upload() {
            return this.loader.file.then(file => new Promise((resolve, reject) => {
                this.xhr = new XMLHttpRequest();
                this.xhr.open('POST', '<?= site_url('/artikel/upload-image') ?>', true);
                this.xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                this.xhr.responseType = 'json';

                this.xhr.addEventListener('error', () => reject('Upload gambar gagal.'));
                this.xhr.addEventListener('abort', () => reject('Upload gambar dibatalkan.'));
                this.xhr.addEventListener('load', () => {
                    const response = this.xhr.response;

                    if (!response || this.xhr.status < 200 || this.xhr.status >= 300) {
                        return reject(response?.error?.message || 'Upload gambar gagal.');
                    }

                    resolve({
                        default: response.url
                    });
                });

                const data = new FormData();
                data.append('upload', file);
                this.xhr.send(data);
            }));
        }

        abort() {
            if (this.xhr) {
                this.xhr.abort();
            }
        }
    }

    function ArticleImageUploadAdapterPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = loader => new ArticleImageUploadAdapter(loader);
    }

    const editorConfig = {
        toolbar: {
            items: [
                'undo',
                'redo',
                '|',
                'heading',
                '|',
                'bold',
                'italic',
                'underline',
                '|',
                'link',
                'insertImage',
                'mediaEmbed',
                'insertTable',
                'blockQuote',
                '|',
                'bulletedList',
                'numberedList',
                'todoList',
                'outdent',
                'indent'
            ],
            shouldNotGroupWhenFull: false
        },
        plugins: [
            Autoformat,
            AutoImage,
            Autosave,
            BlockQuote,
            Bold,
            CloudServices,
            Essentials,
            Heading,
            ImageBlock,
            ImageCaption,
            ImageInline,
            ImageInsert,
            ImageInsertViaUrl,
            ImageResize,
            ImageStyle,
            ImageTextAlternative,
            ImageToolbar,
            ImageUpload,
            Indent,
            IndentBlock,
            Italic,
            Link,
            LinkImage,
            List,
            ListProperties,
            MediaEmbed,
            Paragraph,
            PasteFromOffice,
            Table,
            TableCaption,
            TableCellProperties,
            TableColumnResize,
            TableProperties,
            TableToolbar,
            TextTransformation,
            TodoList,
            Underline
        ],
        heading: {
            options: [{
                    model: 'paragraph',
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                {
                    model: 'heading1',
                    view: 'h1',
                    title: 'Heading 1',
                    class: 'ck-heading_heading1'
                },
                {
                    model: 'heading2',
                    view: 'h2',
                    title: 'Heading 2',
                    class: 'ck-heading_heading2'
                },
                {
                    model: 'heading3',
                    view: 'h3',
                    title: 'Heading 3',
                    class: 'ck-heading_heading3'
                },
                {
                    model: 'heading4',
                    view: 'h4',
                    title: 'Heading 4',
                    class: 'ck-heading_heading4'
                },
                {
                    model: 'heading5',
                    view: 'h5',
                    title: 'Heading 5',
                    class: 'ck-heading_heading5'
                },
                {
                    model: 'heading6',
                    view: 'h6',
                    title: 'Heading 6',
                    class: 'ck-heading_heading6'
                }
            ]
        },
        image: {
            toolbar: [
                'toggleImageCaption',
                'imageTextAlternative',
                '|',
                'imageStyle:inline',
                'imageStyle:wrapText',
                'imageStyle:breakText',
                '|',
                'resizeImage'
            ]
        },
        initialData: '',
        licenseKey: "GPL",
        link: {
            addTargetToExternalLinks: true,
            defaultProtocol: 'https://',
            decorators: {
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        placeholder: 'Type or paste your content here!',
        table: {
            contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells', 'tableProperties', 'tableCellProperties']
        },
        extraPlugins: [ArticleImageUploadAdapterPlugin]
        // extraPlugins: [function CustomClassesPlugin(editor) {
        //     // untuk <p>
        //     editor.conversion.for('downcast').elementToElement({
        //         model: 'paragraph',
        //         view: (modelElement, {
        //             writer
        //         }) => {
        //             return writer.createContainerElement('p', {
        //                 class: 'text-base'
        //             });
        //         }
        //     });

        //     // untuk heading 1
        //     editor.conversion.for('downcast').elementToElement({
        //         model: 'heading1',
        //         view: (modelElement, {
        //             writer
        //         }) => {
        //             return writer.createContainerElement('h1', {
        //                 class: 'text-4xl font-bold'
        //             });
        //         }
        //     });

        //     // untuk heading 2
        //     editor.conversion.for('downcast').elementToElement({
        //         model: 'heading2',
        //         view: (modelElement, {
        //             writer
        //         }) => {
        //             return writer.createContainerElement('h2', {
        //                 class: 'text-3xl font-semibold'
        //             });
        //         }
        //     });

        //     // untuk heading 3
        //     editor.conversion.for('downcast').elementToElement({
        //         model: 'heading3',
        //         view: (modelElement, {
        //             writer
        //         }) => {
        //             return writer.createContainerElement('h3', {
        //                 class: 'text-2xl font-semibold'
        //             });
        //         }
        //     });

        //     // untuk heading 4
        //     editor.conversion.for('downcast').elementToElement({
        //         model: 'heading4',
        //         view: (modelElement, {
        //             writer
        //         }) => {
        //             return writer.createContainerElement('h4', {
        //                 class: 'text-xl font-semibold'
        //             });
        //         }
        //     });

        //     // untuk heading 5
        //     editor.conversion.for('downcast').elementToElement({
        //         model: 'heading5',
        //         view: (modelElement, {
        //             writer
        //         }) => {
        //             return writer.createContainerElement('h5', {
        //                 class: 'text-lg font-semibold'
        //             });
        //         }
        //     });

        //     // untuk heading 6
        //     editor.conversion.for('downcast').elementToElement({
        //         model: 'heading6',
        //         view: (modelElement, {
        //             writer
        //         }) => {
        //             return writer.createContainerElement('h6', {
        //                 class: 'text-md font-semibold'
        //             });
        //         }
        //     });


        //     // IMAGE
        //     editor.conversion.for('downcast').add(dispatcher => {
        //         dispatcher.on('insert:imageBlock', (evt, data, conversionApi) => {
        //             const viewWriter = conversionApi.writer;
        //             const viewElement = conversionApi.mapper.toViewElement(data.item);

        //             if (viewElement) {
        //                 // Tambah Tailwind class ke <figure>
        //                 viewWriter.addClass(['my-4', 'rounded-xl', 'overflow-hidden'], viewElement);

        //                 // Cari child <img>
        //                 for (const child of viewElement.getChildren()) {
        //                     if (child.name === 'img') {
        //                         viewWriter.addClass(['rounded-xl', 'object-cover'], child);
        //                     }
        //                 }
        //             }
        //         });
        //     });
        // }]
    };

    function articleForm() {
        return {
            title: <?= json_encode(old('title') ?? '') ?>,
            slug: <?= json_encode(old('slug') ?? '') ?>,
            tagsInput: '',
            tags: <?= json_encode(old('tags') ?? []) ?>,
            thumbnailPreview: null,
            content: <?= json_encode(old('content') ?? '') ?>, // sinkron Alpine <-> CKEditor

            init() {
                // jika title ada dari old(), generate slug bila slug kosong
                if (this.title && !this.slug) this.slug = this.toSlug(this.title);

                ClassicEditor.create(document.querySelector('#editor'), {
                        ...editorConfig,
                        ui: {
                            viewportOffset: {
                                top: 0
                            } // optional, supaya sticky toolbar tidak ganggu
                        }
                    }).then(editor => {
                        // set default dari Alpine
                        editor.setData(this.content);

                        // sinkron ke Alpine tiap perubahan
                        editor.model.document.on('change:data', () => {
                            this.content = editor.getData();

                            // document.getElementById('preview').textContent = this.content;
                            // document.getElementById('preview-container').innerHTML = this.content;

                        });
                    })
                    .catch(error => console.error(error));
            },

            toSlug(str) {
                return (str || '')
                    .toLowerCase()
                    .normalize('NFD').replace(/[\u0300-\u036f]/g, '') // remove diacritics
                    .replace(/[^a-z0-9\s-]/g, '') // keep alnum, space, hyphen
                    .trim()
                    .replace(/\s+/g, '-') // spaces -> dash
                    .replace(/-+/g, '-')
                    .slice(0, 180);
            },

            addTags() {
                if (!this.tagsInput) return;
                const parts = this.tagsInput.split(',').map(s => s.trim()).filter(Boolean);
                for (const p of parts) {
                    const clean = p.toLowerCase().replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '').slice(0, 40);
                    if (clean && !this.tags.includes(clean)) this.tags.push(clean);
                }
                this.tagsInput = '';
            },

            removeTag(i) {
                this.tags.splice(i, 1);
            },

            onFileChange(e) {
                const file = e.target.files?.[0];
                if (!file) {
                    this.thumbnailPreview = null;
                    return;
                }
                const reader = new FileReader();
                reader.onload = (ev) => this.thumbnailPreview = ev.target.result;
                reader.readAsDataURL(file);
            },
        }
    }
</script>
