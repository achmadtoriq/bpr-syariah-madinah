<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class AuthController extends BaseController
{

    use ResponseTrait;

    public function login()
    {
        return $this->render_dashboard('auth/login', [
            'title' => 'Login Page'
        ], true);
    }

    public function attemptLogin()
    {
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Username salah');
        }

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Login gagal');
        }

        $accessToken = generateAccessToken($user);
        $refreshToken = generateRefreshToken($user);


        // return response()
        // ->setCookie('access_token', $accessToken, 3600, '', '', false, true)
        // ->setCookie('refresh_token', $refreshToken, 604800, '', '', false, true)
        // ->setJSON(['message' => 'Login success']);
        // Set cookie ke response
        $this->response->setCookie('access_token', $accessToken, 3600);
        $this->response->setCookie('refresh_token', $refreshToken, 604800);

        // Kembalikan response redirect dengan cookie
        return redirect()
            ->to('/dashboard')
            ->withCookies(); // penting!
    }

    public function logout()
    {
        session()->destroy();
        // Hapus cookie
        $this->response->deleteCookie('access_token');
        return redirect()->to('/login')->withCookies(); // penting!
    }
}
