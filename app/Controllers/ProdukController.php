<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProdukController extends BaseController
{
    public function index()
    {
        $title = 'Produk Tabungan';
        return $this->render('/main/produk/tabungan', compact('title'));
    }

    public function deposito()
    {
        $title = 'Produk Deposito';
        return $this->render('/main/produk/deposito', compact('title'));
    }

    public function pembiayaan()
    {
        $title = 'Produk Pembiayaan';
        return $this->render('/main/produk/pembiayaan', compact('title'));
    }

    public function pelayanan()
    {
        $title = 'Produk Pelayanan';
        return $this->render('/main/produk/pelayanan', compact('title'));
    }
}
