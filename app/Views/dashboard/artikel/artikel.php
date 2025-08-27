<div class="container mx-auto mt-28">
    <div class="flex flex-col justify-center" x-data="articleForm()">

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

        <form action="<?= site_url('/artikel/store') ?>" method="POST" enctype="multipart/form-data" class="bg-white rounded-md border shadow p-6">
            <?= csrf_field() ?>

            <div class="grid grid-cols-6 gap-8">
                <div class="space-y-6 col-span-2">
                    <!-- Title -->
                    <div class="sm:col-span-full">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Judul</label>
                        <div class="mt-2">
                            <input
                                id="title"
                                type="text"
                                name="title"
                                @input="slug = toSlug(title)"
                                value="<?= old('title') ?>"
                                required
                                autocomplete="title"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                placeholder="Misal: Cara Membuat UI Modern dengan TailwindCSS"
                                x-model="title" />
                        </div>
                    </div>

                    <!-- Slug (auto) -->
                    <div class="sm:col-span-full">
                        <label for="slug" class="block text-sm/6 font-medium text-gray-900">Slug</label>
                        <div class="mt-2 flex gap-3">
                            <input
                                id="slug"
                                type="text"
                                name="slug"
                                value="<?= old('slug') ?>"
                                required
                                autocomplete="slug"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                x-model="slug" />
                            <!-- <button type="button" @click="slug = toSlug(title)"
                                    class="px-3 py-2 rounded-xl border bg-gray-50 hover:bg-gray-100">
                                    Generate
                                </button> -->
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Otomatis dari judul, bisa disunting manual.</p>
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category_id" class="block text-sm font-medium mb-2">Kategori</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="category_id" name="category_id" autocomplete="category_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
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
                            <svg viewBox="0 0 16 16" fill="currentColor" data-slot="icon" aria-hidden="true" class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4">
                                <path d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
                            </svg>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div>
                        <label class="block text-sm font-medium mb-2">Tag</label>
                        <div class="flex gap-2">
                            <input
                                id="tagsInput"
                                type="text"
                                name="tagsInput"
                                @keydown.enter.prevent="addTags()"
                                @keydown.,.prevent="addTags()"
                                autocomplete="tagsInput"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                x-model="tagsInput"
                                placeholder="Pisahkan dengan koma, lalu Enter (mis: ci4, alpinejs, tailwind)" />
                            <!-- <button type="button" @click="addTags()" class="px-3 py-2 rounded-xl border bg-gray-50 hover:bg-gray-100">Tambah</button> -->
                        </div>

                        <!-- chips -->
                        <div class="flex flex-wrap gap-2 mt-3">
                            <template x-for="(t, i) in tags" :key="i">
                                <span class="inline-flex items-center gap-2 rounded-full border px-3 py-1 text-sm">
                                    <span x-text="t"></span>
                                    <button type="button" @click="removeTag(i)" class="text-gray-500 hover:text-red-600">&times;</button>
                                </span>
                            </template>
                        </div>

                        <!-- hidden input untuk submit -->
                        <template x-for="(t, i) in tags" :key="'hidden-'+i">
                            <input type="hidden" name="tags[]" :value="t">
                        </template>
                    </div>

                    <!-- Thumbnail -->
                    <div>
                        <label class="block text-sm font-medium mb-2">Thumbnail</label>
                        <div class="flex items-start gap-4">
                            <div class="w-56 h-28 border rounded-xl overflow-hidden flex items-center justify-center bg-gray-50">
                                <template x-if="thumbnailPreview">
                                    <img :src="thumbnailPreview" alt="Preview" class="w-full h-full object-cover p-1 rounded-xl">
                                </template>
                                <template x-if="!thumbnailPreview">
                                    <span class="text-xs text-gray-400">Preview</span>
                                </template>
                            </div>
                            <div class="flex-1">
                                <input type="file" name="thumbnail" accept="image/*" @change="onFileChange"
                                    class="block w-full text-sm text-gray-700 file:mr-4 file:rounded-xl file:border-0 file:bg-indigo-600 file:px-4 file:py-2 file:text-white hover:file:bg-indigo-700">
                                <p class="text-xs text-gray-500 mt-1">PNG/JPG maks. 2MB (atur di server-side).</p>
                            </div>
                        </div>
                    </div>

                    <!-- Status & Published At -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="status" class="block text-sm font-medium mb-2">Status</label>
                            <div class="mt-2 grid grid-cols-1">
                                <select id="status" name="status" autocomplete="country-name" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    <?php $st = old('status') ?: 'draft'; ?>
                                    <option value="draft" <?= $st === 'draft' ? 'selected' : '' ?>>Draft</option>
                                    <option value="published" <?= $st === 'published' ? 'selected' : '' ?>>Published</option>
                                    <option value="archived" <?= $st === 'archived' ? 'selected' : '' ?>>Archived</option>
                                </select>
                                <svg viewBox="0 0 16 16" fill="currentColor" data-slot="icon" aria-hidden="true" class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4">
                                    <path d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Tanggal Publish</label>
                            <input type="datetime-local" name="published_at"
                                value="<?= old('published_at') ?>"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-end gap-3 pt-2">
                        <a href="<?= site_url('/articles') ?>" class="px-4 py-2 rounded-xl border hover:bg-gray-50">Batal</a>
                        <button type="submit" class="px-5 py-2.5 rounded-xl bg-indigo-600 text-white hover:bg-indigo-700">Simpan</button>
                    </div>
                </div>

                <div class="space-y-6 col-span-4">
                    <!-- Content -->
                    <div>
                        <label class="block text-sm font-medium mb-2">Konten</label>
                        <textarea id="editor" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                            placeholder="Tulis artikel di sini..."></textarea>
                        <!-- Hidden input untuk form -->
                        <input type="hidden" name="content" x-model="content" required>
                    </div>

                    <!-- <div class="border border-red-400 rounded-md p-3">
                        <p class="mb-4 text-xs font-bold">Preview HTML :</p>
                        <pre id="preview" class="whitespace-pre-wrap text-sm text-gray-800"></pre>
                    </div> -->
                </div>
            </div>
        </form>
    </div>
</div>
<style>
    .ck-editor__editable {
        position: relative !important;
        height: 640px !important;
        overflow-y: auto !important;
    }
</style>
<script src="<?= base_url('assets/ckeditor5-46.0.0/ckeditor5/ckeditor5.umd.js') ?>"></script>

<script>
    const {
        ClassicEditor,
        Autoformat,
        AutoImage,
        Autosave,
        Base64UploadAdapter,
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
            Base64UploadAdapter,
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
        }
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
                if (this.title && !this.slug) this.slug = toSlug(this.title);

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