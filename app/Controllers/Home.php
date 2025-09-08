<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // ini_set('display_errors', '1');
        // ini_set('display_startup_errors', '1');
        // error_reporting(E_ALL);
        
        // return view('welcome_message');
        return $this->render('main/home', [
            'title' => 'Home Page'
        ]);
    }
}
