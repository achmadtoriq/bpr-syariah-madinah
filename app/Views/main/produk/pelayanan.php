<main class="w-full mx-auto mt-24 py-1">
    <div class="container mx-auto my-10">
        <div class="text-center">
            <h1 class="text-3xl font-bold">Pelayanan</h1>
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
                    src="<?= base_url('produk/madinah_pay_system.webp') ?>"
                    alt="Sistem Pengelolahan Keuangan Sekolah"
                    class="object-cover w-full h-full transition-transform duration-500"
                    :class="hover ? 'scale-105' : 'scale-100'">

                <!-- Overlay animasi dari bawah -->
                <div
                    class="absolute bottom-0 left-0 w-full flex justify-center items-center transition-all duration-500"
                    :class="hover ? 'h-full opacity-100 bg-sky-900/60' : 'h-0 opacity-0 bg-sky-900/0'">

                    <button @click="openModal({
                        title: 'Madinah Payment Sistem',
                        desc: 'Untuk mempermudah pengelolaan keuangan sekolah, bank madinah menyediakan layanan madinah payment sistem.',
                        benefit: ['Gratis Software', 'Mudah dalam pengoperasian', 'Gratis biaya adminstrasi', 'Gratis pelatihan software', 'Penarikan dana dapat diantar']
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
                    src="<?= base_url('produk/payment_online.webp') ?>"
                    alt="Payment Online"
                    class="object-cover w-full h-full transition-transform duration-500"
                    :class="hover ? 'scale-105' : 'scale-100'">

                <!-- Overlay animasi dari bawah -->
                <div
                    class="absolute bottom-0 left-0 w-full flex justify-center items-center transition-all duration-500"
                    :class="hover ? 'h-full opacity-100 bg-sky-900/60' : 'h-0 opacity-0 bg-sky-900/0'">

                    <button @click="openModal({
                        title: 'Payment Online',
                        desc: 'Selain produk funding dan landing bank madinah juga menyediakan layanan pembayaran tagihan secara online, seperti pembayaran tagihan listrik, PDAM, Pembelian Pulsa, Token Listrik, BPJS, dll.'
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
        class="bg-white rounded-xl shadow-xl w-6/12 md:w-1/2 p-6 relative">
        <button
            @click="closeModal"
            class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-xl">
            ✕
        </button>

        <div class="grid grid-cols-1">
            <div>
                <h3 class="text-2xl font-bold text-indigo-700 mb-2" x-text="modalData.title"></h3>
                <p class="text-gray-600 mb-4" x-text="modalData.desc"></p>

                <h3 x-show="modalData.features && modalData.features.length > 0" class="text-xl font-bold text-black-700 mb-2 mt-5">Persyaratan :</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <template x-for="item in modalData.features" :key="item">
                        <li x-text="item"></li>
                    </template>
                </ul>

                <h3 x-show="modalData.benefit && modalData.benefit.length > 0" class="text-xl font-bold text-black-700 mb-2 mt-5">Keuntungan :</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <template x-for="item in modalData.benefit" :key="item">
                        <li x-text="item"></li>
                    </template>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Alpine Component -->
<script>
    function modalHandler() {
        return {
            show: false,
            modalData: {
                title: '',
                desc: '',
                features: [],
                benefit: []
            },
            openModal(data) {
                this.modalData = data;
                this.show = true;
            },
            closeModal() {
                this.show = false;
            }
        };
    }
</script>