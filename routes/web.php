<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;

Route::get('/', function () {
    return redirect()->route('livros.index');
});

Route::resource('livros', LivroController::class);