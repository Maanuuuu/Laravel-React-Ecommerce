<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\WorkoutPlansController;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Default route to check if API is working
Route::get('/', function () {
    return response()->json(['message' => 'API is working']);
});

// User routes
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/user/register', [AuthController::class, 'register']);
Route::post('/user/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/user/logout', [AuthController::class, 'logout']);

// Exercise routes
Route::apiResource('exercises', ExerciseController::class);

// Workout Plans routes
Route::apiResource('workout_plans', WorkoutPlansController::class);
Route::get('workout_plans/getUserPlans/{userId}', [WorkoutPlansController::class, 'userPlans'])->name('workout_plans.userPlans');


