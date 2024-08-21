<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\BatchController;

// Mostrar Página Inicial
Route::get('/', [ProductController::class, 'index']);


//Mostar Produto
Route::get('/products', [ProductController::class, 'showproducts']);

Route::get('/products/{id}', [ProductController::class, 'showproduct']);

//Cadastrar Produto
Route::get('/product/create', [ProductController::class, 'createproducts']);


Route::post('/products', [ProductController::class, 'storeproduct']);

// Editar Produto
Route::get('/products/edit/{id}', [ProductController::class, 'edit']);

Route::put('/products/update/{id}', [ProductController::class, 'update']);

//Inativar Produto
Route::get('/products/inativar/{id}', [ProductController::class, 'inativar']);
Route::get('/products/inativarsobre/{id}', [ProductController::class, 'inativarsobre']);

//ativar Produto
Route::get('/products/ativar/{id}', [ProductController::class, 'ativar']);
Route::get('/products/ativarsobre/{id}', [ProductController::class, 'ativarsobre']);

Route::get('/batchs/{id}', [BatchController::class, 'showbatchs']);

// Gerar pdf produto
Route::get('/products/pdf/{id}', [ProductController::class, 'pdf']);

//botao inativar
Route::get('/products/botao/{id}', [ProductController::class, 'botao']);

//Cadastrar Lote
Route::get('/batch/create/', [BatchController::class, 'createbatchs']);
Route::get('/batch/create/{id}', [BatchController::class, 'createbatchsid']);

Route::post('/batchs', [BatchController::class, 'storebatch']);

//editar Lote
Route::get('/batch/edit/{id}',[BatchController::class, 'edit']);

Route::put('/batchs/update/{id}', [BatchController::class, 'update']);

//Mostar Lote
Route::get('/batchs', [BatchController::class, 'showbatchs']);

Route::get('/batch/{id}', [BatchController::class, 'showbatch']);

//Inativar Lote
Route::get('/batchs/inativar/{id}', [BatchController::class, 'inativar']);
Route::get('/batchs/inativarsobre/{id}', [BatchController::class, 'inativarsobre']);

//ativar Lote
Route::get('/batchs/ativar/{id}', [BatchController::class, 'ativar']);
Route::get('/batchs/ativarsobre/{id}', [BatchController::class, 'ativarsobre']);