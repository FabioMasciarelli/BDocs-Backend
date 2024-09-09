<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\PaymentsController;
use App\Http\Controllers\Admin\SponsorshipController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');})->name('welcome');



    Route::middleware('auth')
    ->prefix('admin') // Prefisso nell'URL delle rotte di questo gruppo
    ->name('admin.') // Inizio di ogni nome delle rotte del gruppo
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/doctors', DoctorController::class);
        Route::resource('/messages', MessageController::class);
        Route::resource('reviews', ReviewController::class)->except([ 'store', 'create']);
        // route for the page of checkout
       
        Route::get('/checkout/{id}', [PaymentsController::class, 'showCheckout'])->name('checkout');
        // route with method post for the validation of the payment
        Route::post('/process-payment', [PaymentsController::class, 'processPayment'])->name('processPayment');
        Route::resource('/sponsorships', SponsorshipController::class);
    });

require __DIR__ . '/auth.php';


