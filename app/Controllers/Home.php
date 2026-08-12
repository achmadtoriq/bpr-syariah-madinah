<?php

namespace App\Controllers;

use App\Models\NewsModel;

class Home extends BaseController
{
    public function index(): string
    {
        $newsModel = new NewsModel();
        $articles = [];

        try {
            $rawArticles = $newsModel->orderBy('created_at', 'DESC')->limit(3)->findAll();
            foreach ($rawArticles as $art) {
                $art['clean_title'] = $this->cleanText($art['title'] ?? '');
                $art['clean_content'] = $this->cleanText($art['content'] ?? '');
                $articles[] = $art;
            }
        } catch (\Exception $e) {
            $articles = [];
        }

        return $this->render('main/home', [
            'title' => 'BPRS Madinah Lamongan',
            'articles' => $articles
        ]);
    }

    private function cleanText($str)
    {
        if (empty($str)) return '';
        // Fix JSON escaped slashes & figure tags
        $str = str_replace(['\/', '=\/Figure>', '=\/figure>', '=\/Figure', '=\/figure'], ['/', '', '', '', ''], $str);
        // Decode unicode escapes like \u201d, \u201c, \u2013, etc.
        $str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
        }, $str);
        // Strip HTML tags completely for clean excerpts
        $str = strip_tags($str);
        // Decode html entities
        $str = html_entity_decode($str, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        // Collapse whitespaces
        return trim(preg_replace('/\s+/', ' ', $str));
    }
}
