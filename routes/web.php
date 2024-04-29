<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\AgendamentoController;
use Illuminate\Support\Facades\Route;

use App\Models\Aluno;
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

    Route::get('/aluno/edit/{id}', [AlunoController::class, 'edit']);

    Route::put('/aluno/update/{id}', [AlunoController::class, 'update']);

    Route::delete('/aluno/{id}', [AlunoController::class, 'destroy']);

    Route::post('/', [AlunoController::class, 'store'])->name('salvarAluno');

    Route::get('/', function () {
        $horarios = range(7, 18);
        $alunos = Aluno::pluck('alu_nome');
        return view('welcome', ['horarios' => $horarios, 'alunos' => $alunos]);
    });


});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/avaliacao/{id}', [AvaliacaoController::class, 'exibirAluno']);

     Route::post('/', [AvaliacaoController::class, 'store'])->name('salvarAvaliacao');

     Route::get('/avaliacao/edit/{id}', [AvaliacaoController::class, 'edit']);

    Route::get('/mensalidade', function () {
        return view('mensalidade');
    })->name('Lista de mensalidade');

    Route::post('/salvar-agendamento', [AgendamentoController::class, 'salvar'])->name('salvar.agendamento');

    Route::get('/', [AgendamentoController::class, 'index'])->name('agendamentos.index');
    Route::post('/agendamentos', [AgendamentoController::class, 'store'])->name('agendamentos.store');

});