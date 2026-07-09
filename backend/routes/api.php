<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\VehicleController;
use App\Http\Controllers\Api\ServiceOrderController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\PermissionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('api')->group(function () {
    // Authentication Routes (Public)
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login'])->name('auth.login');
        Route::post('register', [AuthController::class, 'register'])->name('auth.register');
        Route::post('refresh', [AuthController::class, 'refresh'])->name('auth.refresh');

        // Protected Auth Routes
        Route::middleware('auth:api')->group(function () {
            Route::get('me', [AuthController::class, 'me'])->name('auth.me');
            Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
        });
    });

    // Protected Routes (Require Authentication)
    Route::middleware('auth:api')->group(function () {
        // Dashboard
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        });

        // Users Management
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('users.index');
            Route::post('/', [UserController::class, 'store'])->name('users.store');
            Route::get('{user}', [UserController::class, 'show'])->name('users.show');
            Route::put('{user}', [UserController::class, 'update'])->name('users.update');
            Route::delete('{user}', [UserController::class, 'destroy'])->name('users.destroy');
        });

        // Clients Management
        Route::prefix('clients')->group(function () {
            Route::get('/', [ClientController::class, 'index'])->name('clients.index');
            Route::post('/', [ClientController::class, 'store'])->name('clients.store');
            Route::get('{client}', [ClientController::class, 'show'])->name('clients.show');
            Route::put('{client}', [ClientController::class, 'update'])->name('clients.update');
            Route::delete('{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
        });

        // Vehicles Management
        Route::prefix('vehicles')->group(function () {
            Route::get('/', [VehicleController::class, 'index'])->name('vehicles.index');
            Route::post('/', [VehicleController::class, 'store'])->name('vehicles.store');
            Route::get('{vehicle}', [VehicleController::class, 'show'])->name('vehicles.show');
            Route::put('{vehicle}', [VehicleController::class, 'update'])->name('vehicles.update');
            Route::delete('{vehicle}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
        });

        // Service Orders Management
        Route::prefix('service-orders')->group(function () {
            Route::get('/', [ServiceOrderController::class, 'index'])->name('service-orders.index');
            Route::post('/', [ServiceOrderController::class, 'store'])->name('service-orders.store');
            Route::get('{serviceOrder}', [ServiceOrderController::class, 'show'])->name('service-orders.show');
            Route::put('{serviceOrder}', [ServiceOrderController::class, 'update'])->name('service-orders.update');
            Route::delete('{serviceOrder}', [ServiceOrderController::class, 'destroy'])->name('service-orders.destroy');
        });

        // Permissions Management
        Route::prefix('permissions')->group(function () {
            Route::get('roles', [PermissionController::class, 'getRoles'])->name('permissions.roles');
            Route::get('list', [PermissionController::class, 'getPermissions'])->name('permissions.list');
            Route::post('assign-role', [PermissionController::class, 'assignRoleToUser'])->name('permissions.assign-role');
            Route::delete('remove-role', [PermissionController::class, 'removeRoleFromUser'])->name('permissions.remove-role');
        });
    });
});
