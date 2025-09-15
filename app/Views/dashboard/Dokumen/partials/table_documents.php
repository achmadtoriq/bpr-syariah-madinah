<table class="min-w-full border border-gray-300 mt-4">
    <thead class="bg-gray-100">
        <tr>
            <th class="border p-2 text-left">No.</th>
            <th class="border p-2 text-left">Nama File</th>
            <th class="border p-2 text-left">Tanggal Upload</th>
            <th class="border p-2 text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($documents)): ?>
            <?php foreach ($documents as $i => $doc): ?>
                <tr>
                    <td class="border p-2"><?= $i + 1 ?></td>
                    <td class="border p-2"><?= esc($doc['name']) ?></td>
                    <td class="border p-2"><?= date('d-m-Y H:i', strtotime($doc['created_at'])) ?></td>
                    <td class="border p-2 text-center">
                        <div class="flex flex-row justify-center items-center gap-2">
                            <button
                                @click="downloadFile('<?= $doc['path'] ?>')"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded flex items-center justify-center">

                                <!-- Spinner saat loading -->
                                <template x-if="loadingDownload === '<?= $doc['path'] ?>'">
                                    <svg class="animate-spin h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                    </svg>
                                </template>

                                <span>Download</span>
                            </button>

                            <button
                                @click="deleteDocument(<?= $doc['id'] ?>)"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded flex items-center justify-center">

                                <!-- Spinner saat loading -->
                                <template x-if="loadingDownload === '<?= $doc['path'] ?>'">
                                    <svg class="animate-spin h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                    </svg>
                                </template>

                                <span>Hapus</span>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="border p-4 text-center text-gray-500">
                    Belum ada file diupload.
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>