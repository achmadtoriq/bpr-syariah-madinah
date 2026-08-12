<main class="w-full bg-slate-50 text-slate-900 font-sans min-h-screen">
    <!-- 🏢 EXECUTIVE HERO BANNER SECTION -->
    <section class="relative bg-gradient-to-b from-blue-50/80 via-white to-slate-50 text-slate-900 pt-28 pb-12 md:pt-36 md:pb-12 border-b border-slate-200 overflow-hidden">
        <!-- Ambient Glow Effects -->
        <div class="absolute top-0 right-1/4 w-[450px] h-[450px] bg-blue-200/30 blur-[130px] rounded-full pointer-events-none"></div>

        <div class="container mx-auto max-w-7xl px-5 md:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex flex-wrap items-center gap-2 text-xs text-slate-500 mb-4">
                <a href="<?= base_url() ?>" class="hover:text-blue-700 transition">Home</a>
                <span>/</span>
                <a href="<?= base_url('/berita') ?>" class="hover:text-blue-700 transition">Berita & Artikel</a>
                <span>/</span>
                <span class="text-blue-700 font-semibold truncate max-w-xs md:max-w-md">
                    <?= esc($article['clean_title'] ?? 'Detail Artikel') ?>
                </span>
            </nav>

            <div class="max-w-4xl space-y-4">
                <div class="flex items-center gap-3">
                    <span class="px-3.5 py-1 rounded-full bg-blue-600 text-white text-xs font-extrabold uppercase shadow-sm">
                        Perbankan Syariah
                    </span>
                    <span class="text-xs font-semibold text-slate-500 flex items-center gap-1.5">
                        <i class="fa-regular fa-calendar-check text-blue-600"></i>
                        <?= !empty($article['published_at']) ? date('d M Y', strtotime($article['published_at'])) : date('d M Y') ?>
                    </span>
                </div>
                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
                    <?= esc($article['clean_title'] ?? 'Berita & Artikel BPRS Madinah') ?>
                </h1>
                <div class="flex items-center gap-3 text-xs font-bold text-slate-600 pt-1">
                    <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-black">
                        BM
                    </div>
                    <div>
                        <p class="text-slate-900 font-bold"><?= esc($article['user_id'] ?? 'Humas BPRS Madinah') ?></p>
                        <p class="text-[10px] text-slate-400 font-medium">BPRS Syariah Madinah Lamongan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 📖 ARTICLE DETAIL BODY SECTION -->
    <section class="py-12 md:py-16">
        <div class="container mx-auto max-w-7xl px-5 md:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                
                <!-- Main Article Content (Left, lg:col-span-8) -->
                <div class="lg:col-span-8 bg-white rounded-3xl border border-slate-200 p-6 md:p-10 shadow-sm space-y-8">
                    
                    <!-- Featured Article Image -->
                    <div class="rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 shadow-inner">
                        <img src="<?= !empty($article['thumbnail']) ? base_url($article['thumbnail']) : base_url('assets/rumah_bprs.jpg') ?>" alt="<?= esc($article['clean_title'] ?? '') ?>" class="w-full h-auto max-h-[480px] object-cover rounded-xl" onerror="this.src='<?= base_url('assets/rumah_bprs.jpg') ?>'">
                    </div>

                    <!-- Article Content Paragraphs -->
                    <div class="prose prose-slate max-w-none text-slate-700 text-sm sm:text-base leading-relaxed space-y-4">
                        <?php if (!empty($article['clean_content'])): ?>
                            <?php 
                            $paragraphs = explode("\n", $article['clean_content']);
                            foreach ($paragraphs as $p):
                                if (trim($p) !== ''):
                            ?>
                                    <p class="leading-relaxed text-slate-700"><?= esc(trim($p)) ?></p>
                            <?php 
                                endif;
                            endforeach; 
                            ?>
                        <?php else: ?>
                            <p>Informasi artikel lengkap BPRS Syariah Madinah Lamongan.</p>
                        <?php endif; ?>
                    </div>

                    <!-- Share Section -->
                    <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row justify-between items-center gap-4">
                        <span class="text-xs font-bold text-slate-600 flex items-center gap-2">
                            <i class="fa-solid fa-share-nodes text-blue-600"></i> Bagikan Berita Ini:
                        </span>
                        <div class="flex items-center gap-3">
                            <a href="https://wa.me/?text=<?= urlencode(($article['clean_title'] ?? 'Berita BPRS Madinah') . ' - ' . current_url()) ?>" target="_blank" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition flex items-center gap-1.5 shadow-sm">
                                <i class="fa-brands fa-whatsapp text-sm"></i> WhatsApp
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()) ?>" target="_blank" class="px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white rounded-xl text-xs font-bold transition flex items-center gap-1.5 shadow-sm">
                                <i class="fa-brands fa-facebook-f text-xs"></i> Facebook
                            </a>
                            <a href="<?= base_url('/berita') ?>" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold transition">
                                Kembali ke Berita
                            </a>
                        </div>
                    </div>

                </div>

                <!-- Right Sidebar (lg:col-span-4) -->
                <div class="lg:col-span-4 space-y-6">
                    
                    <!-- Related Articles Widget -->
                    <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm space-y-5">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                            <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
                                <i class="fa-solid fa-newspaper text-blue-600"></i> Berita Terkait
                            </h3>
                            <a href="<?= base_url('/berita') ?>" class="text-xs font-bold text-blue-700 hover:underline">Lihat Semua</a>
                        </div>

                        <div class="space-y-4">
                            <?php if (!empty($otherArticles)): ?>
                                <?php foreach ($otherArticles as $other): ?>
                                    <a href="<?= base_url('/berita/' . ($other['slug'] ?? $other['id'])) ?>" class="flex items-center gap-3 group border-b border-slate-100 pb-3 last:border-0 last:pb-0">
                                        <div class="w-16 h-16 rounded-xl bg-slate-100 overflow-hidden shrink-0 border border-slate-200">
                                            <img src="<?= !empty($other['thumbnail']) ? base_url($other['thumbnail']) : base_url('assets/rumah_bprs.jpg') ?>" alt="<?= esc($other['clean_title']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-300" onerror="this.src='<?= base_url('assets/rumah_bprs.jpg') ?>'">
                                        </div>
                                        <div class="space-y-1">
                                            <h4 class="text-xs font-bold text-slate-900 group-hover:text-blue-700 transition line-clamp-2 leading-snug">
                                                <?= esc($other['clean_title']) ?>
                                            </h4>
                                            <span class="text-[10px] text-slate-400 font-semibold block">
                                                <?= !empty($other['created_at']) ? date('d M Y', strtotime($other['created_at'])) : date('d M Y') ?>
                                            </span>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Customer Service Quick CTA Card -->
                    <div class="bg-gradient-to-br from-blue-900 via-blue-800 to-slate-900 rounded-3xl p-6 shadow-xl text-white space-y-4 border border-blue-700">
                        <span class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-[10px] font-extrabold uppercase border border-emerald-400/30">Layanan Fast Response</span>
                        <h4 class="text-lg font-extrabold text-white leading-snug">Punya Pertanyaan Seputar Layanan Syariah?</h4>
                        <p class="text-xs text-blue-100 leading-relaxed">
                            Tim Customer Service BPRS Madinah Lamongan siap melayani kebutuhan informasi perbankan Anda secara ramah & amanah.
                        </p>
                        <a href="https://wa.me/6281234567890?text=Halo%20BPRS%20Madinah,%20saya%20ingin%20bertanya%20seputar%20informasi%20layanan" target="_blank" class="w-full py-3 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-xs font-extrabold transition shadow-md flex items-center justify-center gap-2 cursor-pointer">
                            <i class="fa-brands fa-whatsapp text-sm"></i> Hubungi Customer Service
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- 🔗 QUICK NAVIGATION FOOTER BANNER -->
    <section class="py-12 bg-slate-100 border-t border-slate-200">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 text-center space-y-6">
            <h3 class="text-xl font-bold text-slate-900">Produk & Layanan Utama</h3>
            <div class="flex flex-wrap justify-center items-center gap-4">
                <a href="<?= base_url('/tabungan') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-piggy-bank text-blue-600"></i> Tabungan Syariah
                </a>
                <a href="<?= base_url('/deposito') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-vault text-emerald-600"></i> Deposito Syariah
                </a>
                <a href="<?= base_url('/pembiayaan') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-hand-holding-dollar text-amber-500"></i> Pembiayaan Syariah
                </a>
            </div>
        </div>
    </section>
</main>
