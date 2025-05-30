<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    SocialLoginController,
    ClienteController,
    CategoriaController,
    UnidadeController,
    ProdutoController,
    EntregadorController,
    CatalogoController,
    CarrinhoController,
    CompraController,
    SaidaEstoqueController,
    RelatorioController,
    CalculadoraController,
    Auth\AuthenticatedSessionController
};

// Página inicial
Route::view('/', 'welcome');

// Dashboard e Perfil
Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
Route::view('profile', 'profile')->middleware('auth')->name('profile');

// Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Socialite Google
Route::get('/socialite/google', [SocialLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [SocialLoginController::class, 'handleGoogleCallback'])->name('google.callback');

// Relatório
Route::get('/relatorio/produtos', [RelatorioController::class, 'produtosComESemEstoque'])->name('relatorio.produtos');

// Produtos sem estoque
Route::get('/produtos/sem-estoque', [ProdutoController::class, 'produtosSemEstoque'])->name('produtos.sem-estoque');

// Recursos padrão
Route::resources([
    'clientes' => ClienteController::class,
    'categorias' => CategoriaController::class,
    'unidades' => UnidadeController::class,
    'produtos' => ProdutoController::class,
    'saida_estoques' => SaidaEstoqueController::class,
]);

// QrCode específico
Route::get('saida_estoques/{saida_estoque}/qrcode', [SaidaEstoqueController::class, 'showQrCode'])->name('saida_estoques.qrcode');

// Entregadores protegidos por autenticação
Route::middleware(['auth'])->group(function () {
    Route::resource('entregadores', EntregadorController::class);
    Route::get('/compras', [CompraController::class, 'index'])->name('compras.index');
    Route::get('/compras/{id}', [CompraController::class, 'show'])->name('compras.show');
    Route::post('/carrinho/finalizar', [CarrinhoController::class, 'finalizar'])->name('carrinho.finalizar');
});

// Catálogo (público)
Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo');

// Carrinho (sessão)
Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::post('/carrinho/adicionar/{produto}', [CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');
Route::post('/carrinho/remover/{id}', [CarrinhoController::class, 'remover'])->name('carrinho.remover');
Route::post('/carrinho/finalizar', [CarrinhoController::class, 'finalizar'])->name('carrinho.finalizar');


Route::get('/calculadora', [CalculadoraController::class, 'index'])->name('calculadora.index');
Route::post('/calculadora/calcular', [CalculadoraController::class, 'calcular'])->name('calculadora.calcular');
Route::get('/tutoriais', function () {
    return view('tutoriais.index');
})->name('tutoriais.index');


require __DIR__.'/auth.php';
