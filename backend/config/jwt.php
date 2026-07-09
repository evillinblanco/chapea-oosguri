<?php

return [
    'defaults' => [
        'guard' => 'api',
    ],

    'secret' => env('JWT_SECRET', 'your_jwt_secret_key_here'),
    'algo' => env('JWT_ALGORITHM', 'HS256'),
    'ttl' => env('JWT_TTL', 60), // minutes
    'refresh_ttl' => env('JWT_REFRESH_TTL', 20160), // 14 days in minutes
    'jti' => env('JWT_JTI_CLAIM', 'jti'),
    'verify_exp' => env('JWT_VERIFY_EXP', true),
    'required_claims' => env('JWT_REQUIRED_CLAIMS', ['iat', 'exp']),
    'blacklist_enabled' => env('JWT_BLACKLIST_ENABLED', true),
    'blacklist_cache_key' => 'jwt.blacklist',
    'providers' => [
        'jwt' => Tymon\JWTAuth\Providers\LaravelProvider::class,
    ],
    'exceptions' => [
        'JWTException' => Tymon\JWTAuth\Exceptions\JWTException::class,
        'TokenExpiredException' => Tymon\JWTAuth\Exceptions\TokenExpiredException::class,
        'TokenInvalidException' => Tymon\JWTAuth\Exceptions\TokenInvalidException::class,
        'TokenBlacklistedException' => Tymon\JWTAuth\Exceptions\TokenBlacklistedException::class,
    ],
];
