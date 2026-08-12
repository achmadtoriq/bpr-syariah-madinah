<?php
$data = [
    1 => 'Laporan Tahunan & AKB',
    2 => 'Laporan Tata Kelola',
    3 => 'Laporan Publikasi',
    4 => 'Piagam Audit',
];
?>

<div class="flex items-center justify-between gap-4 border-b border-slate-100 pb-4">
    <div>
        <h2 class="font-bold text-slate-900">Daftar Dokumen</h2>
        <p class="text-xs text-slate-500"><?= count($documents ?? []) ?> file tersedia</p>
    </div>
</div>

<div class="mt-4 overflow-x-auto">
    <table class="min-w-full divide-y divide-slate-200 text-sm">
        <thead>
            <tr class="text-left text-xs font-bold uppercase tracking-wide text-slate-500">
                <th class="px-4 py-3">No.</th>
                <th class="px-4 py-3">Nama File</th>
                <th class="px-4 py-3">Kategori</th>
                <th class="px-4 py-3">Tanggal Upload</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            <?php if (!empty($documents)): ?>
                <?php foreach ($documents as $i => $doc): ?>
                    <tr class="hover:bg-slate-50">
                        <td class="whitespace-nowrap px-4 py-3 text-slate-500"><?= $i + 1 ?></td>
                        <td class="px-4 py-3 font-semibold text-slate-900"><?= esc($doc['name']) ?></td>
                        <td class="px-4 py-3">
                            <span class="inline-flex rounded-full bg-amber-50 px-3 py-1 text-xs font-bold text-amber-700 ring-1 ring-amber-100">
                                <?= esc($data[$doc['type']] ?? 'Dokumen') ?>
                            </span>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 text-slate-600"><?= date('d-m-Y H:i', strtotime($doc['created_at'])) ?></td>
                        <td class="px-4 py-3">
                            <div class="flex justify-center gap-2">
                                <button
                                    @click="downloadFile('<?= $doc['path'] ?>')"
                                    class="inline-flex items-center justify-center gap-2 rounded-md bg-sky-600 px-3 py-2 text-xs font-bold text-white transition hover:bg-sky-700">
                                    <template x-if="loadingDownload === '<?= $doc['path'] ?>'">
                                        <svg class="size-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                        </svg>
                                    </template>
                                    <i class="fa-solid fa-download text-xs"></i>
                                    <span>Download</span>
                                </button>

                                <button
                                    @click="deleteDocument(<?= $doc['id'] ?>)"
                                    class="inline-flex items-center justify-center gap-2 rounded-md bg-red-600 px-3 py-2 text-xs font-bold text-white transition hover:bg-red-700">
                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                    <span>Hapus</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="px-4 py-10 text-center text-slate-500">
                        Belum ada file diupload.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
