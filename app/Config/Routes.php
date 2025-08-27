<?php

use App\Controllers\AboutUsController;
use App\Controllers\AuthController;
use App\Controllers\BeritaController;
use App\Controllers\ContactUsController;
use App\Controllers\DashboardController;
use App\Controllers\GaleriController;
use App\Controllers\Home;
use App\Controllers\KarirController;
use App\Controllers\NewsController;
use App\Controllers\ProdukController;
use App\Controllers\UploadController;
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

/* Produk Kami */
$routes->get('/tabungan', [ProdukController::class, 'index']);
$routes->get('/deposito', [ProdukController::class, 'deposito']);
$routes->get('/pembiayaan', [ProdukController::class, 'pembiayaan']);
$routes->get('/pelayanan', [ProdukController::class, 'pelayanan']);

$routes->get('/galeri', [GaleriController::class, 'index']);
$routes->get('/api/galeri_all', [GaleriController::class, 'getImages']);
$routes->get('/berita', [BeritaController::class, 'index']);
$routes->get('/karir', [KarirController::class, 'index']);
$routes->get('/hubungi_kami', [ContactUsController::class, 'index']);


/** Login Route */
$routes->get('/login', [AuthController::class, 'login'], ['filter' => 'guest']);
$routes->post('/login', [AuthController::class, 'attemptLogin'], ['filter' => 'guest']);
$routes->get('/logout', [AuthController::class, 'logout']);

/** Dashboard Route */
$routes->group('/', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', [DashboardController::class, 'index']);

    $routes->get('upload', [UploadController::class, 'index']);
    $routes->post('upload/proses', [UploadController::class, 'proses']);
    $routes->delete('upload/delete/(:num)', [UploadController::class, 'delete']);

    $routes->get('artikel-list', [NewsController::class, 'index']);
    $routes->get('artikel', [NewsController::class, 'create']);
    $routes->post('artikel/store', [NewsController::class, 'store']);
    $routes->get('artikel/(:segment)', [NewsController::class, 'show']);
});

$routes->set404Override(function() {
    if (service('request')->isAJAX()) {
        return service('response')
            ->setStatusCode(404)
            ->setJSON(['message' => 'Halaman tidak ditemukan']);
    }

    return view('errors/html/custom_404');
});