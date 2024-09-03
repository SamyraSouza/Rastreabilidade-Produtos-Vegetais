<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\PersonController;
use App\Http\Middleware\AutenticacaoMiddleware;

// Mostrar Página Login
Route::get('/', [PersonController::class, 'login']);


// Mostrar Página Cadastro
Route::get('/cadastro', [PersonController::class, 'cadastro']);

//autenticação
Route::post('/sign', [PersonController::class, 'check']);

//sair
Route::get('/sair', [PersonController::class, 'logout']);

//Mostrar Página Inicial
Route::get('/index', [ProductController::class, 'index'])->middleware(AutenticacaoMiddleware::class);

//Checar senha
Route::get('/senha/{senha}', [PersonController::class, 'senha'])->middleware(AutenticacaoMiddleware::class);

//mudar imagem de fundo
Route::put('/image/update/{id}', [PersonController::class, 'mudarimagem'])->middleware(AutenticacaoMiddleware::class);

///////////////////////////  PRODUTO /////////////////////////////////////////
//Mostar Produto
Route::get('/products', [ProductController::class, 'showproducts'])->middleware(AutenticacaoMiddleware::class);

//Mostar Meus Produtos
Route::get('/produc', [ProductController::class, 'showproduc'])->middleware(AutenticacaoMiddleware::class);

Route::get('/products/{id}', [ProductController::class, 'showproduct'])->middleware(AutenticacaoMiddleware::class);

//Cadastrar Produto
Route::get('/product/create', [ProductController::class, 'createproducts'])->middleware(AutenticacaoMiddleware::class);


Route::post('/products', [ProductController::class, 'storeproduct'])->middleware(AutenticacaoMiddleware::class);

// Editar Produto
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->middleware(AutenticacaoMiddleware::class);

Route::put('/products/update/{id}', [ProductController::class, 'update'])->middleware(AutenticacaoMiddleware::class);

//Inativar Produto
Route::get('/products/inativar/{id}', [ProductController::class, 'inativar'])->middleware(AutenticacaoMiddleware::class);
Route::get('/products/inativarsobre/{id}', [ProductController::class, 'inativarsobre'])->middleware(AutenticacaoMiddleware::class);

//ativar Produto
Route::get('/products/ativar/{id}', [ProductController::class, 'ativar'])->middleware(AutenticacaoMiddleware::class);
Route::get('/products/ativarsobre/{id}', [ProductController::class, 'ativarsobre'])->middleware(AutenticacaoMiddleware::class);

Route::get('/batchs/{id}', [BatchController::class, 'showbatchs'])->middleware(AutenticacaoMiddleware::class);

// Gerar pdf produto
Route::get('/pdf/{id}', [ProductController::class, 'pdf'])->middleware(AutenticacaoMiddleware::class);

//botao inativar
Route::get('/products/botao/{id}', [ProductController::class, 'botao'])->middleware(AutenticacaoMiddleware::class);


///////////////////////////  LOTE /////////////////////////////////////////
//Cadastrar Lote
Route::get('/batch/create/', [BatchController::class, 'createbatchs'])->middleware(AutenticacaoMiddleware::class);
Route::get('/batch/create/{id}', [BatchController::class, 'createbatchsid'])->middleware(AutenticacaoMiddleware::class);

Route::post('/batchs', [BatchController::class, 'storebatch'])->middleware(AutenticacaoMiddleware::class);

//editar Lote
Route::get('/batch/edit/{id}',[BatchController::class, 'edit'])->middleware(AutenticacaoMiddleware::class);

Route::put('/batchs/update/{id}', [BatchController::class, 'update'])->middleware(AutenticacaoMiddleware::class);

//Mostar Lote
Route::get('/batchs', [BatchController::class, 'showbatchs'])->middleware(AutenticacaoMiddleware::class);

//Mostar Meus Lote
Route::get('/batc', [BatchController::class, 'showbatc'])->middleware(AutenticacaoMiddleware::class);

Route::get('/batch/{id}', [BatchController::class, 'showbatch'])->middleware(AutenticacaoMiddleware::class);

//Inativar Lote
Route::get('/batchs/inativar/{id}', [BatchController::class, 'inativar'])->middleware(AutenticacaoMiddleware::class);
Route::get('/batchs/inativarsobre/{id}', [BatchController::class, 'inativarsobre'])->middleware(AutenticacaoMiddleware::class);

// Gerar pdf lote
Route::get('/batchs/pdf/{id}', [BatchController::class, 'pdf']);

//ativar Lote
Route::get('/batchs/ativar/{id}', [BatchController::class, 'ativar'])->middleware(AutenticacaoMiddleware::class);
Route::get('/batchs/ativarsobre/{id}', [BatchController::class, 'ativarsobre'])->middleware(AutenticacaoMiddleware::class);

//rastrear Lote
Route::get('/movements/rastrear', [MovementController::class, 'rastrear'])->middleware(AutenticacaoMiddleware::class);

///////////////////////////  MOVIMENTAÇÃO /////////////////////////////////////////

//Cadastrar Movimentação
Route::get('/movement/create/', [MovementController::class, 'createmovements'])->middleware(AutenticacaoMiddleware::class);
Route::get('/movement/create/{id}', [MovementController::class, 'createmovementbatch'])->middleware(AutenticacaoMiddleware::class);

Route::post('/movements', [MovementController::class, 'storemovement'])->middleware(AutenticacaoMiddleware::class);

//Mostar Movimentação
Route::get('/movements', [MovementController::class, 'showmovements'])->middleware(AutenticacaoMiddleware::class);

//Mostar minha Movimentação
Route::get('/movem', [MovementController::class, 'showmovem'])->middleware(AutenticacaoMiddleware::class);

//editar movimentação
Route::get('/movement/edit/{id}',[MovementController::class, 'edit'])->middleware(AutenticacaoMiddleware::class);
Route::put('/movement/update/{id}',[MovementController::class, 'update'])->middleware(AutenticacaoMiddleware::class);


//excluir movimentação
Route::get('/movement/delete/{id}', [MovementController::class, 'destroy'])->middleware(AutenticacaoMiddleware::class);

// Gerar pdf movimentação
Route::get('/movements/pdf/{id}', [MovementController::class, 'pdf'])->middleware(AutenticacaoMiddleware::class);


//Pessoas
Route::post('/people', [PersonController::class, 'storeperson']);

//Ver pessoas não cadastradas
Route::get('/peoples', [PersonController::class, 'showpeople'])->middleware(AutenticacaoMiddleware::class);

//Permitir pessoas
Route::get('/permission/{id}', [PersonController::class, 'permission'])->middleware(AutenticacaoMiddleware::class);

//pegar usuário
Route::get('/profile/{id}', [PersonController::class, 'showperson'])->middleware(AutenticacaoMiddleware::class);

//esqueceu a senha
Route::get('/forgotpassword/{email}', [PersonController::class, 'esqueceusenha']);

//editar movimentação
Route::put('/people/update/{person}',[PersonController::class, 'update'])->middleware(AutenticacaoMiddleware::class);
