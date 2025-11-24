<!DOCTYPE html>
<html lang="en" x-data="{ open: false }" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="The small framework with powerful features">
    <title><?= esc($title ?? 'My App') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= base_url("assets/icon_madinah.ico") ?>" rel="shortcut icon" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.css" rel="preload">
    <script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.js" defer></script>

    <script src="https://cdn.tailwindcss.com" defer></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://kit.fontawesome.com/a7feba845e.js" crossorigin="anonymous" async></script>

    <link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>

    <!-- Leaflet CSS -->
    <link rel="preload" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js" defer></script>

    <link rel="preload" href="<?= base_url('assets/ckeditor5-46.0.0/ckeditor5/ckeditor5.css') ?>">
    <link rel="preload" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body class="w-full" x-data="modalHandler()">
    <!-- ✅ HEADER -->
    <?php echo $header ?? '' ?>

    <!-- ✅ MAIN CONTENT -->
    <?= $content ?? '' ?>

    <!-- ✅ FOOTER -->
    <?= $footer ?? '' ?>

    <!-- Alpine Component -->
    <script>
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
</body>

</html>