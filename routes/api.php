<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login',    [AuthController::class, 'login']);

Route::middleware(['auth:api'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('products',          [ProductController::class, 'index']);
    Route::get('products/{id}',     [ProductController::class, 'show']);

    // Solo admin puede crear/editar/eliminar
    Route::middleware('role:admin')->group(function() {
        Route::post('products',           [ProductController::class, 'store']);
        Route::put('products/{id}',       [ProductController::class, 'update']);
        Route::delete('products/{id}',    [ProductController::class, 'destroy']);
        
        // CRUD Categorías (opcional)
        Route::apiResource('categories', CategoryController::class)->except(['index', 'show']);
    });
    // Todos pueden ver categorías
    Route::get('categories',      [CategoryController::class, 'index']);
    Route::get('categories/{id}', [CategoryController::class, 'show']);
});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
