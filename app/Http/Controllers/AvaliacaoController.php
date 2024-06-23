<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Aluno;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    public function store(Request $request) {

        $message = [
            'alu_id.required' => 'O campo ID do Aluno é obrigatório.',
            'ava_diagn_clinico.required' => 'O campo Diagnóstico Clínico é obrigatório.',
            'ava_queixa_principal.required' => 'O campo Queixa Principal é obrigatório.',
            'ava_hda.required' => 'O campo HDA é obrigatório.',
            'ava_hpp.required' => 'O campo HPP é obrigatório.',
            'ava_ex_complementar.required' => 'O campo Exame Complementar é obrigatório.',
            'ava_inspecao.required' => 'O campo Inspeção é obrigatório.',
            'ava_palpacao.required' => 'O campo Palpação é obrigatório.',
            'ava_teste_articular.required' => 'O campo Teste Articular é obrigatório.',
            'ava_teste_muscular.required' => 'O campo Teste Muscular é obrigatório.',
            'ava_medico.required' => 'O campo Médico é obrigatório.',
            'ava_crm.required' => 'O campo CRM é obrigatório.',
            'ava_especialidade.required' => 'O campo Especialidade é obrigatório.',
            'ava_med_fone.required' => 'O campo Telefone do Médico é obrigatório.',
        ];
    
        $request->validate([
            'alu_id' => 'required',
            'ava_diagn_clinico' => 'required',
            'ava_queixa_principal' => 'required',
            'ava_hda' => 'required',
            'ava_hpp' => 'required',
            'ava_ex_complementar' => 'required',
            'ava_inspecao' => 'required',
            'ava_palpacao' => 'required',
            'ava_teste_articular' => 'required',
            'ava_teste_muscular' => 'required',
            'ava_medico' => 'required',
            'ava_crm' => 'required',
            'ava_especialidade' => 'required',
            'ava_med_fone' => 'required',
        ], $message);

        $avaliacao = new Avaliacao();


        $avaliacao->alu_id = $request->alu_id;

        $avaliacao->ava_diagn_clinico = $request->ava_diagn_clinico;
        $avaliacao->ava_queixa_principal = $request->ava_queixa_principal;
        $avaliacao->ava_hda = $request->ava_hda;
        $avaliacao->ava_hpp = $request->ava_hpp;
        $avaliacao->ava_ex_complementar = $request->ava_ex_complementar;
        $avaliacao->ava_inspecao = $request->ava_inspecao;
        $avaliacao->ava_palpacao = $request->ava_palpacao;
        $avaliacao->ava_teste_articular = $request->ava_teste_articular;
        $avaliacao->ava_teste_muscular = $request->ava_teste_muscular;
        $avaliacao->ava_medico = $request->ava_medico;
        $avaliacao->ava_crm = $request->ava_crm;
        $avaliacao->ava_especialidade = $request->ava_especialidade;
        $avaliacao->ava_med_fone = $request->ava_med_fone;

        $avaliacao->save();

        return redirect('/');
        
    }

    public function exibirAluno($id) {
        $aluno = Aluno::findOrFail($id);
    

        return view("avaliacao", ["aluno" => $aluno]);
    }

    public function edit($alunoId, $avaliacaoId)
    {
        $aluno = Aluno::find($alunoId);
        $avaliacao = Avaliacao::find($avaliacaoId);
        $avaliacoes = Avaliacao::where('alu_id', $alunoId)->get();

        return view('exibir-avaliacao', compact('aluno', 'avaliacao', 'avaliacoes', 'avaliacaoId'));
    }

    public function update(Request $request, $avaliacaoId)
    {
        $avaliacao = Avaliacao::find($avaliacaoId);
        $avaliacao->update($request->all());

        return redirect()->route('avaliacao.edit', ['alunoId' => $avaliacao->alu_id, 'avaliacaoId' => $avaliacao->id])
            ->with('success', 'Avaliação atualizada com sucesso!');
    }

    public function destroy($avaliacaoId)
    {
        
        $avaliacao = Avaliacao::find($avaliacaoId);
        if ($avaliacao) {
            $alunoId = $avaliacao->alu_id;
            $avaliacao->delete();

            return redirect()->route('avaliacao.edit', ['alunoId' => $alunoId, 'avaliacaoId' => Avaliacao::where('alu_id', $alunoId)->first()->id ?? ''])
                ->with('success', 'Avaliação excluída com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Avaliação não encontrada!');
        }
    }
}
