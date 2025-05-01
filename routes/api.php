<?php

use App\Http\Controllers\LibrosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(LibrosController::class)->group(function () {
    Route::get('/users', 'verUsuarios');
    Route::get('/libros', 'verLibros');

    
    Route::post('/crearUsuario', 'crearUsuario');
    Route::post('/crearLibro', 'crearLibro');


    Route::post('/libroId', 'libroEspecifico');
    Route::post('/libroEditar', 'libroEditar');

    Route::post('/eliminarLibro', 'eliminarLibro');

    Route::post('/eliminarUsuario', 'eliminarUsuario');

});

