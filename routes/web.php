<?php

use App\Http\Controllers\EditDashboardController;
use App\Http\Controllers\EditOwnerController;
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

Route::get('/topten',[RateController::class,'topTen'])->name('topten');



Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'permission:driver_create'])->name('dashboard');

Route::get('/editdashboard',[EditDashboardController::class,'index']
)->middleware(['auth', 'verified',  'permission:driver_create'])->name('editdashboard');

Route::get('/qr',[EditDashboardController::class,'qr']
)->middleware(['auth', 'verified',  'permission:driver_create'])->name('qr');


Route::get('/editowner',[EditOwnerController::class,'index']
)->middleware(['auth', 'verified',  'permission:owner_create'])->name('editowner');

Route::get('/owner', function () {
    return view('owner');
})->middleware(['auth', 'verified', 'permission:owner_create'])->name('owner');

Route::get('/proponents', [EditOwnerController::class,'proponents'])->middleware(['auth', 'verified', 'permission:owner_create'])->name('proponents');



Route::get('/subscriptions', function () {
    return view('subscriptions');
})->middleware(['auth', 'verified'])->name('subs');

Route::get('/offer', function () {
    return view('offers');
})->middleware(['auth', 'verified'])->name('offers');


require __DIR__.'/auth.php';
