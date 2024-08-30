<?php

use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\PokemonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Ruta de prueba
Route::post('hola', function() {
    return 'Hello World!';
});

// Ruta de login
Route::post('user/login', [UserController::class, 'login']);

Route::prefix('usuario')->group(function() {
    Route::get('', [UserController::class, 'index']); 
    Route::post('', [UserController::class, 'create']); 
    Route::get('/{id}', [UserController::class, 'show'])->where('id', '[0-9]+');
    Route::patch('/{id}', [UserController::class, 'update'])->where('id', '[0-9]+');
    Route::delete('/{id}', [UserController::class, 'destroy'])->where('id', '[0-9]+');
});

Route::prefix('pokemones')->group(function() {
    Route::get('', [PokemonController::class, 'index']);
    Route::post('', [PokemonController::class, 'create']);
    Route::get('/{id}', [PokemonController::class, 'show'])->where('id', '[0-9]+');
    Route::patch('/{id}', [PokemonController::class, 'update'])->where('id', '[0-9]+');
    Route::delete('/{id}', [PokemonController::class, 'destroy'])->where('id', '[0-9]+');
});

// Ruta para obtener el usuario autenticado
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
