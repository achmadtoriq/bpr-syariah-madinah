<!DOCTYPE html>
<html lang="en" x-data="{ open: false }" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="PT BPRS Syariah Madinah Lamongan - Bank Perbankan Syariah terpercaya untuk tabungan, deposito, dan pembiayaan syariah. Berizin & diawasi OJK serta peserta penjaminan LPS.">
    <meta name="keywords" content="BPRS Madinah, Bank Syariah Lamongan, Deposito Syariah, Tabungan Syariah, Pembiayaan Murabahah, Bank Lamongan">
    <title><?= esc($title ?? 'BPRS Syariah Madinah Lamongan - Perbankan Syariah Terpercaya') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/assets/icon_madinah.ico" rel="shortcut icon" type="image/x-icon">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.js" defer></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://kit.fontawesome.com/a7feba845e.js" crossorigin="anonymous" defer></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js" defer></script>

    <link rel="stylesheet" href="/assets/ckeditor5-46.0.0/ckeditor5/ckeditor5.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body class="w-full" x-data="modalHandler()">
    <!-- ✅ HEADER -->
    <?php echo $header ?? '' ?>

    <!-- ✅ MAIN CONTENT -->
    <?= $content ?? '' ?>

    <!-- ✅ FOOTER -->
    <?= $footer ?? '' ?>

    <!-- Alpine & AOS Initialization Component -->
    <script>
        const initAOS = () => {
            if (window.AOS) {
                AOS.init({
                    duration: 800,
                    easing: 'ease-out-cubic',
                    once: false,      // Animation triggers smoothly as user scrolls up and down
                    mirror: true,     // Elements animate out when scrolling past them
                    offset: 80,       // Trigger offset in px
                });
                AOS.refresh();
            }
        };

        document.addEventListener('DOMContentLoaded', initAOS);
        window.addEventListener('load', initAOS);
        window.addEventListener('resize', () => {
            if (window.AOS) AOS.refresh();
        });

            if (window.jQuery && jQuery.fn.select2) {
                jQuery('[data-select2]').each(function() {
                    const select = jQuery(this);

                    if (select.hasClass('select2-hidden-accessible')) {
                        return;
                    }

                    select.select2({
                        width: '100%',
                        placeholder: select.data('placeholder') || 'Pilih opsi',
                        allowClear: select.data('allow-clear') === true || select.data('allow-clear') === 'true',
                    });

                    select.on('select2:select select2:clear', function() {
                        this.dispatchEvent(new Event('change', {
                            bubbles: true
                        }));
                    });
                });
            }
        });

        function modalHandler() {
            return {
                show: false,
                modalData: {
                    title: '',
                    desc: '',
                    features: [],
                    benefit: [],
                    ketentuan: [],
                    custom: {}
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
    <style>
        .select2-container .select2-selection--single {
            min-height: 40px;
            border-color: #cbd5e1;
            border-radius: 0.375rem;
            display: flex;
            align-items: center;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #0f172a;
            font-size: 0.875rem;
            line-height: 40px;
            padding-left: 0.75rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
        }

        .select2-dropdown {
            border-color: #cbd5e1;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .select2-search--dropdown .select2-search__field {
            border-color: #cbd5e1;
            border-radius: 0.375rem;
            outline: none;
        }

        .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
            background-color: #2563eb;
        }
    <!-- 💬 FLOATING WHATSAPP BUTTON -->
    <div x-data="{ openWa: false }" class="fixed bottom-6 right-6 z-50">
        <!-- Popup Menu -->
        <div x-show="openWa" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95 translate-y-2" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-95 translate-y-2" @click.away="openWa = false" class="mb-3 w-72 rounded-2xl bg-white shadow-2xl ring-1 ring-slate-900/10 overflow-hidden" style="display: none;">
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-4 text-white">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-white/20 text-white font-bold">
                        <i class="fa-solid fa-headset text-lg"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm">Customer Service</h4>
                        <p class="text-xs text-blue-100">BPRS Syariah Madinah</p>
                    </div>
                </div>
            </div>
            <div class="p-4 space-y-3 bg-slate-50">
                <p class="text-xs text-slate-600 leading-relaxed">Assalamu'alaikum! Ada yang bisa kami bantu mengenai tabungan, deposito, atau pembiayaan syariah?</p>
                <a href="https://wa.me/6281234567890?text=Halo%20BPRS%20Syariah%20Madinah,%20saya%20ingin%20bertanya%20mengenai%20produk%20dan%20layanan" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center gap-2 w-full py-2.5 px-4 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl shadow transition">
                    <i class="fa-brands fa-whatsapp text-base"></i> Chat WhatsApp
                </a>
            </div>
        </div>

        <!-- Floating Button -->
        <button @click="openWa = !openWa" aria-label="Chat WhatsApp CS BPRS Madinah" class="flex items-center justify-center h-14 w-14 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white shadow-xl shadow-emerald-500/30 transition hover:scale-105 active:scale-95 focus:outline-none relative group">
            <span class="absolute -top-1 -right-1 flex h-4 w-4">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-4 w-4 bg-emerald-400 border-2 border-white"></span>
            </span>
            <i class="fa-brands fa-whatsapp text-2xl"></i>
        </button>
    </div>
</body>

</html>
