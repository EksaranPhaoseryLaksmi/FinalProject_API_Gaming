<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/gaming', [GameController::class, 'index']);

Route::post('/gaming', [GameController::class, 'store']);
