<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProdutoController;

Route::get('/', function() {
    return dd('Hello World');
});

Route::controller(UsuarioController::class)->group(function () {
    Route::get('/usuarios', 'getAll');
    Route::post('/usuarios', 'store');
    Route::get('/usuarios/{id}', 'show');
    Route::put('/usuarios/{id}', 'update');
    Route::delete('/usuarios/{id}', 'destroy');
});

//ALTERNATIVA
//Route::resource('usuarios', UsuarioController::class);



Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);
Route::get('/produtos/{id}', [ProdutoController::class, 'show']);
Route::put('/produtos/{id}', [ProdutoController::class, 'update']);
Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy']);
