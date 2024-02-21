<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Aluno;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    public function storeAvaliacao(Request $request, $id_aluno) {

        $avaliacao = new Avaliacao();

        $avaliacao->alu_id = $id_aluno;

        $avaliacao->ava_diagn_clinico = $request->diagnostico;
        $avaliacao->ava_queixa_principal = $request->queixa;
        $avaliacao->ava_hda = $request->hda;
        $avaliacao->ava_hpp = $request->hpp;
        $avaliacao->ava_ex_complementar = $request->complementar;
        $avaliacao->ava_inspecao = $request->inspecao;
        $avaliacao->ava_palpacao = $request->palpacao;
        $avaliacao->ava_teste_articular = $request->articular;
        $avaliacao->ava_teste_muscular = $request->muscular;
        $avaliacao->ava_medico = $request->medico;
        $avaliacao->ava_crm = $request->crm;
        $avaliacao->ava_especialidade = $request->especialidade;
        $avaliacao->ava_med_fone = $request->medfone;

        $avaliacao->save();

        return redirect('/');
        
    }

    public function exibirAluno($id) {
        $aluno = Aluno::findOrFail($id);

        return view("avaliacao", ["aluno" => $aluno]);
    }
}
