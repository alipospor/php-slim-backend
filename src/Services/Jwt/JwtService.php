<?php

namespace App\Services\Jwt;

use Config\Jwt\JwtConfig;
use \Firebase\JWT\JWT;

class JwtService extends JwtConfig
{
    /**
     * Função Encode jwt
     * @param  array $payload
     * @return string
     */
    public static function encode(array $payload)
    {
        
        $jwt = JWT::encode($payload, JwtConfig::getToken(), 'RS256');
        return $jwt;
    }
}
