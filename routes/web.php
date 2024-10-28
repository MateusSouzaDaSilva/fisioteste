<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\AgendamentoController;
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

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/lista-alunos', [AlunoController::class, 'exibir'])->name('exibir-alunos');

    Route::get('/lista-alunos/create', [AlunoController::class, 'create'])->name('cadastrar-aluno');
    
    Route::get('/aluno/edit/{id}', [AlunoController::class, 'edit']);
    
    Route::put('/aluno/update/{id}', [AlunoController::class, 'update']);
    
    Route::delete('/aluno/{id}', [AlunoController::class, 'destroy']);
    
    Route::post('/aluno/save', [AlunoController::class, 'store'])->name('salvarAluno');
    
    Route::post('/aluno/{id}/pagou', [AlunoController::class, 'pagou'])->name('aluno.pagou');
});




Route::middleware([
'auth',
'verified',
])->group(function () {

Route::get('/avaliacao/{id}', [AvaliacaoController::class, 'exibirAluno']);

Route::post('/avaliacao/salvar', [AvaliacaoController::class, 'store'])->name('salvarAvaliacao');

Route::get('/avaliacao/edit/{alunoId}/{avaliacaoId}', [AvaliacaoController::class, 'edit'])->name('avaliacao.edit');

Route::delete('/avaliacao/deletar/{avaliacaoId}', [AvaliacaoController::class, 'destroy']);

Route::put('/avaliacao/update/{avaliacaoId}', [AvaliacaoController::class, 'update'])->name('avaliacao.update');
});


Route::middleware([
    'auth',
    'verified',
])->group(function () {

    Route::get('/', [AgendamentoController::class, 'index']);

    Route::post('/agendamento/save', [AgendamentoController::class, 'store']);

    Route::delete('/agendamento/delete/{id}', [AgendamentoController::class, 'destroy']);

    Route::put('/agendamento/update/{id}', [AgendamentoController::class, 'update']);

    Route::resource('agendamento', AgendamentoController::class);
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
