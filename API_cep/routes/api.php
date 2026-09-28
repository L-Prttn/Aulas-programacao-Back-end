<?php

use Illuminate\Http\Request;
use App\Http\Controllers\EnderecoController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/enderecos', [EnderecoController::class, 'index']);

Route::get('/enderecos/{cep}', [EnderecoController::class, 'show']);
