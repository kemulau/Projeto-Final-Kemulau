<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SaidaEstoqueController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::view('/', 'welcome');

Route::resource('clientes', ClienteController::class)->names([
    'index' => 'clientes.index',    // Nome para o índice
    'create' => 'clientes.create',  // Nome para a criação
    'store' => 'clientes.store',    // Nome para armazenar
    'show' => 'clientes.show',      // Nome para mostrar
    'edit' => 'clientes.edit',      // Nome para editar
    'update' => 'clientes.update',  // Nome para atualizar
    'destroy' => 'clientes.destroy', // Nome para destruir
]);

Route::resource('categorias', CategoriaController::class)->names([
    'index' => 'categorias.index',   
    'create' => 'categorias.create',  
    'store' => 'categorias.store',  
    'show' => 'categorias.show', 
    'edit' => 'categorias.edit',
    'update' => 'categorias.update', 
    'destroy' => 'categorias.destroy', 
]);

Route::resource('unidades', UnidadeController::class)->names([
    'index' => 'unidades.index',   
    'create' => 'unidades.create',  
    'store' => 'unidades.store',  
    'show' => 'unidades.show', 
    'edit' => 'unidades.edit',
    'update' => 'unidades.update', 
    'destroy' => 'unidades.destroy', 
]);

Route::resource('produtos', ProdutoController::class)->names([
    'index' => 'produtos.index',    // Nome para o índice
    'create' => 'produtos.create',  // Nome para a criação
    'store' => 'produtos.store',    // Nome para armazenar
    'show' => 'produtos.show',      // Nome para mostrar
    'edit' => 'produtos.edit',      // Nome para editar
    'update' => 'produtos.update',  // Nome para atualizar
    'destroy' => 'produtos.destroy', // Nome para destruir
]);
Route::resource('saida_estoques', SaidaEstoqueController::class)->names([
    'index' => 'saida_estoques.index',    // Nome para o índice
    'create' => 'saida_estoques.create',  // Nome para a criação
    'store' => 'saida_estoques.store',    // Nome para armazenar
    'show' => 'saida_estoques.show',      // Nome para mostrar
    'edit' => 'saida_estoques.edit',      // Nome para editar
    'update' => 'saida_estoques.update',  // Nome para atualizar
    'destroy' => 'saida_estoques.destroy', // Nome para destruir
    ]);

Route::get('/socialite/google', [SocialLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [SocialLoginController::class, 'handleGoogleCallback'])->name('google.callback');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::post('/saida_estoques', [SaidaEstoqueController::class, 'store'])->name('saida_estoque.store');
Route::get('/saida_estoques', [SaidaEstoqueController::class, 'index'])->name('saida_estoques.index');
Route::get('/saida_estoques/create', [SaidaEstoqueController::class, 'create'])->name('saida_estoques.create');
Route::post('/saida_estoques', [SaidaEstoqueController::class, 'store'])->name('saida_estoques.store');
Route::get('saida_estoques/{saida_estoque}/qrcode', [SaidaEstoqueController::class, 'showQrCode'])->name('saida_estoques.qrcode');
Route::get('/produtos/sem-estoque', [ProdutoController::class, 'produtosSemEstoque']);


require __DIR__.'/auth.php';

Route::get('/relatorio/produtos', [RelatorioController::class, 'produtosComESemEstoque'])
    ->name('relatorio.produtos');

// Definindo manualmente as rotas para 'saida_estoques'
Route::get('saida_estoques', [SaidaEstoqueController::class, 'index'])->name('saida_estoques.index');
Route::get('saida_estoques/create', [SaidaEstoqueController::class, 'create'])->name('saida_estoques.create');
Route::post('saida_estoques', [SaidaEstoqueController::class, 'store'])->name('saida_estoques.store');
Route::get('saida_estoques/{saida_estoque}/edit', [SaidaEstoqueController::class, 'edit'])->name('saida_estoques.edit');
Route::put('saida_estoques/{saida_estoque}', [SaidaEstoqueController::class, 'update'])->name('saida_estoques.update');
Route::delete('saida_estoques/{saida_estoque}', [SaidaEstoqueController::class, 'destroy'])->name('saida_estoques.destroy');
