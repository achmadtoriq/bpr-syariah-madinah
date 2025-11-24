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
        $model = new ManagemenModel();
        $managements = $model->findAll();
        $flag = true;
        return $this->render_dashboard('dashboard/managemen/main', compact('title', 'managements', 'flag'));
    }

    public function create() {
        $title = 'Create Data Management';
        $flag = false;
        return $this->render_dashboard('dashboard/managemen/main', compact('title', 'flag'));
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
                'pendidikan'      => implode(";", $this->request->getPost('pendidikan')),
                'pengalaman_kerja'=> implode(";", $this->request->getPost('pengalaman_kerja')),
                'pelatihan'       => implode(";", $this->request->getPost('pelatihan')),
            );

            // --- Upload Image ---
            $file = $this->request->getFile('image');
            if ($file && $file->isValid()) {
                // Buat folder penyimpanan (misal: writable/uploads/pemegang-saham)
                $uploadPath = ROOTPATH . 'public/assets/uploads/managemen';
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                // Bersihkan nama file dari karakter . , diganti _
                $safeNama = preg_replace('/[.,]/', '_', strtolower($data['nama']));
                $newName = $safeNama . '.' . $file->getExtension();

                // Pakai nama file asli atau generate baru
                $file->move($uploadPath, str_replace(' ', '_',  $newName));

                $data['photo'] = 'assets/uploads/managemen/' . $newName;
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

    public function delete($id)
    {
        $model = new ManagemenModel();
        $managemen = $model->find($id);

        if (!$managemen) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data tidak ditemukan.'
            ]);
        }

        // Hapus file dari folder public/laporan
        $filePath = ROOTPATH . 'public/uploads/managemen/' . $managemen['photo'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Hapus dari database
        $model->delete($id);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Data berhasil dihapus.'
        ]);
    }
}
