<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogController;
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

Route::prefix('dogs')
    ->controller(DogController::class)
    ->group(function () {
    Route::get('/',[DogController::class, 'index']);
    Route::get('/create',[DogController::class, 'create']);
    Route::post('/store',[DogController::class, 'store']);
});

Route::fallback(function() {
    return redirect('dogs/create');
});