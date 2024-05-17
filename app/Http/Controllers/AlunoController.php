<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Agendamento;
use Carbon\Carbon;


use Illuminate\Http\Request;

class AlunoController extends Controller
{

    public function index() {
        $alunos = Aluno::pluck('alu_nome', 'id');
        $agendamentos = Agendamento::with('aluno')->get();
        return view('welcome', compact('agendamentos', 'alunos'));
        
    }

    public function exibir() {

        $alunos = Aluno::all();

        return view("lista-alunos", ["alunos" => $alunos]);
    }

   

    public function create() {
        return view("events.registrar-aluno");
    }

    public function store(Request $request) {

        $message = [
            'nome.required' => 'O campo Nome é obrigatório.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'endereco.required' => 'O campo Endereço é obrigatório.',
            'bairro.required' => 'O campo Bairro é obrigatório.',
            'cidade.required' => 'O campo Cidade é obrigatório.',
            'celular.required' => 'O campo Celular é obrigatório.',
            'sexo.required' => 'O campo Sexo é obrigatório.',
            'dtnasc.required' => 'O campo Data de Nascimento é obrigatório.',
            'dtnasc.date' => 'O campo Data de Nascimento deve ser uma data válida.',
        ];
    

        $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'cpf' => 'required',
            'endereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'celular' => 'required',
            'sexo' => 'required',
            'dtnasc' => 'required|date',
        ], $message);
        
        $aluno = new Aluno();

        $aluno->alu_nome = $request->nome;
        $aluno->alu_sobrenome = $request->sobrenome;
        $aluno->alu_cpf = $request->cpf;
        $aluno->alu_end = $request->endereco;
        $aluno->alu_bairro = $request->bairro;
        $aluno->alu_cidade = $request->cidade;
        $aluno->alu_fone = $request->telefone;
        $aluno->alu_celular = $request->celular;
        $aluno->alu_sexo = $request->sexo;
        $aluno->alu_dtnasc = $request->dtnasc;
        $aluno->alu_dtvencimento = $request->dtvencimento;
        
        $aluno->save();

        return redirect('/')->with('msg', 'Aluno adicionado com sucesso!');
            
    }

  

    public function edit($id) {

        $aluno = Aluno::findOrFail($id);

        return view("events.editar-aluno", ['aluno' => $aluno]);
    }

    public function update(Request $request) {

        try {
            // Encontre o aluno pelo ID
            $aluno = Aluno::findOrFail($request->id);
    
            // Atualize os campos do aluno com os dados do formulário
            $aluno->update($request->all());
    
            // Redirecione para a lista de alunos com uma mensagem de sucesso
            return redirect('lista-alunos')->with('success', 'Aluno editado com sucesso!');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Caso o aluno não seja encontrado, redirecione com uma mensagem de erro
            return redirect('lista-alunos')->with('error', 'Aluno não encontrado.');
        } catch (\Exception $e) {
            // Caso ocorra algum erro inesperado, redirecione com uma mensagem de erro
            return redirect('lista-alunos')->with('error', 'Erro ao editar aluno.');
        }
    }

    public function destroy($id) {

        Aluno::findOrFail($id)->delete();

        return redirect('lista-alunos')->with('msg', 'Evento excluído com sucesso!');
    }

    public function pagou($id) {
      // Encontre o aluno pelo ID
      $aluno = Aluno::findOrFail($id);

      // Obtenha a data de vencimento atual e adicione um mês
      $novaDataVencimento = Carbon::parse($aluno->alu_dtvencimento)->addMonth();

      // Atualize a coluna alu_dtvencimento
      $aluno->alu_dtvencimento = $novaDataVencimento;
      $aluno->save();

      // Redirecione ou retorne uma resposta apropriada
      return redirect()->back()->with('success', 'Data de vencimento atualizada para o próximo mês.');
    }
}