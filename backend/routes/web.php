<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Chapeação OS Guri - ERP System API',
        'version' => '1.0.0',
        'status' => 'running',
    ]);
});

Route::get('health', function () {
    return response()->json([
        'status' => 'healthy',
        'timestamp' => now()->toIso8601String(),
    ]);
});
