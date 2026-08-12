<footer class="bg-slate-900 text-slate-300 text-sm pt-16 pb-8 border-t border-slate-800">
    <div class="container mx-auto max-w-7xl px-5 md:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-10 pb-12 border-b border-slate-800">
            <!-- Col 1: About & Logo -->
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center gap-3">
                    <img src="/assets/madinah.png" alt="Logo BPRS Syariah Madinah" class="h-10 w-auto bg-white p-2 rounded-xl shadow">
                    <div>
                        <h3 class="font-bold text-white text-base">PT BPRS Syariah Madinah</h3>
                        <p class="text-xs text-slate-400">Lamongan, Jawa Timur</p>
                    </div>
                </div>
                <p class="text-xs text-slate-400 leading-relaxed pr-4">
                    Layanan perbankan syariah terpercaya untuk kebutuhan tabungan, investasi deposito mudharabah, dan pembiayaan produktif masyarakat Lamongan dan sekitarnya.
                </p>
                <div class="space-y-2 text-xs text-slate-300 pt-2">
                    <p class="flex items-start gap-2.5">
                        <i class="fa-solid fa-location-dot text-blue-400 mt-1"></i>
                        <span>Jl. Lamongrejo No.77, Krajan, Jetis, Kec. Lamongan, Kab. Lamongan, Jawa Timur 62214</span>
                    </p>
                    <p class="flex items-center gap-2.5">
                        <i class="fa-solid fa-phone text-blue-400"></i>
                        <span>(0322) 314 999</span>
                    </p>
                    <p class="flex items-center gap-2.5">
                        <i class="fa-solid fa-envelope text-blue-400"></i>
                        <span>bank.madinah@gmail.com</span>
                    </p>
                </div>
            </div>

            <!-- Col 2: Navigasi / Tentang -->
            <div class="space-y-3">
                <h4 class="font-bold text-white text-base tracking-wide border-b border-blue-500/30 pb-2 inline-block">Tentang Kami</h4>
                <ul class="space-y-2 text-xs text-slate-400">
                    <li><a href="<?= base_url('/profil') ?>" class="hover:text-blue-400 transition flex items-center gap-1.5"><i class="fa-solid fa-chevron-right text-[10px] text-blue-500"></i> Profil Perusahaan</a></li>
                    <li><a href="<?= base_url('/managemen') ?>" class="hover:text-blue-400 transition flex items-center gap-1.5"><i class="fa-solid fa-chevron-right text-[10px] text-blue-500"></i> Manajemen</a></li>
                    <li><a href="<?= base_url('/struktur_organisasi') ?>" class="hover:text-blue-400 transition flex items-center gap-1.5"><i class="fa-solid fa-chevron-right text-[10px] text-blue-500"></i> Struktur Organisasi</a></li>
                    <li><a href="<?= base_url('/awards') ?>" class="hover:text-blue-400 transition flex items-center gap-1.5"><i class="fa-solid fa-chevron-right text-[10px] text-blue-500"></i> Penghargaan</a></li>
                    <li><a href="<?= base_url('/keuangan') ?>" class="hover:text-blue-400 transition flex items-center gap-1.5"><i class="fa-solid fa-chevron-right text-[10px] text-blue-500"></i> Laporan Keuangan</a></li>
                </ul>
            </div>

            <!-- Col 3: Produk -->
            <div class="space-y-3">
                <h4 class="font-bold text-white text-base tracking-wide border-b border-blue-500/30 pb-2 inline-block">Produk Syariah</h4>
                <ul class="space-y-2 text-xs text-slate-400">
                    <li><a href="<?= base_url('/tabungan') ?>" class="hover:text-blue-400 transition flex items-center gap-1.5"><i class="fa-solid fa-chevron-right text-[10px] text-blue-500"></i> Tabungan Syariah</a></li>
                    <li><a href="<?= base_url('/deposito') ?>" class="hover:text-blue-400 transition flex items-center gap-1.5"><i class="fa-solid fa-chevron-right text-[10px] text-blue-500"></i> Deposito Mudharabah</a></li>
                    <li><a href="<?= base_url('/pembiayaan') ?>" class="hover:text-blue-400 transition flex items-center gap-1.5"><i class="fa-solid fa-chevron-right text-[10px] text-blue-500"></i> Pembiayaan Murabahah</a></li>
                    <li><a href="<?= base_url('/pelayanan') ?>" class="hover:text-blue-400 transition flex items-center gap-1.5"><i class="fa-solid fa-chevron-right text-[10px] text-blue-500"></i> Layanan Perbankan</a></li>
                    <li><a href="<?= base_url('/galeri') ?>" class="hover:text-blue-400 transition flex items-center gap-1.5"><i class="fa-solid fa-chevron-right text-[10px] text-blue-500"></i> Galeri Kegiatan</a></li>
                </ul>
            </div>

            <!-- Col 4: Trust & Protection Disclaimer -->
            <div class="space-y-4">
                <h4 class="font-bold text-white text-base tracking-wide border-b border-blue-500/30 pb-2 inline-block">Media Sosial</h4>
                <div class="flex items-center gap-3">
                    <a href="https://www.instagram.com/bprsmadinahlamongan?igsh=bjZtNjljaTJxaTJ2" target="_blank" rel="noopener noreferrer" aria-label="Instagram BPRS Madinah" class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-800 text-slate-300 hover:bg-blue-600 hover:text-white transition">
                        <i class="fa-brands fa-instagram text-base"></i>
                    </a>
                    <a href="https://www.facebook.com/share/1VyH892rBD/" target="_blank" rel="noopener noreferrer" aria-label="Facebook BPRS Madinah" class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-800 text-slate-300 hover:bg-blue-600 hover:text-white transition">
                        <i class="fa-brands fa-square-facebook text-base"></i>
                    </a>
                </div>

                <div class="rounded-2xl border border-blue-500/30 bg-blue-950/40 p-4 space-y-2">
                    <div class="flex items-center gap-2 text-blue-400 font-bold text-xs">
                        <i class="fa-solid fa-shield-halved text-sm"></i> Perbankan Syariah Aman
                    </div>
                    <p class="text-[11px] text-slate-300 leading-relaxed">
                        PT BPRS Syariah Madinah berizin & diawasi OJK serta peserta penjaminan LPS (Lembaga Penjamin Simpanan) maks. Rp 2 Miliar per nasabah.
                    </p>
                </div>
            </div>
        </div>

        <!-- Bottom Copyright & Disclaimer -->
        <div class="pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-slate-500 gap-4">
            <p>&copy; <?= date('Y') ?> PT BPRS Syariah Madinah Lamongan. All Rights Reserved.</p>
            <div class="flex items-center gap-6">
                <span class="hover:text-slate-400 transition cursor-pointer">Syarat & Ketentuan</span>
                <span class="hover:text-slate-400 transition cursor-pointer">Kebijakan Privasi</span>
                <span class="hover:text-slate-400 transition cursor-pointer">Prinsip Syariah</span>
            </div>
        </div>
    </div>
</footer>