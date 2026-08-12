<main class="w-full bg-slate-50 text-slate-900 font-sans min-h-screen" x-data="tabunganPage()">
    <!-- 🏢 EXECUTIVE HERO BANNER SECTION -->
    <section class="relative bg-gradient-to-b from-blue-50/80 via-white to-slate-50 text-slate-900 pt-28 pb-12 md:pt-36 md:pb-16 border-b border-slate-200 overflow-hidden">
        <!-- Soft Ambient Light Glows -->
        <div class="absolute top-0 right-1/4 w-[450px] h-[450px] bg-blue-200/30 blur-[130px] rounded-full pointer-events-none"></div>
        <div class="absolute bottom-0 left-1/3 w-[350px] h-[350px] bg-emerald-100/40 blur-[100px] rounded-full pointer-events-none"></div>

        <div class="container mx-auto max-w-7xl px-5 md:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs text-slate-500 mb-4">
                <a href="<?= base_url() ?>" class="hover:text-blue-700 transition">Home</a>
                <span>/</span>
                <span>Produk & Layanan</span>
                <span>/</span>
                <span class="text-blue-700 font-semibold">Tabungan Syariah</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-8 space-y-4">
                    <div class="inline-flex items-center gap-2 rounded-full bg-blue-100 border border-blue-200 px-4 py-1.5 text-xs font-bold text-blue-800 uppercase tracking-widest">
                        <i class="fa-solid fa-piggy-bank text-blue-600"></i> Simpanan Akad Mudharabah & Wadi'ah
                    </div>
                    <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
                        Tabungan Syariah BPRS Madinah
                    </h1>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed max-w-2xl">
                        Nikmati ketenangan menyimpan dana dengan prinsip syariah yang murni, bebas biaya administrasi bulanan, aman dijamin LPS, dan penuh keberkahan untuk setiap rencana hidup Anda.
                    </p>

                    <!-- Trust Highlights Strip -->
                    <div class="pt-2 flex flex-wrap items-center gap-4 text-xs font-bold text-slate-700">
                        <div class="flex items-center gap-2 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-sm">
                            <i class="fa-solid fa-shield-halved text-emerald-600 text-sm"></i>
                            <span>Dijamin LPS hingga Rp 2 Miliar</span>
                        </div>
                        <div class="flex items-center gap-2 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-sm">
                            <i class="fa-solid fa-building-columns text-blue-600 text-sm"></i>
                            <span>Diawasi Otoritas Jasa Keuangan (OJK)</span>
                        </div>
                        <div class="flex items-center gap-2 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-sm">
                            <i class="fa-solid fa-percent text-amber-500 text-sm"></i>
                            <span>Bebas Biaya Admin Bulanan</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Stat Badge Card -->
                <div class="lg:col-span-4 bg-gradient-to-br from-blue-900 via-blue-800 to-slate-900 rounded-3xl p-6 shadow-xl text-white space-y-4 border border-blue-700/50">
                    <div class="flex justify-between items-center border-b border-blue-700/60 pb-3">
                        <span class="text-xs font-bold uppercase tracking-wider text-blue-300">Ringkasan Layanan</span>
                        <span class="px-2.5 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-[10px] font-extrabold uppercase border border-emerald-400/30">Resmi OJK</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4 text-center">
                        <div class="p-3 bg-white/10 rounded-2xl backdrop-blur-sm border border-white/10">
                            <span class="block text-2xl font-black text-amber-300">9+</span>
                            <span class="text-[11px] text-blue-100 font-semibold">Produk Tabungan</span>
                        </div>
                        <div class="p-3 bg-white/10 rounded-2xl backdrop-blur-sm border border-white/10">
                            <span class="block text-2xl font-black text-emerald-300">Rp 1rb</span>
                            <span class="text-[11px] text-blue-100 font-semibold">Setoran Awal Min.</span>
                        </div>
                    </div>
                    <a href="https://wa.me/6281234567890?text=Halo%20BPRS%20Madinah,%20saya%20ingin%20konsultasi%20pembukaan%20Tabungan%20Syariah" target="_blank" class="w-full py-3 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-xs font-extrabold transition shadow-lg shadow-emerald-500/30 flex items-center justify-center gap-2 cursor-pointer">
                        <i class="fa-brands fa-whatsapp text-sm"></i> Buka Rekening via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 🔍 INTERACTIVE FILTER & SEARCH BAR SECTION -->
    <section class="py-8 bg-white border-b border-slate-200 shadow-sm sticky top-16 z-30">
        <div class="container mx-auto max-w-7xl px-5 md:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                
                <!-- Category Filters -->
                <div class="flex items-center gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0 no-scrollbar">
                    <button @click="selectedCategory = 'all'" :class="selectedCategory === 'all' ? 'bg-blue-600 text-white font-bold shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 font-semibold'" class="px-4 py-2 text-xs rounded-xl transition cursor-pointer shrink-0">
                        <i class="fa-solid fa-list-ul mr-1"></i> Semua Tabungan
                    </button>
                    <button @click="selectedCategory = 'umum'" :class="selectedCategory === 'umum' ? 'bg-blue-600 text-white font-bold shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 font-semibold'" class="px-4 py-2 text-xs rounded-xl transition cursor-pointer shrink-0">
                        <i class="fa-solid fa-wallet mr-1"></i> Tabungan Umum
                    </button>
                    <button @click="selectedCategory = 'ibadah'" :class="selectedCategory === 'ibadah' ? 'bg-blue-600 text-white font-bold shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 font-semibold'" class="px-4 py-2 text-xs rounded-xl transition cursor-pointer shrink-0">
                        <i class="fa-solid fa-kaaba mr-1 text-emerald-500"></i> Haji, Umroh & Qurban
                    </button>
                    <button @click="selectedCategory = 'pendidikan'" :class="selectedCategory === 'pendidikan' ? 'bg-blue-600 text-white font-bold shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 font-semibold'" class="px-4 py-2 text-xs rounded-xl transition cursor-pointer shrink-0">
                        <i class="fa-solid fa-graduation-cap mr-1"></i> Pendidikan & Pelajar
                    </button>
                    <button @click="selectedCategory = 'sosial'" :class="selectedCategory === 'sosial' ? 'bg-blue-600 text-white font-bold shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 font-semibold'" class="px-4 py-2 text-xs rounded-xl transition cursor-pointer shrink-0">
                        <i class="fa-solid fa-mosque mr-1 text-amber-500"></i> Kas Masjid & Sosial
                    </button>
                </div>

                <!-- Live Search Bar -->
                <div class="relative w-full md:w-72">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                    <input type="text" x-model="searchQuery" placeholder="Cari jenis tabungan..." class="w-full pl-9 pr-4 py-2 text-xs bg-slate-100 border border-slate-200 rounded-xl text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition shadow-inner">
                </div>
            </div>
        </div>
    </section>

    <!-- 📦 SAVINGS PRODUCTS GRID SECTION -->
    <section class="py-12 md:py-20">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 space-y-8">
            
            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <template x-for="prod in filteredProducts" :key="prod.id">
                    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl hover:border-blue-300 transition-all duration-300 flex flex-col justify-between overflow-hidden group">
                        
                        <!-- Card Header Image Thumbnail -->
                        <div class="relative h-56 bg-slate-100 overflow-hidden cursor-pointer" @click="openProductModal(prod)">
                            <img :src="prod.image" :alt="prod.title" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.src='<?= base_url('assets/produk/brosur_tabungan.webp') ?>'">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>
                            
                            <!-- Badges -->
                            <div class="absolute top-3 left-3 flex items-center gap-2">
                                <span class="px-3 py-1 rounded-full bg-blue-600/90 text-white text-[10px] font-extrabold shadow-md backdrop-blur-md uppercase tracking-wider" x-text="prod.acadLabel"></span>
                            </div>
                            <div class="absolute top-3 right-3">
                                <span class="px-2.5 py-1 rounded-full bg-amber-500/90 text-white text-[10px] font-bold shadow-md backdrop-blur-md" x-text="prod.badge"></span>
                            </div>

                            <!-- Bottom Title inside Overlay -->
                            <div class="absolute bottom-3 left-4 right-4">
                                <h3 class="text-xl font-extrabold text-white group-hover:text-blue-200 transition-colors drop-shadow-md" x-text="prod.title"></h3>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 space-y-4 flex-1 flex flex-col justify-between">
                            <p class="text-slate-600 text-xs sm:text-base leading-relaxed line-clamp-3" x-text="prod.desc"></p>

                            <!-- Key Highlights Bullets -->
                            <div class="space-y-2 border-t border-slate-100 pt-3">
                                <template x-for="(ben, idx) in prod.benefit.slice(0, 3)" :key="idx">
                                    <div class="flex items-center gap-2 text-xs font-semibold text-slate-700">
                                        <i class="fa-solid fa-circle-check text-emerald-500 text-sm"></i>
                                        <span x-text="ben"></span>
                                    </div>
                                </template>
                            </div>

                            <!-- Action Footer Buttons -->
                            <div class="pt-4 border-t border-slate-100 grid grid-cols-2 gap-3">
                                <button @click="openProductModal(prod)" class="w-full py-2.5 px-3 rounded-xl bg-slate-100 hover:bg-blue-50 text-blue-700 hover:text-blue-800 text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer">
                                    <i class="fa-solid fa-circle-info"></i> Detail Syarat
                                </button>
                                <a :href="'https://wa.me/6281234567890?text=Halo%20BPRS%20Madinah,%20saya%20berminat%20membuka%20' + encodeURIComponent(prod.title)" target="_blank" class="w-full py-2.5 px-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition shadow-sm flex items-center justify-center gap-1.5 cursor-pointer">
                                    <i class="fa-brands fa-whatsapp text-sm"></i> Buka WA
                                </a>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Empty State -->
            <div x-show="filteredProducts.length === 0" class="text-center py-16 bg-white rounded-3xl border border-slate-200 p-8 space-y-3">
                <i class="fa-solid fa-folder-open text-4xl text-slate-300"></i>
                <h4 class="text-base font-bold text-slate-800">Tidak ada produk tabungan yang cocok</h4>
                <p class="text-xs text-slate-500">Coba ubah kata kunci pencarian atau pilih kategori tabungan lainnya.</p>
                <button @click="searchQuery = ''; selectedCategory = 'all'" class="px-4 py-2 rounded-xl bg-blue-600 text-white text-xs font-bold hover:bg-blue-700 transition">
                    Reset Filter
                </button>
            </div>

        </div>
    </section>

    <!-- 🖼️ RICH EXECUTIVE DETAIL MODAL -->
    <div x-show="showModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-md" style="display: none;">
        <div @click.away="showModal = false" class="relative max-w-4xl w-full bg-white rounded-3xl p-6 md:p-8 shadow-2xl space-y-6 max-h-[90vh] overflow-y-auto">
            
            <!-- Modal Header -->
            <div class="flex justify-between items-start border-b border-slate-200 pb-4">
                <div class="space-y-1">
                    <span class="inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-extrabold uppercase tracking-wider" x-text="modalData.acadLabel"></span>
                    <h3 class="text-2xl font-extrabold text-slate-900" x-text="modalData.title"></h3>
                </div>
                <button @click="showModal = false" class="text-slate-400 hover:text-slate-700 text-2xl font-bold p-1">&times;</button>
            </div>

            <!-- Modal Content Grid -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                <!-- Left Brochure Preview -->
                <div class="md:col-span-5 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 shadow-inner">
                    <img :src="modalData.image" :alt="modalData.title" class="w-full h-auto object-cover rounded-xl" onerror="this.src='<?= base_url('assets/produk/brosur_tabungan.webp') ?>'">
                </div>

                <!-- Right Detail Specifications -->
                <div class="md:col-span-7 space-y-5">
                    <!-- Description -->
                    <div class="space-y-1.5">
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest">Deskripsi Produk</h4>
                        <p class="text-sm text-slate-700 leading-relaxed" x-text="modalData.desc"></p>
                    </div>

                    <!-- Benefits Card -->
                    <div class="bg-blue-50/70 border border-blue-200 rounded-2xl p-4 space-y-2">
                        <h4 class="text-xs font-bold text-blue-900 uppercase tracking-widest flex items-center gap-1.5">
                            <i class="fa-solid fa-star text-amber-500"></i> Keunggulan & Manfaat Nasabah
                        </h4>
                        <ul class="space-y-2 text-xs font-semibold text-slate-800">
                            <template x-for="item in modalData.benefit" :key="item">
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-circle-check text-emerald-600 mt-0.5 shrink-0"></i>
                                    <span x-text="item"></span>
                                </li>
                            </template>
                        </ul>
                    </div>

                    <!-- Requirements Card -->
                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 space-y-2">
                        <h4 class="text-xs font-bold text-slate-900 uppercase tracking-widest flex items-center gap-1.5">
                            <i class="fa-solid fa-clipboard-list text-blue-600"></i> Persyaratan Pembukaan Rekening
                        </h4>
                        <ul class="space-y-2 text-xs font-medium text-slate-700">
                            <template x-for="item in modalData.features" :key="item">
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-check text-blue-600 mt-0.5 shrink-0"></i>
                                    <span x-text="item"></span>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Modal Action Footer -->
            <div class="pt-4 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                <span class="text-xs text-slate-500 flex items-center gap-1.5">
                    <i class="fa-solid fa-shield-halved text-emerald-600"></i> Simpanan dijamin LPS & diawasi OJK
                </span>
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <button @click="showModal = false" class="px-5 py-2.5 rounded-xl bg-slate-100 text-slate-700 text-xs font-bold hover:bg-slate-200 transition">
                        Tutup
                    </button>
                    <a :href="'https://wa.me/6281234567890?text=Halo%20BPRS%20Madinah,%20saya%20berminat%20membuka%20' + encodeURIComponent(modalData.title)" target="_blank" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition shadow-md flex items-center justify-center gap-2">
                        <i class="fa-brands fa-whatsapp text-sm"></i> Buka Rekening via WhatsApp
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- 🔗 POJK COMPLIANCE & QUICK NAVIGATION FOOTER BANNER -->
    <section class="py-12 bg-slate-100 border-t border-slate-200">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 text-center space-y-6">
            <h3 class="text-xl font-bold text-slate-900">Produk & Layanan Perbankan Lainnya</h3>
            <div class="flex flex-wrap justify-center items-center gap-4">
                <a href="<?= base_url('/deposito') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-vault text-blue-600"></i> Deposito Syariah
                </a>
                <a href="<?= base_url('/pembiayaan') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-hand-holding-dollar text-emerald-600"></i> Pembiayaan Syariah
                </a>
                <a href="<?= base_url('/hubungi_kami') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-headset text-amber-500"></i> Layanan Nasabah
                </a>
            </div>
        </div>
    </section>
