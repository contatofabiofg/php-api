<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\EnsureTokenIsValid;


// Route::get('/', function() {
//     return dd('Hello World');
// });

Route::controller(UsuarioController::class)
->middleware('tokenValid')
->group(function () {
    Route::get('/usuarios', 'getAll');
    Route::post('/usuarios', 'post');
    Route::get('/usuarios/{id}', 'getPorId');
    Route::put('/usuarios/{id}', 'update');
    Route::delete('/usuarios/{id}', 'delete');
});

//ALTERNATIVA
//Route::resource('usuarios', UsuarioController::class);

