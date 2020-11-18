<?php

namespace Config\Jwt;

class JwtConfig
{

    /**
     * Token do JWT
     */
    protected static function getToken()
    {
        $token = md5('batata');
        return $token;
    }
}
