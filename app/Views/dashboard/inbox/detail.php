<main class="min-h-screen bg-slate-50 px-4 pb-12 pt-28 md:px-8 lg:pt-24">
    <div class="mx-auto max-w-5xl">
        <!-- Top Bar -->
        <div class="flex items-center justify-between gap-4">
            <a href="<?= base_url('inbox') ?>" class="inline-flex items-center gap-2 rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-bold text-slate-700 shadow-sm transition hover:border-emerald-500 hover:text-emerald-700">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                Kembali ke Inbox
            </a>
            <div class="flex items-center gap-3">
                <span class="text-xs text-slate-500 font-medium">Diterima: <?= date('d M Y, H:i', strtotime($email['received_at'])) ?></span>
                <a href="<?= base_url('inbox/delete/' . $email['id']) ?>" onclick="return confirm('Hapus email ini beserta lampirannya?')" class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs font-bold text-red-600 transition hover:bg-red-100">
                    <i class="fa-solid fa-trash-can text-xs"></i> Hapus Email
                </a>
            </div>
        </div>

        <!-- Email Content Card -->
        <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
            <!-- Header Info -->
            <div class="border-b border-slate-200 pb-6">
                <h1 class="text-2xl font-bold text-slate-900 leading-snug"><?= esc($email['subject']) ?></h1>
                
                <div class="mt-4 flex flex-wrap items-center justify-between gap-4 rounded-xl bg-slate-50 p-4 border border-slate-100">
                    <div class="flex items-center gap-3">
                        <div class="flex size-11 items-center justify-center rounded-full bg-emerald-600 font-bold text-white uppercase text-base">
                            <?= esc(mb_substr($email['sender_name'], 0, 1)) ?>
                        </div>
                        <div>
                            <div class="font-bold text-slate-900 text-sm"><?= esc($email['sender_name']) ?></div>
                            <div class="text-xs text-slate-500 font-mono"><?= esc($email['sender_email']) ?></div>
                        </div>
                    </div>
                    <?php if (!empty($attachments)): ?>
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold text-emerald-800">
                            <i class="fa-solid fa-paperclip"></i> <?= count($attachments) ?> Berkas Lampiran
                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Attachments Section (High Priority Focus) -->
            <?php if (!empty($attachments)): ?>
                <div class="mt-6 border-b border-slate-200 pb-6">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-emerald-700 flex items-center gap-2">
                            <i class="fa-solid fa-paperclip"></i> Berkas Lampiran (Download)
                        </h3>
                        <?php if (count($attachments) > 1): ?>
                            <a href="<?= base_url('inbox/download-bulk?ids=' . $email['id']) ?>" class="inline-flex items-center gap-1.5 rounded-lg border border-emerald-300 bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-800 transition hover:bg-emerald-100">
                                <i class="fa-solid fa-file-zipper"></i> Unduh Semua (<?= count($attachments) ?> File .ZIP)
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                        <?php foreach ($attachments as $att): ?>
                            <?php 
                                $ext = strtolower(pathinfo($att['filename'], PATHINFO_EXTENSION));
                                $iconClass = match($ext) {
                                    'pdf' => 'fa-file-pdf text-red-500',
                                    'doc', 'docx' => 'fa-file-word text-blue-500',
                                    'xls', 'xlsx' => 'fa-file-excel text-emerald-500',
                                    'jpg', 'jpeg', 'png', 'gif' => 'fa-file-image text-purple-500',
                                    'zip', 'rar' => 'fa-file-zipper text-amber-500',
                                    default => 'fa-file text-slate-400'
                                };
                                $sizeKb = round($att['file_size'] / 1024, 1);
                            ?>
                            <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-slate-50/70 p-4 transition hover:border-emerald-300 hover:bg-emerald-50/20">
                                <div class="flex items-center gap-3 overflow-hidden">
                                    <div class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-white shadow-xs border border-slate-200 text-lg">
                                        <i class="fa-solid <?= $iconClass ?>"></i>
                                    </div>
                                    <div class="truncate">
                                        <p class="truncate text-sm font-bold text-slate-900" title="<?= esc($att['filename']) ?>"><?= esc($att['filename']) ?></p>
                                        <p class="text-xs text-slate-500"><?= $sizeKb > 1024 ? round($sizeKb / 1024, 2) . ' MB' : $sizeKb . ' KB' ?></p>
                                    </div>
                                </div>
                                <a href="<?= base_url('inbox/download/' . $att['id']) ?>" class="ml-3 shrink-0 inline-flex items-center gap-1.5 rounded-lg bg-emerald-600 px-3 py-2 text-xs font-bold text-white shadow-xs transition hover:bg-emerald-700">
                                    <i class="fa-solid fa-download"></i> Unduh
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Body Message -->
            <div class="mt-6">
                <h3 class="text-sm font-bold uppercase tracking-wider text-slate-400 mb-3">Isi Pesan</h3>
                
                <?php if (!empty($email['body_html'])): ?>
                    <div class="rounded-xl border border-slate-200 p-5 bg-white overflow-x-auto text-slate-800 prose prose-slate max-w-none">
                        <?= $email['body_html'] ?>
                    </div>
                <?php else: ?>
                    <div class="rounded-xl border border-slate-200 p-5 bg-slate-50/50 text-slate-800 whitespace-pre-wrap font-sans text-sm leading-relaxed">
                        <?= esc($email['body_text']) ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
