<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleTagModel;
use App\Models\CategoryArticleModel;
use App\Models\NewsModel;
use App\Models\TagModel;
use CodeIgniter\HTTP\ResponseInterface;

class NewsController extends BaseController
{
    public function index()
    {
        $listArtikel = new NewsModel();
        $articles = $listArtikel->select('articles.*, article_tag.*')->join('article_tag', 'articles.id = article_tag.article_id', 'left')->findAll();

        return $this->render_dashboard('dashboard/artikel/main', [
            'title' => 'Artikel Page',
            'articles' => $articles,
            'tipe' => 1
        ]);
    }

    public function create()
    {
        $categoryModel = new CategoryArticleModel();

        return $this->render_dashboard('dashboard/artikel/artikel', [
            'title' => 'Artikel Page',
            'categories' => $categoryModel->findAll()
        ]);
    }

    public function store()
    {
        $articleModel = new NewsModel();
        $tagModel = new TagModel();
        $articleTagModel = new ArticleTagModel();

        // Upload thumbnail
        $thumbnailName = null;
        $file = $this->request->getFile('thumbnail');
        if ($file && $file->isValid()) {
            $thumbnailName = $file->getRandomName();
            $file->move(FCPATH . 'articles/thumbnails', $thumbnailName);
        }

        // Simpan artikel
        $articleId = $articleModel->insert([
            'user_id' => session('user') ?? 'Administrator',
            'category_id' => $this->request->getPost('category_id'),
            'title' => $this->request->getPost('title'),
            'slug' => $this->request->getPost('slug'),
            'content' => $this->request->getPost('content'),
            'thumbnail' => $thumbnailName,
            'status' => $this->request->getPost('status'),
            'published_at' => $this->request->getPost('status') === 'published' ? date('Y-m-d H:i:s') : null,
        ]);

        // Simpan tags
        $tags = $this->request->getPost('tags');
        if (!empty($tags)) {
            foreach ($tags as $tagName) {
                $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $tagName)));

                // Cek apakah tag sudah ada
                $tag = $tagModel->where('slug', $slug)->first();
                if (!$tag) {
                    $tagId = $tagModel->insert(['name' => $tagName, 'slug' => $slug]);
                } else {
                    $tagId = $tag['id'];
                }

                // Simpan relasi
                $articleTagModel->insert([
                    'article_id' => $articleId,
                    'tag_id' => $tagId
                ]);
            }
        }

        return redirect()->to('/artikel')->with('success', 'Artikel berhasil dibuat.');
    }

    public function show($slug = null)
    {
        $articleModel = new NewsModel();
        $article = $articleModel->getNews($slug);

        return $this->render_dashboard('dashboard/artikel/main', [
            'title' => 'Artikel Page',
            'article' => $article,
            'tipe' => 2
        ]);
    }
}
