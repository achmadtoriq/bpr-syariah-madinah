<main class="w-full bg-slate-50 text-slate-900 font-sans min-h-screen" x-data="{
    searchQuery: '',
    selectedCategory: 'all',
    showModal: false,
    modalData: {},
    defaultArticles: [
        {
            id: 1,
            slug: 'mengenal-akad-mudharabah-wadiah',
            title: 'Mengenal Akad Mudharabah & Wadi\'ah dalam Pengelolaan Simpanan Syariah',
            category: 'edukasi',
            categoryLabel: 'Edukasi Syariah',
            date: '10 Agustus 2026',
            author: 'Humas BPRS Madinah',
            thumbnail: '<?= base_url('assets/rumah_bprs.jpg') ?>',
            excerpt: 'Panduan praktis memahami sistem bagi hasil transparan pada deposito mudharabah dan keutamaan titipan amanah tanpa riba pada simpanan wadi’ah untuk keluarga Anda.',
            content: 'Perbankan Syariah menawarkan pengelolaan keuangan berbasis keadilan dan keberkahan. Dua akad utama yang paling sering digunakan dalam simpanan adalah Akad Mudharabah (Bagi Hasil) dan Akad Wadi’ah (Titipan Murni).\n\nMelalui Akad Mudharabah Mutlaqah, dana yang Anda simpan dalam Deposito BPRS Madinah akan diinvestasikan secara produktif dalam pembiayaan riil masyarakat. Hasil keuntungan investasi akan dibagi secara proporsional sesuai porsi nisbah yang disepakati sejak awal.\n\nSementara dengan Akad Wadi’ah Yad Adh-Dhamanah, dana simpanan tabungan Anda dijamin utuh dan dapat ditarik kapan saja tanpa dipotong biaya administrasi bulanan. Mari bangun ketahanan finansial keluarga bersama BPRS Madinah Lamongan!'
        },
        {
            id: 2,
            slug: 'bprs-madinah-edukasi-simpel',
            title: 'BPRS Madinah Sukses Gelar Edukasi Literasi Tabungan SimPel di Lamongan',
            category: 'csr',
            categoryLabel: 'Kegiatan & CSR',
            date: '04 Agustus 2026',
            author: 'Tim Literasi Perbankan',
            thumbnail: '<?= base_url('assets/produk/tabungan_simpel.png') ?>',
            excerpt: 'Sinergi BPRS Madinah bersama sekolah-sekolah di Kabupaten Lamongan untuk membangun budaya hemat dan menabung sejak dini melalui Tabungan SimPel iB.',
            content: 'Sebagai komitmen terhadap peningkatan literasi keuangan inklusif, PT BPRS Syariah Madinah Lamongan menyelenggarakan sosialisasi Tabungan Simpanan Pelajar (SimPel iB) di berbagai sekolah dan madrasah mitra di Kabupaten Lamongan.\n\nProgram ini bertujuan memberikan pemahaman mendasar bagi para siswa mengenai pentingnya mengelola uang jajan dan merencanakan masa depan sejak dini. Dengan setoran awal super ringan mulai dari Rp 1.000 dan bebas biaya administrasi bulanan, Tabungan SimPel iB mendapatkan sambutan hangat dari jajaran kepala sekolah, guru, dan para orang tua siswa.'
        },
        {
            id: 3,
            slug: 'tips-memilih-deposito-syariah',
            title: 'Tips Memilih Deposito Berjangka Syariah yang Aman dan Dijamin LPS',
            category: 'tips',
            categoryLabel: 'Tips Finansial',
            date: '28 Juli 2026',
            author: 'Tim Analis Finansial',
            thumbnail: '<?= base_url('assets/produk/brosur_deposito.webp') ?>',
            excerpt: 'Strategi tepat mengalokasikan dana cadangan ke dalam instrumen deposito syariah BPRS Madinah yang dijamin LPS hingga Rp 2 Miliar dengan porsi nisbah optimal.',
            content: 'Di tengah ketidakpastian ekonomi, memilih instrumen investasi simpanan yang aman dan bebas risiko riba menjadi kebutuhan utama. Deposito Berjangka Syariah BPRS Madinah hadir sebagai solusi tepat bagi masyarakat yang menginginkan imbal hasil kompetitif tanpa rasa khawatir.\n\nBerikut 3 tips penting memilih deposito syariah:\n1. Pastikan bank terdaftar dan diawasi OJK serta menjadi peserta penjaminan LPS.\n2. Sesuaikan tenor investasi (1, 3, 6, atau 12 bulan) dengan kebutuhan likuiditas Anda.\n3. Manfaatkan fasilitas Automatic Roll Over (ARO) untuk perpanjangan deposito otomatis tanpa repot.'
        },
        {
            id: 4,
            slug: 'madinah-payment-system-mps',
            title: 'Inovasi Madinah Payment System (MPS) Bantu Digitalisasi Keuangan Sekolah & Pesantren',
            category: 'pengumuman',
            categoryLabel: 'Inovasi Digital',
            date: '20 Juli 2026',
            author: 'Tim IT & Layanan',
            thumbnail: '<?= base_url('assets/produk/madinah_pay_system.webp') ?>',
            excerpt: 'Pengembangan software Madinah Payment System (MPS) berikan kemudahan bendahara sekolah dalam mengelola SPP dan iuran siswa secara transparan & akuntabel.',
            content: 'Guna mendukung digitalisasi tata kelola lembaga pendidikan Islam, BPRS Madinah meluncurkan layanan Madinah Payment System (MPS). Layanan berupa software pengelolaan keuangan sekolah ini diberikan secara GRATIS bagi sekolah, madrasah, dan pesantren di wilayah Lamongan.\n\nDengan MPS, pembukuan SPP, tagihan iuran bulanan, serta laporan penerimaan dana sekolah dapat diakses secara akurat, real-time, serta dilengkapi fasilitas layanan antar-jemput dana kas (Pick-Up Service).'
        }
    ],
    get allArticles() {
        const rawDb = <?= json_encode($articles ?? []) ?>;
        if (rawDb && rawDb.length > 0) {
            return rawDb.map(a => {
                const title = a.clean_title || a.title || '';
                const content = a.clean_content || a.content || '';
                const slug = a.slug || a.id;
                return {
                    id: a.id,
                    slug: slug,
                    title: title,
                    category: 'umum',
                    categoryLabel: 'Berita Terbaru',
                    date: a.created_at ? new Date(a.created_at).toLocaleDateString('id-ID', {day: 'numeric', month: 'long', year: 'numeric'}) : 'Terbaru',
                    author: 'Admin BPRS',
                    thumbnail: a.thumbnail ? ('<?= base_url() ?>' + a.thumbnail) : '<?= base_url('assets/rumah_bprs.jpg') ?>',
                    excerpt: content.length > 130 ? content.substring(0, 130) + '...' : content,
                    content: content
                };
            });
        }
        return this.defaultArticles;
    },
    get filteredArticles() {
        return this.allArticles.filter(a => {
            const matchSearch = a.title.toLowerCase().includes(this.searchQuery.toLowerCase()) || 
                                a.excerpt.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                a.content.toLowerCase().includes(this.searchQuery.toLowerCase());
            const matchCat = this.selectedCategory === 'all' || a.category === this.selectedCategory;
            return matchSearch && matchCat;
        });
    },
    openArticleModal(art) {
        this.modalData = art;
        this.showModal = true;
    }
}">
    <!-- 🏢 EXECUTIVE HERO BANNER SECTION -->
    <section class="relative bg-gradient-to-b from-blue-50/80 via-white to-slate-50 text-slate-900 pt-28 pb-12 md:pt-36 md:pb-16 border-b border-slate-200 overflow-hidden">
        <!-- Ambient Glow Effects -->
        <div class="absolute top-0 right-1/4 w-[450px] h-[450px] bg-blue-200/30 blur-[130px] rounded-full pointer-events-none"></div>
        <div class="absolute bottom-0 left-1/3 w-[350px] h-[350px] bg-emerald-100/40 blur-[100px] rounded-full pointer-events-none"></div>

        <div class="container mx-auto max-w-7xl px-5 md:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs text-slate-500 mb-4">
                <a href="<?= base_url() ?>" class="hover:text-blue-700 transition">Home</a>
                <span>/</span>
                <span>Kabar & Informasi</span>
                <span>/</span>
                <span class="text-blue-700 font-semibold">Berita & Artikel</span>
            </nav>

            <div class="max-w-3xl space-y-4">
                <div class="inline-flex items-center gap-2 rounded-full bg-blue-100 border border-blue-200 px-4 py-1.5 text-xs font-bold text-blue-800 uppercase tracking-widest">
                    <i class="fa-solid fa-newspaper text-blue-600"></i> Portal Berita & Edukasi Syariah
                </div>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
                    Berita, Edukasi & Kabar Terkini
                </h1>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    Informasi resmi seputar perkembangan perbankan syariah, tips pengelolaan keuangan keluarga, laporan kegiatan sosial, dan pengumuman BPRS Madinah Lamongan.
                </p>
            </div>
        </div>
    </section>

    <!-- 🔍 INTERACTIVE FILTER & SEARCH BAR SECTION -->
    <section class="py-6 bg-white border-b border-slate-200 shadow-sm sticky top-16 z-30">
        <div class="container mx-auto max-w-7xl px-5 md:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                
                <!-- Category Filter Pills -->
                <div class="flex items-center gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0 no-scrollbar">
                    <button @click="selectedCategory = 'all'" :class="selectedCategory === 'all' ? 'bg-blue-600 text-white font-bold shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 font-semibold'" class="px-4 py-2 text-xs rounded-xl transition cursor-pointer shrink-0">
                        <i class="fa-solid fa-layer-group mr-1"></i> Semua Berita
                    </button>
                    <button @click="selectedCategory = 'edukasi'" :class="selectedCategory === 'edukasi' ? 'bg-blue-600 text-white font-bold shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 font-semibold'" class="px-4 py-2 text-xs rounded-xl transition cursor-pointer shrink-0">
                        <i class="fa-solid fa-book-open-reader mr-1 text-emerald-500"></i> Edukasi Syariah
                    </button>
                    <button @click="selectedCategory = 'csr'" :class="selectedCategory === 'csr' ? 'bg-blue-600 text-white font-bold shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 font-semibold'" class="px-4 py-2 text-xs rounded-xl transition cursor-pointer shrink-0">
                        <i class="fa-solid fa-hand-holding-heart mr-1 text-amber-500"></i> Kegiatan & CSR
                    </button>
                    <button @click="selectedCategory = 'pengumuman'" :class="selectedCategory === 'pengumuman' ? 'bg-blue-600 text-white font-bold shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 font-semibold'" class="px-4 py-2 text-xs rounded-xl transition cursor-pointer shrink-0">
                        <i class="fa-solid fa-bullhorn mr-1"></i> Pengumuman Resmi
                    </button>
                    <button @click="selectedCategory = 'tips'" :class="selectedCategory === 'tips' ? 'bg-blue-600 text-white font-bold shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 font-semibold'" class="px-4 py-2 text-xs rounded-xl transition cursor-pointer shrink-0">
                        <i class="fa-solid fa-lightbulb mr-1 text-sky-500"></i> Tips Finansial
                    </button>
                </div>

                <!-- Live Search Bar -->
                <div class="relative w-full md:w-80">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                    <input type="text" x-model="searchQuery" placeholder="Cari judul berita atau artikel..." class="w-full pl-9 pr-4 py-2 text-xs bg-slate-100 border border-slate-200 rounded-xl text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition shadow-inner">
                </div>
            </div>
        </div>
    </section>

    <!-- 📰 FEATURED HEADLINE & ARTICLES GRID SECTION -->
    <section class="py-12 md:py-20">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 space-y-12">
            
            <!-- FEATURED HEADLINE CARD (Shows top article when no search/filter active) -->
            <div x-show="searchQuery === '' && selectedCategory === 'all' && filteredArticles.length > 0" class="bg-white rounded-3xl border border-slate-200/90 shadow-xl overflow-hidden group grid grid-cols-1 lg:grid-cols-12 items-center">
                <a :href="'<?= base_url('/berita/') ?>' + (allArticles[0].slug || allArticles[0].id)" class="lg:col-span-7 relative h-72 lg:h-full bg-slate-100 overflow-hidden block">
                    <img :src="allArticles[0].thumbnail" :alt="allArticles[0].title" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>
                    <span class="absolute top-4 left-4 px-3.5 py-1 rounded-full bg-blue-600 text-white text-xs font-extrabold uppercase shadow-md" x-text="allArticles[0].categoryLabel"></span>
                </a>
                <div class="lg:col-span-5 p-6 md:p-10 space-y-4 flex flex-col justify-between h-full">
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 text-xs font-bold text-slate-400">
                            <span class="flex items-center gap-1.5"><i class="fa-regular fa-calendar-check text-blue-600"></i> <span x-text="allArticles[0].date"></span></span>
                            <span>•</span>
                            <span class="flex items-center gap-1.5"><i class="fa-solid fa-user-pen text-slate-400"></i> <span x-text="allArticles[0].author"></span></span>
                        </div>
                        <a :href="'<?= base_url('/berita/') ?>' + (allArticles[0].slug || allArticles[0].id)" class="block">
                            <h2 class="text-2xl font-extrabold text-slate-900 group-hover:text-blue-700 transition-colors leading-tight" x-text="allArticles[0].title"></h2>
                        </a>
                        <p class="text-slate-600 text-xs sm:text-sm leading-relaxed line-clamp-4" x-text="allArticles[0].excerpt"></p>
                    </div>
                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                        <a :href="'<?= base_url('/berita/') ?>' + (allArticles[0].slug || allArticles[0].id)" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition shadow-md">
                            Baca Artikel Lengkap <i class="fa-solid fa-arrow-right"></i>
                        </a>
                        <button @click="openArticleModal(allArticles[0])" class="text-xs text-slate-500 font-bold hover:text-blue-700 underline cursor-pointer">
                            Pratinjau Cepat
                        </button>
                    </div>
                </div>
            </div>

            <!-- ARTICLES CARDS GRID -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <template x-for="art in filteredArticles" :key="art.id">
                    <article class="bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl hover:border-blue-300 transition-all duration-300 flex flex-col justify-between overflow-hidden group">
                        
                        <div class="space-y-4">
                            <!-- Image Header -->
                            <a :href="'<?= base_url('/berita/') ?>' + (art.slug || art.id)" class="relative h-52 bg-slate-100 overflow-hidden block">
                                <img :src="art.thumbnail" :alt="art.title" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.src='<?= base_url('assets/rumah_bprs.jpg') ?>'">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent"></div>
                                <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-blue-600 text-white text-[10px] font-extrabold uppercase shadow-md" x-text="art.categoryLabel"></span>
                            </a>

                            <!-- Body Content -->
                            <div class="px-6 space-y-3">
                                <div class="flex items-center gap-3 text-[11px] font-semibold text-slate-400">
                                    <span class="flex items-center gap-1.5"><i class="fa-regular fa-calendar-check text-blue-600"></i> <span x-text="art.date"></span></span>
                                    <span>•</span>
                                    <span class="flex items-center gap-1.5"><i class="fa-solid fa-user text-slate-400"></i> <span x-text="art.author"></span></span>
                                </div>
                                <a :href="'<?= base_url('/berita/') ?>' + (art.slug || art.id)" class="block">
                                    <h3 class="text-base font-extrabold text-slate-900 group-hover:text-blue-700 transition-colors line-clamp-2 leading-snug" x-text="art.title"></h3>
                                </a>
                                <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed" x-text="art.excerpt"></p>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="px-6 pb-6 pt-4 border-t border-slate-100 mt-4 flex items-center justify-between">
                            <a :href="'<?= base_url('/berita/') ?>' + (art.slug || art.id)" class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-700 hover:text-blue-900 group-hover:translate-x-1 transition-transform">
                                Baca Artikel <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            </a>
                            <button @click="openArticleModal(art)" class="text-[10px] text-slate-400 hover:text-blue-600 font-semibold flex items-center gap-1 cursor-pointer">
                                <i class="fa-regular fa-eye"></i> Quick View
                            </button>
                        </div>

                    </article>
                </template>
            </div>

            <!-- Empty State -->
            <div x-show="filteredArticles.length === 0" class="text-center py-16 bg-white rounded-3xl border border-slate-200 p-8 space-y-3">
                <i class="fa-solid fa-newspaper text-4xl text-slate-300"></i>
                <h4 class="text-base font-bold text-slate-800">Artikel tidak ditemukan</h4>
                <p class="text-xs text-slate-500">Coba ubah kata kunci pencarian atau pilih kategori berita lainnya.</p>
                <button @click="searchQuery = ''; selectedCategory = 'all'" class="px-4 py-2 rounded-xl bg-blue-600 text-white text-xs font-bold hover:bg-blue-700 transition">
                    Reset Filter
                </button>
            </div>

        </div>
    </section>

    <!-- 🖼️ RICH ARTICLE DETAIL MODAL POPUP -->
    <div x-show="showModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-md" style="display: none;">
        <div @click.away="showModal = false" class="relative max-w-3xl w-full bg-white rounded-3xl p-6 md:p-8 shadow-2xl space-y-6 max-h-[90vh] overflow-y-auto">
            
            <!-- Modal Header -->
            <div class="flex justify-between items-start border-b border-slate-200 pb-4">
                <div class="space-y-1 pr-6">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-extrabold uppercase tracking-wider" x-text="modalData.categoryLabel"></span>
                        <span class="text-xs text-slate-400 font-semibold" x-text="modalData.date"></span>
                    </div>
                    <h3 class="text-xl md:text-2xl font-extrabold text-slate-900 leading-tight" x-text="modalData.title"></h3>
                    <p class="text-xs text-slate-500 font-semibold flex items-center gap-1.5">
                        <i class="fa-solid fa-user-pen text-blue-600"></i> Oleh <span x-text="modalData.author"></span>
                    </p>
                </div>
                <button @click="showModal = false" class="text-slate-400 hover:text-slate-700 text-2xl font-bold p-1 cursor-pointer">&times;</button>
            </div>

            <!-- Modal Body Content -->
            <div class="space-y-5">
                <div class="rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 max-h-80">
                    <img :src="modalData.thumbnail" :alt="modalData.title" class="w-full h-full object-cover rounded-xl mx-auto" onerror="this.src='<?= base_url('assets/rumah_bprs.jpg') ?>'">
                </div>

                <div class="text-slate-700 text-xs md:text-sm leading-relaxed whitespace-pre-line space-y-4 font-normal" x-text="modalData.content"></div>
            </div>

            <!-- Modal Action Footer -->
            <div class="pt-4 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                <span class="text-xs text-slate-500 flex items-center gap-1.5">
                    <i class="fa-solid fa-building-columns text-blue-600"></i> Publikasi Resmi BPRS Syariah Madinah Lamongan
                </span>
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <a :href="'<?= base_url('/berita/') ?>' + (modalData.slug || modalData.id)" class="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition shadow-md flex items-center justify-center gap-1.5">
                        Buka Halaman Penuh <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <button @click="showModal = false" class="px-4 py-2.5 rounded-xl bg-slate-100 text-slate-700 text-xs font-bold hover:bg-slate-200 transition cursor-pointer">
                        Tutup
                    </button>
                </div>
            </div>

        </div>
    </div>

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