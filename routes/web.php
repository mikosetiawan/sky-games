<?php

use App\Http\Controllers\CMS\BookingController;
use App\Http\Controllers\CMS\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// indexis pages
Route::get('/', [WelcomeController::class, 'index'])->name('index');
Route::get('/jadwal-booking', [WelcomeController::class, 'jadwal_booking'])->name('jadwal_booking');


// contact pages
Route::get('/contact', function () {
    return view('pages/contact');
});

// booking pages
Route::get('/booking/{id}', [BookingController::class, 'index'])->name('booking.index');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::post('/booking/callback', [BookingController::class, 'callback'])->name('booking.callback');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::post('/tambah-produk', [DashboardController::class, 'store_produk'])->name('store_produk');
        Route::post('/jadwal', [DashboardController::class, 'store_jadwal'])->name('store_jadwal');
    });
});

require __DIR__ . '/auth.php';
