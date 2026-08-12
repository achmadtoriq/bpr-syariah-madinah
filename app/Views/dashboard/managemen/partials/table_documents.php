<?php
$data = [
    '1' => 'Pemegang Saham',
    '2' => 'Dewan Komisaris',
    '3' => 'Dewan Pengawas Syariah',
    '4' => 'Direksi',
];
?>

<table class="min-w-full divide-y divide-slate-200 text-sm">
    <thead>
        <tr class="text-left text-xs font-bold uppercase tracking-wide text-slate-500">
            <th class="px-4 py-3">No.</th>
            <th class="px-4 py-3">Posisi</th>
            <th class="px-4 py-3">Jabatan</th>
            <th class="px-4 py-3">Nama</th>
            <th class="px-4 py-3">Kewarganegaraan</th>
            <th class="px-4 py-3 text-center">Photo</th>
            <th class="px-4 py-3 text-center">Tanggal dibuat</th>
            <th class="px-4 py-3 text-center">Aksi</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-slate-100">
        <?php if (!empty($managements)): ?>
            <?php foreach ($managements as $i => $man): ?>
                <tr class="hover:bg-slate-50">
                    <td class="whitespace-nowrap px-4 py-3 text-slate-500"><?= $i + 1 ?></td>
                    <td class="px-4 py-3">
                        <span class="inline-flex rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700 ring-1 ring-emerald-100">
                            <?= esc($data[$man['role']] ?? 'Manajemen') ?>
                        </span>
                    </td>
                    <td class="px-4 py-3 font-semibold text-slate-900"><?= esc($man['jabatan']) ?></td>
                    <td class="px-4 py-3 text-slate-700"><?= esc($man['nama']) ?></td>
                    <td class="px-4 py-3 text-slate-600">
                        <?= esc($man['kewarganegaraan']) . ', ' . esc($man['tempat_lahir']) . ' ' . date('d F Y', strtotime($man['tanggal_lahir'])) ?>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <?= esc($man['nama']) ? '<i class="fa-solid fa-circle-check text-emerald-600"></i>' : '<i class="fa-solid fa-circle-xmark text-red-600"></i>' ?>
                    </td>
                    <td class="whitespace-nowrap px-4 py-3 text-center text-slate-600"><?= date('d-m-Y H:i:s', strtotime($man['created_at'])) ?></td>
                    <td class="px-4 py-3 text-center">
                        <button
                            @click="deleteDocument(<?= (int) $man['id'] ?>)"
                            class="inline-flex items-center justify-center gap-2 rounded-md bg-red-600 px-3 py-2 text-xs font-bold text-white transition hover:bg-red-700">
                            <i class="fa-solid fa-trash-can text-xs"></i>
                            <span>Hapus</span>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" class="px-4 py-10 text-center text-slate-500">
                    Belum ada data.
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
