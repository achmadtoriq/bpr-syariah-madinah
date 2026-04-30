<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DocumentModel;
use App\Models\ImageModel;
use App\Models\ManagemenModel;
use App\Models\NewsModel;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);

        $title = 'Dashboard Page';
        $image = new ImageModel();
        $article = new NewsModel();
        $docs = new DocumentModel();
        $man = new ManagemenModel();
        $countImage = $image->select('loc_id, COUNT(*) as total')
        ->groupBy('loc_id')
        ->findAll();
        $countArtikel = $article->select('status, COUNT(*) as total')
        ->groupBy('status')
        ->findAll();
        $countDocs = $docs->select('type, COUNT(*) as total')
        ->groupBy('type')
        ->findAll();
        
        $countManagement = $man->select('COUNT(*) as total')
        ->findAll();

        return $this->render_dashboard('dashboard/home', compact('title', 'countImage', 'countArtikel', 'countDocs', 'countManagement'));
    }
}
