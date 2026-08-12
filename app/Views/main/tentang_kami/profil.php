<main class="w-full bg-slate-50 text-slate-900 font-sans min-h-screen">
    <!-- 🏢 HERO BANNER SECTION (Soft Light Corporate Theme) -->
    <section class="relative bg-gradient-to-b from-blue-50/80 via-white to-slate-50 text-slate-900 pt-28 pb-16 md:pt-36 md:pb-20 border-b border-slate-200 overflow-hidden">
        <!-- Soft Background Decorative Orbs -->
        <div class="absolute top-0 right-1/4 w-[400px] h-[400px] bg-blue-200/30 blur-[120px] rounded-full pointer-events-none"></div>

        <div class="container mx-auto max-w-7xl px-5 md:px-8 relative z-10">
            <!-- Breadcrumb -->
            <nav class="flex items-center gap-2 text-xs text-slate-500 mb-4">
                <a href="<?= base_url() ?>" class="hover:text-blue-700 transition">Home</a>
                <span>/</span>
                <span>Tentang Kami</span>
                <span>/</span>
                <span class="text-blue-700 font-semibold">Profil Perusahaan</span>
            </nav>

            <div class="max-w-3xl space-y-4">
                <span class="inline-block rounded-full bg-blue-100 border border-blue-200 px-4 py-1.5 text-xs font-bold text-blue-800 uppercase tracking-widest">Tentang BPRS Madinah</span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-slate-900">Profil & Sejarah Perusahaan</h1>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    Mengenal lebih dekat PT BPRS Syariah Madinah Lamongan — Bank Pembiayaan Rakyat Syariah yang berkomitmen membangun perekonomian syariah masyarakat Lamongan dan sekitarnya.
                </p>
            </div>
        </div>
    </section>

    <!-- 📜 SEJARAH PERUSAHAAN (COMPANY HISTORY) -->
    <section class="py-16 md:py-24 bg-white border-b border-slate-200">
        <div class="container mx-auto max-w-7xl px-5 md:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left Visual Image -->
                <div class="lg:col-span-5 relative">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-slate-200 group">
                        <img src="/assets/kantor_madinah.jpeg" alt="Kantor BPRS Syariah Madinah Lamongan" class="w-full h-[420px] object-cover transition duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
                        
                        <div class="absolute bottom-6 left-6 right-6 text-white space-y-1">
                            <span class="inline-block rounded-full bg-blue-600 px-3 py-1 text-[11px] font-bold">Kantor Pusat Lamongan</span>
                            <p class="text-xs text-slate-300">Jl. Lamongrejo No.77, Jetis, Lamongan</p>
                        </div>
                    </div>

                    <!-- Floating Badge Milestones -->
                    <div class="absolute -bottom-6 -right-4 md:-right-6 bg-white text-slate-900 p-5 rounded-2xl shadow-xl border border-slate-200 flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600 text-white font-extrabold text-xl shadow">
                            15+
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-900">Tahun Melayani</p>
                            <p class="text-[10px] text-slate-500">Sejak 2008 di Lamongan</p>
                        </div>
                    </div>
                </div>

                <!-- Right Narrative -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="space-y-2">
                        <span class="text-xs font-bold uppercase tracking-wider text-blue-700">Sejarah Pendirian</span>
                        <h2 class="text-3xl font-extrabold text-slate-900">Perjalanan BPRS Syariah Madinah</h2>
                    </div>

                    <div class="space-y-4 text-slate-600 text-sm leading-relaxed text-justify">
                        <p>
                            <strong class="text-slate-900">PT Bank Pembiayaan Rakyat Syariah Madinah (PT BPRS Madinah)</strong> berkedudukan di Lamongan didirikan berdasar Akta Pendirian No. 48 Tahun 2008 yang dikeluarkan oleh Notaris Haryo Bimo Bramantyo, SH, MKn, sebagai pengganti dari Notaris Bambang Heru Djuwito, SH., M.H tertanggal 13 Oktober 2008 dan mendapat pengesahan resmi dari Menteri Hukum dan HAM Republik Indonesia No. AHU-94287.AH,01.01 Tahun 2008.
                        </p>
                        <p>
                            PT BPRS Madinah secara resmi beroperasi pada tanggal <strong class="text-slate-900">09 Juni 2009</strong> berdasar Izin Usaha No. 11/26/KEP.GBI/DpG/2009 tertanggal 18 Mei 2009 dari Gubernur Bank Indonesia. Secara operasional, kegiatan perbankan dilandasi oleh UU No. 21 Tahun 2008 tentang Perbankan Syariah dan diawasi oleh Otoritas Jasa Keuangan (OJK).
                        </p>
                        <p>
                            Bank didirikan dengan modal awal disetor sepenuhnya oleh swasta warga asli Lamongan yang memiliki visi kuat mengembangkan ekonomi kerakyatan berbasis syariah di sektor UMKM, perdagangan, pertanian, dan jasa.
                        </p>
                    </div>

                    <!-- Milestone Highlights Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-4 border-t border-slate-100">
                        <div class="bg-blue-50/60 border border-blue-100 p-4 rounded-2xl space-y-1">
                            <span class="text-xs font-bold text-blue-700">13 Okt 2008</span>
                            <h4 class="font-bold text-slate-900 text-sm">Akta Pendirian</h4>
                            <p class="text-[11px] text-slate-500">Notaris Haryo Bimo, SH</p>
                        </div>
                        <div class="bg-blue-50/60 border border-blue-100 p-4 rounded-2xl space-y-1">
                            <span class="text-xs font-bold text-blue-700">09 Juni 2009</span>
                            <h4 class="font-bold text-slate-900 text-sm">Resmi Beroperasi</h4>
                            <p class="text-[11px] text-slate-500">Izin Gubernur Bank Indonesia</p>
                        </div>
                        <div class="bg-blue-50/60 border border-blue-100 p-4 rounded-2xl space-y-1">
                            <span class="text-xs font-bold text-blue-700">Regulasi OJK</span>
                            <h4 class="font-bold text-slate-900 text-sm">Terjamin LPS</h4>
                            <p class="text-[11px] text-slate-500">Maks. Rp 2 M per Nasabah</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 🎯 VISI & MISI PERUSAHAAN (Soft Light Aesthetic) -->
    <section class="py-16 md:py-24 bg-slate-50 border-b border-slate-200">
        <div class="container mx-auto max-w-7xl px-5 md:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-3 mb-14">
                <span class="inline-block rounded-full bg-blue-100 px-3.5 py-1 text-xs font-bold text-blue-800 uppercase tracking-wide">Arah & Komitmen</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Visi & Misi Perusahaan</h2>
                <p class="text-slate-600 text-sm">Pedoman utama seluruh insan BPRS Syariah Madinah dalam memberikan pelayanan terbaik.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                <!-- VISI CARD (Clean Light Card) -->
                <div class="lg:col-span-5 rounded-3xl bg-white p-8 md:p-10 shadow-lg border border-slate-200 flex flex-col justify-between relative overflow-hidden">
                    <div class="space-y-6 relative z-10">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 text-blue-600 font-bold text-2xl border border-blue-100">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold uppercase tracking-widest text-blue-700">Visi Perusahaan</span>
                            <h3 class="text-2xl font-extrabold mt-1 text-slate-900">Menjadi BPRS Terkemuka & Terpercaya</h3>
                        </div>
                        <div class="border-l-4 border-blue-600 bg-blue-50/60 p-4 rounded-r-2xl text-slate-700 text-sm leading-relaxed italic">
                            "Menjadi Bank Pembiayaan Rakyat Syariah terkemuka yang selalu mengutamakan kemajuan, kesejahteraan, dan kepuasan nasabah."
                        </div>
                    </div>

                    <div class="pt-8 border-t border-slate-100 mt-8 flex items-center justify-between text-xs text-slate-500">
                        <span>Prinsip Keuangan Syariah</span>
                        <i class="fa-solid fa-shield-halved text-blue-600 text-lg"></i>
                    </div>
                </div>

                <!-- MISI CARD -->
                <div class="lg:col-span-7 rounded-3xl bg-white p-8 md:p-10 shadow-lg border border-slate-200 flex flex-col justify-between space-y-6">
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-50 text-amber-600 font-bold text-2xl border border-amber-100">
                                <i class="fa-solid fa-bullseye"></i>
                            </div>
                            <div>
                                <span class="text-xs font-bold uppercase tracking-widest text-amber-600">Misi Perusahaan</span>
                                <h3 class="text-2xl font-extrabold text-slate-900">3 Pilar Utama Pelayanan</h3>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:bg-blue-50/50 hover:border-blue-200 transition">
                                <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-blue-600 text-white font-bold text-xs shrink-0 mt-0.5 shadow-sm">
                                    1
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900 text-sm">Pelayanan Berlandaskan IMTAQ</h4>
                                    <p class="text-xs text-slate-600 leading-relaxed mt-1">
                                        Melakukan pelayanan perbankan syariah terbaik berdasarkan iman dan taqwa kepada Allah SWT (IMTAQ) dengan mengutamakan pengusaha mikro, kecil, menengah, serta pekerja.
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:bg-blue-50/50 hover:border-blue-200 transition">
                                <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-blue-600 text-white font-bold text-xs shrink-0 mt-0.5 shadow-sm">
                                    2
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900 text-sm">Tata Kelola Baik (Good Corporate Governance)</h4>
                                    <p class="text-xs text-slate-600 leading-relaxed mt-1">
                                        Memberikan pelayanan terbaik dan prima kepada nasabah dengan melaksanakan prinsip Good Corporate Governance (GCG) secara konsisten dan transparan.
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:bg-blue-50/50 hover:border-blue-200 transition">
                                <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-blue-600 text-white font-bold text-xs shrink-0 mt-0.5 shadow-sm">
                                    3
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900 text-sm">Manfaat Optimal Stakeholders</h4>
                                    <p class="text-xs text-slate-600 leading-relaxed mt-1">
                                        Memberikan keuntungan dan manfaat yang optimal serta berkelanjutan kepada seluruh shareholders, nasabah, dan pemangku kepentingan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 🌟 CORPORATE CULTURE & MOTO (I T Q O N - Soft Light Theme) -->
    <section class="py-16 md:py-24 bg-white border-b border-slate-200">
        <div class="container mx-auto max-w-7xl px-5 md:px-8">
            <!-- Moto Banner (Soft Light Blue Gradient) -->
            <div class="rounded-3xl bg-gradient-to-r from-blue-50 via-blue-100/60 to-sky-50 border border-blue-200/80 text-slate-900 p-8 md:p-12 text-center shadow-sm relative overflow-hidden mb-16">
                <div class="relative z-10 max-w-2xl mx-auto space-y-3">
                    <span class="inline-block rounded-full bg-blue-600 text-white px-4 py-1.5 text-xs font-bold uppercase tracking-widest shadow-sm">Moto BPRS Madinah</span>
                    <h2 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-blue-900">"BERSAMA MERAIH BERKAH"</h2>
                    <p class="text-slate-600 text-xs sm:text-sm">Menjadikan setiap transaksi keuangan sebagai sarana ibadah dan keberkahan bersama.</p>
                </div>
            </div>

            <!-- ITQON Section Title -->
            <div class="text-center max-w-3xl mx-auto space-y-3 mb-12">
                <span class="inline-block rounded-full bg-blue-100 px-3.5 py-1 text-xs font-bold text-blue-800 uppercase tracking-wide">Budaya Kerja Perusahaan</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Nilai Utama Budaya Kerja ( I T Q O N )</h2>
                <p class="text-slate-600 text-sm">5 Budaya Kerja dan 8 Perilaku Utama Insan BPRS Syariah Madinah.</p>
            </div>

            <!-- 5 Pillar Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <!-- Card I: Integritas -->
                <div class="rounded-2xl bg-slate-50 border border-slate-200/80 p-6 space-y-4 hover:shadow-xl hover:border-blue-500/40 hover:-translate-y-1 transition duration-300">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600 text-white font-extrabold text-lg shadow-md">
                        I
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-base">Integritas</h3>
                        <p class="text-xs text-blue-700 font-semibold">Integrity</p>
                    </div>
                    <ul class="space-y-2 text-xs text-slate-600 border-t border-slate-200 pt-3">
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check text-blue-600 mt-0.5"></i> Jujur, tulus, dan ikhlas</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check text-blue-600 mt-0.5"></i> Disiplin, konsisten, dan bertanggung jawab</li>
                    </ul>
                </div>

                <!-- Card T: Transparansi -->
                <div class="rounded-2xl bg-slate-50 border border-slate-200/80 p-6 space-y-4 hover:shadow-xl hover:border-blue-500/40 hover:-translate-y-1 transition duration-300">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600 text-white font-extrabold text-lg shadow-md">
                        T
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-base">Transparansi</h3>
                        <p class="text-xs text-blue-700 font-semibold">Transparency</p>
                    </div>
                    <ul class="space-y-2 text-xs text-slate-600 border-t border-slate-200 pt-3">
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check text-blue-600 mt-0.5"></i> Memberikan informasi yang benar</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check text-blue-600 mt-0.5"></i> Laporan transparan & tepat waktu</li>
                    </ul>
                </div>

                <!-- Card Q: Quality -->
                <div class="rounded-2xl bg-slate-50 border border-slate-200/80 p-6 space-y-4 hover:shadow-xl hover:border-blue-500/40 hover:-translate-y-1 transition duration-300">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600 text-white font-extrabold text-lg shadow-md">
                        Q
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-base">Quality</h3>
                        <p class="text-xs text-blue-700 font-semibold">Kualitas Kerja</p>
                    </div>
                    <ul class="space-y-2 text-xs text-slate-600 border-t border-slate-200 pt-3">
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check text-blue-600 mt-0.5"></i> Meningkatkan kompetensi secara berkelanjutan</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check text-blue-600 mt-0.5"></i> Memberikan hasil kerja terbaik</li>
                    </ul>
                </div>

                <!-- Card O: Orientasi Customer -->
                <div class="rounded-2xl bg-slate-50 border border-slate-200/80 p-6 space-y-4 hover:shadow-xl hover:border-blue-500/40 hover:-translate-y-1 transition duration-300">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600 text-white font-extrabold text-lg shadow-md">
                        O
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-base">Orientasi Customer</h3>
                        <p class="text-xs text-blue-700 font-semibold">Customer Focus</p>
                    </div>
                    <ul class="space-y-2 text-xs text-slate-600 border-t border-slate-200 pt-3">
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check text-blue-600 mt-0.5"></i> Mengutamakan kepuasan nasabah</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check text-blue-600 mt-0.5"></i> Memberikan layanan ramah & prima</li>
                    </ul>
                </div>

                <!-- Card N: Improvement -->
                <div class="rounded-2xl bg-slate-50 border border-slate-200/80 p-6 space-y-4 hover:shadow-xl hover:border-blue-500/40 hover:-translate-y-1 transition duration-300">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600 text-white font-extrabold text-lg shadow-md">
                        N
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-base">Improvement</h3>
                        <p class="text-xs text-blue-700 font-semibold">Inovasi Berkelanjutan</p>
                    </div>
                    <ul class="space-y-2 text-xs text-slate-600 border-t border-slate-200 pt-3">
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check text-blue-600 mt-0.5"></i> Senantiasa melakukan penyempurnaan</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check text-blue-600 mt-0.5"></i> Berpikir kreatif dan inovatif</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 🔗 QUICK NAVIGATION FOOTER BANNER -->
    <section class="py-12 bg-slate-100">
        <div class="container mx-auto max-w-7xl px-5 md:px-8 text-center space-y-6">
            <h3 class="text-xl font-bold text-slate-900">Jelajahi Lebih Lanjut Mengenai Perusahaan</h3>
            <div class="flex flex-wrap justify-center items-center gap-4">
                <a href="<?= base_url('/managemen') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-users text-blue-600"></i> Manajemen & Jajaran Direksi
                </a>
                <a href="<?= base_url('/struktur_organisasi') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-sitemap text-blue-600"></i> Struktur Organisasi
                </a>
                <a href="<?= base_url('/awards') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-trophy text-amber-500"></i> Penghargaan Infobank
                </a>
                <a href="<?= base_url('/keuangan') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-file-invoice-dollar text-emerald-600"></i> Laporan Keuangan
                </a>
            </div>
        </div>
    </section>
</main>