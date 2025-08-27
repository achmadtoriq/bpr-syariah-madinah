<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BeritaController extends BaseController
{
    public function index()
    {
        $title = "Berita";
        return $this->render('/main/berita', compact('title'));
    }
}
