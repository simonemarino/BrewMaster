<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeerController;

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

Route::get('/', function () { return view('welcome');})->name('welcome');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['web','auth'])->group(function () {
    Route::get('/beers', [BeerController::class, 'index'])->name('beers.index');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

