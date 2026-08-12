<main class="min-h-screen bg-slate-950 text-slate-900">
    <section class="grid min-h-screen lg:grid-cols-[1.05fr_0.95fr]">
        <div class="relative hidden overflow-hidden lg:block">
            <img
                src="<?= base_url('assets/kantor_madinah.jpeg') ?>"
                alt="Kantor BPRS Syariah Madinah"
                class="absolute inset-0 h-full w-full object-cover"
            >
            <div class="absolute inset-0 bg-slate-950/65"></div>
            <div class="relative z-10 flex h-full flex-col justify-between p-10 text-white">
                <a href="<?= base_url('/') ?>" class="inline-flex w-fit items-center gap-3">
                    <span class="flex size-12 items-center justify-center rounded-md bg-white p-2">
                        <img src="<?= base_url('assets/madinah.png') ?>" alt="BPRS Syariah Madinah" class="h-full w-full object-contain">
                    </span>
                    <span class="text-sm font-bold">BPRS Syariah Madinah</span>
                </a>

                <div class="max-w-xl" data-aos="fade-up">
                    <p class="text-sm font-bold uppercase tracking-wide text-emerald-300">Dashboard Admin</p>
                    <h1 class="mt-4 text-5xl font-bold leading-tight">Kelola konten website dengan aman.</h1>
                    <p class="mt-5 text-base leading-8 text-slate-200">
                        Masuk untuk memperbarui galeri, artikel, laporan keuangan, dan data manajemen website BPRS Syariah Madinah.
                    </p>
                </div>

                <div class="grid max-w-lg grid-cols-3 gap-3 text-sm text-slate-200">
                    <div class="rounded-lg border border-white/10 bg-white/10 p-4 backdrop-blur">
                        <p class="font-bold text-white">Galeri</p>
                        <p class="mt-1 text-xs leading-5">Upload dokumentasi</p>
                    </div>
                    <div class="rounded-lg border border-white/10 bg-white/10 p-4 backdrop-blur">
                        <p class="font-bold text-white">Artikel</p>
                        <p class="mt-1 text-xs leading-5">Publikasi konten</p>
                    </div>
                    <div class="rounded-lg border border-white/10 bg-white/10 p-4 backdrop-blur">
                        <p class="font-bold text-white">Dokumen</p>
                        <p class="mt-1 text-xs leading-5">Kelola laporan</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex min-h-screen items-center justify-center bg-slate-50 px-5 py-10 md:px-8">
            <div class="w-full max-w-md" data-aos="fade-up">
                <div class="mb-8 text-center lg:hidden">
                    <a href="<?= base_url('/') ?>" class="mx-auto inline-flex size-16 items-center justify-center rounded-lg bg-white p-3 shadow-sm ring-1 ring-slate-200">
                        <img src="<?= base_url('assets/madinah.png') ?>" alt="BPRS Syariah Madinah" class="h-full w-full object-contain">
                    </a>
                </div>

                <div class="rounded-lg bg-white p-6 shadow-xl shadow-slate-200/70 ring-1 ring-slate-200 md:p-8">
                    <div class="mb-7">
                        <p class="text-sm font-bold uppercase tracking-wide text-emerald-700">Login Admin</p>
                        <h2 class="mt-2 text-3xl font-bold text-slate-900">Masuk ke dashboard</h2>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Gunakan akun admin yang sudah terdaftar.</p>
                    </div>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="mb-5 flex gap-3 rounded-md bg-red-50 p-3 text-sm font-semibold text-red-700 ring-1 ring-red-100">
                            <i class="fa-solid fa-circle-exclamation mt-0.5"></i>
                            <p><?= esc(session()->getFlashdata('error')) ?></p>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('/login') ?>" method="post" class="space-y-5">
                        <?= csrf_field() ?>

                        <div>
                            <label for="username" class="block text-sm font-bold text-slate-800">Username</label>
                            <div class="relative mt-2">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                    <i class="fa-solid fa-user text-sm"></i>
                                </span>
                                <input
                                    id="username"
                                    type="text"
                                    name="username"
                                    required
                                    autocomplete="username"
                                    autofocus
                                    class="block w-full rounded-md border border-slate-300 bg-white py-3 pl-10 pr-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100"
                                    placeholder="Masukkan username"
                                />
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-bold text-slate-800">Password</label>
                            <div class="relative mt-2">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                    <i class="fa-solid fa-lock text-sm"></i>
                                </span>
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    class="block w-full rounded-md border border-slate-300 bg-white py-3 pl-10 pr-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100"
                                    placeholder="Masukkan password"
                                />
                            </div>
                        </div>

                        <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-md bg-emerald-600 px-4 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
                            <i class="fa-solid fa-right-to-bracket text-xs"></i>
                            Masuk
                        </button>
                    </form>
                </div>

                <p class="mt-5 text-center text-xs text-slate-500">
                    &copy; <?= date('Y') ?> BPRS Syariah Madinah Lamongan
                </p>
            </div>
        </div>
    </section>
</main>
