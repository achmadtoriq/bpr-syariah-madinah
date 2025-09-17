<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ManagemenModel;
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
                'jabatan'         => $this->request->getPost('jabatan'),
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

                // Bersihkan nama file dari karakter . , diganti _
                $safeNama = preg_replace('/[.,]/', '_', strtolower($data['nama']));
                $newName = $safeNama . '.' . $file->getExtension();

                // Pakai nama file asli atau generate baru
                $file->move($uploadPath, str_replace(' ', '_',  $newName));

                $data['photo'] = 'uploads/managemen/' . $newName;
            }

            // --- Simpan ke DB ---
            $model = new ManagemenModel();
            $model->insert($data);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'csrf' => csrf_hash(),
            ]);

        } catch (\Throwable $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                'csrf' => csrf_hash(),
            ]);
        }
    }
}