</main>

<script>
    function tabunganPage() {
        return {
            searchQuery: '',
            selectedCategory: 'all',
            showModal: false,
            modalData: {
                title: '',
                acad: '',
                desc: '',
                features: [],
                benefit: [],
                image: ''
            },
            products: [
                {
                    id: 'sibarkah',
                    title: 'Tabungan SIBARKAH',
                    category: 'umum',
                    acad: 'Mudharabah',
                    acadLabel: 'Akad Mudharabah Mutlaqah',
                    desc: 'Tabungan Sibarkah adalah tabungan yang dijalankan dengan prinsip akad mudharabah, di mana nasabah (shohibul mal) berhak mendapat bagi hasil dari pihak bank (mudharib) sesuai dengan nisbah yang telah disepakati bersama.',
                    features: ['Fotocopy KTP / Identitas Diri Asli', 'Fotocopy NPWP (jika ada)', 'Mengisi Formulir Pembukaan Rekening BPRS Madinah'],
                    benefit: ['Dana dapat ditarik sewaktu-waktu', 'Nasabah berhak mendapat bagi hasil setiap bulan', 'Setoran awal sangat ringan (mulai Rp 10.000)', 'Bebas biaya administrasi bulanan'],
                    image: '<?= base_url('assets/produk/tabungan_sibarkah.png') ?>',
                    badge: 'Bagi Hasil Bulanan'
                },
                {
                    id: 'qordiyu',
                    title: 'Tabungan QORDIYU',
                    category: 'umum',
                    acad: 'Wadi\'ah',
                    acadLabel: 'Akad Wadi\'ah Yad Adh-Dhamanah',
                    desc: 'Tabungan Qordiyu merupakan simpanan dengan prinsip wadi’ah yad adh-dhamanah, di mana bank mengelola dana nasabah dan nasabah dapat mengambil dananya kapan saja secara utuh.',
                    features: ['Fotocopy KTP / Identitas Diri Asli', 'Fotocopy NPWP (jika ada)', 'Mengisi Formulir Pembukaan Rekening BPRS Madinah'],
                    benefit: ['Dana dapat ditarik sewaktu-waktu', 'Setoran awal sangat ringan', 'Bebas biaya administrasi bulanan', 'Potensi pemberian bonus sesuai kebijakan bank'],
                    image: '<?= base_url('assets/produk/tabungan_qordiyu.png') ?>',
                    badge: 'Tarik Kapan Saja'
                },
                {
                    id: 'haji',
                    title: 'Tabungan Al-Madinah (Haji)',
                    category: 'ibadah',
                    acad: 'Wadi\'ah',
                    acadLabel: 'Akad Wadi\'ah Yad Adh-Dhamanah',
                    desc: 'Tabungan Al-Madinah diperuntukkan khusus bagi masyarakat yang merencanakan pendaftaran dan keberangkatan ibadah haji secara aman terencana.',
                    features: ['Fotocopy KTP / Identitas Diri Asli', 'Fotocopy NPWP (jika ada)', 'Mengisi Formulir Pembukaan Rekening BPRS Madinah'],
                    benefit: ['Setoran awal ringan (mulai Rp 50.000)', 'Bebas biaya administrasi bulanan', 'Integrasi kemudahan pendaftaran porsi haji'],
                    image: '<?= base_url('assets/produk/tabungan_haji.png') ?>',
                    badge: 'Rencana Ibadah Haji'
                },
                {
                    id: 'qurban',
                    title: 'Tabungan Qurban',
                    category: 'ibadah',
                    acad: 'Wadi\'ah',
                    acadLabel: 'Akad Wadi\'ah Yad Adh-Dhamanah',
                    desc: 'Tabungan Qurban membantu masyarakat menyisihkan dana secara konsisten untuk pembelian hewan kurban pada Hari Raya Idul Adha.',
                    features: ['Fotocopy KTP / Identitas Diri Asli', 'Fotocopy NPWP (jika ada)', 'Mengisi Formulir Pembukaan Rekening BPRS Madinah'],
                    benefit: ['Setoran terjangkau dan berkala', 'Bebas biaya administrasi bulanan', 'Pencairan tepat waktu menjelang Idul Adha'],
                    image: '<?= base_url('assets/produk/tabungan_qurban.png') ?>',
                    badge: 'Rencana Kurban'
                },
                {
                    id: 'tarbiyah',
                    title: 'Tabungan Tarbiyah',
                    category: 'pendidikan',
                    acad: 'Wadi\'ah',
                    acadLabel: 'Akad Wadi\'ah Yad Adh-Dhamanah',
                    desc: 'Tabungan Tarbiyah dirancang khusus untuk membantu para orang tua menyimpan dan mempersiapkan dana pendidikan putra-putri di masa depan.',
                    features: ['Fotocopy KTP / Identitas Diri Orang Tua', 'Fotocopy Akta Kelahiran Anak / KK', 'Mengisi Formulir Pembukaan Rekening'],
                    benefit: ['Membantu kedisiplinan dana pendidikan', 'Setoran sangat ringan & terjangkau', 'Bebas biaya administrasi bulanan'],
                    image: '<?= base_url('assets/produk/tabungan_tarbiyah.png') ?>',
                    badge: 'Dana Pendidikan'
                },
                {
                    id: 'arofah',
                    title: 'Tabungan Arofah (Umroh)',
                    category: 'ibadah',
                    acad: 'Wadi\'ah',
                    acadLabel: 'Akad Wadi\'ah Yad Adh-Dhamanah',
                    desc: 'Tabungan Arofah adalah solusi perencanaan dana bagi masyarakat yang mendambakan perjalanan ibadah umrah ke Tanah Suci.',
                    features: ['Fotocopy KTP / Identitas Diri Asli', 'Fotocopy NPWP (jika ada)', 'Mengisi Formulir Pembukaan Rekening BPRS Madinah'],
                    benefit: ['Setoran fleksibel sesuai kemampuan', 'Bebas biaya administrasi bulanan', 'Pendampingan konsultasi rencana umrah'],
                    image: '<?= base_url('assets/produk/tabungan_umroh.png') ?>',
                    badge: 'Rencana Umroh'
                },
                {
                    id: 'simpel',
                    title: 'Tabungan SimPel iB',
                    category: 'pendidikan',
                    acad: 'Wadi\'ah',
                    acadLabel: 'Akad Wadi\'ah Yad Adh-Dhamanah',
                    desc: 'Tabungan Simpanan Pelajar (SimPel iB) diperuntukkan bagi siswa/pelajar guna membangun budaya menabung sejak dini dengan syarat yang sangat mudah.',
                    features: ['Kerjasama MoU Sekolah dengan BPRS Madinah', 'Fotocopy Kartu Pelajar / Akta Lahir', 'Fotocopy KTP Orang Tua & Kartu Keluarga', 'Formulir Pembukaan Rekening SimPel iB'],
                    benefit: ['Setoran awal super ringan (mulai Rp 1.000)', 'Bebas biaya administrasi bulanan', 'Berkesempatan mendapatkan gimmick / hadiah menarik'],
                    image: '<?= base_url('assets/produk/tabungan_simpel.png') ?>',
                    badge: 'Khusus Pelajar'
                },
                {
                    id: 'walimah',
                    title: 'Tabungan Walimah',
                    category: 'umum',
                    acad: 'Wadi\'ah',
                    acadLabel: 'Akad Wadi\'ah Yad Adh-Dhamanah',
                    desc: 'Tabungan Walimah diciptakan bagi masyarakat yang ingin menyisihkan sebagian dana untuk hajatan resepsi nikah atau hajat besar keluarga di masa depan.',
                    features: ['Fotocopy KTP / Identitas Diri Asli', 'Fotocopy NPWP (jika ada)', 'Mengisi Formulir Pembukaan Rekening BPRS Madinah'],
                    benefit: ['Setoran terencana dan fleksibel', 'Bebas biaya administrasi bulanan', 'Aman dan siap dicairkan saat hajatan'],
                    image: '<?= base_url('assets/produk/tabungan_walimah.png') ?>',
                    badge: 'Rencana Hajat'
                },
                {
                    id: 'sibermas',
                    title: 'Tabungan Sibermas',
                    category: 'sosial',
                    acad: 'Wadi\'ah',
                    acadLabel: 'Akad Wadi\'ah Yad Adh-Dhamanah',
                    desc: 'Tabungan Sibermas merupakan wujud sinergi BPRS Madinah dengan takmir masjid di Kabupaten Lamongan untuk pengelolaan dana kas masjid secara profesional dan amanah.',
                    features: ['Surat Keputusan (SK) Pengurus Takmir Masjid', 'Fotocopy KTP Pengurus (Ketua & Bendahara)', 'Mengisi Formulir Pembukaan Rekening Instansi'],
                    benefit: ['Pengelolaan kas masjid akuntabel & syariah', 'Bebas biaya administrasi bulanan', 'Laporan transaksi kas berkala transparan'],
                    image: '<?= base_url('assets/produk/tabungan_sibermas.png') ?>',
                    badge: 'Kas Masjid & Sosial'
                }
            ],

            get filteredProducts() {
                return this.products.filter(p => {
                    const matchSearch = p.title.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                        p.desc.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                        p.acadLabel.toLowerCase().includes(this.searchQuery.toLowerCase());
                    const matchCat = this.selectedCategory === 'all' || p.category === this.selectedCategory;
                    return matchSearch && matchCat;
                });
            },

            openProductModal(prod) {
                this.modalData = prod;
                this.showModal = true;
            }
        };
    }
</script>
