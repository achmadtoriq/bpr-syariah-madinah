<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ImageModel;
use CodeIgniter\HTTP\ResponseInterface;

class GaleriController extends BaseController
{
    protected $imageModel;
    public function __construct()
    {

        $this->imageModel = new ImageModel();
    }

    public function index()
    {
        $data_type_1 = array();
        $data_type_2 = array();
        $data_type_3 = array();

        $data_img = $this->imageModel->findAll();
        foreach ($data_img as $value) {
            if ($value['loc_id'] == 1) {
                array_push($data_type_1, array(
                    "alt" => $value['description'],
                    "img_path" => base_url($value['image_url'])
                ));
            } else if ($value['loc_id'] == 2) {
                array_push($data_type_2, array(
                    "alt" => $value['description'],
                    "img_path" => base_url($value['image_url'])
                ));
            } else if ($value['loc_id'] == 3) {
                array_push($data_type_3, array(
                    "alt" => $value['description'],
                    "img_path" => base_url($value['image_url'])
                ));
            }
        }

        $tabs = [
            ['id' => 'madinah1', 'label' => 'Kegiatan', 'content' => $data_type_1],
            ['id' => 'madinah2', 'label' => 'Pengembangan SDI', 'content' => $data_type_2],
            ['id' => 'madinah3', 'label' => 'Inklusi & Literasi', 'content' => $data_type_3],
        ];

        return $this->render('main/galeri', compact('tabs'));
    }

    public function getImages()
    {
        // Contoh data; kamu bisa ambil dari DB
        $data_img = $this->imageModel->findAll();

        return $this->response->setJSON($data_img);
    }
}
