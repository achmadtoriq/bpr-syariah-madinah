<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class KarirController extends BaseController
{
    public function index()
    {
        $title = "Karir | BPRS Madinah Lamongan";
        return $this->render('/main/karir', compact('title'));
    }
}
