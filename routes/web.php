<?php

use App\Http\Controllers\LandingPagesController;
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


// Route::get('/login', function () {
//     return view('auth.login');
// });

Route::get('/', [LandingPagesController::class, 'index'])->name('home');
Route::post('/produk/detail/payment', [LandingPagesController::class, 'payment'])->name('payment');
Route::get('/produk/detail/payment', [LandingPagesController::class, 'show_payment'])->name('show_payment');
Route::put('/produk/detail/payment', [LandingPagesController::class, 'check_payment'])->name('check_payment');
Route::get('/produk/detail/{id}', [LandingPagesController::class, 'product_detail'])->name('product_detail');


Route::post('/midtrans/callback', [LandingPagesController::class, 'callback'])->name('midtrans.callback');