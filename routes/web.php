<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\RequisicaoMarcaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página inicial
Route::get('/', function () {
    return view('index');
});

// Rotas protegidas por autenticação
Route::middleware('auth')->group(function () {
    
    // Rota do perfil do usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /**
     * Rotas para ADMINISTRADOR
     */
    Route::middleware('tipo:administrador')->prefix('admin')->group(function () {
        Route::get('/requisicoes', [RequisicaoMarcaController::class, 'index'])->name('admin.requisicoes.index');
        Route::post('/requisicoes/{id}/aprovar', [RequisicaoMarcaController::class, 'aprovar'])->name('admin.requisicoes.aprovar');
        Route::post('/requisicoes/{id}/rejeitar', [RequisicaoMarcaController::class, 'rejeitar'])->name('admin.requisicoes.rejeitar');
    });

    /**
     * Rotas para VENDEDOR
     */
    Route::middleware('tipo:vendedor')->prefix('vendedor')->group(function () {
        Route::resource('/produtos', ProdutoController::class);
    });

    /**
     * Rotas para COMPRADOR
     */
    Route::middleware('tipo:comprador')->prefix('comprador')->group(function () {
        Route::get('/produtos', [ProdutoController::class, 'index'])->name('comprador.produtos.index');
        Route::get('/produtos/filtro', [ProdutoController::class, 'filtro'])->name('comprador.produtos.filtro');
        Route::post('/marcas/requisitar', [RequisicaoMarcaController::class, 'store'])->name('comprador.marcas.requisitar');
    });
});

// Rotas de autenticação do Breeze
require __DIR__.'/auth.php';
