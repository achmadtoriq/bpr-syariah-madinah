<?php
$data = array(
    "1" => "Pemegang Saham",
    "2" => "Dewan Komisaris",
    "3" => "Dewan Pengawas Syariah",
    "4" => "Direksi"
)
?>

<table class="min-w-full border border-gray-300 mt-4 text-sm">
    <thead class="bg-gray-100">
        <tr>
            <th class="border p-2 text-left">No.</th>
            <th class="border p-2 text-left">Posisi</th>
            <th class="border p-2 text-left">Jabatan</th>
            <th class="border p-2 text-left">Nama</th>
            <th class="border p-2 text-left">Kewarganegaraan</th>
            <th class="border p-2 text-center">Photo</th>
            <th class="border p-2 text-center">Tanggal dibuat</th>
            <th class="border p-2 text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($managements)): ?>
            <?php foreach ($managements as $i => $man): ?>
                <tr>
                    <td class="border p-2"><?= $i + 1 ?></td>
                    <td class="border p-2"><?= esc($data[$man['role']]) ?></td>
                    <td class="border p-2"><?= esc($man['jabatan']) ?></td>
                    <td class="border p-2"><?= esc($man['nama']) ?></td>
                    <td class="border p-2"><?= esc($man['kewarganegaraan']) . ', ' . esc($man['tempat_lahir']) . ' ' . date('d F Y', strtotime($man['tanggal_lahir'])) ?></td>
                    <td class="border p-2 text-center"><?= esc($man['nama']) ? '<i class="fa-solid fa-circle-check text-green-600"></i>':'<i class="fa-solid fa-circle-xmark text-red-600"></i>' ?></td>
                    <td class="border p-2 text-center"><?= date('d-m-Y H:i:s', strtotime($man['created_at'])) ?></td>
                    <td class="border p-2 text-center">
                        <div class="flex flex-row justify-center items-center gap-2">
                            <button
                                @click="deleteDocument(<?php $man['id'] ?>)"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded flex items-center justify-center">
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