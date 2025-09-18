<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['message' => 'API is working']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('products', ProductsController::class);
Route::post('products/create', [ProductsController::class, 'createProduct']);

Route::post('/user/register', [AuthController::class, 'register']);
Route::post('/user/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/user/logout', [AuthController::class, 'logout']);