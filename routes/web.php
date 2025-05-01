<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Usuarios;
use App\Livewire\LibrosA;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/usuarios', Usuarios::class);

Route::get('/libros', LibrosA::class);
