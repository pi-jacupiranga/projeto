<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// ROTAS LOGIN

// Route::get('login', function () {
//     return view('layouts.login.index');
// });

// Route::post('login/auth', function (Request $request) {
//     echo "veio aqui";
// });

// DESABILITA ROTAS /register /password/reset

Route::get('/register', function () {
    return redirect('/');
});

Route::get('/password/reset', function () {
    return redirect('/');
});

// ROTAS DASHBOARD

Route::get('/dashboard/users', [HomeController::class, 'userList']);

Route::get('/dashboard/users/add', [HomeController::class, 'addUserPage']);

Route::post('/dashboard/users/add/do', [HomeController::class, 'addUser']); 
