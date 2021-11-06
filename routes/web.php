<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\EstanteController;
use App\Http\Controllers\PrateleiraController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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