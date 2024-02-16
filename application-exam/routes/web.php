<?php

use App\Http\Controllers\CreateController;
use App\Http\Controllers\DashboardContoller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::get('/register', [RegisterController::class, 'create'])->name('register');

Route::post('/register', [RegisterController::class, 'register']);

Route::post('/', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardContoller::class, 'index'])->name('dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/post', [CreateController::class, 'create']);

    Route::post('/post', [CreateController::class, 'store'])->name('storepost');

    Route::delete('/post/{post}', [CreateController::class, 'destroy'])->name('post.delete');

    Route::get('/post/{post}/edit', [CreateController::class, 'edit'])->name('post.edit');

    Route::post('/updatepost/{id}', [CreateController::class, 'update'])->name('updatepost');
});