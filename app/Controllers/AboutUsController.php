<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AboutUsController extends BaseController
{
    public function index()
    {
        $title = "Profil Perusahaan";
        return $this->render('/main/tentang_kami/profil', compact('title'));
    }

    public function managemen() {
        $title = "Managemen Perusahaan";
        return $this->render('/main/tentang_kami/managemen', compact('title'));
    }

    public function struktur() {
        $title = "Struktur Perusahaan";
        return $this->render('/main/tentang_kami/struktur', compact('title'));
    }

    public function awards() {
        $title = "Penghargaan Perusahaan";
        $awards = [
            [
                "imagePath" => '/penghargaan/satu.jpg',
                "teks_1" => 'BPRS Predikat',
                "predikat" => 'Sangat Bagus',
                "teks_2" => 'Kinerja Keuangan 5th berturut-turut',
                "teks_3" => 'Sharia Finance Awards 2018 versi Majalah Infobank',
            ],
            [
                "imagePath" => '/penghargaan/dua.jpg',
                "teks_1" => 'BPRS Predikat',
                "predikat" => 'Sangat Bagus',
                "teks_2" => '',
                "teks_3" => 'Sharia Finance Awards 2018 versi Majalah Infobank',
            ],
            [
                "imagePath" => '/penghargaan/tiga.jpg',
                "teks_1" => 'BPRS Predikat',
                "predikat" => 'Sangat Bagus',
                "teks_2" => 'Kinerja Keuangan 5th berturut-turut',
                "teks_3" => 'Sharia Finance Awards 2017 versi Majalah Infobank',
            ],
            [
                "imagePath" => '/penghargaan/empat.jpg',
                "teks_1" => 'BPRS Predikat',
                "predikat" => 'Sangat Bagus',
                "teks_2" => '',
                "teks_3" => 'Sharia Finance Awards 2017 versi Majalah Infobank',
            ],
            [
                "imagePath" => '/penghargaan/lima.jpg',
                "teks_1" => 'BPRS Predikat',
                "predikat" => 'Sangat Bagus',
                "teks_2" => '',
                "teks_3" => 'Sharia Finance Awards 2016 versi Majalah Infobank',
            ],
            [
                "imagePath" => '/penghargaan/enam.jpg',
                "teks_1" => 'BPRS Predikat',
                "predikat" => 'Sangat Bagus',
                "teks_2" => '',
                "teks_3" => 'Sharia Finance Awards 2015 versi Majalah Infobank',
            ],
            [
                "imagePath" => '/penghargaan/tujuh.jpg',
                "teks_1" => 'BPRS Predikat',
                "predikat" => 'Sangat Bagus',
                "teks_2" => '',
                "teks_3" => 'Sharia Finance Awards 2014 versi Majalah Infobank',
            ],
            [
                "imagePath" => '/penghargaan/delapan.jpg',
                "teks_1" => 'BPRS Predikat',
                "predikat" => 'Sangat Bagus',
                "teks_2" => '',
                "teks_3" => 'Sharia Finance Awards 2013 versi Majalah Infobank',
            ],
        ];
        return $this->render('/main/tentang_kami/awards', compact('title', 'awards'));
    }

    public function laporan() {
        $title = "Laporan Perusahaan";
        return $this->render('/main/tentang_kami/laporan', compact('title'));
    }
}
