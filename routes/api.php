<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('v1')->group(function () {
    Route::prefix('beers')->group(function () {
        Route::middleware('authtoken')->group(function () {
            Route::get('/data', [BeerController::class, 'getData'])->name('beers.data');
            Route::get('/total', [BeerController::class, 'getDataTotal'])->name('beers.total');
        });
    });

});





