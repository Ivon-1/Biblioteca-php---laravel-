<?php

use App\Http\Controllers\web\AutorController;
use App\Http\Controllers\web\GeneroController;
use App\Http\Controllers\web\LibrosController;

use Illuminate\Support\Facades\Route;

Route::resource('/libros', LibrosController::class); 
Route::resource('/autores', AutorController::class);
Route::resource('/generos', GeneroController::class);
