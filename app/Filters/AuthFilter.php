<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;

class AuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $token = $request->getCookie('access_token');
        $refreshToken = $request->getCookie('refresh_token');
        $session = session();
        $isAjax = $request->hasHeader('X-Requested-With') &&
            $request->getHeaderLine('X-Requested-With') === 'XMLHttpRequest';

        if (!$token) {
            $session->set('last_url', current_url());

            if ($isAjax) {
                return Services::response()
                    ->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED)
                    ->setJSON(['message' => 'Sesi kamu telah habis. Silakan login ulang.']);
            }

            return redirect()->to('/login');
        }

        try {
            $decoded = decodeJWT($token);

            $session->set([
                'isLoggedIn' => true,
                'logout' => $decoded->logout,
                'user' => $decoded->data->username,
            ]);
        } catch (\Firebase\JWT\ExpiredException $e) {
            // Token access expired → coba refresh
            if (!$refreshToken) {
                if ($isAjax) {
                    return Services::response()
                        ->deleteCookie('access_token', '/')
                        ->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED)
                        ->setJSON(['message' => 'Sesi kamu telah habis. Silakan login ulang.']);
                }

                return redirect()->to('/login')->with('error', 'Sesi kamu habis.');
            }

            try {
                $decodedRefresh = decodeJWT($refreshToken);
                $user = model('UserModel')->find($decodedRefresh->uid);

                if (!$user) {
                    return redirect()->to('/login')->with('error', 'User tidak ditemukan.');
                }

                $newAccessToken = generateAccessToken($user);
                $response = Services::response();
                $response->setCookie('access_token', $newAccessToken, 3600);
            } catch (\Exception $e2) {
                if ($isAjax) {
                    return Services::response()
                        ->deleteCookie('access_token', '/')
                        ->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED)
                        ->setJSON(['message' => 'Sesi kamu telah habis. Silakan login ulang.']);
                }

                return redirect()->to('/login')->with('error', 'Sesi kamu habis.');
            }
        } catch (\Exception $e) {
            // Token tidak valid
            $response = Services::response()->deleteCookie('access_token', '/');

            if ($isAjax) {
                return $response
                    ->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED)
                    ->setJSON(['message' => 'Token tidak valid. Silakan login ulang.']);
            }

            return redirect()->to('/login')
                ->with('error', 'Token tidak valid.')
                ->withCookies();
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
