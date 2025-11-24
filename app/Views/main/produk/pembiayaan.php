<main class="w-full mx-auto mt-24 py-1">
    <div class="container mx-auto my-10">
        <div class="text-center">
            <h1 class="text-3xl font-bold">Pembiayaan</h1>
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
                    src="<?= base_url('produk/pembiayaan_murabahah.webp') ?>"
                    alt="Pembiayaan Murabahah"
                    class="object-cover w-full h-full transition-transform duration-500"
                    :class="hover ? 'scale-105' : 'scale-100'">

                <!-- Overlay animasi dari bawah -->
                <div
                    class="absolute bottom-0 left-0 w-full flex justify-center items-center transition-all duration-500"
                    :class="hover ? 'h-full opacity-100 bg-sky-900/60' : 'h-0 opacity-0 bg-sky-900/0'">

                    <button @click="openModal({
                                    title: 'Pembiayaan Murabahah',
                                    desc: 'Pembiayaan Murabahah adalah pembiayaan dengan sistem jual beli dimana BPRS dapat membantu nasabahnya dengan membiayai pembelian barang yang dibutuhkan untuk modal usaha atau pembelian barang konsumtif.',
                                    custom: {
                                        Perorangan: {
                                            'syarat & ketentuan': [
                                                'Fotocopy KTP/identitas diri, suami & istri',
                                                'Fotocopy KK dan Surat Nikah',
                                                'Fotocopy jaminan (BPKB, SHM)',
                                                'Gesek no. rangka dan no. mesin, fotocopy SPPT'
                                            ],
                                            keunggulan: [
                                                'Dapat digunakan untuk modal kerja, pembelian kendaraan bermotor, renovasi rumah, konsumtif serta tambahan kepemilikan tanah/rumah',
                                                'Bebas biaya provisi dan pinalti serta berasuransi jiwa',
                                                'Angsuran bersifat tetap hingga akhir masa pembiayaan',
                                                'Angsuran dapat dilakukan dengan musiman'
                                            ]
                                        },
                                        'Lembaga / Instansi': {
                                            'syarat & ketentuan': [
                                                'Fotocopy KTP/identitas diri',
                                                'Fotocopy KK dan surat nikah',
                                                'Fotocopy SK Lembaga'
                                            ],
                                            keunggulan: [
                                                'dapat digunakan untuk pembelian kendaraan bermotor, renovasi rumah, konsumtif serta tambahan kepemilikan tanah/rumah',
                                                'Bebas biaya provisi dan pinalti serta berasuransi jiwa',
                                                'Angsuran bersifat tetap hingga akhir masa pembiayaan'
                                            ]
                                        }
                                    }
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
                    src="<?= base_url('produk/pembiayaan_musyarokah.webp') ?>"
                    alt="Pembiayaan Musyarokah"
                    class="object-cover w-full h-full transition-transform duration-500"
                    :class="hover ? 'scale-105' : 'scale-100'">

                <!-- Overlay animasi dari bawah -->
                <div
                    class="absolute bottom-0 left-0 w-full flex justify-center items-center transition-all duration-500"
                    :class="hover ? 'h-full opacity-100 bg-sky-900/60' : 'h-0 opacity-0 bg-sky-900/0'">

                    <button @click="openModal({
                        title: 'Pembiayaan Musyarokah',
                        desc: 'Pembiayaan Musyarokah merupakan akad yang terjadi diantara para pemilik modal (mitra musyarokah) yang menggabungkan modal dan melakukan usaha secara bersama dengan suatu kemitraan dengan pembagian keuntungan sesuai dengan kesepakatan sedangkan kerugian ditanggung secara proposional sesuai dengan kontribusi modal.',
                        ketentuan: ['Fotocopy KTP/identitas diri, suami & istri', 'Fotocopy KK dan surat nikah', 'Jangka waktu max 6 bulan', 'Agunan berupa BPKB dan SHM']
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
                    src="<?= base_url('produk/pembiayaan_mudharabah.webp') ?>"
                    alt="Pembiayaan Mudharabah"
                    class="object-cover w-full h-full transition-transform duration-500"
                    :class="hover ? 'scale-105' : 'scale-100'">

                <!-- Overlay animasi dari bawah -->
                <div
                    class="absolute bottom-0 left-0 w-full flex justify-center items-center transition-all duration-500"
                    :class="hover ? 'h-full opacity-100 bg-sky-900/60' : 'h-0 opacity-0 bg-sky-900/0'">

                    <button @click="openModal({
                        title: 'Pembiayaan Mudharabah',
                        desc: 'Pembiayaan Mudharabah merupakan pembiayaan dengan perjanjian usaha antara pemilik modal dengan pengusaha, dimana pihak pemilik modal menyediakan seluruh dana yang diperlukan dan pihak pengusaha melakukan pengelola atas usahanya.',
                        ketentuan: ['Fotocopy KTP/identitas diri, suami & istri', 'Fotocopy KK dan surat nikah', 'Agunan berupa BPKB dan SHM']
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
                    src="<?= base_url('produk/pembiayaan_ijaroh.webp') ?>"
                    alt="Pembiayaan Ijaroh"
                    class="object-cover w-full h-full transition-transform duration-500"
                    :class="hover ? 'scale-105' : 'scale-100'">

                <!-- Overlay animasi dari bawah -->
                <div
                    class="absolute bottom-0 left-0 w-full flex justify-center items-center transition-all duration-500"
                    :class="hover ? 'h-full opacity-100 bg-sky-900/60' : 'h-0 opacity-0 bg-sky-900/0'">

                    <button @click="openModal({
                        title: 'Pembiayaan Ijaroh',
                        desc: 'Pembiayaan Ijaroh merupakan pembiayaan dengan sistem sewa menyewa antara BPRS dengan Nasabah untuk memanfaatkan sesuatu barang dalam waktu tertentu dengan harga yang disepakati.',
                        ketentuan: ['Fotocopy KTP/identitas diri, suami & istri', 'Fotocopy KK dan surat nikah', 'Agunan berupa BPKB dan SHM']
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

        <div class="grid grid-cols-2 gap-8 ">
            <img src="<?= base_url('produk/brosur_1.jpeg') ?>?>" alt="" srcset="">
            <div class="">
                <h3 class="text-2xl font-bold text-indigo-700 mb-2" x-text="modalData.title"></h3>
                <p class="text-gray-600 mb-4" x-text="modalData.desc"></p>

                <div x-show="modalData.custom && Object.keys(modalData.custom).length > 0">

                    <!-- Loop kategori: Perorangan, lembaga / instansi -->
                    <template x-for="[kategori, detail] in Object.entries(modalData.custom)" :key="kategori">

                        <div class="mb-4">

                            <!-- Judul kategori -->
                            <h3 class="text-lg font-bold text-gray-800 mb-2" x-text="kategori"></h3>

                            <!-- Loop subkategori: syarat & ketentuan, keunggulan -->
                            <template x-for="[subKey, items] in Object.entries(detail)" :key="subKey">

                                <div class="mb-3">
                                    <h4 class="text-md font-semibold text-gray-700 mb-1" x-text="subKey"></h4>

                                    <ul class="list-disc list-inside text-gray-700 space-y-1">
                                        <template x-for="item in items" :key="item">
                                            <li x-text="item"></li>
                                        </template>
                                    </ul>
                                </div>

                            </template>
                        </div>

                    </template>
                </div>


                <h3 x-show="modalData.ketentuan && modalData.ketentuan.length > 0" class="text-xl font-bold text-black-700 mb-2 mt-5">Syarat & Ketentuan :</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <template x-for="item in modalData.ketentuan" :key="item">
                        <li x-text="item"></li>
                    </template>
                </ul>

                <h3 x-show="modalData.features && modalData.features.length > 0" class="text-xl font-bold text-black-700 mb-2 mt-5">Persyaratan :</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <template x-for="item in modalData.features" :key="item">
                        <li x-text="item"></li>
                    </template>
                </ul>

                <h3 x-show="modalData.features && modalData.features.length > 0" class="text-xl font-bold text-black-700 mb-2 mt-5">Keuntungan :</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <template x-for="item in modalData.benefit" :key="item">
                        <li x-text="item"></li>
                    </template>
                </ul>
            </div>
        </div>
    </div>
</div>

