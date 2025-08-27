<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ImageModel;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\ResponseInterface;

class UploadController extends BaseController
{
    protected $imageModel;
    public function __construct()
    {

        $this->imageModel = new ImageModel();
    }

    public function index()
    {
        $data = array();
        $data['title'] = 'Upload Page';
        $data['images'] = $this->imageModel->findAll();

        return $this->render_dashboard('dashboard/upload', $data);
    }

    public function proses()
    {
        $file = $this->request->getFile('image');
        $desc = $this->request->getPost('description');

        if (!$file || !$file->isValid()) {
            return Services::response()
                ->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                ->setJSON(['message' => 'File tidak ditemukan atau tidak valid.']);
        }

        if (!in_array($file->getMimeType(), ['image/jpeg', 'image/png', 'image/webp'])) {
            return Services::response()
                ->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                ->setJSON(['message' => 'Hanya gambar (jpg, png, webp) yang diperbolehkan.']);
        }

        $newName = 'bprsmadinah_' . time() . '.jpg';
        $file->move(ROOTPATH . 'public/uploads', $newName);

        $url_image = 'uploads/' . $newName;

        /* insert data image */
        $this->imageModel->insert([
            'description' => $desc,
            'image_url' => $url_image
        ]);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Berhasil diupload: ' . base_url($url_image)
        ]);
    }

    function delete($id)
    {
        $image = $this->imageModel->find($id);
        if (!$image) {
            return $this->response->setJSON(['success' => false, 'message' => 'Gambar tidak ditemukan']);
        }

        $file = FCPATH . 'uploads/' . basename($image['image_url']);
        if (is_file($file)) {
            unlink($file);
        }

        $this->imageModel->delete($id);
        return $this->response->setJSON(['success' => true]);
    }
}
