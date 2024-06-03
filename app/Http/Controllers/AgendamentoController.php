<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\Aluno;
use App\Models\Horario;
use Carbon\Carbon;

class AgendamentoController extends Controller
{

    public function index()
    {
        $agendamentos = Agendamento::with('aluno')->get();
        $alunos = Aluno::all();
        $days = ['Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira'];
        $hours = range(8, 20);
        return view('welcome', compact('agendamentos', 'alunos', 'days', 'hours'));
    }

    public function store(Request $request)
    {
        $existingScheduling = Agendamento::where('alu_id', $request->alunos)->exists();

        // Se já existir, retorne um redirecionamento com um erro
        if ($existingScheduling) {
            return redirect()->back()->with('alert', 'O aluno já está agendado em outro dia e/ou horário.');
        }

        // Verifica se já existem 7 eventos nesta célula de tempo
        $existingSchedulingInCell = Agendamento::where('age_day', $request->age_day)->where('age_time', $request->age_time)->count();

        // Se já houver 7 eventos, retorne um redirecionamento com um erro
        if ($existingSchedulingInCell >= 7) {
            return redirect()->back()->with('alert', 'Não é permitido mais de 7 alunos por célula.');
        }

        // Salvar o agendamento
        $agendamento = new Agendamento;
        $agendamento->alu_id = $request->alu_id;
        $agendamento->age_day = $request->age_day;
        $agendamento->age_time = $request->age_time;
        $agendamento->save();

        return redirect()->back()->with('success', 'Evento adicionado com sucesso!');
    }

    public function update(Request $request, $id)
    {
        // Obtém os dados do formulário
        $agendamento = Agendamento::find($id);
        if (!$agendamento) {
            return redirect()->back()->with('alert', 'Evento não encontrado!');
        }

        $agendamento->age_day = $request->input('age_day');
        $agendamento->age_time = $request->input('age_time');
        $agendamento->save();


        return redirect()->back()->with('success', 'Agendamento atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Agendamento::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Agendamento excluído!');
    }
}
