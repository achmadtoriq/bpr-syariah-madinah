<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DocumentModel;
use CodeIgniter\HTTP\ResponseInterface;

class DocsController extends BaseController
{
    public function index()
    {
        $model = new DocumentModel();
        $documents = $model->findAll();
        $title = 'Document Page';
        return $this->render_dashboard('dashboard/Dokumen/docsList', compact('documents', 'title'));
    }

    public function table()
    {
        $model = new DocumentModel();
        $documents = $model->findAll();

        return view('dashboard/Dokumen/partials/table_documents', compact('documents'));
    }

    public function store()
    {
        helper(['form', 'filesystem']);

        $file = $this->request->getFile('file');
        $name = $this->request->getPost('name');
        $type = $this->request->getPost('type');

        // ✅ Validasi file
        if (!$file->isValid()) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $file->getErrorString()
            ]);
        }

        // ✅ Ambil ekstensi asli (pdf, doc, docx, dll)
        $ext = strtolower($file->getClientExtension());

        // ✅ Batasi hanya PDF & DOC/DOCX
        $allowed = ['pdf', 'doc', 'docx'];
        if (!in_array($ext, $allowed)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Hanya file PDF atau DOC/DOCX yang diperbolehkan.'
            ]);
        }

        // ✅ Ubah jadi snake_case + lowercase
        $cleanName = strtolower($name);
        $cleanName = preg_replace('/[^a-z0-9]+/', '_', $cleanName); // hanya a-z, 0-9 dan _
        $cleanName = trim($cleanName, '_'); // hapus _ di awal/akhir

        // ✅ Ambil ekstensi sesuai file yang diupload
        $ext = $file->getClientExtension();

        // ✅ Gabungkan jadi nama file baru
        $newName = $cleanName . '.' . $ext;

        // ✅ Pindahkan file ke folder public/laporan
        $file->move(ROOTPATH . 'public/assets/laporan', $newName);

        $model = new DocumentModel();
        $model->insert([
            'name'       => $name,
            'type'       => $type,
            'path'       => 'assets/laporan/' . $newName
        ]);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'File PDF berhasil diupload.',
            'file_path' => base_url('public/laporan/' . $newName)
        ]);
    }

    public function delete($id)
    {
        $model = new DocumentModel();
        $document = $model->find($id);

        if (!$document) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Dokumen tidak ditemukan.'
            ]);
        }

        // Hapus file dari folder public/laporan
        $filePath = ROOTPATH . 'public/' . $document['path'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Hapus dari database
        $model->delete($id);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Dokumen berhasil dihapus.'
        ]);
    }
}
