<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Aluno;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    public function store(Request $request) {

        Avaliacao::create([
            "ava_diagn_clinico"=> $request->ava_diagn_clinico,
            "ava_queixa_principal"=> $request->ava_queixa_principal,
            "ava_hda"=> $request->ava_hda,
            "ava_hpp"=> $request->ava_hpp,
            "ava_ex_complementar"=> $request->ava_ex_complementar,
            "ava_inspecao"=> $request->ava_inspecao,
            "ava_palpacao"=> $request->ava_palpacao,
            "ava_teste_articular"=> $request->ava_teste_articular,
            "ava_teste_muscular"=> $request->ava_teste_muscular,
            "ava_medico"=> $request->ava_medico,
            "ava_crm"=> $request->ava_crm,
            "ava_especialidade"=> $request->ava_especialidade,
            "ava_med_fone"=> $request->ava_med_fone,
        ]);

        // $avaliacao = new Avaliacao();

        // $avaliacao->alu_id = $id_aluno;

        // $avaliacao->ava_diagn_clinico = $request->diagnostico;
        // $avaliacao->ava_queixa_principal = $request->queixa;
        // $avaliacao->ava_hda = $request->hda;
        // $avaliacao->ava_hpp = $request->hpp;
        // $avaliacao->ava_ex_complementar = $request->complementar;
        // $avaliacao->ava_inspecao = $request->inspecao;
        // $avaliacao->ava_palpacao = $request->palpacao;
        // $avaliacao->ava_teste_articular = $request->articular;
        // $avaliacao->ava_teste_muscular = $request->muscular;
        // $avaliacao->ava_medico = $request->medico;
        // $avaliacao->ava_crm = $request->crm;
        // $avaliacao->ava_especialidade = $request->especialidade;
        // $avaliacao->ava_med_fone = $request->medfone;

        // $avaliacao->save();

        return redirect('/');
        
    }

    public function exibirAluno($id) {
        $aluno = Aluno::findOrFail($id);

        return view("avaliacao", ["aluno" => $aluno]);
    }


}
