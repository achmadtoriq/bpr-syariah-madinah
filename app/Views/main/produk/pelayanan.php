<main class="w-full bg-slate-50 text-slate-900 font-sans min-h-screen" x-data="{
    showModal: false,
    modalData: {},
    openProductModal(data) {
        this.modalData = data;
        this.showModal = true;
    }
}">
    <!-- 🏢 EXECUTIVE HERO BANNER SECTION -->
    <section class="relative bg-gradient-to-b from-blue-50/80 via-white to-slate-50 text-slate-900 pt-28 pb-12 md:pt-36 md:pb-16 border-b border-slate-200 overflow-hidden">
        <!-- Ambient Decorative Glows -->
        <div class="absolute top-0 right-1/4 w-[450px] h-[450px] bg-blue-200/30 blur-[130px] rounded-full pointer-events-none"></div>
        <div class="absolute bottom-0 left-1/3 w-[350px] h-[350px] bg-emerald-100/40 blur-[100px] rounded-full pointer-events-none"></div>

        <div class="container mx-auto max-w-7xl px-5 md:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs text-slate-500 mb-4">
                <a href="<?= base_url() ?>" class="hover:text-blue-700 transition">Home</a>
                <span>/</span>
                <span>Produk & Layanan</span>
                <span>/</span>
                <span class="text-blue-700 font-semibold">Layanan Perbankan & Digital</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-8 space-y-4">
                    <div class="inline-flex items-center gap-2 rounded-full bg-blue-100 border border-blue-200 px-4 py-1.5 text-xs font-bold text-blue-800 uppercase tracking-widest">
                        <i class="fa-solid fa-headset text-blue-600"></i> Solusi Pembayaran & Financial Technology
                    </div>
                    <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
                        Layanan Perbankan & Digital BPRS Madinah
                    </h1>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed max-w-2xl">
                        Kenyamanan transaksi perbankan syariah melalui integrasi Madinah Payment System untuk sekolah & pesantren, transaksi PPOB online lengkap, serta layanan antar-jemput dana (Pick-Up Service).
                    </p>

                    <!-- Trust Highlights Strip -->
                    <div class="pt-2 flex flex-wrap items-center gap-4 text-xs font-bold text-slate-700">
                        <div class="flex items-center gap-2 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-sm">
                            <i class="fa-solid fa-laptop-code text-blue-600 text-sm"></i>
                            <span>Software Keuangan Sekolah Gratis</span>
                        </div>
                        <div class="flex items-center gap-2 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-sm">
                            <i class="fa-solid fa-car-side text-emerald-600 text-sm"></i>
                            <span>Layanan Antar-Jemput Dana</span>
                        </div>
                        <div class="flex items-center gap-2 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-sm">
                            <i class="fa-solid fa-bolt text-amber-500 text-sm"></i>
                            <span>Pembayaran PPOB Serba Ada</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Action Card -->
                <div class="lg:col-span-4 bg-gradient-to-br from-blue-900 via-blue-800 to-slate-900 rounded-3xl p-6 shadow-xl text-white space-y-4 border border-blue-700/50">
                    <div class="flex justify-between items-center border-b border-blue-700/60 pb-3">
                        <span class="text-xs font-bold uppercase tracking-wider text-blue-300">Layanan Nasabah</span>
                        <span class="px-2.5 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-[10px] font-extrabold uppercase border border-emerald-400/30">Siap Melayani</span>
                    </div>
                    <div class="space-y-2.5 text-xs text-blue-100">
                        <div class="flex items-center gap-2.5">
                            <i class="fa-solid fa-school text-amber-300 text-sm"></i>
                            <span>Integrasi Sistem Pembayaran Sekolah</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <i class="fa-solid fa-receipt text-emerald-400 text-sm"></i>
                            <span>Bayar Listrik, PDAM, Pulsa & BPJS</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <i class="fa-solid fa-handshake-angle text-blue-300 text-sm"></i>
                            <span>Jemput Setoran Langsung ke Lokasi</span>
                        </div>
                    </div>
                    <a href="https://wa.me/6281234567890?text=Halo%20BPRS%20Madinah,%20saya%20ingin%20konsultasi%20layanan%20Madinah%20Payment%20System%20/%20Pelayanan" target="_blank" class="w-full py-3.5 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-xs font-extrabold transition shadow-lg shadow-emerald-500/30 flex items-center justify-center gap-2 cursor-pointer">
                        <i class="fa-brands fa-whatsapp text-base"></i> Hubungi Customer Service
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 💻 FEATURED SERVICES GRID SECTION -->
    <section class="py-12 md:py-20">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 space-y-12">
            
            <div class="text-center max-w-2xl mx-auto space-y-2">
                <span class="inline-block rounded-full bg-blue-100 border border-blue-200 px-4 py-1 text-xs font-bold text-blue-800 uppercase tracking-widest">
                    <i class="fa-solid fa-star mr-1"></i> Layanan Unggulan
                </span>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900">Solusi Layanan Keuangan BPRS Madinah</h2>
                <p class="text-slate-600 text-xs sm:text-sm">
                    Inovasi teknologi pembayaran untuk lembaga pendidikan, instansi, serta kemudahan pembayaran rutin harian masyarakat.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
                
                <!-- SERVICE 1: MADINAH PAYMENT SYSTEM (Sekolah & Pesantren) -->
                <div class="bg-white rounded-3xl border border-slate-200 p-6 md:p-8 shadow-lg hover:shadow-xl hover:border-blue-400 transition-all duration-300 flex flex-col justify-between space-y-6 group">
                    <div class="space-y-6">
                        <!-- Card Header Thumbnail & Badge -->
                        <div class="relative h-60 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 cursor-pointer" @click="openProductModal({
                            title: 'Madinah Payment System (MPS)',
                            subtitle: 'Sistem Pengelolaan Keuangan Sekolah & Pesantren',
                            desc: 'Madinah Payment System (MPS) adalah software pengelolaan keuangan sekolah terpadu yang diberikan secara GRATIS oleh BPRS Madinah untuk membantu sekolah, madrasah, dan pesantren dalam mengelola pembukuan SPP, iuran, serta transaksi keuangan sekolah secara otomatis, akuntabel, dan transparan.',
                            benefit: [
                                'Gratis Lisensi Software Pengelolaan Keuangan Sekolah',
                                'Mudah dalam pengoperasian oleh bendahara & staff sekolah',
                                'Bebas biaya administrasi dan integrasi sistem',
                                'Gratis pendampingan & pelatihan pengoperasian software',
                                'Layanan antar-jemput setoran dana (Pick-Up Service) oleh petugas bank'
                            ],
                            features: [
                                'MoU Kerjasama Sekolah / Pesantren dengan BPRS Madinah',
                                'Data Siswa & Rincian Jenis Iuran Sekolah',
                                'Penunjukan Bendahara / Admin Sekolah'
                            ],
                            image: '<?= base_url('assets/produk/madinah_pay_system.webp') ?>'
                        })">
                            <img src="<?= base_url('assets/produk/madinah_pay_system.webp') ?>" alt="Madinah Payment System" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.src='<?= base_url('assets/produk/brosur_1.jpeg') ?>'">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent"></div>
                            
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 rounded-full bg-blue-600 text-white text-xs font-extrabold uppercase shadow-md">
                                    <i class="fa-solid fa-graduation-cap mr-1"></i> Khusus Sekolah & Pesantren
                                </span>
                            </div>
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 rounded-full bg-amber-500 text-white text-xs font-bold shadow-md">
                                    100% Software Gratis
                                </span>
                            </div>

                            <div class="absolute bottom-4 left-4 right-4">
                                <h3 class="text-2xl font-extrabold text-white group-hover:text-blue-200 transition-colors drop-shadow-md">
                                    Madinah Payment System (MPS)
                                </h3>
                                <p class="text-xs text-blue-200 font-semibold">Sistem Pengelolaan Keuangan Sekolah & Pesantren</p>
                            </div>
                        </div>

                        <!-- Description & Features List -->
                        <div class="space-y-4">
                            <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                                Mempermudah sekolah, madrasah, dan pesantren dalam mengelola pembayaran SPP, infak, dan iuran siswa dengan software keuangan digital yang akuntabel dan transparan.
                            </p>

                            <!-- Feature Bullets Grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                                <div class="p-3 bg-blue-50/70 border border-blue-100 rounded-xl space-y-1">
                                    <div class="flex items-center gap-2 text-xs font-bold text-blue-900">
                                        <i class="fa-solid fa-laptop-file text-blue-600"></i>
                                        <span>Software Keuangan Gratis</span>
                                    </div>
                                    <p class="text-[11px] text-slate-600">Tanpa biaya lisensi atau biaya bulanan.</p>
                                </div>
                                <div class="p-3 bg-emerald-50/70 border border-emerald-100 rounded-xl space-y-1">
                                    <div class="flex items-center gap-2 text-xs font-bold text-emerald-900">
                                        <i class="fa-solid fa-chalkboard-user text-emerald-600"></i>
                                        <span>Pelatihan Staff Sampai Mahir</span>
                                    </div>
                                    <p class="text-[11px] text-slate-600">Pendampingan penuh dari tim BPRS Madinah.</p>
                                </div>
                                <div class="p-3 bg-amber-50/70 border border-amber-100 rounded-xl space-y-1">
                                    <div class="flex items-center gap-2 text-xs font-bold text-amber-900">
                                        <i class="fa-solid fa-truck-ramp-box text-amber-600"></i>
                                        <span>Pick-Up Setoran Dana</span>
                                    </div>
                                    <p class="text-[11px] text-slate-600">Dana kas disetorkan via petugas resmi bank.</p>
                                </div>
                                <div class="p-3 bg-sky-50/70 border border-sky-100 rounded-xl space-y-1">
                                    <div class="flex items-center gap-2 text-xs font-bold text-sky-900">
                                        <i class="fa-solid fa-file-invoice text-sky-600"></i>
                                        <span>Laporan Real-Time</span>
                                    </div>
                                    <p class="text-[11px] text-slate-600">Rekapitulasi SPP & tunggakan instan.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-4 border-t border-slate-100 grid grid-cols-2 gap-3">
                        <button @click="openProductModal({
                            title: 'Madinah Payment System (MPS)',
                            subtitle: 'Sistem Pengelolaan Keuangan Sekolah & Pesantren',
                            desc: 'Madinah Payment System (MPS) adalah software pengelolaan keuangan sekolah terpadu yang diberikan secara GRATIS oleh BPRS Madinah untuk membantu sekolah, madrasah, dan pesantren dalam mengelola pembukuan SPP, iuran, serta transaksi keuangan sekolah secara otomatis, akuntabel, dan transparan.',
                            benefit: [
                                'Gratis Lisensi Software Pengelolaan Keuangan Sekolah',
                                'Mudah dalam pengoperasian oleh bendahara & staff sekolah',
                                'Bebas biaya administrasi dan integrasi sistem',
                                'Gratis pendampingan & pelatihan pengoperasian software',
                                'Layanan antar-jemput setoran dana (Pick-Up Service) oleh petugas bank'
                            ],
                            features: [
                                'MoU Kerjasama Sekolah / Pesantren dengan BPRS Madinah',
                                'Data Siswa & Rincian Jenis Iuran Sekolah',
                                'Penunjukan Bendahara / Admin Sekolah'
                            ],
                            image: '<?= base_url('assets/produk/madinah_pay_system.webp') ?>'
                        })" class="w-full py-3 rounded-xl bg-slate-100 hover:bg-blue-50 text-blue-700 text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer">
                            <i class="fa-solid fa-circle-info"></i> Detail & Syarat MPS
                        </button>
                        <a href="https://wa.me/6281234567890?text=Halo%20BPRS%20Madinah,%20kami%20tertarik%20mengintegrasikan%20Madinah%20Payment%20System%20untuk%20sekolah/pesantren%20kami" target="_blank" class="w-full py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition shadow-sm flex items-center justify-center gap-1.5 cursor-pointer">
                            <i class="fa-brands fa-whatsapp text-sm"></i> Konsultasi Sekolah
                        </a>
                    </div>
                </div>

                <!-- SERVICE 2: PAYMENT ONLINE PPOB (Pembayaran Tagihan) -->
                <div class="bg-white rounded-3xl border border-slate-200 p-6 md:p-8 shadow-lg hover:shadow-xl hover:border-blue-400 transition-all duration-300 flex flex-col justify-between space-y-6 group">
                    <div class="space-y-6">
                        <!-- Card Header Thumbnail & Badge -->
                        <div class="relative h-60 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 cursor-pointer" @click="openProductModal({
                            title: 'Payment Point Online Bank (PPOB)',
                            subtitle: 'Layanan Pembayaran Tagihan Online Serba Ada',
                            desc: 'Selain produk simpanan dan pembiayaan, BPRS Madinah menyediakan fasilitas transaksi Payment Point Online Bank (PPOB) untuk melayani berbagai pembayaran tagihan bulanan dan pembelian voucher digital masyarakat secara cepat, aman, dan berbukti resi sah.',
                            benefit: [
                                'Pembayaran Tagihan Listrik PLN Pasca-bayar & Token Listrik Prabayar',
                                'Pembayaran Tagihan Air PDAM Kabupaten Lamongan & sekitarnya',
                                'Pembelian Pulsa & Paket Data Seluler Semua Operator (Telkomsel, Indosat, XL, Tri, Smartfren)',
                                'Pembayaran Iuran BPJS Kesehatan keluarga',
                                'Pembayaran Tagihan Telepon & Internet Telkom / Indihome',
                                'Cetak bukti transaksi resmi & dilayani di seluruh Kantor Kas BPRS Madinah'
                            ],
                            features: [
                                'Cukup membawa Nomor Pelanggan / ID PLN / ID PDAM / Nomor BPJS',
                                'Pembayaran tunai atau autodebet dari Rekening Tabungan BPRS Madinah'
                            ],
                            image: '<?= base_url('assets/produk/payment_online.webp') ?>'
                        })">
                            <img src="<?= base_url('assets/produk/payment_online.webp') ?>" alt="Payment Online PPOB" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.src='<?= base_url('assets/produk/brosur_1.jpeg') ?>'">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent"></div>

                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 rounded-full bg-emerald-600 text-white text-xs font-extrabold uppercase shadow-md">
                                    <i class="fa-solid fa-receipt mr-1"></i> PPOB Real-Time
                                </span>
                            </div>
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 rounded-full bg-blue-600 text-white text-xs font-bold shadow-md">
                                    Resi Cetak Sah
                                </span>
                            </div>

                            <div class="absolute bottom-4 left-4 right-4">
                                <h3 class="text-2xl font-extrabold text-white group-hover:text-blue-200 transition-colors drop-shadow-md">
                                    Payment Online (PPOB)
                                </h3>
                                <p class="text-xs text-blue-200 font-semibold">Layanan Pembayaran Tagihan Harian Masyarakat</p>
                            </div>
                        </div>

                        <!-- Supported Payments Grid -->
                        <div class="space-y-4">
                            <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                                Lakukan berbagai transaksi pembayaran tagihan rutin bulanan keluarga dan pembelian pulsa dengan cepat di loket teller seluruh kantor kas BPRS Madinah.
                            </p>

                            <!-- Supported Payment Icons Grid -->
                            <div class="grid grid-cols-3 sm:grid-cols-3 gap-2.5 pt-2 text-center">
                                <div class="p-2.5 bg-slate-50 border border-slate-200 rounded-xl space-y-1">
                                    <i class="fa-solid fa-bolt text-amber-500 text-lg"></i>
                                    <span class="block text-[11px] font-bold text-slate-800">Listrik & Token PLN</span>
                                </div>
                                <div class="p-2.5 bg-slate-50 border border-slate-200 rounded-xl space-y-1">
                                    <i class="fa-solid fa-droplet text-sky-500 text-lg"></i>
                                    <span class="block text-[11px] font-bold text-slate-800">Air PDAM</span>
                                </div>
                                <div class="p-2.5 bg-slate-50 border border-slate-200 rounded-xl space-y-1">
                                    <i class="fa-solid fa-mobile-screen-button text-emerald-500 text-lg"></i>
                                    <span class="block text-[11px] font-bold text-slate-800">Pulsa & Data</span>
                                </div>
                                <div class="p-2.5 bg-slate-50 border border-slate-200 rounded-xl space-y-1">
                                    <i class="fa-solid fa-hospital-user text-rose-500 text-lg"></i>
                                    <span class="block text-[11px] font-bold text-slate-800">BPJS Kesehatan</span>
                                </div>
                                <div class="p-2.5 bg-slate-50 border border-slate-200 rounded-xl space-y-1">
                                    <i class="fa-solid fa-wifi text-blue-600 text-lg"></i>
                                    <span class="block text-[11px] font-bold text-slate-800">Telkom / Indihome</span>
                                </div>
                                <div class="p-2.5 bg-slate-50 border border-slate-200 rounded-xl space-y-1">
                                    <i class="fa-solid fa-tv text-purple-600 text-lg"></i>
                                    <span class="block text-[11px] font-bold text-slate-800">TV & Voucher</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-4 border-t border-slate-100 grid grid-cols-2 gap-3">
                        <button @click="openProductModal({
                            title: 'Payment Point Online Bank (PPOB)',
                            subtitle: 'Layanan Pembayaran Tagihan Online Serba Ada',
                            desc: 'Selain produk simpanan dan pembiayaan, BPRS Madinah menyediakan fasilitas transaksi Payment Point Online Bank (PPOB) untuk melayani berbagai pembayaran tagihan bulanan dan pembelian voucher digital masyarakat secara cepat, aman, dan berbukti resi sah.',
                            benefit: [
                                'Pembayaran Tagihan Listrik PLN Pasca-bayar & Token Listrik Prabayar',
                                'Pembayaran Tagihan Air PDAM Kabupaten Lamongan & sekitarnya',
                                'Pembelian Pulsa & Paket Data Seluler Semua Operator (Telkomsel, Indosat, XL, Tri, Smartfren)',
                                'Pembayaran Iuran BPJS Kesehatan keluarga',
                                'Pembayaran Tagihan Telepon & Internet Telkom / Indihome',
                                'Cetak bukti transaksi resmi & dilayanan di seluruh Kantor Kas BPRS Madinah'
                            ],
                            features: [
                                'Cukup membawa Nomor Pelanggan / ID PLN / ID PDAM / Nomor BPJS',
                                'Pembayaran tunai atau autodebet dari Rekening Tabungan BPRS Madinah'
                            ],
                            image: '<?= base_url('assets/produk/payment_online.webp') ?>'
                        })" class="w-full py-3 rounded-xl bg-slate-100 hover:bg-blue-50 text-blue-700 text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer">
                            <i class="fa-solid fa-circle-info"></i> Detail Layanan PPOB
                        </button>
                        <a href="https://wa.me/6281234567890?text=Halo%20BPRS%20Madinah,%20saya%20ingin%20bertanya%20mengenai%20layanan%20pembayaran%20PPOB%20/%20tagihan" target="_blank" class="w-full py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition shadow-sm flex items-center justify-center gap-1.5 cursor-pointer">
                            <i class="fa-brands fa-whatsapp text-sm"></i> Tanya Customer Service
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 🚗 PICK-UP SERVICE & CASH COUNTER CHANNEL SECTION -->
    <section class="py-12 md:py-20 bg-slate-100 border-t border-slate-200">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 space-y-10">
            <div class="text-center max-w-2xl mx-auto space-y-2">
                <span class="inline-block rounded-full bg-blue-100 border border-blue-200 px-4 py-1 text-xs font-bold text-blue-800 uppercase tracking-widest">
                    <i class="fa-solid fa-handshake mr-1"></i> Pelayanan Jemput Bola
                </span>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900">Jaringan Layanan & Pick-Up Service</h2>
                <p class="text-slate-600 text-xs sm:text-sm">
                    Kemudahan bertransaksi tidak hanya di kantor bank, tetapi juga hadir langsung ke lokasi nasabah dan instansi mitra.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Pick Up Service -->
                <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm space-y-4 hover:shadow-md transition">
                    <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl font-bold">
                        <i class="fa-solid fa-car-side"></i>
                    </div>
                    <div class="space-y-1">
                        <h3 class="font-extrabold text-slate-900 text-base">Layanan Antar-Jemput Dana</h3>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            Petugas resmi BPRS Madinah siap mengambil setoran tabungan atau kas sekolah langsung ke tempat Anda secara amanah.
                        </p>
                    </div>
                </div>

                <!-- Kantor Kas Sekolah & MAN -->
                <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm space-y-4 hover:shadow-md transition">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl font-bold">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>
                    <div class="space-y-1">
                        <h3 class="font-extrabold text-slate-900 text-base">Pelayanan Kas Mitra Instansi</h3>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            Hadirnya Kantor Kas Pelayanan di MAN Lamongan dan SMPN 1 Lamongan untuk mendekatkan transaksi siswa dan guru.
                        </p>
                    </div>
                </div>

                <!-- Customer Care -->
                <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm space-y-4 hover:shadow-md transition">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl font-bold">
                        <i class="fa-solid fa-headset"></i>
                    </div>
                    <div class="space-y-1">
                        <h3 class="font-extrabold text-slate-900 text-base">Customer Care Responsive</h3>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            Layanan konsultasi dan bantuan informasi perbankan syariah yang sigap melayani Anda setiap hari kerja.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 🖼️ RICH EXECUTIVE DETAIL MODAL -->
    <div x-show="showModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-md" style="display: none;">
        <div @click.away="showModal = false" class="relative max-w-3xl w-full bg-white rounded-3xl p-6 md:p-8 shadow-2xl space-y-6 max-h-[90vh] overflow-y-auto">
            
            <!-- Modal Header -->
            <div class="flex justify-between items-start border-b border-slate-200 pb-4">
                <div class="space-y-1">
                    <span class="inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-extrabold uppercase tracking-wider" x-text="modalData.subtitle"></span>
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

                <!-- Right Specifications -->
                <div class="md:col-span-7 space-y-5">
                    <!-- Description -->
                    <div class="space-y-1.5">
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest">Penjelasan Layanan</h4>
                        <p class="text-sm text-slate-700 leading-relaxed" x-text="modalData.desc"></p>
                    </div>

                    <!-- Benefits Card -->
                    <template x-if="modalData.benefit">
                        <div class="bg-blue-50/70 border border-blue-200 rounded-2xl p-4 space-y-2">
                            <h4 class="text-xs font-bold text-blue-900 uppercase tracking-widest flex items-center gap-1.5">
                                <i class="fa-solid fa-star text-amber-500"></i> Keunggulan Layanan
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
                    </template>

                    <!-- Requirements Card -->
                    <template x-if="modalData.features">
                        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 space-y-2">
                            <h4 class="text-xs font-bold text-slate-900 uppercase tracking-widest flex items-center gap-1.5">
                                <i class="fa-solid fa-clipboard-list text-blue-600"></i> Persyaratan Penggunaan Layanan
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
                    </template>
                </div>
            </div>

            <!-- Modal Action Footer -->
            <div class="pt-4 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                <span class="text-xs text-slate-500 flex items-center gap-1.5">
                    <i class="fa-solid fa-shield-halved text-emerald-600"></i> Layanan Resmi BPRS Syariah Madinah
                </span>
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <button @click="showModal = false" class="px-5 py-2.5 rounded-xl bg-slate-100 text-slate-700 text-xs font-bold hover:bg-slate-200 transition">
                        Tutup
                    </button>
                    <a href="https://wa.me/6281234567890?text=Halo%20BPRS%20Madinah,%20saya%20ingin%20konsultasi%20layanan%20perbankan" target="_blank" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition shadow-md flex items-center justify-center gap-2">
                        <i class="fa-brands fa-whatsapp text-sm"></i> Konsultasi via WhatsApp
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- 🔗 QUICK NAVIGATION FOOTER BANNER -->
    <section class="py-12 bg-slate-100 border-t border-slate-200">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 text-center space-y-6">
            <h3 class="text-xl font-bold text-slate-900">Produk Perbankan Syariah Lainnya</h3>
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
