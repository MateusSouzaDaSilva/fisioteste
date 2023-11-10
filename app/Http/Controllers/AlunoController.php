<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function create() {
        return view("events.registrar-aluno");
    }

    public function store(Request $request) {

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