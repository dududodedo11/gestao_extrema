<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('nao_autenticado')->group(function() {
    Route::get('/cadastro', [App\Http\Controllers\CadastroController::class, 'index'])->name('site.cadastro');
    Route::post('/cadastrar', [App\Http\Controllers\CadastroController::class, 'cadastrar'])->name('site.cadastrar');

    Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
    Route::post('/login', [App\Http\Controllers\LoginController::class, 'logar'])->name('site.logar');
});

Route::middleware('autenticado')->group(function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('app.home');

    Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('app.logout');
});