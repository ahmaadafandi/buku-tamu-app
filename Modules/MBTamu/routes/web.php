<?php

use Illuminate\Support\Facades\Route;
use Modules\MBTamu\Http\Controllers\MBTamuController;

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

Route::group([], function () {
    Route::get('/mbtamu/json', [MBTamuController::class, 'json'])->name('mbtamu.data');
    Route::resource('mbtamu', MBTamuController::class)->names('mbtamu');
    Route::post('/mbtamu/update/tamu', [MBTamuController::class, 'update_tamu'])->name('mbtamu.updatetamu');
});
