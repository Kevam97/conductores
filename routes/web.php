<?php

use App\Http\Controllers\RateController;
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

Route::get('/', function () {
    return view('welcome');
})->name('Welcome');

Route::get('/calificar/{user:document}',[RateController::class,'show'])->name('rate');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/owner', function () {
    return view('owner');
})->middleware(['auth', 'verified'])->name('owner');

Route::get('/offer', function () {
    return view('offers');
})->middleware(['auth', 'verified'])->name('offers');


require __DIR__.'/auth.php';
