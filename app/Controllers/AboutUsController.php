<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DocumentModel;
use App\Models\ManagemenModel;
use CodeIgniter\HTTP\ResponseInterface;

class AboutUsController extends BaseController
{
    public function index()
    {
        $title = "Profil Perusahaan | BPRS Madinah Lamongan";
        return $this->render('/main/tentang_kami/profil', compact('title'));
    }

    public function managemen() {
        $map = array(1 => 'Pemegang Saham', 2 => 'Dewan Komisaris', 3 => 'Dewan Pengawas Syariah', 4 => 'Direksi');
        
        $models = new ManagemenModel();
        $managements = $models->orderBy('role', 'asc')->findAll();
        $title = "Managemen Perusahaan | BPRS Madinah Lamongan";

        $group_management = array();
        foreach ($managements as $row) {
            $group_management[$map[$row['role']]][] = $row;
        }

        return $this->render('/main/tentang_kami/managemen', compact('title', 'group_management'));
    }

    public function struktur() {
        $title = "Struktur Perusahaan | BPRS Madinah Lamongan";
        return $this->render('/main/tentang_kami/struktur', compact('title'));
    }

    public function awards() {
        $title = "Penghargaan Perusahaan | BPRS Madinah Lamongan";
        $awards = [
            [
                "imagePath" => '/assets/penghargaan/satu.jpg',
                "teks_1" => 'BPRS Predikat',
                "predikat" => 'Sangat Bagus',
                "teks_2" => 'Kinerja Keuangan 5th berturut-turut',
                "teks_3" => 'Sharia Finance Awards 2018 versi Majalah Infobank',
            ],
            [
                "imagePath" => '/assets/penghargaan/dua.jpg',
                "teks_1" => 'BPRS Predikat',
                "predikat" => 'Sangat Bagus',
                "teks_2" => '',
                "teks_3" => 'Sharia Finance Awards 2018 versi Majalah Infobank',
            ],
            [
                "imagePath" => '/assets/penghargaan/tiga.jpg',
                "teks_1" => 'BPRS Predikat',
                "predikat" => 'Sangat Bagus',
                "teks_2" => 'Kinerja Keuangan 5th berturut-turut',
                "teks_3" => 'Sharia Finance Awards 2017 versi Majalah Infobank',
            ],
            [
                "imagePath" => '/assets/penghargaan/empat.jpg',
                "teks_1" => 'BPRS Predikat',
                "predikat" => 'Sangat Bagus',
                "teks_2" => '',
                "teks_3" => 'Sharia Finance Awards 2017 versi Majalah Infobank',
            ],
            [
                "imagePath" => '/assets/penghargaan/lima.jpg',
                "teks_1" => 'BPRS Predikat',
                "predikat" => 'Sangat Bagus',
                "teks_2" => '',
                "teks_3" => 'Sharia Finance Awards 2016 versi Majalah Infobank',
            ],
            [
                "imagePath" => '/assets/penghargaan/enam.jpg',
                "teks_1" => 'BPRS Predikat',
                "predikat" => 'Sangat Bagus',
                "teks_2" => '',
                "teks_3" => 'Sharia Finance Awards 2015 versi Majalah Infobank',
            ],
            [
                "imagePath" => '/assets/penghargaan/tujuh.jpg',
                "teks_1" => 'BPRS Predikat',
                "predikat" => 'Sangat Bagus',
                "teks_2" => '',
                "teks_3" => 'Sharia Finance Awards 2014 versi Majalah Infobank',
            ],
            [
                "imagePath" => '/assets/penghargaan/delapan.jpg',
                "teks_1" => 'BPRS Predikat',
                "predikat" => 'Sangat Bagus',
                "teks_2" => '',
                "teks_3" => 'Sharia Finance Awards 2013 versi Majalah Infobank',
            ],
        ];
        return $this->render('/main/tentang_kami/awards', compact('title', 'awards'));
    }

    public function laporan() {
        $title = "Laporan Perusahaan | BPRS Madinah Lamongan";
        $docModel = new DocumentModel();
        $docs = $docModel->findAll();
        return $this->render('/main/tentang_kami/laporan', compact('title', 'docs'));
    }

    public function piagam() {
        $title = "Piagam Audit Perusahaan | BPRS Madinah Lamongan";
        $docModel = new DocumentModel();
        $docs = $docModel->findAll();
        return $this->render('/main/tentang_kami/piagam', compact('title', 'docs'));
    }
}
