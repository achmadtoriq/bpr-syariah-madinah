<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;

class BeritaController extends BaseController
{
    private $defaultArticles = [
        'mengenal-akad-mudharabah-wadiah' => [
            'id' => 1,
            'slug' => 'mengenal-akad-mudharabah-wadiah',
            'title' => "Mengenal Akad Mudharabah & Wadi'ah dalam Pengelolaan Simpanan Syariah",
            'clean_title' => "Mengenal Akad Mudharabah & Wadi'ah dalam Pengelolaan Simpanan Syariah",
            'category' => 'Edukasi Syariah',
            'published_at' => '2026-08-10 10:00:00',
            'user_id' => 'Humas BPRS Madinah',
            'thumbnail' => 'assets/rumah_bprs.jpg',
            'content' => "Perbankan Syariah menawarkan pengelolaan keuangan berbasis keadilan dan keberkahan. Dua akad utama yang paling sering digunakan dalam simpanan adalah Akad Mudharabah (Bagi Hasil) dan Akad Wadi’ah (Titipan Murni).\n\nMelalui Akad Mudharabah Mutlaqah, dana yang Anda simpan dalam Deposito BPRS Madinah akan diinvestasikan secara produktif dalam pembiayaan riil masyarakat. Hasil keuntungan investasi akan dibagi secara proporsional sesuai porsi nisbah yang disepakati sejak awal.\n\nSementara dengan Akad Wadi’ah Yad Adh-Dhamanah, dana simpanan tabungan Anda dijamin utuh dan dapat ditarik kapan saja tanpa dipotong biaya administrasi bulanan. Mari bangun ketahanan finansial keluarga bersama BPRS Madinah Lamongan!",
            'clean_content' => "Perbankan Syariah menawarkan pengelolaan keuangan berbasis keadilan dan keberkahan. Dua akad utama yang paling sering digunakan dalam simpanan adalah Akad Mudharabah (Bagi Hasil) dan Akad Wadi’ah (Titipan Murni).\n\nMelalui Akad Mudharabah Mutlaqah, dana yang Anda simpan dalam Deposito BPRS Madinah akan diinvestasikan secara produktif dalam pembiayaan riil masyarakat. Hasil keuntungan investasi akan dibagi secara proporsional sesuai porsi nisbah yang disepakati sejak awal.\n\nSementara dengan Akad Wadi’ah Yad Adh-Dhamanah, dana simpanan tabungan Anda dijamin utuh dan dapat ditarik kapan saja tanpa dipotong biaya administrasi bulanan. Mari bangun ketahanan finansial keluarga bersama BPRS Madinah Lamongan!"
        ],
        'bprs-madinah-edukasi-simpel' => [
            'id' => 2,
            'slug' => 'bprs-madinah-edukasi-simpel',
            'title' => 'BPRS Madinah Sukses Gelar Edukasi Literasi Tabungan SimPel di Lamongan',
            'clean_title' => 'BPRS Madinah Sukses Gelar Edukasi Literasi Tabungan SimPel di Lamongan',
            'category' => 'Kegiatan & CSR',
            'published_at' => '2026-08-04 09:00:00',
            'user_id' => 'Tim Literasi Perbankan',
            'thumbnail' => 'assets/produk/tabungan_simpel.png',
            'content' => "Sebagai komitmen terhadap peningkatan literasi keuangan inklusif, PT BPRS Syariah Madinah Lamongan menyelenggarakan sosialisasi Tabungan Simpanan Pelajar (SimPel iB) di berbagai sekolah dan madrasah mitra di Kabupaten Lamongan.\n\nProgram ini bertujuan memberikan pemahaman mendasar bagi para siswa mengenai pentingnya mengelola uang jajan dan merencanakan masa depan sejak dini. Dengan setoran awal super ringan mulai dari Rp 1.000 dan bebas biaya administrasi bulanan, Tabungan SimPel iB mendapatkan sambutan hangat dari jajaran kepala sekolah, guru, dan para orang tua siswa.",
            'clean_content' => "Sebagai komitmen terhadap peningkatan literasi keuangan inklusif, PT BPRS Syariah Madinah Lamongan menyelenggarakan sosialisasi Tabungan Simpanan Pelajar (SimPel iB) di berbagai sekolah dan madrasah mitra di Kabupaten Lamongan.\n\nProgram ini bertujuan memberikan pemahaman mendasar bagi para siswa mengenai pentingnya mengelola uang jajan dan merencanakan masa depan sejak dini. Dengan setoran awal super ringan mulai dari Rp 1.000 dan bebas biaya administrasi bulanan, Tabungan SimPel iB mendapatkan sambutan hangat dari jajaran kepala sekolah, guru, dan para orang tua siswa."
        ],
        'tips-memilih-deposito-syariah' => [
            'id' => 3,
            'slug' => 'tips-memilih-deposito-syariah',
            'title' => 'Tips Memilih Deposito Berjangka Syariah yang Aman dan Dijamin LPS',
            'clean_title' => 'Tips Memilih Deposito Berjangka Syariah yang Aman dan Dijamin LPS',
            'category' => 'Tips Finansial',
            'published_at' => '2026-07-28 14:00:00',
            'user_id' => 'Tim Analis Finansial',
            'thumbnail' => 'assets/produk/brosur_deposito.webp',
            'content' => "Di tengah ketidakpastian ekonomi, memilih instrumen investasi simpanan yang aman dan bebas risiko riba menjadi kebutuhan utama. Deposito Berjangka Syariah BPRS Madinah hadir sebagai solusi tepat bagi masyarakat yang menginginkan imbal hasil kompetitif tanpa rasa khawatir.\n\nBerikut 3 tips penting memilih deposito syariah:\n1. Pastikan bank terdaftar dan diawasi OJK serta menjadi peserta penjaminan LPS.\n2. Sesuaikan tenor investasi (1, 3, 6, atau 12 bulan) dengan kebutuhan likuiditas Anda.\n3. Manfaatkan fasilitas Automatic Roll Over (ARO) untuk perpanjangan deposito otomatis tanpa repot.",
            'clean_content' => "Di tengah ketidakpastian ekonomi, memilih instrumen investasi simpanan yang aman dan bebas risiko riba menjadi kebutuhan utama. Deposito Berjangka Syariah BPRS Madinah hadir sebagai solusi tepat bagi masyarakat yang menginginkan imbal hasil kompetitif tanpa rasa khawatir.\n\nBerikut 3 tips penting memilih deposito syariah:\n1. Pastikan bank terdaftar dan diawasi OJK serta menjadi peserta penjaminan LPS.\n2. Sesuaikan tenor investasi (1, 3, 6, atau 12 bulan) dengan kebutuhan likuiditas Anda.\n3. Manfaatkan fasilitas Automatic Roll Over (ARO) untuk perpanjangan deposito otomatis tanpa repot."
        ],
        'madinah-payment-system-mps' => [
            'id' => 4,
            'slug' => 'madinah-payment-system-mps',
            'title' => 'Inovasi Madinah Payment System (MPS) Bantu Digitalisasi Keuangan Sekolah & Pesantren',
            'clean_title' => 'Inovasi Madinah Payment System (MPS) Bantu Digitalisasi Keuangan Sekolah & Pesantren',
            'category' => 'Inovasi Digital',
            'published_at' => '2026-07-20 11:00:00',
            'user_id' => 'Tim IT & Layanan',
            'thumbnail' => 'assets/produk/madinah_pay_system.webp',
            'content' => "Guna mendukung digitalisasi tata kelola lembaga pendidikan Islam, BPRS Madinah meluncurkan layanan Madinah Payment System (MPS). Layanan berupa software pengelolaan keuangan sekolah ini diberikan secara GRATIS bagi sekolah, madrasah, dan pesantren di wilayah Lamongan.\n\nDengan MPS, pembukuan SPP, tagihan iuran bulanan, serta laporan penerimaan dana sekolah dapat diakses secara akurat, real-time, serta dilengkapi fasilitas layanan antar-jemput dana kas (Pick-Up Service).",
            'clean_content' => "Guna mendukung digitalisasi tata kelola lembaga pendidikan Islam, BPRS Madinah meluncurkan layanan Madinah Payment System (MPS). Layanan berupa software pengelolaan keuangan sekolah ini diberikan secara GRATIS bagi sekolah, madrasah, dan pesantren di wilayah Lamongan.\n\nDengan MPS, pembukuan SPP, tagihan iuran bulanan, serta laporan penerimaan dana sekolah dapat diakses secara akurat, real-time, serta dilengkapi fasilitas layanan antar-jemput dana kas (Pick-Up Service)."
        ]
    ];

