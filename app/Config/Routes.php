<?php

use App\Controllers\AboutUsController;
use App\Controllers\AuthController;
use App\Controllers\BeritaController;
use App\Controllers\ContactUsController;
use App\Controllers\DashboardController;
use App\Controllers\DocsController;
use App\Controllers\GaleriController;
use App\Controllers\Home;
use App\Controllers\KarirController;
use App\Controllers\ManagemenController;
use App\Controllers\NewsController;
use App\Controllers\ProdukController;
use App\Controllers\UploadController;
use App\Controllers\InboxController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/** Landing Route */
$routes->get('/', [Home::class, 'index']);

/* Tentang Kami */
$routes->get('/profil', [AboutUsController::class, 'index']);
$routes->get('/managemen', [AboutUsController::class, 'managemen']);
$routes->get('/struktur_organisasi', [AboutUsController::class, 'struktur']);
$routes->get('/awards', [AboutUsController::class, 'awards']);
$routes->get('/keuangan', [AboutUsController::class, 'laporan']);
$routes->get('/piagam', [AboutUsController::class, 'piagam']);

/* Produk Kami */
$routes->get('/tabungan', [ProdukController::class, 'index']);
$routes->get('/deposito', [ProdukController::class, 'deposito']);
$routes->get('/pembiayaan', [ProdukController::class, 'pembiayaan']);
$routes->get('/pelayanan', [ProdukController::class, 'pelayanan']);

$routes->get('/galeri', [GaleriController::class, 'index']);
$routes->get('/api/galeri_all', [GaleriController::class, 'getImages']);
$routes->get('/berita', [BeritaController::class, 'index']);
$routes->get('/berita/(:segment)', [BeritaController::class, 'detail']);
$routes->get('/karir', [KarirController::class, 'index']);
$routes->get('/hubungi_kami', [ContactUsController::class, 'index']);


/** Login Route */
$routes->get('/login', [AuthController::class, 'login'], ['filter' => 'guest']);
$routes->post('/login', [AuthController::class, 'attemptLogin'], ['filter' => 'guest']);
$routes->get('/logout', [AuthController::class, 'logout']);

/** Dashboard Route */
$routes->group('/', function($routes) {
    $routes->get('dashboard', [DashboardController::class, 'index']);

    $routes->get('upload', [UploadController::class, 'index']);
    $routes->post('upload/proses', [UploadController::class, 'proses']);
    $routes->delete('upload/delete/(:num)', [UploadController::class, 'delete']);

    $routes->get('artikel-list', [NewsController::class, 'index']);
    $routes->get('artikel', [NewsController::class, 'create']);
    $routes->post('artikel/store', [NewsController::class, 'store']);
    $routes->post('artikel/upload-image', [NewsController::class, 'uploadImage']);
    $routes->get('artikel/(:segment)', [NewsController::class, 'show']);

    $routes->get('docs', [DocsController::class, 'index']);
    $routes->get('docs-upload/refresh', [DocsController::class, 'table']);
    $routes->post('docs-upload/store', [DocsController::class, 'store']);
    $routes->delete('docs-upload/delete/(:num)', [DocsController::class, 'delete']);

    $routes->get('managemen-list', [ManagemenController::class, 'index']);
    $routes->get('managemen-form', [ManagemenController::class, 'create']);
    $routes->post('managemen/store', [ManagemenController::class, 'store']);
    $routes->delete('managemen/delete/(:num)', [ManagemenController::class, 'delete']);

    /* Email Inbox */
    $routes->get('inbox', [InboxController::class, 'index']);
    $routes->get('inbox/detail/(:num)', [InboxController::class, 'detail']);
    $routes->get('inbox/download/(:num)', [InboxController::class, 'downloadAttachment']);
    $routes->get('inbox/download-bulk', [InboxController::class, 'downloadBulkAttachments']);
    $routes->post('inbox/download-bulk', [InboxController::class, 'downloadBulkAttachments']);
    $routes->post('inbox/sync', [InboxController::class, 'sync']);
    $routes->delete('inbox/delete/(:num)', [InboxController::class, 'delete']);
});

$routes->set404Override(function() {
    if (service('request')->isAJAX()) {
        return service('response')
            ->setStatusCode(404)
            ->setJSON(['message' => 'Halaman tidak ditemukan']);
    }

    return view('errors/html/custom_404');
});
