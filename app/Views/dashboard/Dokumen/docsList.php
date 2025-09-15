<div x-data="fileUpload()" class="container mx-auto py-5 mt-20 space-y-5">
    <h1 class="text-2xl">Welcome to Document, <span class="text-red-500 font-bold"><?= session()->get('user') ?></span></h1>

    <div class="grid grid-cols-1">
        <div class="bg-white p-6 rounded-2xl shadow-md w-full max-w-md border">
            <h1 class="text-xl font-bold mb-4 text-gray-700">Upload Laporan Keuangan</h1>

            <label class="block mb-2 font-semibold">Nama File</label>
            <input type="text" x-model="Name" name="name"
                class="w-full border rounded p-2 mb-3" placeholder="Masukkan nama file" required>

            <!-- File Input -->
            <label class="block mb-2 font-semibold">Pilih File</label>
            <input type="file" accept="application/pdf" x-ref="fileInput" @change="checkFile" class="mb-3 w-full">

            <!-- Preview (Nama File Saja) -->
            <template x-if="fileName">
                <div class="mb-4 text-gray-700">
                    <p><strong>File:</strong> <span x-text="fileName"></span></p>
                </div>
            </template>

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

        <div class="w-full" id="tableContainer">
            <?= view('dashboard/Dokumen/partials/table_documents') ?>
        </div>
    </div>

</div>

<script src="<?= base_url('js/doc-controls.js') ?>"></script>