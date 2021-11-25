<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* -------- Admin Login Registration Route ------- */

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminController::class, 'index'])->name('login_form');
        Route::post('/login', [AdminController::class, 'login'])->name('login');
        Route::get('/register', [AdminController::class, 'createRegister'])->name('create_register');
        Route::post('/register', [AdminController::class, 'storeRegister'])->name('register');
    });


    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    });
});

/* -------- End Admin Login Registration Route ------- */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
