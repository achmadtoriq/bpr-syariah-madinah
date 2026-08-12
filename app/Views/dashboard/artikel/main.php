<main class="min-h-screen bg-slate-50 px-4 pb-12 pt-28 md:px-8 lg:pt-24">
    <div class="mx-auto max-w-7xl">
        <?php if ($tipe == 1): ?>
            <div class="flex flex-col justify-between gap-4 md:flex-row md:items-end" data-aos="fade-up">
                <div>
                    <p class="text-sm font-bold uppercase tracking-wide text-emerald-700">Artikel</p>
                    <h1 class="mt-2 text-3xl font-bold text-slate-900">Daftar Artikel</h1>
                    <p class="mt-2 text-sm leading-6 text-slate-600">Kelola publikasi artikel website.</p>
                </div>
                <a href="<?= base_url('artikel') ?>" target="_blank" class="inline-flex w-fit items-center gap-2 rounded-md bg-emerald-600 px-4 py-2 text-sm font-bold text-white transition hover:bg-emerald-700">
                    <i class="fa-solid fa-plus text-xs"></i>
                    Buat Artikel
                </a>
            </div>

            <div class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <?php if (isset($articles) && is_array($articles)): ?>
                    <?php foreach ($articles as $index => $article): ?>
                        <article class="overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-slate-200 transition hover:-translate-y-1 hover:shadow-xl" data-aos="fade-up" data-aos-delay="<?= ($index % 4) * 80 ?>">
                            <img src="<?= base_url('articles/thumbnails/' . $article['thumbnail']) ?>" alt="<?= esc($article['title']) ?>" class="aspect-[4/3] w-full object-cover">
                            <div class="p-4">
                                <a href="<?= base_url('artikel/' . $article['slug']) ?>" target="_blank">
                                    <h2 class="line-clamp-2 text-lg font-bold leading-6 text-slate-900"><?= esc($article['title']) ?></h2>
                                </a>
                                <div class="mt-4 flex items-center justify-between border-t border-slate-100 pt-3 text-xs text-slate-500">
                                    <p class="font-semibold"><?= esc($article['user_id']) ?></p>
                                    <p><?= esc($article['published_at']) ?></p>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if (empty($articles)): ?>
                    <div class="col-span-full rounded-lg border border-dashed border-slate-300 bg-white p-10 text-center text-sm text-slate-500">
                        Belum ada artikel.
                    </div>
                <?php endif; ?>
            </div>
        <?php elseif ($tipe == 2): ?>
            <article class="mx-auto max-w-5xl rounded-lg bg-white p-6 shadow-sm ring-1 ring-slate-200 md:p-8" data-aos="fade-up">
                <a href="<?= base_url('artikel-list') ?>" class="mb-6 inline-flex items-center gap-2 rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-bold text-slate-700 transition hover:border-emerald-500 hover:text-emerald-700">
                    <i class="fa-solid fa-arrow-left text-xs"></i>
                    Kembali
                </a>
                <h1 class="text-3xl font-bold text-slate-900"><?= esc($article['title']) ?></h1>

                <div class="ck-content mt-8 space-y-8 text-justify leading-8 text-slate-700">
                    <?= $article['content'] ?>
                </div>
            </article>
        <?php endif; ?>
    </div>
</main>