    public function index()
    {
        $title = "Berita & Artikel | BPRS Madinah Lamongan";
        $newsModel = new NewsModel();
        $articles = [];

        try {
            $rawArticles = $newsModel->orderBy('created_at', 'DESC')->findAll();
            foreach ($rawArticles as $art) {
                $art['clean_title'] = $this->cleanText($art['title'] ?? '');
                $art['clean_content'] = $this->cleanText($art['content'] ?? '');
                $articles[] = $art;
            }
        } catch (\Exception $e) {
            $articles = [];
        }

        return $this->render('/main/berita', compact('title', 'articles'));
    }

    public function detail($slug = null)
    {
        $newsModel = new NewsModel();
        $article = null;

        if (!empty($slug)) {
            // 1. Try finding in curated default articles first if slug matches key
            if (isset($this->defaultArticles[$slug])) {
                $article = $this->defaultArticles[$slug];
            }

            // 2. Try finding in DB by exact slug
            if (!$article) {
                try {
                    $article = $newsModel->where('slug', $slug)->first();
                } catch (\Exception $e) {}
            }

            // 3. Try finding in DB by id (if numeric)
            if (!$article && is_numeric($slug)) {
                try {
                    $article = $newsModel->find($slug);
                } catch (\Exception $e) {}
            }

            // 4. Try finding in DB by generated slug from title
            if (!$article) {
                try {
                    $allDb = $newsModel->findAll();
                    foreach ($allDb as $item) {
                        $cleanTitle = $this->cleanText($item['title'] ?? '');
                        $generatedSlug = url_title($cleanTitle, '-', true);
                        if ($generatedSlug === $slug) {
                            $article = $item;
                            break;
                        }
                    }
                } catch (\Exception $e) {}
            }
        }

        // 5. Try partial match in default articles
        if (!$article && !empty($slug)) {
            foreach ($this->defaultArticles as $defKey => $defArt) {
                if (str_contains($slug, $defKey) || str_contains($defKey, (string)$slug)) {
                    $article = $defArt;
                    break;
                }
            }
        }

        // 6. Fallback to first curated default article
        if (!$article) {
            $article = reset($this->defaultArticles);
        }

        // Clean article title & content
        $article['clean_title'] = $this->cleanText($article['title'] ?? ($article['clean_title'] ?? 'Berita BPRS Madinah'));
        $article['clean_content'] = $this->cleanText($article['content'] ?? ($article['clean_content'] ?? 'Isi berita BPRS Madinah.'));

        // Load other articles for sidebar
        $otherArticles = [];
        try {
            $rawOthers = $newsModel->orderBy('created_at', 'DESC')->limit(4)->findAll();
            foreach ($rawOthers as $o) {
                $o['clean_title'] = $this->cleanText($o['title'] ?? '');
                $o['clean_content'] = $this->cleanText($o['content'] ?? '');
                $otherArticles[] = $o;
            }
        } catch (\Exception $e) {}

        if (empty($otherArticles)) {
            $otherArticles = array_values($this->defaultArticles);
        }

        $title = ($article['clean_title'] ?? 'Detail Berita') . " | BPRS Madinah";

        return $this->render('/main/berita_detail', compact('title', 'article', 'otherArticles', 'slug'));
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
        // Replace paragraph and break tags with double newlines
        $str = str_replace(['</p>', '<br>', '<br/>', '<br />', '</div>', '</h1>', '</h2>', '</h3>', '</h4>'], "\n\n", $str);
        // Strip HTML tags completely for clean excerpts
        $str = strip_tags($str);
        // Decode html entities
        $str = html_entity_decode($str, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        // Collapse spaces while preserving newlines
        $str = preg_replace('/[ \t]+/', ' ', $str);
        return trim(preg_replace('/\n\s*\n+/', "\n\n", $str));
    }
}
