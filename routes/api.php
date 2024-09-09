<?php

use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\SpecializationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/doctors', [DoctorController::class,"index"]);
Route::get('/doctors/{id}', [DoctorController::class, 'show']);

Route::get('/specializations', [SpecializationController::class, 'index']);
Route::get('/ratings', [RatingController::class, 'index']);

Route::post('/reviews', [ReviewController::class, 'store']);
Route::post('/messages', [MessageController::class, 'store']);
Route::post('/ratings', [RatingController::class, 'store']);
