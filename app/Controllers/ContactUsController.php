<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ContactUsController extends BaseController
{
    public function index()
    {
        $title = "Hubungi Kami";
        $locations = [
            [
                'name' => 'BPRS Madinah Lamongan',
                'latitude' => -7.1153689, 
                'longitude' => 112.4168065,
            ]
        ];
        return $this->render('/main/contact_us', compact('title', 'locations'));
    }
}
