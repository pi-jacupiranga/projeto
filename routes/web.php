<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SetorController;

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

// ROTAS DASHBOARD

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('/dashboard/users', [HomeController::class, 'userList']);

Route::get('/dashboard/users/add', [HomeController::class, 'addUserPage']);

Route::post('/dashboard/users/add/do', [HomeController::class, 'addUser']); 

Route::get('/dashboard/setores', [SetorController::class, 'setorPage']);

Route::get('/dashboard/setores/add', [SetorController::class, 'addSetor']);