<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CORS
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->header('Access-Control-Allow-Origin', config('app.cors_origins'));
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
        $response->header('Access-Control-Allow-Credentials', 'true');

        return $response;
    }
}
