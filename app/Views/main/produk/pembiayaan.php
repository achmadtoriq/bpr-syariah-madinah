<main class="w-full bg-slate-50 text-slate-900 font-sans min-h-screen" x-data="{
    plafon: 25000000,
    tenor: 24,
    searchQuery: '',
    selectedCategory: 'all',
    showModal: false,
    modalData: {},
    formatRupiah(val) {
        return 'Rp ' + Number(val).toLocaleString('id-ID');
    },
    formatNumberInput(num) {
        if (!num && num !== 0) return '';
        return num.toString().replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    get marginRate() {
        if (this.tenor <= 12) return 0.085; // 8.5% p.a equivalent
        if (this.tenor <= 24) return 0.090; // 9.0% p.a equivalent
        if (this.tenor <= 36) return 0.095; // 9.5% p.a equivalent
        return 0.100;                       // 10.0% p.a equivalent
    },
    get monthlyInstallment() {
        const totalProfit = this.plafon * (this.marginRate * (this.tenor / 12));
        return Math.round((this.plafon + totalProfit) / this.tenor);
    },
    products: [
        {
            id: 'murabahah',
            title: 'Pembiayaan Murabahah',
            category: 'jualbeli',
            acad: 'Murabahah',
            acadLabel: 'Akad Jual Beli (Murabahah)',
            desc: 'Pembiayaan Murabahah adalah pembiayaan berbasis sistem jual beli di mana BPRS Madinah membiayai pembeliaan barang modal usaha atau kebutuhan konsumtif dengan margin keuntungan transparan yang disepakati bersama.',
            custom: {
                'Perorangan': {
                    'Syarat & Ketentuan': [
                        'Fotocopy KTP Suami & Istri (Identitas Asli)',
                        'Fotocopy Kartu Keluarga (KK) & Surat Nikah',
                        'Fotocopy jaminan/agunan (BPKB / SHM Land)',
                        'Gesek nomor rangka & mesin (jika agunan BPKB) / SPPT PBB (jika SHM)'
                    ],
                    'Keunggulan': [
                        'Dapat digunakan untuk modal kerja, pembelian kendaraan, renovasi rumah, serta tambahan tanah/rumah',
                        'Bebas biaya provisi dan pinalti serta dilindungi asuransi jiwa syariah',
                        'Angsuran bersifat tetap hingga akhir masa pembiayaan',
                        'Tersedia pilihan skema angsuran musiman/panen'
                    ]
                },
                'Lembaga / Instansi': {
                    'Syarat & Ketentuan': [
                        'Fotocopy KTP Pengurus / Penanggung Jawab',
                        'Fotocopy KK & Surat Nikah Pengurus',
                        'Fotocopy SK Pendirian Lembaga / Instansi & Agunan Legal'
                    ],
                    'Keunggulan': [
                        'Pembiayaan pengadaan aset lembaga, renovasi gedung, kendaraan operasional, dll',
                        'Bebas biaya provisi dan pinalti serta berasuransi jiwa',
                        'Angsuran tetap dan terstruktur transparan'
                    ]
                }
            },
            badge: 'Paling Populer',
            image: '<?= base_url('assets/produk/pembiayaan_murabahah.webp') ?>'
        },
        {
            id: 'musyarokah',
            title: 'Pembiayaan Musyarokah',
            category: 'bagihasil',
            acad: 'Musyarokah',
            acadLabel: 'Akad Kemitraan (Musyarokah)',
            desc: 'Pembiayaan Musyarokah merupakan akad kerja sama penggabungan modal antara nasabah dan BPRS Madinah untuk mengelola suatu usaha bersama, dengan nisbah bagi hasil yang disepakati bersama.',
            ketentuan: [
                'Fotocopy KTP Suami & Istri',
                'Fotocopy KK & Surat Nikah',
                'Jangka waktu pembiayaan fleksibel (maksimal 6 bulan, dapat diperpanjang)',
                'Agunan resmi berupa BPKB Kendaraan atau Sertifikat SHM'
            ],
            benefit: [
                'Ideal untuk pembiayaan proyek atau modal usaha bergulir',
                'Bagi hasil disesuaikan dengan keuntungan riil usaha',
                'Dukungan kemitraan usaha yang transparan dan amanah'
            ],
            badge: 'Bagi Hasil Kemitraan',
            image: '<?= base_url('assets/produk/pembiayaan_musyarokah.webp') ?>'
        },
        {
            id: 'mudharabah',
            title: 'Pembiayaan Mudharabah',
            category: 'bagihasil',
            acad: 'Mudharabah',
            acadLabel: 'Akad Bagi Hasil Usaha (Mudharabah)',
            desc: 'Pembiayaan Mudharabah merupakan akad pembiayaan di mana BPRS Madinah menyediakan 100% modal usaha dan nasabah bertindak sebagai pengelola usaha secara profesional.',
            ketentuan: [
                'Fotocopy KTP Suami & Istri',
                'Fotocopy KK & Surat Nikah',
                'Proposal rencana usaha & kelayakan bisnis',
                'Agunan pendukung berupa BPKB atau SHM'
            ],
            benefit: [
                'Solusi bagi pengusaha potensial yang membutuhkan modal usaha utuh',
                'Bagi hasil proporsional sesuai hasil operasional bisnis',
                'Pendampingan tata kelola keuangan usaha'
            ],
            badge: '100% Modal Usaha',
            image: '<?= base_url('assets/produk/pembiayaan_mudharabah.webp') ?>'
        },
        {
            id: 'ijaroh',
            title: 'Pembiayaan Ijaroh',
            category: 'sewa',
            acad: 'Ijaroh',
            acadLabel: 'Akad Sewa Menyewa (Ijaroh)',
            desc: 'Pembiayaan Ijaroh adalah pembiayaan berbasis sewa menyewa barang atau jasa antara BPRS Madinah dan Nasabah untuk memanfaatkan manfaat suatu barang/jasa dalam jangka waktu tertentu.',
            ketentuan: [
                'Fotocopy KTP Suami & Istri',
                'Fotocopy KK & Surat Nikah',
                'Bukti tagihan/kebutuhan sewa barang atau jasa (pendidikan, sewa, renovasi, kesehatan)',
                'Agunan pendukung berupa BPKB atau SHM'
            ],
            benefit: [
                'Sangat cocok untuk biaya sewa tempat usaha, biaya pendidikan, kesehatan, & sewa barang',
                'Sewa tetap dan terjangkau setiap bulan',
                'Proses cepat dan transparan tanpa riba'
            ],
            badge: 'Sewa Barang & Jasa',
            image: '<?= base_url('assets/produk/pembiayaan_ijaroh.webp') ?>'
        }
    ],
    openProductModal(prod) {
        this.modalData = prod;
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
                <span>Produk & Layanan</span>
                <span>/</span>
                <span class="text-blue-700 font-semibold">Pembiayaan Syariah</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-8 space-y-4">
                    <div class="inline-flex items-center gap-2 rounded-full bg-blue-100 border border-blue-200 px-4 py-1.5 text-xs font-bold text-blue-800 uppercase tracking-widest">
                        <i class="fa-solid fa-hand-holding-dollar text-blue-600"></i> Akad Murabahah, Musyarokah & Ijaroh
                    </div>
                    <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
                        Pembiayaan Syariah BPRS Madinah
                    </h1>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed max-w-2xl">
                        Solusi permodalan usaha, investasi bisnis, dan kebutuhan keluarga dengan prinsip syariah yang murni, angsuran tetap, bebas biaya provisi & pinalti, serta dilindungi asuransi jiwa syariah.
                    </p>

                    <!-- Trust Highlights Strip -->
                    <div class="pt-2 flex flex-wrap items-center gap-4 text-xs font-bold text-slate-700">
                        <div class="flex items-center gap-2 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-sm">
                            <i class="fa-solid fa-shield-halved text-emerald-600 text-sm"></i>
                            <span>Bebas Biaya Provisi & Pinalti*</span>
                        </div>
                        <div class="flex items-center gap-2 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-sm">
                            <i class="fa-solid fa-heart-pulse text-blue-600 text-sm"></i>
                            <span>Berasuransi Jiwa Syariah</span>
                        </div>
                        <div class="flex items-center gap-2 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-sm">
                            <i class="fa-solid fa-wheat-awn text-amber-500 text-sm"></i>
                            <span>Opsi Angsuran Musiman/Panen</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Action Card -->
                <div class="lg:col-span-4 bg-gradient-to-br from-blue-900 via-blue-800 to-slate-900 rounded-3xl p-6 shadow-xl text-white space-y-4 border border-blue-700/50">
                    <div class="flex justify-between items-center border-b border-blue-700/60 pb-3">
                        <span class="text-xs font-bold uppercase tracking-wider text-blue-300">Pengajuan Cepat</span>
                        <span class="px-2.5 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-[10px] font-extrabold uppercase border border-emerald-400/30">Proses Cepat</span>
                    </div>
                    <div class="space-y-2 text-xs text-blue-100">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-check text-emerald-400"></i>
                            <span>Angsuran tetap hingga lunas</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-check text-emerald-400"></i>
                            <span>Agunan SHM / BPKB Kendaraan</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-check text-emerald-400"></i>
                            <span>Skema perorangan & instansi/lembaga</span>
                        </div>
                    </div>
                    <a href="https://wa.me/6281234567890?text=Halo%20BPRS%20Madinah,%20saya%20ingin%20konsultasi%20pengajuan%20Pembiayaan%20Syariah" target="_blank" class="w-full py-3.5 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-xs font-extrabold transition shadow-lg shadow-emerald-500/30 flex items-center justify-center gap-2 cursor-pointer">
                        <i class="fa-brands fa-whatsapp text-base"></i> Konsultasi Pembiayaan via WA
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 🧮 INTERACTIVE INSTALLMENT SIMULATOR SECTION -->
    <section class="py-12 md:py-16 bg-white border-b border-slate-200 shadow-sm">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 space-y-8">
            <div class="text-center max-w-2xl mx-auto space-y-2">
                <span class="inline-block rounded-full bg-blue-100 border border-blue-200 px-4 py-1 text-xs font-bold text-blue-800 uppercase tracking-widest">
                    <i class="fa-solid fa-calculator mr-1"></i> Simulasi Angsuran
                </span>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900">Kalkulator Simulasi Pembiayaan</h2>
                <p class="text-slate-600 text-xs sm:text-sm">
                    Simulasikan estimasi angsuran bulanan pembiayaan Anda secara transparan sebelum mengajukan permohonan.
                </p>
            </div>

            <div class="max-w-4xl mx-auto bg-slate-50 rounded-3xl border border-slate-200/90 p-6 md:p-10 shadow-lg grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                
                <!-- Inputs Left -->
                <div class="md:col-span-7 space-y-6">
                        <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-2 mb-1">
                            <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">Plafon Pembiayaan</label>
                            <div class="relative w-full sm:w-56">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-700 font-bold text-xs">Rp</span>
                                <input type="text" inputmode="numeric" pattern="[0-9]*" :value="formatNumberInput(plafon)" @input="let val = $event.target.value.replace(/\D/g, ''); plafon = val ? parseInt(val, 10) : 0; $event.target.value = formatNumberInput(plafon)" class="w-full bg-white border border-slate-300 focus:border-blue-600 rounded-xl pl-9 pr-3 py-1.5 text-blue-700 font-extrabold text-sm focus:outline-none transition shadow-sm text-right">
                            </div>
                        </div>
                        <input type="range" min="5000000" max="250000000" step="5000000" x-model.number="plafon" class="w-full h-2.5 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-blue-600">
                        <div class="flex justify-between text-[10px] font-bold text-slate-400">
                            <span>Min. Rp 5 Juta</span>
                            <span>Rp 100 Juta</span>
                            <span>Rp 250 Juta</span>
                        </div>
                    </div>

                    <!-- Preset Plafon Pills -->
                    <div class="flex flex-wrap gap-2">
                        <button @click="plafon = 10000000" :class="plafon === 10000000 ? 'bg-blue-600 text-white font-bold' : 'bg-white text-slate-700 hover:bg-slate-200 border border-slate-200 font-semibold'" class="px-3 py-1.5 text-xs rounded-xl transition cursor-pointer">
                            Rp 10 Juta
                        </button>
                        <button @click="plafon = 25000000" :class="plafon === 25000000 ? 'bg-blue-600 text-white font-bold' : 'bg-white text-slate-700 hover:bg-slate-200 border border-slate-200 font-semibold'" class="px-3 py-1.5 text-xs rounded-xl transition cursor-pointer">
                            Rp 25 Juta
                        </button>
                        <button @click="plafon = 50000000" :class="plafon === 50000000 ? 'bg-blue-600 text-white font-bold' : 'bg-white text-slate-700 hover:bg-slate-200 border border-slate-200 font-semibold'" class="px-3 py-1.5 text-xs rounded-xl transition cursor-pointer">
                            Rp 50 Juta
                        </button>
                        <button @click="plafon = 100000000" :class="plafon === 100000000 ? 'bg-blue-600 text-white font-bold' : 'bg-white text-slate-700 hover:bg-slate-200 border border-slate-200 font-semibold'" class="px-3 py-1.5 text-xs rounded-xl transition cursor-pointer">
                            Rp 100 Juta
                        </button>
                    </div>

                    <!-- Tenor Selection Buttons -->
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">Jangka Waktu (Tenor)</label>
                        <div class="grid grid-cols-4 gap-3">
                            <button @click="tenor = 12" :class="tenor === 12 ? 'bg-blue-600 text-white font-bold border-blue-600 shadow-md' : 'bg-white text-slate-700 border-slate-200 hover:border-blue-400 font-semibold'" class="py-2.5 px-2 text-xs rounded-2xl border text-center transition cursor-pointer">
                                12 Bulan
                            </button>
                            <button @click="tenor = 24" :class="tenor === 24 ? 'bg-blue-600 text-white font-bold border-blue-600 shadow-md' : 'bg-white text-slate-700 border-slate-200 hover:border-blue-400 font-semibold'" class="py-2.5 px-2 text-xs rounded-2xl border text-center transition cursor-pointer">
                                24 Bulan
                            </button>
                            <button @click="tenor = 36" :class="tenor === 36 ? 'bg-blue-600 text-white font-bold border-blue-600 shadow-md' : 'bg-white text-slate-700 border-slate-200 hover:border-blue-400 font-semibold'" class="py-2.5 px-2 text-xs rounded-2xl border text-center transition cursor-pointer">
                                36 Bulan
                            </button>
                            <button @click="tenor = 48" :class="tenor === 48 ? 'bg-blue-600 text-white font-bold border-blue-600 shadow-md' : 'bg-white text-slate-700 border-slate-200 hover:border-blue-400 font-semibold'" class="py-2.5 px-2 text-xs rounded-2xl border text-center transition cursor-pointer">
                                48 Bulan
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Simulation Output Box Right -->
                <div class="md:col-span-5 bg-gradient-to-br from-blue-900 via-blue-800 to-slate-900 rounded-3xl p-6 shadow-xl text-white space-y-6 border border-blue-700">
                    <div class="border-b border-blue-700/60 pb-3 flex justify-between items-center">
                        <span class="text-xs font-bold uppercase tracking-wider text-blue-300">Estimasi Angsuran</span>
                        <span class="px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-300 text-[10px] font-bold">Angsuran Tetap</span>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <span class="text-xs text-blue-200 block">Estimasi Angsuran Per Bulan</span>
                            <span class="text-2xl font-black text-amber-300" x-text="formatRupiah(monthlyInstallment)"></span>
                            <span class="text-[10px] text-blue-300 block mt-0.5">*Angsuran bersifat tetap tidak berubah hingga lunas</span>
                        </div>

                        <div class="border-t border-blue-700/50 pt-3 flex justify-between items-center text-xs">
                            <span class="text-blue-200">Tenor Terpilih:</span>
                            <span class="font-bold text-white"><span x-text="tenor"></span> Bulan</span>
                        </div>
                    </div>

                    <a :href="'https://wa.me/6281234567890?text=Halo%20BPRS%20Madinah,%20saya%20tertarik%20mengajukan%20pembiayaan%20plafon%20' + encodeURIComponent(formatRupiah(plafon)) + '%20tenor%20' + tenor + '%20bulan.'" target="_blank" class="w-full py-3 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-xs font-extrabold transition shadow-lg shadow-emerald-500/30 flex items-center justify-center gap-2 cursor-pointer">
                        <i class="fa-brands fa-whatsapp text-base"></i> Ajukan Pembiayaan Ini via WA
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- 📦 FINANCING PRODUCTS GRID SECTION -->
    <section class="py-12 md:py-20">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 space-y-10">
            <div class="text-center max-w-2xl mx-auto space-y-2">
                <span class="inline-block rounded-full bg-blue-100 border border-blue-200 px-4 py-1 text-xs font-bold text-blue-800 uppercase tracking-widest">
                    <i class="fa-solid fa-layer-group mr-1"></i> Produk Akad Syariah
                </span>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900">Skema Pembiayaan Syariah</h2>
                <p class="text-slate-600 text-xs sm:text-sm">
                    Pilih skema akad pembiayaan yang sesuai dengan kebutuhan usaha, permodalan, maupun konsumtif Anda.
                </p>
            </div>

            <!-- 4 Core Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                <template x-for="prod in products" :key="prod.id">
                    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl hover:border-blue-400 transition-all duration-300 flex flex-col justify-between overflow-hidden group">
                        
                        <!-- Thumbnail Header -->
                        <div class="relative h-52 bg-slate-100 overflow-hidden cursor-pointer" @click="openProductModal(prod)">
                            <img :src="prod.image" :alt="prod.title" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.src='<?= base_url('assets/produk/brosur_1.jpeg') ?>'">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/75 via-transparent to-transparent"></div>

                            <!-- Badges -->
                            <div class="absolute top-3 left-3">
                                <span class="px-2.5 py-1 rounded-full bg-blue-600 text-white text-[10px] font-extrabold uppercase shadow-md" x-text="prod.acad"></span>
                            </div>
                            <div class="absolute top-3 right-3">
                                <span class="px-2.5 py-1 rounded-full bg-amber-500 text-white text-[10px] font-bold shadow-md" x-text="prod.badge"></span>
                            </div>

                            <div class="absolute bottom-3 left-4 right-4">
                                <h3 class="text-lg font-extrabold text-white group-hover:text-blue-200 transition-colors drop-shadow-md" x-text="prod.title"></h3>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-5 space-y-4 flex-1 flex flex-col justify-between">
                            <p class="text-slate-600 text-xs leading-relaxed line-clamp-3" x-text="prod.desc"></p>

                            <!-- Key Highlights Bullets -->
                            <div class="space-y-2 border-t border-slate-100 pt-3 text-xs font-semibold text-slate-700">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-circle-check text-emerald-500 text-sm"></i>
                                    <span>Angsuran Tetap Hingga Lunas</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-circle-check text-emerald-500 text-sm"></i>
                                    <span>Bebas Biaya Provisi & Pinalti</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-circle-check text-emerald-500 text-sm"></i>
                                    <span>Dilengkapi Asuransi Jiwa</span>
                                </div>
                            </div>

                            <!-- Footer Buttons -->
                            <div class="pt-3 border-t border-slate-100 grid grid-cols-2 gap-2">
                                <button @click="openProductModal(prod)" class="w-full py-2.5 rounded-xl bg-slate-100 hover:bg-blue-50 text-blue-700 text-xs font-bold transition flex items-center justify-center gap-1 cursor-pointer">
                                    <i class="fa-solid fa-circle-info"></i> Detail
                                </button>
                                <a :href="'https://wa.me/6281234567890?text=Halo%20BPRS%20Madinah,%20saya%20ingin%20mengajukan%20' + encodeURIComponent(prod.title)" target="_blank" class="w-full py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition shadow-sm flex items-center justify-center gap-1 cursor-pointer">
                                    <i class="fa-brands fa-whatsapp"></i> Ajukan
                                </a>
                            </div>
                        </div>

                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- 🔄 STEP-BY-STEP APPLICATION FLOW SECTION -->
    <section class="py-12 md:py-20 bg-slate-100 border-t border-slate-200">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 space-y-10">
            <div class="text-center max-w-2xl mx-auto space-y-2">
                <span class="inline-block rounded-full bg-blue-100 border border-blue-200 px-4 py-1 text-xs font-bold text-blue-800 uppercase tracking-widest">
                    <i class="fa-solid fa-list-check mr-1"></i> Alur Permohonan
                </span>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900">4 Langkah Mudah Pengajuan Pembiayaan</h2>
                <p class="text-slate-600 text-xs sm:text-sm">
                    Proses pengajuan pembiayaan yang transparan, cepat, dan sesuai dengan ketentuan prinsip perbankan syariah.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm space-y-3 relative">
                    <div class="w-10 h-10 rounded-xl bg-blue-600 text-white font-black flex items-center justify-center text-sm">
                        01
                    </div>
                    <h3 class="font-extrabold text-slate-900 text-base">Konsultasi Kebutuhan</h3>
                    <p class="text-slate-600 text-xs leading-relaxed">
                        Sampaikan kebutuhan dana usaha atau konsumtif Anda kepada Account Officer (AO) BPRS Madinah.
                    </p>
                </div>

                <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm space-y-3 relative">
                    <div class="w-10 h-10 rounded-xl bg-blue-600 text-white font-black flex items-center justify-center text-sm">
                        02
                    </div>
                    <h3 class="font-extrabold text-slate-900 text-base">Kelengkapan Dokumen</h3>
                    <p class="text-slate-600 text-xs leading-relaxed">
                        Lengkapi berkas identitas (KTP, KK, Surat Nikah) serta dokumen jaminan agunan (BPKB / SHM).
                    </p>
                </div>

                <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm space-y-3 relative">
                    <div class="w-10 h-10 rounded-xl bg-blue-600 text-white font-black flex items-center justify-center text-sm">
                        03
                    </div>
                    <h3 class="font-extrabold text-slate-900 text-base">Analisis & Persetujuan</h3>
                    <p class="text-slate-600 text-xs leading-relaxed">
                        Tim analis BPRS Madinah melakukan verifikasi kelayakan usaha dan agunan secara cepat.
                    </p>
                </div>

                <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm space-y-3 relative">
                    <div class="w-10 h-10 rounded-xl bg-emerald-600 text-white font-black flex items-center justify-center text-sm">
                        04
                    </div>
                    <h3 class="font-extrabold text-slate-900 text-base">Penandatanganan & Cair</h3>
                    <p class="text-slate-600 text-xs leading-relaxed">
                        Penandatanganan akad syariah secara sah dan dana pembiayaan siap dicairkan langsung.
                    </p>
                </div>
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
                <!-- Left Image Preview -->
                <div class="md:col-span-5 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 shadow-inner">
                    <img :src="modalData.image" :alt="modalData.title" class="w-full h-auto object-cover rounded-xl" onerror="this.src='<?= base_url('assets/produk/brosur_1.jpeg') ?>'">
                </div>

                <!-- Right Detail Specifications -->
                <div class="md:col-span-7 space-y-5">
                    <!-- Description -->
                    <div class="space-y-1.5">
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest">Deskripsi Pembiayaan</h4>
                        <p class="text-sm text-slate-700 leading-relaxed" x-text="modalData.desc"></p>
                    </div>

                    <!-- Custom Categories Breakdown (If Murabahah Perorangan vs Lembaga) -->
                    <template x-if="modalData.custom">
                        <div class="space-y-4">
                            <template x-for="[kat, detail] in Object.entries(modalData.custom)" :key="kat">
                                <div class="bg-blue-50/70 border border-blue-200 rounded-2xl p-4 space-y-3">
                                    <h4 class="text-xs font-extrabold text-blue-900 uppercase tracking-widest flex items-center gap-1.5">
                                        <i class="fa-solid fa-users text-blue-600"></i> Skema: <span x-text="kat"></span>
                                    </h4>

                                    <template x-for="[subKey, items] in Object.entries(detail)" :key="subKey">
                                        <div class="space-y-1">
                                            <h5 class="text-xs font-bold text-slate-800" x-text="subKey"></h5>
                                            <ul class="space-y-1 text-xs text-slate-700">
                                                <template x-for="item in items" :key="item">
                                                    <li class="flex items-start gap-2">
                                                        <i class="fa-solid fa-check text-emerald-600 mt-0.5 shrink-0"></i>
                                                        <span x-text="item"></span>
                                                    </li>
                                                </template>
                                            </ul>
                                        </div>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </template>

                    <!-- Standard Requirements List -->
                    <template x-if="modalData.ketentuan">
                        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 space-y-2">
                            <h4 class="text-xs font-bold text-slate-900 uppercase tracking-widest flex items-center gap-1.5">
                                <i class="fa-solid fa-clipboard-list text-blue-600"></i> Syarat & Ketentuan Pembiayaan
                            </h4>
                            <ul class="space-y-2 text-xs font-medium text-slate-700">
                                <template x-for="item in modalData.ketentuan" :key="item">
                                    <li class="flex items-start gap-2">
                                        <i class="fa-solid fa-check text-blue-600 mt-0.5 shrink-0"></i>
                                        <span x-text="item"></span>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Modal Action Footer -->
            <div class="pt-4 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                <span class="text-xs text-slate-500 flex items-center gap-1.5">
                    <i class="fa-solid fa-shield-halved text-emerald-600"></i> Terdaftar & diawasi Otoritas Jasa Keuangan (OJK)
                </span>
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <button @click="showModal = false" class="px-5 py-2.5 rounded-xl bg-slate-100 text-slate-700 text-xs font-bold hover:bg-slate-200 transition">
                        Tutup
                    </button>
                    <a :href="'https://wa.me/6281234567890?text=Halo%20BPRS%20Madinah,%20saya%20ingin%20konsultasi%20pengajuan%20' + encodeURIComponent(modalData.title)" target="_blank" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition shadow-md flex items-center justify-center gap-2">
                        <i class="fa-brands fa-whatsapp text-sm"></i> Ajukan Pembiayaan via WhatsApp
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- 🔗 QUICK NAVIGATION FOOTER BANNER -->
    <section class="py-12 bg-slate-100 border-t border-slate-200">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 text-center space-y-6">
            <h3 class="text-xl font-bold text-slate-900">Produk & Layanan Perbankan Lainnya</h3>
            <div class="flex flex-wrap justify-center items-center gap-4">
                <a href="<?= base_url('/tabungan') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-piggy-bank text-blue-600"></i> Tabungan Syariah
                </a>
                <a href="<?= base_url('/deposito') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-vault text-emerald-600"></i> Deposito Syariah
                </a>
                <a href="<?= base_url('/hubungi_kami') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-headset text-amber-500"></i> Layanan Nasabah
                </a>
            </div>
        </div>
    </section>
</main>
