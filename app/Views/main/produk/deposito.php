<main class="w-full bg-slate-50 text-slate-900 font-sans min-h-screen" x-data="{
    nominal: 10000000,
    tenor: 12,
    showImageModal: false,
    formatRupiah(val) {
        return 'Rp ' + Number(val).toLocaleString('id-ID');
    },
    formatNumberInput(num) {
        if (!num && num !== 0) return '';
        return num.toString().replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    get indicativeRate() {
        if (this.tenor == 1) return 0.045; // 4.5% p.a equivalent
        if (this.tenor == 3) return 0.050; // 5.0% p.a equivalent
        if (this.tenor == 6) return 0.055; // 5.5% p.a equivalent
        return 0.060;                      // 6.0% p.a equivalent for 12 months
    },
    get monthlyReturn() {
        return Math.round((this.nominal * this.indicativeRate) / 12);
    },
    get totalReturnAtMaturity() {
        return Math.round(this.nominal + (this.monthlyReturn * this.tenor));
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
                <span class="text-blue-700 font-semibold">Deposito Syariah</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-7 space-y-4">
                    <div class="inline-flex items-center gap-2 rounded-full bg-blue-100 border border-blue-200 px-4 py-1.5 text-xs font-bold text-blue-800 uppercase tracking-widest">
                        <i class="fa-solid fa-vault text-blue-600"></i> Akad Mudharabah Mutlaqah
                    </div>
                    <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
                        Deposito Berjangka Syariah
                    </h1>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed max-w-2xl">
                        Investasi dana simpanan berjangka berbasis prinsip syariah murni dengan imbal hasil (bagi hasil) kompetitif, aman dijamin LPS hingga Rp 2 Miliar, dan dikelola secara profesional untuk keberkahan masa depan Anda.
                    </p>

                    <!-- Trust Highlights Strip -->
                    <div class="pt-2 flex flex-wrap items-center gap-4 text-xs font-bold text-slate-700">
                        <div class="flex items-center gap-2 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-sm">
                            <i class="fa-solid fa-shield-halved text-emerald-600 text-sm"></i>
                            <span>Dijamin LPS hingga Rp 2 Miliar</span>
                        </div>
                        <div class="flex items-center gap-2 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-sm">
                            <i class="fa-solid fa-building-columns text-blue-600 text-sm"></i>
                            <span>Diawasi OJK</span>
                        </div>
                        <div class="flex items-center gap-2 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-sm">
                            <i class="fa-solid fa-rotate-right text-amber-500 text-sm"></i>
                            <span>Fasilitas ARO Otomatis</span>
                        </div>
                    </div>
                </div>

                <!-- Brochure Preview & Action Card -->
                <div class="lg:col-span-5 bg-white rounded-3xl p-6 shadow-xl border border-slate-200 space-y-4 relative group">
                    <div class="relative h-64 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 cursor-pointer" @click="showImageModal = true">
                        <img src="<?= base_url('assets/produk/brosur_deposito.webp') ?>" alt="Brosur Deposito Syariah BPRS Madinah" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent flex items-end justify-between p-4">
                            <span class="text-xs font-bold text-white flex items-center gap-1.5">
                                <i class="fa-solid fa-magnifying-glass-plus text-blue-300"></i> Klik untuk memperbesar brosur
                            </span>
                            <span class="px-2.5 py-1 rounded-full bg-emerald-500 text-white text-[10px] font-extrabold uppercase">Buka Min. Rp 500rb</span>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <button @click="showImageModal = true" class="py-3 bg-slate-100 hover:bg-blue-50 text-blue-700 rounded-xl text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer">
                            <i class="fa-solid fa-image"></i> Lihat Brosur Full
                        </button>
                        <a :href="'https://wa.me/6281234567890?text=Halo%20BPRS%20Madinah,%20saya%20berminat%20membuka%20Deposito%20Syariah%20nominal%20' + encodeURIComponent(formatRupiah(nominal)) + '%20tenor%20' + tenor + '%20bulan'" target="_blank" class="py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition shadow-md shadow-emerald-600/20 flex items-center justify-center gap-1.5 cursor-pointer">
                            <i class="fa-brands fa-whatsapp text-sm"></i> Buka Deposito WA
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 🧮 INTERACTIVE SHARIA PROFIT-SHARING CALCULATOR SECTION -->
    <section class="py-12 md:py-16 bg-white border-b border-slate-200 shadow-sm">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 space-y-8">
            <div class="text-center max-w-2xl mx-auto space-y-2">
                <span class="inline-block rounded-full bg-blue-100 border border-blue-200 px-4 py-1 text-xs font-bold text-blue-800 uppercase tracking-widest">
                    <i class="fa-solid fa-calculator mr-1"></i> Simulasi Investasi
                </span>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900">Kalkulator Estimasi Bagi Hasil Deposito</h2>
                <p class="text-slate-600 text-xs sm:text-sm">
                    Hitung perkiraan imbal hasil (bagi hasil) deposito syariah Anda secara transparan berdasarkan nominal penempatan dan tenor investasi.
                </p>
            </div>

            <div class="max-w-4xl mx-auto bg-slate-50 rounded-3xl border border-slate-200/90 p-6 md:p-10 shadow-lg grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                
                <!-- Inputs Left -->
                <div class="md:col-span-7 space-y-6">
                    <!-- Nominal Slider & Input -->
                    <div class="space-y-2">
                        <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-2 mb-1">
                            <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">Nominal Penempatan Deposito</label>
                            <div class="relative w-full sm:w-56">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-700 font-bold text-xs">Rp</span>
                                <input type="text" inputmode="numeric" pattern="[0-9]*" :value="formatNumberInput(nominal)" @input="let val = $event.target.value.replace(/\D/g, ''); nominal = val ? parseInt(val, 10) : 0; $event.target.value = formatNumberInput(nominal)" class="w-full bg-white border border-slate-300 focus:border-blue-600 rounded-xl pl-9 pr-3 py-1.5 text-blue-700 font-extrabold text-sm focus:outline-none transition shadow-sm text-right">
                            </div>
                        </div>
                        <input type="range" min="500000" max="100000000" step="500000" x-model.number="nominal" class="w-full h-2.5 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-blue-600">
                        <div class="flex justify-between text-[10px] font-bold text-slate-400">
                            <span>Min. Rp 500 Ribu</span>
                            <span>Rp 50 Juta</span>
                            <span>Rp 100 Juta</span>
                        </div>
                    </div>

                    <!-- Preset Nominal Pills -->
                    <div class="flex flex-wrap gap-2">
                        <button @click="nominal = 1000000" :class="nominal === 1000000 ? 'bg-blue-600 text-white font-bold' : 'bg-white text-slate-700 hover:bg-slate-200 border border-slate-200 font-semibold'" class="px-3 py-1.5 text-xs rounded-xl transition cursor-pointer">
                            Rp 1 Juta
                        </button>
                        <button @click="nominal = 5000000" :class="nominal === 5000000 ? 'bg-blue-600 text-white font-bold' : 'bg-white text-slate-700 hover:bg-slate-200 border border-slate-200 font-semibold'" class="px-3 py-1.5 text-xs rounded-xl transition cursor-pointer">
                            Rp 5 Juta
                        </button>
                        <button @click="nominal = 10000000" :class="nominal === 10000000 ? 'bg-blue-600 text-white font-bold' : 'bg-white text-slate-700 hover:bg-slate-200 border border-slate-200 font-semibold'" class="px-3 py-1.5 text-xs rounded-xl transition cursor-pointer">
                            Rp 10 Juta
                        </button>
                        <button @click="nominal = 50000000" :class="nominal === 50000000 ? 'bg-blue-600 text-white font-bold' : 'bg-white text-slate-700 hover:bg-slate-200 border border-slate-200 font-semibold'" class="px-3 py-1.5 text-xs rounded-xl transition cursor-pointer">
                            Rp 50 Juta
                        </button>
                    </div>

                    <!-- Tenor Selection Buttons -->
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">Jangka Waktu (Tenor Deposito)</label>
                        <div class="grid grid-cols-4 gap-3">
                            <button @click="tenor = 1" :class="tenor === 1 ? 'bg-blue-600 text-white font-bold border-blue-600 shadow-md' : 'bg-white text-slate-700 border-slate-200 hover:border-blue-400 font-semibold'" class="py-3 px-2 text-xs rounded-2xl border text-center transition cursor-pointer">
                                <span class="block text-sm font-extrabold">1 Bulan</span>
                                <span class="text-[10px] opacity-80">Nisbah 4.5%*</span>
                            </button>
                            <button @click="tenor = 3" :class="tenor === 3 ? 'bg-blue-600 text-white font-bold border-blue-600 shadow-md' : 'bg-white text-slate-700 border-slate-200 hover:border-blue-400 font-semibold'" class="py-3 px-2 text-xs rounded-2xl border text-center transition cursor-pointer">
                                <span class="block text-sm font-extrabold">3 Bulan</span>
                                <span class="text-[10px] opacity-80">Nisbah 5.0%*</span>
                            </button>
                            <button @click="tenor = 6" :class="tenor === 6 ? 'bg-blue-600 text-white font-bold border-blue-600 shadow-md' : 'bg-white text-slate-700 border-slate-200 hover:border-blue-400 font-semibold'" class="py-3 px-2 text-xs rounded-2xl border text-center transition cursor-pointer">
                                <span class="block text-sm font-extrabold">6 Bulan</span>
                                <span class="text-[10px] opacity-80">Nisbah 5.5%*</span>
                            </button>
                            <button @click="tenor = 12" :class="tenor === 12 ? 'bg-blue-600 text-white font-bold border-blue-600 shadow-md' : 'bg-white text-slate-700 border-slate-200 hover:border-blue-400 font-semibold'" class="py-3 px-2 text-xs rounded-2xl border text-center transition cursor-pointer">
                                <span class="block text-sm font-extrabold">12 Bulan</span>
                                <span class="text-[10px] opacity-80">Nisbah 6.0%*</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Simulation Output Box Right -->
                <div class="md:col-span-5 bg-gradient-to-br from-blue-900 via-blue-800 to-slate-900 rounded-3xl p-6 shadow-xl text-white space-y-6 border border-blue-700">
                    <div class="border-b border-blue-700/60 pb-3 flex justify-between items-center">
                        <span class="text-xs font-bold uppercase tracking-wider text-blue-300">Estimasi Imbal Hasil</span>
                        <span class="px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-300 text-[10px] font-bold">Simulasi Syariah</span>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <span class="text-xs text-blue-200 block">Estimasi Bagi Hasil Bulanan</span>
                            <span class="text-2xl font-black text-amber-300" x-text="formatRupiah(monthlyReturn)"></span>
                            <span class="text-[10px] text-blue-300 block mt-0.5">*Ditransfer langsung ke rekening tabungan nasabah tiap bulan</span>
                        </div>

                        <div class="border-t border-blue-700/50 pt-3">
                            <span class="text-xs text-blue-200 block">Total Imbal Hasil + Modal saat Jatuh Tempo (<span x-text="tenor"></span> Bulan)</span>
                            <span class="text-xl font-bold text-emerald-300" x-text="formatRupiah(totalReturnAtMaturity)"></span>
                        </div>
                    </div>

                    <a :href="'https://wa.me/6281234567890?text=Halo%20BPRS%20Madinah,%20saya%20ingin%20membuka%20Deposito%20Syariah%20dengan%20nominal%20' + encodeURIComponent(formatRupiah(nominal)) + '%20tenor%20' + tenor + '%20bulan.'" target="_blank" class="w-full py-3 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-xs font-extrabold transition shadow-lg shadow-emerald-500/30 flex items-center justify-center gap-2 cursor-pointer">
                        <i class="fa-brands fa-whatsapp text-base"></i> Buka Deposito Ini via WA
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- 📊 TENOR OPTIONS & SPECIFICATIONS SECTION -->
    <section class="py-12 md:py-20">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 space-y-10">
            <div class="text-center max-w-2xl mx-auto space-y-2">
                <span class="inline-block rounded-full bg-blue-100 border border-blue-200 px-4 py-1 text-xs font-bold text-blue-800 uppercase tracking-widest">
                    <i class="fa-solid fa-clock-rotate-left mr-1"></i> Pilihan Tenor
                </span>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900">Jangka Waktu & Porsi Bagi Hasil</h2>
                <p class="text-slate-600 text-xs sm:text-sm">
                    Sesuaikan jangka waktu investasi dengan rencana keuangan Anda. Fleksibilitas tenor mulai dari 1 bulan hingga 12 bulan.
                </p>
            </div>

            <!-- 4 Tenor Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- 1 Bulan -->
                <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm hover:shadow-xl hover:border-blue-400 transition-all space-y-5 flex flex-col justify-between group">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl font-bold group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                            <i class="fa-solid fa-calendar-day"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Jangka Pendek</span>
                            <h3 class="text-xl font-extrabold text-slate-900">Tenor 1 Bulan</h3>
                        </div>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            Ideal untuk pengelolaan likuiditas perputaran modal usaha jangka pendek yang membutuhkan fleksibilitas pencairan cepat.
                        </p>
                    </div>

                    <div class="space-y-3 border-t border-slate-100 pt-4">
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-500">Min. Penempatan:</span>
                            <span class="font-bold text-slate-900">Rp 500.000</span>
                        </div>
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-500">Fasilitas ARO:</span>
                            <span class="font-bold text-emerald-600">Tersedia</span>
                        </div>
                        <button @click="tenor = 1; window.scrollTo({top: 550, behavior: 'smooth'})" class="w-full py-2.5 bg-slate-100 hover:bg-blue-50 text-blue-700 text-xs font-bold rounded-xl transition cursor-pointer">
                            Simulasikan Tenor Ini
                        </button>
                    </div>
                </div>

                <!-- 3 Bulan -->
                <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm hover:shadow-xl hover:border-blue-400 transition-all space-y-5 flex flex-col justify-between group">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl font-bold group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                            <i class="fa-solid fa-calendar-week"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Triwulan</span>
                            <h3 class="text-xl font-extrabold text-slate-900">Tenor 3 Bulan</h3>
                        </div>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            Pilihan populer bagi perorangan dan wirausaha untuk menyimpan dana cadangan dengan imbal hasil lebih menarik.
                        </p>
                    </div>

                    <div class="space-y-3 border-t border-slate-100 pt-4">
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-500">Min. Penempatan:</span>
                            <span class="font-bold text-slate-900">Rp 500.000</span>
                        </div>
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-500">Fasilitas ARO:</span>
                            <span class="font-bold text-emerald-600">Tersedia</span>
                        </div>
                        <button @click="tenor = 3; window.scrollTo({top: 550, behavior: 'smooth'})" class="w-full py-2.5 bg-slate-100 hover:bg-blue-50 text-blue-700 text-xs font-bold rounded-xl transition cursor-pointer">
                            Simulasikan Tenor Ini
                        </button>
                    </div>
                </div>

                <!-- 6 Bulan -->
                <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm hover:shadow-xl hover:border-blue-400 transition-all space-y-5 flex flex-col justify-between group">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl font-bold group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Semester</span>
                            <h3 class="text-xl font-extrabold text-slate-900">Tenor 6 Bulan</h3>
                        </div>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            Optimalisasi simpanan pertengahan tahun untuk persiapan pembayaran sekolah, liburan keluarga, atau hajat tertentu.
                        </p>
                    </div>

                    <div class="space-y-3 border-t border-slate-100 pt-4">
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-500">Min. Penempatan:</span>
                            <span class="font-bold text-slate-900">Rp 500.000</span>
                        </div>
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-500">Fasilitas ARO:</span>
                            <span class="font-bold text-emerald-600">Tersedia</span>
                        </div>
                        <button @click="tenor = 6; window.scrollTo({top: 550, behavior: 'smooth'})" class="w-full py-2.5 bg-slate-100 hover:bg-blue-50 text-blue-700 text-xs font-bold rounded-xl transition cursor-pointer">
                            Simulasikan Tenor Ini
                        </button>
                    </div>
                </div>

                <!-- 12 Bulan -->
                <div class="bg-gradient-to-b from-blue-900 to-slate-900 rounded-3xl p-6 shadow-lg text-white space-y-5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 right-0 bg-amber-500 text-slate-950 font-extrabold text-[10px] uppercase px-3 py-1 rounded-bl-xl shadow-md">
                        Nisbah Maksimal
                    </div>
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-2xl bg-white/10 text-amber-300 flex items-center justify-center text-xl font-bold">
                            <i class="fa-solid fa-gem"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-blue-300 uppercase tracking-wider">Tahunan</span>
                            <h3 class="text-xl font-extrabold text-white">Tenor 12 Bulan</h3>
                        </div>
                        <p class="text-blue-100 text-xs leading-relaxed">
                            Mendapatkan nisbah bagi hasil paling optimal dan maksimal untuk pertumbuhan nilai kekayaan Anda jangka panjang.
                        </p>
                    </div>

                    <div class="space-y-3 border-t border-blue-800 pt-4">
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-blue-200">Min. Penempatan:</span>
                            <span class="font-bold text-white">Rp 500.000</span>
                        </div>
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-blue-200">Fasilitas ARO:</span>
                            <span class="font-bold text-emerald-300">Tersedia</span>
                        </div>
                        <button @click="tenor = 12; window.scrollTo({top: 550, behavior: 'smooth'})" class="w-full py-2.5 bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold rounded-xl transition shadow-md cursor-pointer">
                            Simulasikan Tenor Ini
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 🌟 ADVANTAGES & REQUIREMENTS SECTION (EQUAL HEIGHT STRETCH) -->
    <section class="py-12 md:py-20 bg-slate-100 border-t border-slate-200">
        <div class="container mx-auto max-w-7xl px-5 md:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                
                <!-- Left: Benefits Card List (Equal Height flex flex-col justify-between) -->
                <div class="lg:col-span-7 bg-white rounded-3xl border border-slate-200 p-6 md:p-8 shadow-md flex flex-col justify-between space-y-6">
                    <div class="space-y-6">
                        <div class="space-y-2 border-b border-slate-100 pb-4">
                            <span class="text-xs font-bold text-blue-700 uppercase tracking-widest">Keunggulan Nasabah</span>
                            <h3 class="text-2xl font-extrabold text-slate-900">Mengapa Memilih Deposito Syariah BPRS Madinah?</h3>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200/80 space-y-2">
                                <i class="fa-solid fa-hand-holding-dollar text-emerald-600 text-xl"></i>
                                <h4 class="font-bold text-sm text-slate-900">Bagi Hasil Berkala</h4>
                                <p class="text-xs text-slate-600 leading-relaxed">Imbal hasil ditransfer otomatis setiap bulan langsung ke rekening tabungan Anda.</p>
                            </div>
                            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200/80 space-y-2">
                                <i class="fa-solid fa-rotate text-blue-600 text-xl"></i>
                                <h4 class="font-bold text-sm text-slate-900">Fasilitas ARO Otomatis</h4>
                                <p class="text-xs text-slate-600 leading-relaxed">Pilihan Automatic Roll Over untuk perpanjangan deposito otomatis tanpa perlu repot ke kantor.</p>
                            </div>
                            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200/80 space-y-2">
                                <i class="fa-solid fa-file-contract text-amber-500 text-xl"></i>
                                <h4 class="font-bold text-sm text-slate-900">Bilyet Deposito Resmi</h4>
                                <p class="text-xs text-slate-600 leading-relaxed">Diberikan Bilyet Deposito sebagai bukti kepemilikan investasi yang sah dan bernilai hukum.</p>
                            </div>
                            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200/80 space-y-2">
                                <i class="fa-solid fa-building-circle-check text-sky-600 text-xl"></i>
                                <h4 class="font-bold text-sm text-slate-900">Dapat Jadi Agunan</h4>
                                <p class="text-xs text-slate-600 leading-relaxed">Bilyet deposito dapat dijadikan agunan jaminan pembiayaan syariah jika dibutuhkan sewaktu-waktu.</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-100 text-xs text-slate-500 flex items-center justify-between">
                        <span class="flex items-center gap-1.5 font-semibold text-emerald-700">
                            <i class="fa-solid fa-shield-halved text-sm"></i> Simpanan Aman Terjamin LPS
                        </span>
                        <span class="font-bold text-blue-700">BPRS Madinah Lamongan</span>
                    </div>
                </div>

                <!-- Right: Requirements Card (Equal Height flex flex-col justify-between) -->
                <div class="lg:col-span-5 bg-gradient-to-br from-blue-900 via-blue-800 to-slate-900 rounded-3xl p-6 md:p-8 shadow-xl text-white flex flex-col justify-between space-y-6 border border-blue-700">
                    <div class="space-y-5">
                        <div class="space-y-2 border-b border-blue-700/60 pb-4">
                            <span class="text-xs font-bold text-amber-300 uppercase tracking-widest">Persyaratan</span>
                            <h3 class="text-2xl font-extrabold text-white">Syarat Pembukaan Deposito</h3>
                        </div>

                        <ul class="space-y-3.5 text-xs font-medium text-blue-100">
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-circle-check text-emerald-400 text-sm mt-0.5 shrink-0"></i>
                                <span>Nominal penempatan deposito mulai dari <strong>Rp 500.000</strong>.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-circle-check text-emerald-400 text-sm mt-0.5 shrink-0"></i>
                                <span>Fotocopy KTP / Identitas Diri Asli (Perorangan) atau Dokumen Legalitas Usaha (Instansi/Badan Hukum).</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-circle-check text-emerald-400 text-sm mt-0.5 shrink-0"></i>
                                <span>Fotocopy NPWP (jika ada).</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-circle-check text-emerald-400 text-sm mt-0.5 shrink-0"></i>
                                <span>Mengisi & menandatangani Formulir Akad Pembukaan Deposito BPRS Madinah.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-circle-check text-emerald-400 text-sm mt-0.5 shrink-0"></i>
                                <span>Memiliki Rekening Tabungan BPRS Madinah untuk penampungan bagi hasil bulanan.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="pt-4 border-t border-blue-700/50">
                        <a href="https://wa.me/6281234567890?text=Halo%20BPRS%20Madinah,%20saya%20ingin%20konsultasi%20syarat%20dan%20pembukaan%20Deposito%20Syariah" target="_blank" class="w-full py-3.5 bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-extrabold rounded-2xl transition shadow-lg flex items-center justify-center gap-2 cursor-pointer">
                            <i class="fa-brands fa-whatsapp text-base"></i> Tanya Syarat via Customer Service
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 🖼️ MODAL LIGHTBOX BROSUR FULL -->
    <div x-show="showImageModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/85 backdrop-blur-md" style="display: none;">
        <div @click.away="showImageModal = false" class="relative max-w-4xl w-full bg-white rounded-3xl p-6 shadow-2xl space-y-4 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center border-b border-slate-200 pb-3">
                <h4 class="font-extrabold text-slate-900 text-base">Brosur Asli Deposito Syariah BPRS Madinah</h4>
                <button @click="showImageModal = false" class="text-slate-400 hover:text-slate-700 text-2xl font-bold p-1">&times;</button>
            </div>
            <div class="rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 p-2">
                <img src="<?= base_url('assets/produk/brosur_deposito.webp') ?>" alt="Brosur Deposito Syariah" class="w-full h-auto rounded-xl mx-auto border border-slate-200">
            </div>
            <div class="flex justify-end">
                <button @click="showImageModal = false" class="px-5 py-2 rounded-xl bg-slate-900 text-white text-xs font-bold hover:bg-slate-800 transition">
                    Tutup
                </button>
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