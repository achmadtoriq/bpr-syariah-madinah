<main class="w-full bg-slate-50 text-slate-900 font-sans min-h-screen" x-data="{ showImageModal: false }">
    <!-- 🏢 HERO BANNER SECTION (Soft Light Corporate Theme) -->
    <section class="relative bg-gradient-to-b from-blue-50/80 via-white to-slate-50 text-slate-900 pt-28 pb-12 md:pt-36 md:pb-16 border-b border-slate-200 overflow-hidden">
        <!-- Soft Background Decorative Orbs -->
        <div class="absolute top-0 right-1/4 w-[400px] h-[400px] bg-blue-200/30 blur-[120px] rounded-full pointer-events-none"></div>

        <div class="container mx-auto max-w-7xl px-5 md:px-8 relative z-10">
            <!-- Breadcrumb -->
            <nav class="flex items-center gap-2 text-xs text-slate-500 mb-4">
                <a href="<?= base_url() ?>" class="hover:text-blue-700 transition">Home</a>
                <span>/</span>
                <span>Tentang Kami</span>
                <span>/</span>
                <span class="text-blue-700 font-semibold">Struktur Organisasi</span>
            </nav>

            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
                <div class="max-w-3xl space-y-3">
                    <span class="inline-block rounded-full bg-blue-100 border border-blue-200 px-4 py-1.5 text-xs font-bold text-blue-800 uppercase tracking-widest">
                        <i class="fa-solid fa-sitemap mr-1 text-blue-600"></i> Tata Kelola Perbankan Syariah
                    </span>
                    <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-slate-900">Bagan Struktur Organisasi</h1>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                        Bagan struktur organisasi resmi PT BPRS Syariah Madinah Lamongan secara terstruktur, simetris, dan presisi.
                    </p>
                </div>

                <!-- View Toggle Buttons -->
                <div class="inline-flex rounded-2xl bg-white p-1.5 border border-slate-200 shadow-sm shrink-0">
                    <button @click="showImageModal = true" class="px-4 py-2 text-xs font-bold text-blue-700 hover:text-blue-900 transition-all flex items-center gap-2 cursor-pointer">
                        <i class="fa-solid fa-image"></i> Bandingkan Gambar Fisik Asli
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- 🌐 PIXEL-PERFECT EXECUTIVE WEB ORGANIZATIONAL TREE DIAGRAM -->
    <section class="py-12 md:py-16">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 md:px-8 space-y-8">
            
            <!-- Outer Diagram Container (No Overflow Y, Clean Compact Desktop Fit) -->
            <div class="bg-white rounded-3xl border border-slate-200/90 p-4 sm:p-6 md:p-8 shadow-xl overflow-x-auto overflow-y-hidden">
                
                <!-- Fixed Compact Dimensions (1000px width x 720px height) for Zero Desktop Scrollbars -->
                <div class="w-[1000px] h-[720px] mx-auto relative select-none">
                    
                    <!-- ✏️ SVG CONNECTING VECTOR LINES OVERLAY -->
                    <svg class="absolute inset-0 w-full h-full pointer-events-none z-0 overflow-visible">
                        <!-- 1. RUPS (x=500, y=55) down to Horizontal Bar (y=85) -->
                        <line x1="500" y1="55" x2="500" y2="85" stroke="#2563eb" stroke-width="3" stroke-linecap="round" />

                        <!-- 2. Pemegang Saham (x=660, y=30) connecting left to RUPS stem (x=500, y=30) -->
                        <line x1="660" y1="30" x2="500" y2="30" stroke="#2563eb" stroke-width="3" stroke-linecap="round" />

                        <!-- 3. Horizontal Oversight Bar (y=85) from Komisaris Center (x=160) to DPS Center (x=840) -->
                        <line x1="160" y1="85" x2="840" y2="85" stroke="#2563eb" stroke-width="3" stroke-linecap="round" />

                        <!-- 4. Drop to DEWAN KOMISARIS (x=160, y=85 to y=110) -->
                        <line x1="160" y1="85" x2="160" y2="110" stroke="#2563eb" stroke-width="3" stroke-linecap="round" />

                        <!-- 5. Drop to DEWAN PENGAWASAN SYARIAH (x=840, y=85 to y=110) -->
                        <line x1="840" y1="85" x2="840" y2="110" stroke="#2563eb" stroke-width="3" stroke-linecap="round" />

                        <!-- 6. Dotted Line from DEWAN KOMISARIS (x=160, y=165) down to INTERNAL CONTROL (x=160, y=295) -->
                        <line x1="160" y1="165" x2="160" y2="295" stroke="#0284c7" stroke-width="2.5" stroke-dasharray="4 4" />

                        <!-- 7. 100% PERFECT STRAIGHT HORIZONTAL SOLID LINE FROM INTERNAL CONTROL (x=250, y=315) INTO DEWAN DIREKSI (x=320, y=315) -->
                        <line x1="250" y1="315" x2="320" y2="315" stroke="#2563eb" stroke-width="2.5" stroke-linecap="round" />

                        <!-- 8. Main Stem from Horizontal Bar (x=500, y=85) down to DEWAN DIREKSI (x=500, y=285) -->
                        <line x1="500" y1="85" x2="500" y2="285" stroke="#2563eb" stroke-width="3.5" stroke-linecap="round" />

                        <!-- 9. Main Stem from DEWAN DIREKSI (x=500, y=345) down to 4 Divisions Trunk Bar (x=500, y=390) -->
                        <line x1="500" y1="345" x2="500" y2="390" stroke="#2563eb" stroke-width="3.5" stroke-linecap="round" />

                        <!-- 10. Horizontal 4 Divisions Trunk Bar (y=390) from Col 1 (x=110) to Col 4 (x=885) -->
                        <line x1="110" y1="390" x2="885" y2="390" stroke="#2563eb" stroke-width="3.5" stroke-linecap="round" />

                        <!-- 11. Drop to COL 1 Header (x=110, y=390 to y=420) -->
                        <line x1="110" y1="390" x2="110" y2="420" stroke="#2563eb" stroke-width="3" stroke-linecap="round" />

                        <!-- 12. Drop to COL 2 Header (x=380, y=390 to y=420) -->
                        <line x1="380" y1="390" x2="380" y2="420" stroke="#2563eb" stroke-width="3" stroke-linecap="round" />

                        <!-- 13. Drop to COL 3 Header (x=650, y=390 to y=420) -->
                        <line x1="650" y1="390" x2="650" y2="420" stroke="#2563eb" stroke-width="3" stroke-linecap="round" />

                        <!-- 14. Drop to COL 4 Kantor Kas (x=885, y=390 to y=420) -->
                        <line x1="885" y1="390" x2="885" y2="420" stroke="#2563eb" stroke-width="3" stroke-linecap="round" />

                        <!-- 15. COL 1 (MARKETING) EXACT CENTERED CONNECTORS (x=18, Vertical ends at y=616) -->
                        <path d="M 110 462 L 110 477 L 18 477 L 18 616" stroke="#2563eb" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                        <line x1="18" y1="500" x2="30" y2="500" stroke="#2563eb" stroke-width="2" />
                        <line x1="18" y1="558" x2="30" y2="558" stroke="#2563eb" stroke-width="2" />
                        <line x1="18" y1="616" x2="30" y2="616" stroke="#2563eb" stroke-width="2" />

                        <!-- 16. COL 2 (OPERASIONAL) EXACT CENTERED CONNECTORS -->
                        <!-- Left Sub-col (x=258, Vertical ends at y=641.5) -->
                        <path d="M 380 462 L 380 477 L 258 477 L 258 641.5" stroke="#d97706" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                        <line x1="258" y1="497.5" x2="270" y2="497.5" stroke="#d97706" stroke-width="2" />
                        <line x1="258" y1="545.5" x2="270" y2="545.5" stroke="#d97706" stroke-width="2" />
                        <line x1="258" y1="593.5" x2="270" y2="593.5" stroke="#d97706" stroke-width="2" />
                        <line x1="258" y1="641.5" x2="270" y2="641.5" stroke="#d97706" stroke-width="2" />

                        <!-- Right Sub-col (x=395, Vertical ends at y=605) -->
                        <path d="M 380 462 L 380 477 L 395 477 L 395 605" stroke="#d97706" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                        <line x1="395" y1="499" x2="407" y2="499" stroke="#d97706" stroke-width="2" />
                        <line x1="395" y1="552" x2="407" y2="552" stroke="#d97706" stroke-width="2" />
                        <line x1="395" y1="605" x2="407" y2="605" stroke="#d97706" stroke-width="2" />

                        <!-- 17. COL 3 (KEUANGAN) EXACT CENTERED CONNECTORS (x=550, Vertical ends at y=674) -->
                        <path d="M 650 462 L 650 477 L 550 477 L 550 674" stroke="#0d9488" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                        <line x1="550" y1="500" x2="562" y2="500" stroke="#0d9488" stroke-width="2" />
                        <line x1="550" y1="558" x2="562" y2="558" stroke="#0d9488" stroke-width="2" />
                        <line x1="550" y1="616" x2="562" y2="616" stroke="#0d9488" stroke-width="2" />
                        <line x1="550" y1="674" x2="562" y2="674" stroke="#0d9488" stroke-width="2" />
                    </svg>

                    <!-- ==================== TIER 1 CARDS ==================== -->
                    <!-- RUPS (Top Center, x=388 to 612, Center=500) -->
                    <div class="absolute top-[5px] left-[388px] w-[224px] py-3 px-4 bg-gradient-to-r from-amber-500 via-amber-600 to-amber-700 border-2 border-amber-400/60 rounded-2xl text-center shadow-lg shadow-amber-500/20 text-white z-10 hover:scale-105 transition">
                        <div class="flex items-center justify-center gap-2">
                            <i class="fa-solid fa-crown text-amber-200"></i>
                            <h3 class="font-extrabold text-sm tracking-wider">RUPS</h3>
                        </div>
                    </div>

                    <!-- PEMEGANG SAHAM (Top Right, x=660 to 900) -->
                    <div class="absolute top-[5px] left-[660px] w-[240px] py-3 px-4 bg-gradient-to-r from-blue-900 to-slate-900 border-2 border-blue-700/60 rounded-2xl text-center shadow-lg text-white z-10 hover:scale-105 transition">
                        <div class="flex items-center justify-center gap-2">
                            <i class="fa-solid fa-chart-pie text-blue-300"></i>
                            <h3 class="font-extrabold text-xs tracking-wider">PEMEGANG SAHAM</h3>
                        </div>
                    </div>

                    <!-- ==================== TIER 2 CARDS ==================== -->
                    <!-- DEWAN KOMISARIS (Left, x=30 to 290, Center=160) -->
                    <div class="absolute top-[110px] left-[30px] w-[260px] py-3.5 px-3 bg-blue-900 border-2 border-blue-950 rounded-2xl text-center shadow-lg text-white z-10 hover:border-blue-400 transition">
                        <div class="flex items-center justify-center gap-2">
                            <i class="fa-solid fa-building-columns text-blue-300 text-xs"></i>
                            <h4 class="font-extrabold text-xs tracking-wider">DEWAN KOMISARIS</h4>
                        </div>
                    </div>

                    <!-- INTERNAL CONTROL (Aligned level with Dewan Direksi, top-[295px] h-[40px], vertical center y=315px) -->
                    <div class="absolute top-[295px] left-[70px] w-[180px] h-[40px] bg-sky-50 border-2 border-sky-400 rounded-xl text-center shadow-sm flex items-center justify-center z-10 hover:bg-sky-100 transition">
                        <span class="font-extrabold text-[11px] text-sky-800 tracking-wider flex items-center justify-center gap-1.5">
                            <i class="fa-solid fa-magnifying-glass-chart text-sky-600"></i> INTERNAL CONTROL
                        </span>
                    </div>

                    <!-- DEWAN PENGAWASAN SYARIAH (Right, x=710 to 970, Center=840) -->
                    <div class="absolute top-[110px] left-[710px] w-[260px] py-3.5 px-3 bg-emerald-800 border-2 border-emerald-900 rounded-2xl text-center shadow-lg text-white z-10 hover:border-emerald-400 transition">
                        <div class="flex items-center justify-center gap-2">
                            <i class="fa-solid fa-kaaba text-emerald-200 text-xs"></i>
                            <h4 class="font-extrabold text-xs tracking-wider">DEWAN PENGAWASAN SYARIAH</h4>
                        </div>
                    </div>

                    <!-- ==================== TIER 3 CARD ==================== -->
                    <!-- DEWAN DIREKSI (Center, x=320 to 680, top-[285px] h-[60px], vertical center y=315px) -->
                    <div class="absolute top-[285px] left-[320px] w-[360px] h-[60px] bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 border-2 border-blue-500 rounded-2xl text-center shadow-xl shadow-blue-600/20 text-white flex items-center justify-center z-10 hover:scale-[1.02] transition">
                        <div class="flex items-center justify-center gap-2">
                            <i class="fa-solid fa-user-tie text-blue-200 text-base"></i>
                            <h3 class="font-extrabold text-sm tracking-wider">DEWAN DIREKSI</h3>
                        </div>
                    </div>

                    <!-- ==================== TIER 4 CARDS (4 COLUMNS) ==================== -->
                    
                    <!-- COLUMN 1: MARKETING (Header x=0 to 220, Center=110) -->
                    <div class="absolute top-[420px] left-[0px] w-[220px] z-10">
                        <div class="w-full py-3 px-2 bg-gradient-to-r from-blue-700 to-blue-800 border border-blue-900 rounded-xl text-center shadow-md text-white">
                            <h5 class="font-extrabold text-xs flex items-center justify-center gap-1.5">
                                <i class="fa-solid fa-hand-holding-dollar text-blue-300"></i> KEPALA BAGIAN MARKETING
                            </h5>
                        </div>
                    </div>
                    <!-- MARKETING SUB-CARDS WITH ROUNDED LEFT ACCENT BORDER (Matching Screenshot) -->
                    <div class="absolute top-[480px] left-[30px] w-[190px] h-[40px] bg-white border border-slate-200 border-l-4 border-l-blue-600 rounded-xl text-xs font-bold text-slate-800 flex items-center justify-center shadow-sm hover:shadow-md transition z-10">
                        Account Officer/AO
                    </div>
                    <div class="absolute top-[538px] left-[30px] w-[190px] h-[40px] bg-blue-50/90 border border-blue-300 border-l-4 border-l-sky-600 rounded-xl text-xs font-extrabold text-sky-800 flex items-center justify-center shadow-sm hover:shadow-md transition z-10">
                        Account Funding
                    </div>
                    <div class="absolute top-[596px] left-[30px] w-[190px] h-[40px] bg-white border border-slate-200 border-l-4 border-l-blue-600 rounded-xl text-xs font-bold text-slate-800 flex items-center justify-center shadow-sm hover:shadow-md transition z-10">
                        TIM REMEDIAL
                    </div>

                    <!-- COLUMN 2: OPERASIONAL (Header x=245 to 515, Center=380) -->
                    <div class="absolute top-[420px] left-[245px] w-[270px] z-10">
                        <div class="w-full py-3 px-2 bg-gradient-to-r from-amber-600 to-amber-700 border border-amber-800 rounded-xl text-center shadow-md text-white">
                            <h5 class="font-extrabold text-xs flex items-center justify-center gap-1.5">
                                <i class="fa-solid fa-piggy-bank text-amber-200"></i> KEPALA BAGIAN OPERASIONAL
                            </h5>
                        </div>
                    </div>
                    <!-- OPERASIONAL SUB-CARDS 2A (Left Cards x=270 with Amber Left Border) -->
                    <div class="absolute top-[480px] left-[270px] w-[115px] h-[35px] bg-white border border-slate-200 border-l-4 border-l-amber-500 rounded-xl text-[11px] font-bold text-slate-800 flex items-center justify-center shadow-sm hover:shadow-md transition z-10">
                        Teller
                    </div>
                    <div class="absolute top-[528px] left-[270px] w-[115px] h-[35px] bg-white border border-slate-200 border-l-4 border-l-amber-500 rounded-xl text-[10px] font-bold text-slate-800 text-center leading-tight flex items-center justify-center shadow-sm hover:shadow-md transition z-10">
                        CS / Tabungan / Deposito
                    </div>
                    <div class="absolute top-[576px] left-[270px] w-[115px] h-[35px] bg-white border border-slate-200 border-l-4 border-l-amber-500 rounded-xl text-[11px] font-bold text-slate-800 flex items-center justify-center shadow-sm hover:shadow-md transition z-10">
                        Legal / Appraiser
                    </div>
                    <div class="absolute top-[624px] left-[270px] w-[115px] h-[35px] bg-white border border-slate-200 border-l-4 border-l-amber-500 rounded-xl text-[10px] font-bold text-slate-800 text-center leading-tight flex items-center justify-center shadow-sm hover:shadow-md transition z-10">
                        Admin Pembiayaan
                    </div>

                    <!-- OPERASIONAL SUB-CARDS 2B (Right Cards x=407 with Dark Amber Left Border) -->
                    <div class="absolute top-[480px] left-[407px] w-[115px] h-[38px] bg-amber-50/70 border border-amber-200 border-l-4 border-l-amber-600 rounded-xl text-[10px] font-bold text-slate-900 text-center leading-tight flex items-center justify-center shadow-sm hover:shadow-md transition z-10">
                        Pelayanan Kas MAN Lamongan
                    </div>
                    <div class="absolute top-[533px] left-[407px] w-[115px] h-[38px] bg-amber-50/70 border border-amber-200 border-l-4 border-l-amber-600 rounded-xl text-[10px] font-bold text-slate-900 text-center leading-tight flex items-center justify-center shadow-sm hover:shadow-md transition z-10">
                        Pelayanan Kas SMPN 1 Lamongan
                    </div>
                    <div class="absolute top-[586px] left-[407px] w-[115px] h-[38px] bg-amber-50/70 border border-amber-200 border-l-4 border-l-amber-600 rounded-xl text-[11px] font-bold text-slate-900 text-center flex items-center justify-center shadow-sm hover:shadow-md transition z-10">
                        UNIT APU/PPT
                    </div>

                    <!-- COLUMN 3: KEUANGAN (Header x=535 to 765, Center=650) -->
                    <div class="absolute top-[420px] left-[535px] w-[230px] z-10">
                        <div class="w-full py-3 px-2 bg-gradient-to-r from-teal-700 to-teal-800 border border-teal-900 rounded-xl text-center shadow-md text-white">
                            <h5 class="font-extrabold text-[11px] flex items-center justify-center gap-1.5 leading-tight">
                                <i class="fa-solid fa-calculator text-teal-200"></i> KEPALA BAGIAN KEUANGAN / PELAPORAN dan UMUM
                            </h5>
                        </div>
                    </div>
                    <!-- KEUANGAN SUB-CARDS (x=562 with Teal Left Border) -->
                    <div class="absolute top-[480px] left-[562px] w-[203px] h-[40px] bg-white border border-slate-200 border-l-4 border-l-teal-600 rounded-xl text-xs font-bold text-slate-800 flex items-center justify-center shadow-sm hover:shadow-md transition z-10">
                        Akuntansi
                    </div>
                    <div class="absolute top-[538px] left-[562px] w-[203px] h-[40px] bg-white border border-slate-200 border-l-4 border-l-teal-600 rounded-xl text-xs font-bold text-slate-800 flex items-center justify-center shadow-sm hover:shadow-md transition z-10">
                        Umum/sekretariatan
                    </div>
                    <div class="absolute top-[596px] left-[562px] w-[203px] h-[40px] bg-white border border-slate-200 border-l-4 border-l-teal-600 rounded-xl text-xs font-bold text-slate-800 flex items-center justify-center shadow-sm hover:shadow-md transition z-10">
                        IT /Admin. SID/SLIK
                    </div>
                    <div class="absolute top-[654px] left-[562px] w-[203px] h-[40px] bg-white border border-slate-200 border-l-4 border-l-teal-600 rounded-xl text-xs font-bold text-slate-800 flex items-center justify-center shadow-sm hover:shadow-md transition z-10">
                        SDM
                    </div>

                    <!-- COLUMN 4: KANTOR KAS (x=785 to 985, Center=885) -->
                    <div class="absolute top-[420px] left-[785px] w-[200px] z-10">
                        <div class="w-full py-3.5 px-3 bg-gradient-to-r from-sky-600 to-sky-700 border border-sky-800 rounded-xl text-center shadow-md text-white hover:scale-105 transition">
                            <h5 class="font-extrabold text-xs tracking-wide flex items-center justify-center gap-1.5">
                                <i class="fa-solid fa-store text-sky-200"></i> Kantor Kas
                            </h5>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer Hint -->
            <div class="text-center text-xs text-slate-500 flex items-center justify-center gap-4">
                <button @click="showImageModal = true" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold underline cursor-pointer">
                    <i class="fa-solid fa-image"></i> Lihat Gambar Fisik Asli
                </button>
            </div>

        </div>
    </section>

    <!-- 🖼️ MODAL IMAGE DIAGRAM (ORIGINAL IMAGE FALLBACK) -->
    <div x-show="showImageModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/85 backdrop-blur-md" style="display: none;">
        <div @click.away="showImageModal = false" class="relative max-w-5xl w-full bg-white rounded-3xl p-6 shadow-2xl space-y-4 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center border-b border-slate-200 pb-3">
                <h4 class="font-extrabold text-slate-900 text-base">Gambar Asli Struktur Organisasi BPRS Madinah</h4>
                <button @click="showImageModal = false" class="text-slate-400 hover:text-slate-700 text-2xl font-bold p-1">&times;</button>
            </div>
            <div class="rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 p-2">
                <img src="/assets/struktur_bprs.png" alt="Gambar Asli Struktur Organisasi" class="w-full h-auto rounded-xl mx-auto border border-slate-200">
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
            <h3 class="text-xl font-bold text-slate-900">Tautan Seputar Perusahaan</h3>
            <div class="flex flex-wrap justify-center items-center gap-4">
                <a href="<?= base_url('/profil') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-building text-blue-600"></i> Profil & Sejarah BPRS
                </a>
                <a href="<?= base_url('/managemen') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-users text-blue-600"></i> Manajemen & Direksi
                </a>
                <a href="<?= base_url('/keuangan') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-file-invoice-dollar text-emerald-600"></i> Laporan Keuangan & GCG
                </a>
                <a href="<?= base_url('/awards') ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-300 text-xs font-bold text-slate-800 hover:border-blue-600 hover:text-blue-700 shadow-sm transition">
                    <i class="fa-solid fa-trophy text-amber-500"></i> Penghargaan Infobank
                </a>
            </div>
        </div>
    </section>
</main>