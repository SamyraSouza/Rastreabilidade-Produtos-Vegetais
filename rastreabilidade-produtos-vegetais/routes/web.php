<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BatchController;

// Página Inicial
Route::get('/', [BatchController::class, 'index']);


//Cadastrar Lote

Route::get('/lote/create', [BatchController::class, 'create']);


// Rastrear Lote
Route::get('/rastreamento', function () {
    return view('rastreio');
});

Route::get('/rastreamento', function () {

    $busca  = request('search');

    return view('rastreio', ['busca' => $busca]);
});

Route::get('/rastreamento/{id}', function ($id) {
    return view('lote', ['id' => $id]);
});

// Entrar
Route::get('/entrar', function () {
    return view('entrar');
});

//Cadastrar Usuário
Route::get('/cadastrar', function () {
    return view('cadastrar');
});
