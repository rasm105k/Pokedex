<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/index');
Route::get('/index', [PokemonController::class, 'index'])->name('index');
Route::get('/details/{name}', [PokemonController::class, 'details'])->name('details');
Route::post('/setStarter/{name}', [PokemonController::class, 'setStarter'])->name('setStarter');
Route::get('/getMyStarters', [PokemonController::class, 'getMyStarters'])->name('getMyStarters');
