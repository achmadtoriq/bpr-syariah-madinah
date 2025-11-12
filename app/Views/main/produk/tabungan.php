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

                    <button
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

                    <button
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

                    <button
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

                    <button
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

                    <button
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

                    <button
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

                    <button
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

                    <button
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

                    <button
                        class="bg-white text-sky-700 font-semibold px-6 py-2 rounded-full shadow-lg transition hover:bg-green-100 z-10">
                        Detail
                    </button>
                </div>
            </div>
        
        </div>
    </div>
</main>