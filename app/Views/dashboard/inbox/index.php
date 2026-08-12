<main x-data="inboxApp()" class="min-h-screen bg-slate-50 px-4 pb-12 pt-28 md:px-8 lg:pt-24">
    <div class="mx-auto max-w-7xl">
        <!-- Header -->
        <div class="flex flex-col justify-between gap-4 md:flex-row md:items-end">
            <div>
                <p class="text-sm font-bold uppercase tracking-wide text-emerald-700">Webmail IMAP</p>
                <h1 class="mt-1 text-3xl font-bold text-slate-900">Inbox Email Office</h1>
                <p class="mt-1 text-sm leading-6 text-slate-600">Sinkronkan email kantor, baca pesan, dan unduh berkas lampiran secara langsung.</p>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <?php if ($attachmentCount > 0): ?>
                    <a href="<?= base_url('inbox/download-bulk') ?>" class="inline-flex items-center gap-2 rounded-lg border border-emerald-300 bg-emerald-50 px-4 py-2 text-sm font-bold text-emerald-800 shadow-xs transition hover:bg-emerald-100">
                        <i class="fa-solid fa-file-zipper text-emerald-600"></i>
                        Unduh Semua Lampiran (.ZIP)
                    </a>
                <?php endif; ?>

                <span class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs font-semibold text-slate-600 shadow-xs" title="Sistem melakukan sinkronisasi email secara otomatis di background">
                    <span class="relative flex size-2">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex size-2 rounded-full bg-emerald-500"></span>
                    </span>
                    <span x-text="isSyncing ? 'Menyingkronkan...' : 'Sync Otomatis (' + timerSeconds + 's)'"></span>
                </span>

                <a href="<?= base_url('/dashboard') ?>" class="inline-flex items-center gap-2 rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-bold text-slate-700 transition hover:border-emerald-500 hover:text-emerald-700 shadow-sm">
                    <i class="fa-solid fa-arrow-left text-xs"></i>
                    Dashboard
                </a>
            </div>
        </div>

        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="mt-4 rounded-lg bg-emerald-50 p-4 border border-emerald-200 text-sm text-emerald-800 flex items-center gap-3">
                <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
                <span><?= session()->getFlashdata('success') ?></span>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="mt-4 rounded-lg bg-red-50 p-4 border border-red-200 text-sm text-red-800 flex items-center gap-3">
                <i class="fa-solid fa-triangle-exclamation text-red-600 text-base"></i>
                <span><?= session()->getFlashdata('error') ?></span>
            </div>
        <?php endif; ?>

        <!-- Stat Cards -->
        <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Total Inbox</p>
                        <p class="mt-1 text-2xl font-bold text-slate-900"><?= number_format($totalInbox) ?></p>
                    </div>
                    <div class="flex size-12 items-center justify-center rounded-xl bg-slate-100 text-slate-700">
                        <i class="fa-solid fa-inbox text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Belum Dibaca</p>
                        <p class="mt-1 text-2xl font-bold text-amber-600"><?= number_format($unreadCount) ?></p>
                    </div>
                    <div class="flex size-12 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                        <i class="fa-solid fa-envelope-open-text text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Dengan Lampiran</p>
                        <p class="mt-1 text-2xl font-bold text-emerald-600"><?= number_format($attachmentCount) ?></p>
                    </div>
                    <div class="flex size-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                        <i class="fa-solid fa-paperclip text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter & Table Card -->
        <div class="mt-6 rounded-xl border border-slate-200 bg-white shadow-sm overflow-hidden">
            <!-- Search & Bulk Action Toolbar -->
            <div class="border-b border-slate-200 p-4 bg-slate-50/50 flex flex-col gap-3">
                <!-- Search Form (Always Full Width) -->
                <form action="<?= base_url('inbox') ?>" method="get" class="flex items-center gap-3 w-full">
                    <div class="relative flex-1">
                        <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                        <input type="text" name="q" value="<?= esc($search ?? '') ?>" placeholder="Cari berdasarkan subjek, pengirim, atau kata kunci..." class="w-full rounded-lg border border-slate-300 bg-white py-2 pl-10 pr-4 text-sm text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    </div>
                    <button type="submit" class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-800">
                        Cari
                    </button>
                    <?php if (!empty($search)): ?>
                        <a href="<?= base_url('inbox') ?>" class="rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-100">
                            Reset
                        </a>
                    <?php endif; ?>
                </form>

                <!-- Bulk Selection Download Banner (Appears smoothly below search bar) -->
                <div x-show="selectedEmails.length > 0" x-transition class="flex items-center justify-between gap-3 rounded-lg bg-emerald-50 border border-emerald-200 px-4 py-2.5 text-sm text-emerald-900">
                    <div class="flex items-center gap-2 font-medium">
                        <i class="fa-solid fa-circle-check text-emerald-600"></i>
                        <span>Terpilih <strong><span x-text="selectedEmails.length"></span> email</strong></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <button @click="downloadBulkSelected()" class="inline-flex items-center gap-2 rounded-lg bg-emerald-600 px-3.5 py-1.5 text-xs font-bold text-white shadow-xs hover:bg-emerald-700 transition">
                            <i class="fa-solid fa-file-zipper"></i>
                            Unduh Lampiran Terpilih (.ZIP)
                        </button>
                        <button @click="selectedEmails = []" class="text-xs font-semibold text-slate-500 hover:text-slate-800 px-2 py-1">
                            Batal
                        </button>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-100 text-xs uppercase font-semibold text-slate-500 border-b border-slate-200">
                        <tr>
                            <th class="px-2 py-3 w-8 text-center">
                                <input type="checkbox" @change="toggleSelectAll($event)" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500 size-4">
                            </th>
                            <th class="px-1 py-3 w-8 text-center" title="Status Dibaca"></th>
                            <th class="px-3 py-3 w-44">Pengirim</th>
                            <th class="px-3 py-3">Subjek & Pesan</th>
                            <th class="px-2 py-3 w-24 text-center">Lampiran</th>
                            <th class="px-2 py-3 w-28 whitespace-nowrap">Waktu</th>
                            <th class="px-3 py-3 w-28 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php if (empty($emails)): ?>
                            <tr>
                                <td colspan="7" class="px-5 py-12 text-center text-slate-400">
                                    <i class="fa-solid fa-inbox text-4xl mb-3 text-slate-300 block"></i>
                                    Belum ada email yang tersimpan. Klik tombol <strong>Sync Email Sekarang</strong> di atas untuk menarik inbox webmail.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($emails as $email): ?>
                                <tr class="hover:bg-slate-50/80 transition <?= $email['is_read'] == 0 ? 'bg-emerald-50/30 font-medium' : '' ?>">
                                    <td class="px-2 py-3 text-center">
                                        <input type="checkbox" value="<?= $email['id'] ?>" x-model="selectedEmails" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500 size-4">
                                    </td>
                                    <td class="px-1 py-3 text-center">
                                        <?php if ($email['is_read'] == 0): ?>
                                            <span class="inline-block size-2 rounded-full bg-emerald-500" title="Belum Dibaca"></span>
                                        <?php else: ?>
                                            <i class="fa-regular fa-envelope-open text-slate-400 text-xs" title="Sudah Dibaca"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-3 py-3 w-44">
                                        <div class="font-bold text-slate-900 truncate max-w-40" title="<?= esc($email['sender_name']) ?>"><?= esc($email['sender_name']) ?></div>
                                        <div class="text-xs text-slate-500 truncate max-w-40" title="<?= esc($email['sender_email']) ?>"><?= esc($email['sender_email']) ?></div>
                                    </td>
                                    <td class="px-3 py-3">
                                        <a href="<?= base_url('inbox/detail/' . $email['id']) ?>" class="font-bold text-slate-900 hover:text-emerald-600 block line-clamp-1">
                                            <?= esc($email['subject']) ?>
                                        </a>
                                        <p class="text-xs text-slate-500 line-clamp-1 mt-0.5">
                                            <?= esc(mb_substr(strip_tags($email['body_text'] ?: $email['body_html']), 0, 90)) ?>
                                        </p>
                                    </td>
                                    <td class="px-2 py-3 text-center whitespace-nowrap">
                                        <?php if ($email['has_attachments']): ?>
                                            <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-0.5 text-xs font-bold text-emerald-800">
                                                <i class="fa-solid fa-paperclip text-[10px]"></i> Ada File
                                            </span>
                                        <?php else: ?>
                                            <span class="text-slate-300 text-xs">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap text-xs text-slate-500">
                                        <?= date('d M Y, H:i', strtotime($email['received_at'])) ?>
                                    </td>
                                    <td class="px-3 py-3 text-right whitespace-nowrap">
                                        <div class="flex items-center justify-end gap-1.5">
                                            <a href="<?= base_url('inbox/detail/' . $email['id']) ?>" class="inline-flex items-center gap-1 rounded-md border border-slate-200 bg-white px-2.5 py-1.5 text-xs font-semibold text-slate-700 shadow-xs transition hover:border-emerald-500 hover:text-emerald-700">
                                                <i class="fa-solid fa-eye text-xs"></i> Baca
                                            </a>
                                            <button @click="deleteEmail(<?= $email['id'] ?>)" class="inline-flex size-7 items-center justify-center rounded-md border border-red-200 bg-red-50 text-red-600 hover:bg-red-100 transition" title="Hapus Email">
                                                <i class="fa-solid fa-trash-can text-xs"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php if ($pager): ?>
                <div class="border-t border-slate-200 px-5 py-3">
                    <?= $pager->links('default', 'tailwind_pagination') ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<script>
