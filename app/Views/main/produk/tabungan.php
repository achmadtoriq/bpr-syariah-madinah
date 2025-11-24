<main class="w-full mx-auto mt-24 py-1">
    <div class="container mx-auto my-10">
        <div class="text-center">
            <h1 class="text-3xl font-bold">Tabungan</h1>
            <!-- Bouncing dots -->
            <div class="flex justify-center gap-2 mt-3 h-5">
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:0ms]"></span>
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:200ms]"></span>
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:400ms]"></span>
            </div>
        </div>
        <div class="grid grid-cols-4 mt-10">
            <div
                x-data="{ hover: false }"
                @mouseenter="hover = true"
                @mouseleave="hover = false"
                class="relative w-full overflow-hidden shadow-lg cursor-pointer">
                <!-- Gambar -->
                <img
                    src="<?= base_url('produk/tabungan_sibarkah.png') ?>"
                    alt="Tabungan Sibarkah"
                    class="object-cover w-full h-full transition-transform duration-500"
                    :class="hover ? 'scale-105' : 'scale-100'">

                <!-- Overlay animasi dari bawah -->
                <div
                    class="absolute bottom-0 left-0 w-full flex justify-center items-center transition-all duration-500"
                    :class="hover ? 'h-full opacity-100 bg-sky-900/60' : 'h-0 opacity-0 bg-sky-900/0'">

                    <button @click="openModal({
                        title: 'Tabungan SIBARKAH',
                        desc: 'Tabungan Sibarkah adalah Tabungan yang dijalankan dengan prinsip akad mudharabah, dimana nasabah (shohibul mal) berhak mendapat bagi hasil dari pihak bank (mudharib) sesuai dengan nisbah yang sudah disepakati bersama dan tertuang dalam akad pembukaan rekening .',
                        features: ['Fotocopy KTP/Identitas diri', 'Fotocopy NPWP', 'Mengisi Formulir yang telah disediakan oleh Bank'],
                        benefit: ['Dana dapat ditarik sewaktu-waktu', 'Nasabah berhak mendapat bagi hasil tiap bulan', 'Setoran ringan (Rp. 10.000)', 'Bebas biaya administrasi']
                        })"
                        class="bg-white text-sky-700 font-semibold px-6 py-2 rounded-full shadow-lg transition hover:bg-green-100 z-10">
                        Detail
                    </button>
                </div>
            </div>

            <div
                x-data="{ hover: false }"
                @mouseenter="hover = true"
                @mouseleave="hover = false"
                class="relative w-full overflow-hidden shadow-lg cursor-pointer">
                <!-- Gambar -->
                <img
                    src="<?= base_url('produk/tabungan_qordiyu.png') ?>"
                    alt="Tabungan Sibarkah"
                    class="object-cover w-full h-full transition-transform duration-500"
                    :class="hover ? 'scale-105' : 'scale-100'">

                <!-- Overlay animasi dari bawah -->
                <div
                    class="absolute bottom-0 left-0 w-full flex justify-center items-center transition-all duration-500"
                    :class="hover ? 'h-full opacity-100 bg-sky-900/60' : 'h-0 opacity-0 bg-sky-900/0'">

                    <button @click="openModal({
                        title: 'Tabungan QORDIYU',
                        desc: 'Tabungan QOrdiyu Merupakan tabungan dengan prinsip wadi’ah yad adh-dhamanah, dimana pihak bank boleh mengelola dana tersebut dan nasabah boleh mengambil uangnya sewaktu-waktu. Pihak bank harus siap memberikan-nya secara utuh.',
                        features: ['Fotocopy KTP/Identitas diri', 'Fotocopy NPWP', 'Mengisi Formulir yang telah disediakan oleh Bank'],
                        benefit: ['Dana dapat ditarik sewaktu-waktu*', 'Setoran ringan', 'Bebas biaya administrasi', 'Bonus (sesuai kebijakan bank)']
                        })"
                        class="bg-white text-sky-700 font-semibold px-6 py-2 rounded-full shadow-lg transition hover:bg-green-100 z-10">
                        Detail
                    </button>
                </div>
            </div>

            <div
                x-data="{ hover: false }"
                @mouseenter="hover = true"
                @mouseleave="hover = false"
                class="relative w-full overflow-hidden shadow-lg cursor-pointer">
                <!-- Gambar -->
                <img
                    src="<?= base_url('produk/tabungan_haji.png') ?>"
                    alt="Tabungan Sibarkah"
                    class="object-cover w-full h-full transition-transform duration-500"
                    :class="hover ? 'scale-105' : 'scale-100'">

                <!-- Overlay animasi dari bawah -->
                <div
                    class="absolute bottom-0 left-0 w-full flex justify-center items-center transition-all duration-500"
                    :class="hover ? 'h-full opacity-100 bg-sky-900/60' : 'h-0 opacity-0 bg-sky-900/0'">

                    <button @click="openModal({
                        title: 'Tabungan Al-Madinah',
                        desc: 'Tabungan Al-Madinah merupakan tabungan dengan menggunakan akad wadi\'ah yad-dhamanah. Tabungan ini diperuntukkan bagi masyarakan yang mempunyai rencana berangkat haji.',
                        features: ['Fotocopy KTP/Identitas diri', 'Fotocopy NPWP', 'Mengisi Formulir yang telah disediakan oleh Bank'],
                        benefit: ['Setoran ringan (Rp. 50.000)', 'Bebas biaya administrasi', 'Bonus (sesuai kebijakan bank)']
                        })"
                        class="bg-white text-sky-700 font-semibold px-6 py-2 rounded-full shadow-lg transition hover:bg-green-100 z-10">
                        Detail
                    </button>
                </div>
            </div>

            <div
                x-data="{ hover: false }"
                @mouseenter="hover = true"
                @mouseleave="hover = false"
                class="relative w-full overflow-hidden shadow-lg cursor-pointer">
                <!-- Gambar -->
                <img
                    src="<?= base_url('produk/tabungan_qurban.png') ?>"
                    alt="Tabungan Sibarkah"
                    class="object-cover w-full h-full transition-transform duration-500"
                    :class="hover ? 'scale-105' : 'scale-100'">

                <!-- Overlay animasi dari bawah -->
                <div
                    class="absolute bottom-0 left-0 w-full flex justify-center items-center transition-all duration-500"
                    :class="hover ? 'h-full opacity-100 bg-sky-900/60' : 'h-0 opacity-0 bg-sky-900/0'">

                    <button @click="openModal({
                        title: 'Tabungan Qurban',
                        desc: 'Tabungan Qurban merupakan tabungan dengan menggunakan akad wadi\'ah yad-dhamanah. Tabungan ini diperuntukkan bagi masyarakan yang mempunyai rencana untuk berkurban saat hari raya idul adha.',
                        features: ['Fotocopy KTP/Identitas diri', 'Fotocopy NPWP', 'Mengisi Formulir yang telah disediakan oleh Bank'],
                        benefit: ['Setoran ringan', 'Bebas biaya administrasi', 'Bonus (sesuai kebijakan bank)']
                        })"
                        class="bg-white text-sky-700 font-semibold px-6 py-2 rounded-full shadow-lg transition hover:bg-green-100 z-10">
                        Detail
                    </button>
                </div>
            </div>

            <div
                x-data="{ hover: false }"
                @mouseenter="hover = true"
                @mouseleave="hover = false"
                class="relative w-full overflow-hidden shadow-lg cursor-pointer">
                <!-- Gambar -->
                <img
                    src="<?= base_url('produk/tabungan_tarbiyah.png') ?>"
                    alt="Tabungan Sibarkah"
                    class="object-cover w-full h-full transition-transform duration-500"
                    :class="hover ? 'scale-105' : 'scale-100'">

                <!-- Overlay animasi dari bawah -->
                <div
                    class="absolute bottom-0 left-0 w-full flex justify-center items-center transition-all duration-500"
                    :class="hover ? 'h-full opacity-100 bg-sky-900/60' : 'h-0 opacity-0 bg-sky-900/0'">

                    <button @click="openModal({
                        title: 'Tabungan Tarbiyah',
                        desc: 'Tabungan ini diperuntukkan bagi masyarakat yang ingin menyimpan dananya guna mempersiapkan biaya pendidikan dimasa yang akan datang.',
                        features: ['Fotocopy KTP/Identitas diri', 'Fotocopy NPWP', 'Mengisi Formulir yang telah disediakan oleh Bank'],
                        benefit: ['Setoran ringan', 'Bebas biaya administrasi', 'Bonus (sesuai kebijakan bank)']
                        })"
                        class="bg-white text-sky-700 font-semibold px-6 py-2 rounded-full shadow-lg transition hover:bg-green-100 z-10">
                        Detail
                    </button>
                </div>
            </div>

            <div
                x-data="{ hover: false }"
                @mouseenter="hover = true"
                @mouseleave="hover = false"
                class="relative w-full overflow-hidden shadow-lg cursor-pointer">
                <!-- Gambar -->
                <img
                    src="<?= base_url('produk/tabungan_umroh.png') ?>"
                    alt="Tabungan Sibarkah"
                    class="object-cover w-full h-full transition-transform duration-500"
                    :class="hover ? 'scale-105' : 'scale-100'">

                <!-- Overlay animasi dari bawah -->
                <div
                    class="absolute bottom-0 left-0 w-full flex justify-center items-center transition-all duration-500"
                    :class="hover ? 'h-full opacity-100 bg-sky-900/60' : 'h-0 opacity-0 bg-sky-900/0'">

                    <button @click="openModal({
                        title: 'Tabungan Arofah',
                        desc: 'Tabungan Arofah ini diperuntukkan bagi masyarakat yang ingin menyimpan dananya guna mempersiapkan biaya umrah.',
                        features: ['Fotocopy KTP/Identitas diri', 'Fotocopy NPWP', 'Mengisi formulir yang telah disediakan oleh Bank'],
                        benefit: ['Setoran ringan', 'Bebas biaya administrasi', 'Bonus (sesuai kebijakan bank)']
                        })"
                        class="bg-white text-sky-700 font-semibold px-6 py-2 rounded-full shadow-lg transition hover:bg-green-100 z-10">
                        Detail
                    </button>
                </div>
            </div>

            <div
                x-data="{ hover: false }"
                @mouseenter="hover = true"
                @mouseleave="hover = false"
                class="relative w-full overflow-hidden shadow-lg cursor-pointer">
                <!-- Gambar -->
                <img
                    src="<?= base_url('produk/tabungan_simpel.png') ?>"
                    alt="Tabungan Sibarkah"
                    class="object-cover w-full h-full transition-transform duration-500"
                    :class="hover ? 'scale-105' : 'scale-100'">

                <!-- Overlay animasi dari bawah -->
                <div
                    class="absolute bottom-0 left-0 w-full flex justify-center items-center transition-all duration-500"
                    :class="hover ? 'h-full opacity-100 bg-sky-900/60' : 'h-0 opacity-0 bg-sky-900/0'">

                    <button @click="openModal({
                        title: 'Tabungan Simpel IB',
                        desc: 'Tabungan Simpel IB Adalah Tabungan yang diperuntukkan untuk siswa/pelajar dengan persyaratan yang mudah dan sederhana serta fitur yang menarik, dalam rangka edukasi, untuk mendorong budaya menabung sejak dini.',
                        features: ['MoU dengan Lembaga yang bersangkutan', 'Fotocopy Identitas diri (KTA/Akte lahir)', 'Fotocopy Identitas Orang tua', 'Fotocopy KK (kartu Keluarga)', 'Mengisi formulir yang telah disediakan oleh Bank'],
                        benefit: ['Setoran ringan min. Rp. 1.000', 'Bebas biaya administrasi', 'Tabungan ini nasabah berkesempatan memperoleh gimmick/hadiah dari bank.']
                        })"
                        class="bg-white text-sky-700 font-semibold px-6 py-2 rounded-full shadow-lg transition hover:bg-green-100 z-10">
                        Detail
                    </button>
                </div>
            </div>

            <div
                x-data="{ hover: false }"
                @mouseenter="hover = true"
                @mouseleave="hover = false"
                class="relative w-full overflow-hidden shadow-lg cursor-pointer">
                <!-- Gambar -->
                <img
                    src="<?= base_url('produk/tabungan_walimah.png') ?>"
                    alt="Tabungan Sibarkah"
                    class="object-cover w-full h-full transition-transform duration-500"
                    :class="hover ? 'scale-105' : 'scale-100'">

                <!-- Overlay animasi dari bawah -->
                <div
                    class="absolute bottom-0 left-0 w-full flex justify-center items-center transition-all duration-500"
                    :class="hover ? 'h-full opacity-100 bg-sky-900/60' : 'h-0 opacity-0 bg-sky-900/0'">

                    <button @click="openModal({
                        title: 'Tabungan Walimah',
                        desc: 'Tabungan walimah merupakan tabungan dengan prinsip wadi\'ah yad adh-dhamanah. tabungan ini diciptakan bagi masyarakat yang ingin menyisihkan sebagian dananya untuk sebuah hajat yang telah direncanakan dimasa yang akan datang.',
                        features: ['Fotocopy KTP/Identitas diri', 'Fotocopy NPWP', 'Mengisi formulir yang telah disediakan oleh Bank'],
                        benefit: ['Setoran ringan', 'Bebas biaya administrasi', 'Bonus (sesuai kebijakan bank)']
                        })"
                        class="bg-white text-sky-700 font-semibold px-6 py-2 rounded-full shadow-lg transition hover:bg-green-100 z-10">
                        Detail
                    </button>
                </div>
            </div>

            <div
                x-data="{ hover: false }"
                @mouseenter="hover = true"
                @mouseleave="hover = false"
                class="relative w-full overflow-hidden shadow-lg cursor-pointer">
                <!-- Gambar -->
                <img
                    src="<?= base_url('produk/tabungan_sibermas.png') ?>"
                    alt="Tabungan Sibarkah"
                    class="object-cover w-full h-full transition-transform duration-500"
                    :class="hover ? 'scale-105' : 'scale-100'">

                <!-- Overlay animasi dari bawah -->
                <div
                    class="absolute bottom-0 left-0 w-full flex justify-center items-center transition-all duration-500"
                    :class="hover ? 'h-full opacity-100 bg-sky-900/60' : 'h-0 opacity-0 bg-sky-900/0'">

                    <button @click="openModal({
                        title: 'Tabungan Walimah',
                        desc: 'Tabungan walimah merupakan salah satu wujud sinergi antara Bank Madinah dengan masjid-masjid yang berada di wilayah Lamongan dan sekitarnya. Untuk mewujudkan pengelolaan dana masjid secara profesional dan amanah.',
                        features: ['Fotocopy KTP/Identitas diri', 'Fotocopy NPWP', 'Mengisi formulir yang telah disediakan oleh Bank'],
                        benefit: ['Setoran ringan', 'Bebas biaya administrasi', 'Bonus (sesuai kebijakan bank)']
                        })"
                        class="bg-white text-sky-700 font-semibold px-6 py-2 rounded-full shadow-lg transition hover:bg-green-100 z-10">
                        Detail
                    </button>
                </div>
            </div>

        </div>
    </div>
</main>

<!-- Modal -->
<div
    x-show="show"
    x-transition.opacity
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    x-cloak>
    <div
        @click.outside="closeModal"
        x-transition.scale.origin.center
        class="bg-white rounded-xl shadow-xl w-11/12 md:w-3/4 p-6 relative">
        <button
            @click="closeModal"
            class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-xl">
            ✕
        </button>

        <div class="grid grid-cols-2 gap-8">
            <img src="<?= base_url('produk/brosur_tabungan.webp') ?>?>" alt="" srcset="">
            <div>
                <h3 class="text-2xl font-bold text-indigo-700 mb-2" x-text="modalData.title"></h3>
                <p class="text-gray-600 mb-4" x-text="modalData.desc"></p>

                <h3 class="text-xl font-bold text-black-700 mb-2 mt-5">Persyaratan :</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <template x-for="item in modalData.features" :key="item">
                        <li x-text="item"></li>
                    </template>
                </ul>

                <h3 class="text-xl font-bold text-black-700 mb-2 mt-5">Keuntungan :</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <template x-for="item in modalData.benefit" :key="item">
                        <li x-text="item"></li>
                    </template>
                </ul>
            </div>
        </div>
    </div>
</div>
