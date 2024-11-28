<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/data', [FrontendController::class, 'data'])->name('frontend.data');
Route::get('/tamu', [FrontendController::class, 'tamu'])->name('frontend.tamu');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::get('/admin', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/reload-captcha', [LoginController::class, 'reloadCaptcha']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/change/password',  [LoginController::class,'changePassword'])->name('change.password');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
