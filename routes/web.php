<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortlinkController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('shortlink',[ShortlinkController::class, 'index'])->name('shortlink.index');
Route::post('shortlink/store',[ShortlinkController::class, 'store'])->name('shortlink.store');
Route::get('shortlink/{code}',[ShortlinkController::class, 'show'])->name('show.shorten.link');

