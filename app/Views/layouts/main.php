<!DOCTYPE html>
<html lang="en" x-data="{ open: false }" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="The small framework with powerful features">
    <title><?= esc($title ?? 'My App') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <link href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.js"></script>


    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://kit.fontawesome.com/a7feba845e.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <link rel="stylesheet" href="<?= base_url('assets/ckeditor5-46.0.0/ckeditor5/ckeditor5.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css')?>">
</head>

<body class="w-full">
    <!-- ✅ HEADER -->
    <?php echo $header ?? '' ?>

    <!-- ✅ MAIN CONTENT -->
    <?= $content ?? '' ?>

    <!-- ✅ FOOTER -->
    <?= $footer ?? '' ?>
</body>

</html>