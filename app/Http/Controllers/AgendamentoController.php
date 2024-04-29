<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\Aluno;

class AgendamentoController extends Controller
{

    public function index()
    {
        $agendamentos = Agendamento::with('aluno')->get();
        $alunos = Aluno::all();
        return view('welcome', compact('agendamentos', 'alunos'));
    }

    public function update(Request $request, Agendamento $agendamento)
    {
        // Lógica para atualizar um agendamento existente
    }

    public function store(Request $request)
    {
        // Validação dos dados (opcional)
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
        ]);

        // Salvar ou atualizar o agendamento
        $agendamento = Agendamento::firstOrNew(['id_aluno' => $request->aluno_id]);
        $agendamento->id_aluno = $request->aluno_id;
        $agendamento->age_ativo = true; // Você pode definir como necessário
        $agendamento->save();

        return response()->json(['success' => true]);
    }
}
