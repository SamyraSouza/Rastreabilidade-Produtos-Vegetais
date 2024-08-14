<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

// Mostrar Página Inicial
Route::get('/', [ProductController::class, 'index']);


//Mostar Produto
Route::get('/products', [ProductController::class, 'showproducts']);

Route::get('/products/{id}', [ProductController::class, 'showproduct']);

//Cadastrar Produto
Route::get('/product/create', [ProductController::class, 'createproducts']);


Route::post('/products', [ProductController::class, 'storeproduct']);






// // Rastrear Lote
// Route::get('/rastreamento', function () {
//     return view('rastreio');
// });

// Route::get('/rastreamento', function () {

//     $busca  = request('search');

//     return view('rastreio', ['busca' => $busca]);
// });

// Route::get('/rastreamento/{id}', function ($id) {
//     return view('lote', ['id' => $id]);
// });

// // Entrar
// Route::get('/entrar', function () {
//     return view('entrar');
// });

// //Cadastrar Usuário
// Route::get('/cadastrar', function () {
//     return view('cadastrar');
// });
