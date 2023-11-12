<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{

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
        $aluno->alu_cpf = $request->cpf;
        $aluno->alu_end = $request->endereco;
        $aluno->alu_bairro = $request->bairro;
        $aluno->alu_cidade = $request->cidade;
        $aluno->alu_fone = $request->telefone;
        $aluno->alu_celular = $request->celular;
        $aluno->alu_sexo = $request->sexo;
        $aluno->alu_dtnasc = $request->dtnasc;
        
        $aluno->save();

        return redirect('/')->with('msg', 'Aluno adicionado com sucesso!');
            
    }

}