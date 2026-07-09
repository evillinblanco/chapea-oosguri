<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($request->expectsJson()) {
            if ($exception instanceof ValidationException) {
                return response()->json([
                    'message' => 'Validation failed',
                    'errors' => $exception->errors(),
                ], 422);
            }

            if ($exception instanceof TokenExpiredException) {
                return response()->json(['error' => 'Token expired'], 401);
            }

            if ($exception instanceof TokenInvalidException) {
                return response()->json(['error' => 'Token invalid'], 401);
            }

            if ($exception instanceof JWTException) {
                return response()->json(['error' => 'JWT error: ' . $exception->getMessage()], 401);
            }

            if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                return response()->json(['error' => 'Resource not found'], 404);
            }

            return response()->json([
                'error' => $exception->getMessage() ?: 'Server error',
                'status' => 500,
            ], 500);
        }

        return parent::render($request, $exception);
    }
}
