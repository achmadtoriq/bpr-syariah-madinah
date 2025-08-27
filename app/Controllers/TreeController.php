<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TreeController extends BaseController
{
    public function index()
    {
        return view('tree_view'); // load view
    }

    public function data()
    {
        $categories = array(
            array("id" => 1, "label" => "Elektronik", "parent" => null),
            array("id" => 2, "label" => "Laptop", "parent" => 1),
            array("id" => 3, "label" => "HP", "parent" => 1),
            array("id" => 4, "label" => "Samsung", "parent" => 3),
            array("id" => 5, "label" => "Asus", "parent" => 2)
        );

        $tree = [];

        foreach ($categories as $cat) {
            $tree[] = [
                'id' => $cat['id'],
                'label' => $cat['label'],
                'parent' => $cat['parent'] ?? null
            ];
        }

        return $this->response->setJSON($tree);
    }
}
