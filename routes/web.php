<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UnsplashController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ImageController;
// use App\Http\Controllers\DonationController;


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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

// Auth Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
// End of Auth Routes

// Blog Routes

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/create', [BlogController::class, 'create'])->name('blogs.create');
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/blogs/{blog:code}', [BlogController::class, 'show'])->name('blogs.show');
Route::delete('/blogs/{blog:code}', [BlogController::class, 'destroy'])->name('blogs.destroy');

// End of Blog Routes

// Donation Routes (Deelete if not needed)

Route::get('/donate', [DonationController::class, 'showDonationForm'])->name('donation.form');
Route::post('/donate', [DonationController::class, 'processDonation'])->name('donation.process');
Route::post('/donate/callback', [DonationController::class, 'handlePaymentCallback'])->name('donation.callback');

// End of Donation Routes


// Unplash Routes Temporary
// Unplash Image Route
Route::get('/photos', [ImageController::class, 'index'])->name('photos.index');
Route::get('/photos/search', [ImageController::class, 'search'])->name('photos.search');
Route::post('/photos/store', [ImageController::class, 'store'])->name('photos.store');
Route::delete('/photos/{id:unsplash_id}', [ImageController::class, 'destroy'])->name('photos.destroy');

