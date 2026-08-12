<main class="w-full bg-slate-50 text-slate-900 font-sans min-h-screen">
    <!-- 🏢 HERO BANNER SECTION (Soft Light Corporate Theme) -->
    <section class="relative bg-gradient-to-b from-blue-50/80 via-white to-slate-50 text-slate-900 pt-28 pb-14 md:pt-36 md:pb-16 border-b border-slate-200 overflow-hidden">
        <!-- Soft Background Decorative Orbs -->
        <div class="absolute top-0 right-1/4 w-[400px] h-[400px] bg-blue-200/30 blur-[120px] rounded-full pointer-events-none"></div>

        <div class="container mx-auto max-w-7xl px-5 md:px-8 relative z-10">
            <!-- Breadcrumb -->
            <nav class="flex items-center gap-2 text-xs text-slate-500 mb-4">
                <a href="<?= base_url() ?>" class="hover:text-blue-700 transition">Home</a>
                <span>/</span>
                <span class="text-blue-700 font-semibold">Hubungi Kami</span>
            </nav>

            <div class="max-w-3xl space-y-4">
                <span class="inline-block rounded-full bg-blue-100 border border-blue-200 px-4 py-1.5 text-xs font-bold text-blue-800 uppercase tracking-widest">
                    <i class="fa-solid fa-headset mr-1"></i> Layanan Nasabah & Informasi
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-slate-900">Pusat Layanan & Kontak</h1>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    Kami siap membantu segala kebutuhan informasi tabungan, deposito, dan pembiayaan syariah Anda. Kunjungi kantor operasional kami atau hubungi tim customer service kami.
                </p>
            </div>
        </div>
    </section>

    <!-- 📞 QUICK CONTACT CARDS STRIP -->
    <section class="py-8 bg-white border-b border-slate-200 shadow-sm">
        <div class="container mx-auto max-w-7xl px-5 md:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Phone -->
                <div class="p-5 rounded-2xl bg-blue-50/70 border border-blue-200/80 space-y-3 hover:shadow-md transition">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-600 text-white font-bold text-lg shadow">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div>
                        <span class="text-[11px] font-bold text-blue-700 uppercase tracking-wider">Telepon Kantor</span>
                        <h4 class="font-extrabold text-slate-900 text-base">(0322) 314 999</h4>
                        <p class="text-xs text-slate-500">Fax: (0322) 324 999</p>
                    </div>
                    <a href="tel:0322314999" class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-700 hover:text-blue-900 underline pt-1">
                        <i class="fa-solid fa-phone-volume"></i> Panggil Sekarang
                    </a>
                </div>

                <!-- WhatsApp -->
                <div class="p-5 rounded-2xl bg-emerald-50/70 border border-emerald-200/80 space-y-3 hover:shadow-md transition">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-600 text-white font-bold text-lg shadow">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <div>
                        <span class="text-[11px] font-bold text-emerald-700 uppercase tracking-wider">WhatsApp Resmi</span>
                        <h4 class="font-extrabold text-slate-900 text-base">+62 822-2999-5259</h4>
                        <p class="text-xs text-slate-500">Respons Cepat Jam Kerja</p>
                    </div>
                    <a href="https://wa.me/6282229995259?text=Halo%20BPRS%20Madinah%20Lamongan,%20saya%20ingin%20bertanya%20informasi%20layanan." target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-700 hover:text-emerald-900 underline pt-1">
                        <i class="fa-solid fa-paper-plane"></i> Chat WhatsApp Direct
                    </a>
                </div>

                <!-- Email -->
                <div class="p-5 rounded-2xl bg-sky-50/70 border border-sky-200/80 space-y-3 hover:shadow-md transition">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-sky-600 text-white font-bold text-lg shadow">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <span class="text-[11px] font-bold text-sky-700 uppercase tracking-wider">Email Layanan</span>
                        <h4 class="font-extrabold text-slate-900 text-sm truncate">bank.madinah@gmail.com</h4>
                        <p class="text-xs text-slate-500">Kirim Pertanyaan / Dokumen</p>
                    </div>
                    <a href="mailto:bank.madinah@gmail.com" class="inline-flex items-center gap-1.5 text-xs font-bold text-sky-700 hover:text-sky-900 underline pt-1">
                        <i class="fa-solid fa-arrow-right"></i> Kirim Email
                    </a>
                </div>

                <!-- Hours -->
                <div class="p-5 rounded-2xl bg-amber-50/70 border border-amber-200/80 space-y-3 hover:shadow-md transition">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-600 text-white font-bold text-lg shadow">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div>
                        <span class="text-[11px] font-bold text-amber-700 uppercase tracking-wider">Jam Operasional Kas</span>
                        <h4 class="font-extrabold text-slate-900 text-base">Senin - Jumat</h4>
                        <p class="text-xs text-slate-600 font-semibold">08.00 - 15.00 WIB</p>
                    </div>
                    <span class="inline-block text-[11px] text-amber-800 font-bold bg-amber-100 px-2.5 py-0.5 rounded-full">
                        Sabtu & Minggu Libur
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- 🗺️ MAIN MAP & OFFICE DETAILS SECTION -->
    <section class="py-16 md:py-24">
        <div class="container mx-auto max-w-7xl px-5 md:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                
                <!-- LEFT COLUMN: GOOGLE MAPS EMBED (7 COLS) -->
                <div class="lg:col-span-7 flex flex-col h-full justify-between space-y-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-extrabold text-slate-900 flex items-center gap-2">
                            <i class="fa-solid fa-map-location-dot text-blue-600"></i> Lokasi Google Maps Kantor Pusat
                        </h3>
                        <a 
                            href="https://maps.google.com/?q=-7.1153689,112.4168065" 
                            target="_blank" 
                            class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-700 hover:text-blue-900 underline"
                        >
                            <i class="fa-solid fa-location-arrow"></i> Petunjuk Arah di Google Maps
                        </a>
                    </div>

                    <div class="rounded-3xl bg-white border border-slate-200 p-3 shadow-xl relative overflow-hidden flex-1 flex flex-col min-h-[480px]">
                        <iframe 
                            src="https://maps.google.com/maps?q=-7.1153689,112.4168065&hl=id&z=17&output=embed" 
                            class="w-full h-full min-h-[480px] flex-1 rounded-2xl border-0 shadow-inner" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Lokasi Google Maps BPRS Madinah Lamongan"
                        ></iframe>
                    </div>
                </div>

                <!-- RIGHT COLUMN: OFFICE INFORMATION & DIRECT INQUIRY FORM (5 COLS) -->
                <div class="lg:col-span-5 flex flex-col h-full" x-data="{ nama: '', hp: '', pesan: '', kirimWA() { if(!this.nama || !this.pesan) { alert('Mohon isi Nama dan Pesan Anda.'); return; } const txt = `Halo BPRS Madinah, saya ${this.nama} (${this.hp}): ${this.pesan}`; window.open(`https://wa.me/6282229995259?text=${encodeURIComponent(txt)}`, '_blank'); } }">
                    <!-- Head Office Details Card -->
                    <div class="rounded-3xl bg-white border border-slate-200 p-6 md:p-8 shadow-xl space-y-6 flex-1 flex flex-col justify-between">
                        <div class="space-y-3.5 border-b border-slate-100 pb-5">
                            <div class="flex items-center justify-between gap-4">
                                <div class="inline-block bg-slate-50/80 px-4 py-2.5 rounded-2xl border border-slate-200 shadow-xs">
                                    <img src="<?= base_url('assets/madinah.png') ?>" alt="Logo BPRS Madinah" class="h-12 md:h-14 w-auto object-contain">
                                </div>
                                <span class="rounded-full bg-blue-100 px-3.5 py-1 text-[11px] font-bold text-blue-800 border border-blue-200 shrink-0">
                                    Kantor Pusat
                                </span>
                            </div>
                            <div>
                                <span class="text-[11px] font-bold text-blue-700 uppercase tracking-widest block mb-0.5">Kantor Pusat Operasional</span>
                                <h2 class="text-xl font-extrabold text-slate-900 leading-snug">PT BPRS Syariah Madinah Lamongan</h2>
                            </div>
                        </div>

                        <div class="space-y-4 text-xs text-slate-700">
                            <div class="flex items-start gap-3">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-blue-600 font-bold shrink-0 mt-0.5">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div>
                                    <span class="font-bold text-slate-900 block">Alamat Lengkap</span>
                                    <p class="text-slate-600 leading-relaxed">
                                        Jl. Lamongrejo No.77, Krajan, Jetis, Kec. Lamongan, Kabupaten Lamongan, Jawa Timur 62214
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600 font-bold shrink-0">
                                    <i class="fa-solid fa-globe"></i>
                                </div>
                                <div>
                                    <span class="font-bold text-slate-900 block">Website Resmi</span>
                                    <span class="text-blue-700 font-semibold">bprsmadinahlamongan.co.id</span>
                                </div>
                            </div>
                        </div>

                        <!-- Direct Inquiry Message Form -->
                        <div class="pt-6 border-t border-slate-100 space-y-4">
                            <h4 class="font-extrabold text-slate-900 text-sm flex items-center gap-2">
                                <i class="fa-solid fa-paper-plane text-emerald-600"></i> Kirim Pesan Cepat ke Customer Service
                            </h4>

                            <div class="space-y-3 text-xs">
                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Nama Lengkap</label>
                                    <input type="text" x-model="nama" placeholder="Masukkan nama Anda..." class="w-full rounded-xl bg-slate-50 border border-slate-300 focus:bg-white focus:border-emerald-600 px-3.5 py-2.5 outline-none transition">
                                </div>

                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">No. WhatsApp / Telepon</label>
                                    <input type="text" x-model="hp" placeholder="Contoh: 08123456789" class="w-full rounded-xl bg-slate-50 border border-slate-300 focus:bg-white focus:border-emerald-600 px-3.5 py-2.5 outline-none transition">
                                </div>

                                <div>
                                    <label class="block font-bold text-slate-700 mb-1">Pesan / Pertanyaan Anda</label>
                                    <textarea x-model="pesan" rows="3" placeholder="Tuliskan pertanyaan informasi produk tabungan, deposito, atau pembiayaan..." class="w-full rounded-xl bg-slate-50 border border-slate-300 focus:bg-white focus:border-emerald-600 px-3.5 py-2.5 outline-none transition resize-none"></textarea>
                                </div>

                                <button 
                                    @click="kirimWA()" 
                                    class="w-full py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md transition flex items-center justify-center gap-2 cursor-pointer"
                                >
                                    <i class="fa-brands fa-whatsapp text-sm"></i> Kirim Pesan via WhatsApp Direct
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>