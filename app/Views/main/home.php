<main class="w-full mx-auto mt-24">
    <!-- Image Slider -->
    <div x-data="slider()" x-init="start()" class="relative w-full overflow-hidden bg-gradient-to-r from-blue-50 via-blue-100 to-blue-200">
        <div class="flex transition-all duration-700" :style="`transform: translateX(-${current * 100}%);`">
            <template x-for="(slide, index) in slides" :key="index">
                <img :src="slide" class="w-auto mx-auto">
            </template>
        </div>
    </div>

    <div class="container mx-auto px-4 py-6 my-5">
        <div class="grid grid-cols-4 gap-2 justify-center items-center">
            <img src="<?php echo base_url('assets/ib_perbankan_syariah.png')
                        ?>" alt="Logo" class="mx-auto w-auto size-20 grayscale hover:grayscale-0 cursor-pointer">
            <img src="<?php echo base_url('assets/ojk.png')
                        ?>" alt="Logo" class="mx-auto w-auto size-20 grayscale hover:grayscale-0 cursor-pointer">
            <img src="<?php echo base_url('assets/lembaga_penjamin_simpanan.png')
                        ?>" alt="Logo" class="mx-auto w-auto size-20 grayscale hover:grayscale-0 cursor-pointer">
            <img src="<?php echo base_url('assets/ayo_ke_bank_syariah.png')
                        ?>" alt="Logo" class="mx-auto w-auto size-14 grayscale hover:grayscale-0 cursor-pointer">
        </div>
    </div>

    <div class="container mx-auto px-4 py-6 ">
        <div class="text-center">
            <h1 class="text-3xl font-bold">Judul Utama</h1>
            <!-- Bouncing dots -->
            <div class="flex justify-center gap-2 mt-3 h-5">
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:0ms]"></span>
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:200ms]"></span>
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:400ms]"></span>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4 justify-center items-center my-10">
            <img src="<?php echo base_url('assets/produk/produk_1.jpg')
                        ?>" alt="Logo" class="mx-auto w-auto rounded-md">
            <img src="<?php echo base_url('assets/produk/produk_2.jpg')
                        ?>" alt="Logo" class="mx-auto w-auto rounded-md">
            <img src="<?php echo base_url('assets/produk/produk_3.jpg')
                        ?>" alt="Logo" class="mx-auto w-auto rounded-md">
        </div>
    </div>

    <div class="container mx-auto px-4 py-6 ">
        <div class="text-center">
            <h1 class="text-3xl font-bold">Judul Utama</h1>
            <!-- Bouncing dots -->
            <div class="flex justify-center gap-2 mt-3 h-5">
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:0ms]"></span>
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:200ms]"></span>
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:400ms]"></span>
            </div>
        </div>

        <div x-data="sliderGallery()" x-init="init()" class="w-full my-10">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <template x-for="(group, index) in slideGroups" :key="index">
                        <div class="swiper-slide">
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <template x-for="image in group" :key="image.image_url">
                                    <div>
                                        <img :src="image.image_url" alt="" class="w-full object-cover rounded" />
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function slider() {
        return {
            current: 0,
            slides: [
                '/assets/slide/slide_landing.png',
                '/assets/slide/pengumuman.png',
                '/assets/slide/pelantikan.png',
                '/assets/slide/seminar.png'
                // '/assets/slide/pexels-cknguyen-33059987.jpg',
                // '/assets/slide/pexels-max-fischer-5868127.jpg',
                // '/assets/slide/pexels-pixabay-270637.jpg'
            ],
            start() {
                setInterval(() => {
                    this.current = (this.current + 1) % this.slides.length;
                }, 5000);
            }
        }
    }

    function sliderGallery() {
        return {
            images: [],
            slideGroups: [],
            swiper: null,

            async init() {
                const res = await fetch('/api/galeri_all');
                const data = await res.json();
                this.images = data;
                this.slideGroups = this.chunkArray(this.images, 4);

                this.$nextTick(() => {
                    this.waitUntilImagesLoaded().then(() => {
                        this.swiper = new Swiper('.swiper', {
                            loop: true,
                            autoplay: {
                                delay: 3000
                            },
                            effect: 'fade',
                            pagination: {
                                el: '.swiper-pagination',
                                clickable: true,
                            },
                        });
                    });
                });
            },

            chunkArray(arr, size) {
                const chunked = [];
                for (let i = 0; i < arr.length; i += size) {
                    chunked.push(arr.slice(i, i + size));
                }
                return chunked;
            },

            waitUntilImagesLoaded() {
                return new Promise((resolve) => {
                    const images = document.querySelectorAll('.swiper-slide img');
                    if (images.length === 0) return resolve();

                    let loaded = 0;
                    images.forEach(img => {
                        if (img.complete) {
                            loaded++;
                            if (loaded === images.length) resolve();
                        } else {
                            img.addEventListener('load', () => {
                                loaded++;
                                if (loaded === images.length) resolve();
                            });
                            img.addEventListener('error', () => {
                                loaded++;
                                if (loaded === images.length) resolve();
                            });
                        }
                    });
                });
            }
        }
    }
</script>