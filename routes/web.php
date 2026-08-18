<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

Route::get('/index', [PokemonController::class, 'index']);
Route::get('/details/{name}', [PokemonController::class, 'details'])->name('details');
Route::get('/setStarter/{name}', [PokemonController::class, 'details'])->name('setStarter');

Route::get('/getMyStarters', [PokemonController::class, 'myStarters'])->name('getMyStarters');

