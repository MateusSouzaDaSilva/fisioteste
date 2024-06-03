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

    // Route::get('/', function () {
    //     return view('welcome');
    // })->name('welcome');

    Route::get('/lista-alunos', [AlunoController::class,'exibir'])->name('exibir-alunos');
    
    Route::get('/lista-alunos/cadastrar', [AlunoController::class,'create'])->name('cadastrar-aluno');

    Route::get('/aluno/edit/{id}', [AlunoController::class, 'edit']);

    Route::put('/aluno/update/{id}', [AlunoController::class, 'update']);

    Route::delete('/aluno/{id}', [AlunoController::class, 'destroy']);

    Route::post('/aluno/salvar', [AlunoController::class, 'store'])->name('salvarAluno');

    Route::post('/aluno/{id}/pagou', [AlunoController::class, 'pagou'])->name('aluno.pagou');

    Route::get('/', [AgendamentoController::class, 'weeklySchedule'])->name('agendamentos.weekly_schedule');
    Route::post('horarios/{horario}/allocate', [AgendamentoController::class, 'allocate'])->name('agendamentos.allocate');

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/avaliacao/{id}', [AvaliacaoController::class, 'exibirAluno']);

     Route::post('/avaliacao/salvar', [AvaliacaoController::class, 'store'])->name('salvarAvaliacao');

     Route::get('/avaliacao/edit/{alunoId}/{avaliacaoId}', [AvaliacaoController::class, 'edit'])->name('avaliacao.edit');

     Route::delete('/avaliacao/deletar/{avaliacaoId}', [AvaliacaoController::class, 'destroy']);
    
     Route::put('/avaliacao/update/{avaliacaoId}', [AvaliacaoController::class, 'update'])->name('avaliacao.update');

    Route::get('/mensalidade', function () {

        $alunos = Aluno::all(); 

        return view('mensalidade', ['alunos' => $alunos]);
    })->name('Lista de mensalidade');

    // Route::get('/', [AgendamentoController::class, 'show']);
    
    Route::put('/atualizar-agendamento', [AgendamentoController::class, 'update'])->name('agendamentos.update');

    Route::get('/agendamentos/index', [AgendamentoController::class, 'index'])->name('agendamentos.index');
    Route::post('/agendamentos', [AgendamentoController::class, 'storae'])->name('agendamentos.store');
});