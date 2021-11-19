<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\EstanteController;
use App\Http\Controllers\PrateleiraController;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\TipoDocController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\LegislacaoController;
use App\Http\Controllers\PermissaoController;

Auth::routes(['register' => false]);

Route::get('/', function () {
    return redirect('/dashboard');
});

// ROTAS DASHBOARD - HOME

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// ROTAS DASHBOARD - USUARIOS

Route::get('/dashboard/users', [UserController::class, 'userList']);

Route::get('/dashboard/users/add', [UserController::class, 'addUserPage']);

Route::post('/dashboard/users/add/do', [UserController::class, 'addUser']); 

// ROTAS DASHBOARD - SETORES

Route::get('/dashboard/setores', [SetorController::class, 'setorPage']);

Route::get('/dashboard/setores/add', [SetorController::class, 'addSetorPage']);

Route::post('/dashboard/setor/add/do', [SetorController::class, 'addSetor']);

// ROTAS DASHBOARD - ESTANTE

Route::get('/dashboard/estantes', [EstanteController::class, 'estantePage']);

Route::get('/dashboard/estantes/add', [EstanteController::class, 'addEstantePage']);

Route::post('/dashboard/estantes/add/do', [EstanteController::class, 'addEstante']);

// ROTAS DASHBOARD - PRATELEIRAS

Route::get('/dashboard/prateleiras', [PrateleiraController::class, 'prateleiraPage']);

Route::get('/dashboard/prateleiras/add', [PrateleiraController::class, 'addPrateleiraPage']);

Route::post('/dashboard/prateleiras/add/do', [PrateleiraController::class, 'addPrateleira']);

// ROTAS DASHBOARD - CAIXAS

Route::get('/dashboard/caixas', [CaixaController::class, 'caixaPage']);

Route::get('/dashboard/caixas/add', [CaixaController::class, 'addCaixaPage']);

Route::post('/dashboard/caixas/add/do', [CaixaController::class, 'addCaixa']);

// ROTAS DASHBOARD - TIPOS DE DOCUMENTOS

Route::get('/dashboard/tiposdoc', [TipoDocController::class, 'tipodocPage']);

Route::get('/dashboard/tiposdoc/add', [TipoDocController::class, 'addTipodocPage']);

Route::post('/dashboard/tiposdoc/add/do', [TipoDocController::class, 'addTipodoc']);

// ROTAS DASHBOARD - DOCUMENTOS

Route::get('/dashboard/documentos', [DocumentoController::class, 'documentoPage']);

Route::get('/dashboard/documentos/add', [DocumentoController::class, 'addDocumentoPage']);

Route::post('/dashboard/documentos/add/do', [DocumentoController::class, 'addDocumento']);

// ROTAS DASHBOARD - LEGISLAÇÔES

Route::get('/dashboard/legislacoes', [LegislacaoController::class, 'legislacaoPage']);

Route::get('/dashboard/legislacoes/add', [LegislacaoController::class, 'addLegislacaoPage']);

Route::post('/dashboard/legislacoes/add/do', [LegislacaoController::class, 'addLegislacao']);

// ROTAS DASHBOARD - PERMISSOES

Route::get('/dashboard/permissoes', [PermissaoController::class, 'permissaoPage']);

// ROTAS SOLICITAÇÕES USUARIOS 

Route::get('/permissoes/solicitar', [PermissaoController::class, 'selecionarPermissaoPage']);

Route::get('/permissoes/pendentes', [PermissaoController::class, 'pendentesPermissaoPage']);

Route::get('/permissoes/solicitar/{id}', [PermissaoController::class, 'solicitarPermissaoPage']);

Route::get('/permissoes/pendentes/{id}', [PermissaoController::class, 'decidirPermissaoPage']);

Route::post('/permissoes/add/do', [PermissaoController::class, 'addPermissao']);

Route::put('/permissoes/update/{id}', [PermissaoController::class, 'updatePermissao']);

