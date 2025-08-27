<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function generateAccessToken($user)
{
    $key = getenv('JWT_SECRET');
    $payload = [
        'iss' => 'yourdomain.com',
        'aud' => 'yourdomain.com',
        'iat' => time(),
        'exp' => time() + 60 * 2, // 5 menit
        'uid' => $user['id'],
        'logout' => '/logout',
        'data' => [
            "username" => $user['username']
        ]
    ];
    return JWT::encode($payload, $key, 'HS256');
}

function generateRefreshToken($user)
{
    $key = getenv('JWT_SECRET');
    $payload = [
        'iat' => time(),
        'exp' => time() + 3600 * 24 * 7, // 7 hari
        'uid' => $user['id'],
        'logout' => '/logout',
        'data' => [
            "username" => $user['username']
        ],
        'type' => 'refresh',
    ];
    return JWT::encode($payload, $key, 'HS256');
}

function decodeJWT($token)
{
    return JWT::decode($token, new Key(getenv('JWT_SECRET'), 'HS256'));
}
