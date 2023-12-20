<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route; // Menggunakan fasilitas routing dari Laravel
use App\Http\Controllers\LoginController; // Menggunakan controller LoginController untuk mengatur login
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| 
|
*/


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    Route::resource('products', ProductController::class);
});


Route::get('/login', [LoginController::class, 'index'])->name('login'); // Mengatur rute untuk halaman login
Route::post('/login', [LoginController::class, 'store'])->name('login.store'); // Mengatur rute untuk proses login
Route::get('/logout', [LoginController::class, 'logout'])->name('logout'); // Mengatur rute untuk proses logout
route::get('/register', [RegisterController::class, 'index'])->name('register');
route::post('/register', [RegisterController::class, 'store'])->name('register.store');
