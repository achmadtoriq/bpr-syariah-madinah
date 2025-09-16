<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ManagemenController extends BaseController
{
    public function index()
    {
        $title = 'Management Dashboard';
        return $this->render_dashboard('dashboard/managemen/main', compact('title'));
    }

    public function create() {
        $title = 'Create Data Management';
        return $this->render_dashboard('dashboard/managemen/partials/form', compact('title'));
    }

    public function store()
    {
        // Validasi CSRF otomatis jalan jika CSRF protection aktif di Config\Security
        if (! $this->request->is('post')) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid request method',
                'csrf' => csrf_hash(),
            ]);
        }

        try {
            $data = array(
                'role'            => $this->request->getPost('role'),
                'nama'            => $this->request->getPost('nama'),
                'kewarganegaraan' => $this->request->getPost('kewarganegaraan'),
                'tempat_lahir'    => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir'   => $this->request->getPost('tanggal_lahir'),
                'pendidikan'      => json_encode($this->request->getPost('pendidikan') ?? []),
                'pengalaman_kerja'=> json_encode($this->request->getPost('pengalaman_kerja') ?? []),
                'pelatihan'       => json_encode($this->request->getPost('pelatihan') ?? []),
            );

            // --- Upload Image ---
            $file = $this->request->getFile('image');
            if ($file && $file->isValid()) {
                // Buat folder penyimpanan (misal: writable/uploads/pemegang-saham)
                $uploadPath = ROOTPATH . 'public/uploads/managemen';
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                // Pakai nama file asli atau generate baru
                $safeName = $file->getRandomName();
                $file->move($uploadPath, $safeName);

                $data['foto'] = 'public/uploads/managemen/' . $safeName;
            }

            // --- Simpan ke DB ---
            // $model = new PemegangSahamModel();
            // $model->insert($data);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'csrf' => csrf_hash(),
            ]);

        } catch (\Throwable $e) {
            // return $this->response->setJSON([
            //     'status' => 'error',
            //     'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            //     'csrf' => csrf_hash(),
            // ]);
        }
    }
}
