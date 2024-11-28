<?php

use Illuminate\Support\Facades\Route;
use Modules\MBPreference\Http\Controllers\MBPreferenceController;

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
    Route::resource('mbpreference', MBPreferenceController::class)->names('mbpreference');
    Route::post('/mbpreference/update/bg', [MBPreferenceController::class, 'update_bg'])->name('mbpreference.updatebg');
    Route::post('/mbpreference/update/main', [MBPreferenceController::class, 'update_main'])->name('mbpreference.updatemain');
});
