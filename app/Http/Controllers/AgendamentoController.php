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

    // public function show($id)
    // {
    //      // Recupera o agendamento com base no ID fornecido
    //      $agendamento = Agendamento::findOrFail($id);

    //      // Recupera os alunos associados a este agendamento
    //      $alunos = Aluno::whereHas('agendamento', function ($query) use ($agendamento) {
    //          $query->whereJsonContains('age_horario->dia', $agendamento->age_horario['dia'])
    //              ->where('age_horario->horario', $agendamento->age_horario['horario']);
    //      })->get();
 
    //      // Retorna a visão com os alunos associados ao agendamento
    //      return view('welcome', compact('agendamento', 'alunos'));
    // }

    public function update(Request $request, Agendamento $agendamento)
    {
        // Obtém os dados do formulário
        $agendamentos = $request->input('agendamento');

        // Percorre os agendamentos e os salva no banco de dados
        foreach ($agendamentos as $horaDia => $alunoId) {
            list($dia, $hora) = explode(', ', $horaDia);
            $agendamento = Agendamento::where('age_horario', $dia . ', ' . $hora . ':00')->first();

            if ($agendamento) {
                $agendamento->alu_id = $alunoId;
                $agendamento->save();
            } else {
                Agendamento::create([
                    'age_horario' => $dia . ', ' . $hora . ':00',
                    'alu_id' => 1,
                    'age_ativo' => true
                ]);
            }
        }

        // $dias_semana = [
        //     1 => 'Segunda-feira',
        //     2 => 'Terça-feira',
        //     3 => 'Quarta-feira',
        //     4 => 'Quinta-feira',
        //     5 => 'Sexta-feira'
        // ];

        // $agendamento = Agendamento::firstOrNew(['alu_id' => $request->alu_id]);
        // $agendamento->alu_id = 1;
        // $agendamento->age_ativo = true;
        // $agendamento->age_horario = 7;
        // $agendamento->age_dia = $dias_semana;
        // $agendamento->save();

        return redirect()->back()->with('success', 'Agendamento atualizado com sucesso!');
    }

    public function store(Request $request)
    {
        // Validação dos dados (opcional)
        $request->validate([
            'alu_id' => 'required|exists:alunos,id',
        ]);

        // Salvar ou atualizar o agendamento
        $agendamento = Agendamento::firstOrNew(['id_aluno' => $request->alu_id]);
        $agendamento->alu_id = $request->alu_id;
        $agendamento->age_ativo = true; // Você pode definir como necessário
        $agendamento->save();

        return response()->json(['success' => true]);
    }
}
