<?php

use App\Http\Controllers\AlunoController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/lista-alunos', [AlunoController::class,'exibir'])->name('exibir-alunos');
    
    Route::get('/lista-alunos/cadastrar', [AlunoController::class,'create'])->name('cadastrar-aluno');

    Route::post('/', [AlunoController::class, 'store'])->name('salvar-aluno');

    Route::get('/mensalidade', function () {
        return view('mensalidade');
    })->name('Lista de mensalidade');

});