function inboxApp() {
    return {
        isSyncing: false,
        timerSeconds: 30,
        timerInterval: null,
        selectedEmails: [],
        allIds: <?= json_encode(array_column($emails ?? [], 'id')) ?>,

        init() {
            this.startCountdown();
        },

        startCountdown() {
            this.timerSeconds = 30;
            if (this.timerInterval) clearInterval(this.timerInterval);

            this.timerInterval = setInterval(() => {
                if (this.isSyncing) return;

                if (this.timerSeconds > 1) {
                    this.timerSeconds--;
                } else {
                    this.timerSeconds = 30;
                    this.autoSync();
                }
            }, 1000);
        },

        autoSync() {
            if (this.isSyncing) return;
            this.isSyncing = true;
            fetch('<?= base_url('inbox/sync') ?>', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.json())
            .then(data => {
                this.isSyncing = false;
                if (data.status === 'success' && data.result && data.result.added > 0) {
                    window.location.reload();
                }
            })
            .catch(() => {
                this.isSyncing = false;
            });
        },
        
        toggleSelectAll(e) {
            if (e.target.checked) {
                this.selectedEmails = [...this.allIds];
            } else {
                this.selectedEmails = [];
            }
        },

        downloadBulkSelected() {
            if (this.selectedEmails.length === 0) return;
            const ids = this.selectedEmails.join(',');
            window.location.href = '<?= base_url('inbox/download-bulk') ?>?ids=' + ids;
        },

        deleteEmail(id) {
            if (!confirm('Apakah Anda yakin ingin menghapus email ini beserta file lampirannya?')) return;

            fetch('<?= base_url('inbox/delete/') ?>' + id, {
                method: 'DELETE',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    window.location.reload();
                } else {
                    alert('Gagal Hapus: ' + data.message);
                }
            });
        }
    }
}
</script>
