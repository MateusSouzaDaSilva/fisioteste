@extends('layouts.main')
@section('title', 'Exibindo: ' . $aluno->alu_nome . ' ' . $aluno->alu_sobrenome)
@section('content')

<div id="aluno-register-container" class="col-md-8 offset-md-2 dados">
    <h1>Ficha de avaliação: {{ $aluno->alu_nome }} {{ $aluno->alu_sobrenome }}</h1>

    <!-- Abas de navegação -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        @foreach($avaliacoes as $avaliacao)
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $avaliacao->id == $avaliacaoId ? 'active' : '' }}" id="tab-{{ $avaliacao->id }}" href="{{ route('avaliacao.edit', ['alunoId' => $aluno->id, 'avaliacaoId' => $avaliacao->id]) }}" role="tab" aria-controls="avaliacao-{{ $avaliacao->id }}" aria-selected="{{ $avaliacao->id == $avaliacaoId ? 'true' : 'false' }}">
                    {{ $avaliacao->created_at->format('d/m/Y') }}
                </a>
            </li>
        @endforeach
    </ul>

    <div class="tab-content" id="myTabContent">
        @foreach($avaliacoes as $avaliacao)
            <div class="tab-pane fade {{ $avaliacao->id == $avaliacaoId ? 'show active' : '' }}" id="avaliacao-{{ $avaliacao->id }}" role="tabpanel" aria-labelledby="tab-{{ $avaliacao->id }}">
                <form action="{{ route('avaliacao.update', ['avaliacaoId' => $avaliacao->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="alu_id" value="{{ $aluno->id }}">
                    <input type="hidden" name="ava_id" value="{{ $avaliacao->id }}">

                    <div class="form-group">
                        <label for="ava_diagn_clinico">Diagnóstico clinico:</label>
                        <textarea class="form-control @error('diagnostico') is-invalid @enderror" id="ava_diagn_clinico" name="ava_diagn_clinico">{{ $avaliacao->ava_diagn_clinico }}</textarea>
                        @error('diagnostico')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title" id="form-label">Queixa principal: </label>
                        <textarea type="text" class="form-control @error('queixa') is-invalid @enderror" id="ava_queixa_principal" name="ava_queixa_principal">{{ $avaliacao->ava_queixa_principal }}</textarea>
                        @error('queixa')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title" id="form-label">Histórico de doença atual: </label>
                        <textarea type="text" class="form-control @error('hda') is-invalid @enderror" id="ava_hda" name="ava_hda">{{ $avaliacao->ava_hda }}</textarea>
                        @error('hda')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title" id="form-label">Histórico patológico pregresso: </label>
                        <textarea type="text" class="form-control @error('hpp') is-invalid @enderror" id="ava_hpp" name="ava_hpp">{{ $avaliacao->ava_hpp }}</textarea>
                        @error('hpp')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title" id="form-label">Exame complementar:</label>
                        <textarea type="text" class="form-control @error('complementar') is-invalid @enderror" id="ava_ex_complementar" name="ava_ex_complementar">{{ $avaliacao->ava_ex_complementar }}</textarea>
                        @error('complementar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title" id="form-label">Inspeção:</label>
                        <textarea type="text" class="form-control @error('inspecao') is-invalid @enderror" id="ava_inspecao" name="ava_inspecao">{{ $avaliacao->ava_inspecao }}</textarea>
                        @error('inspecao')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title" id="form-label">Palpação:</label>
                        <textarea type="text" class="form-control @error('palpacao') is-invalid @enderror" id="ava_palpacao" name="ava_palpacao">{{ $avaliacao->ava_palpacao }}</textarea>
                        @error('palpacao')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title" id="form-label">Teste articular:</label>
                        <textarea type="text" class="form-control @error('articular') is-invalid @enderror" id="ava_teste_articular" name="ava_teste_articular">{{ $avaliacao->ava_teste_articular }}</textarea>
                        @error('articular')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title" id="form-label">Teste muscular:</label>
                        <textarea type="text" class="form-control @error('muscular') is-invalid @enderror" id="ava_teste_muscular" name="ava_teste_muscular">{{ $avaliacao->ava_teste_muscular }}</textarea>
                        @error('muscular')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title" id="form-label">Nome do médico:</label>
                        <input type="text" class="form-control @error('medico') is-invalid @enderror" id="ava_medico" name="ava_medico" value="{{ $avaliacao->ava_medico }}">
                        @error('medico')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title" id="form-label">CRM:</label>
                        <input type="text" class="form-control @error('crm') is-invalid @enderror" id="ava_crm" name="ava_crm" value="{{ $avaliacao->ava_crm }}">
                        @error('crm')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title" id="form-label">Especialidade:</label>
                        <input type="text" class="form-control @error('especialidade') is-invalid @enderror" id="ava_especialidadev" name="ava_especialidade" value="{{ $avaliacao->ava_especialidade }}">
                        @error('especialidade')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                <label for="title" id="form-label">Telefone do médico:</label>
                <input type="text" class="form-control @error('medfone') is-invalid @enderror" id="ava_med_fone" name="ava_med_fone"
                    value="{{ $avaliacao->ava_med_fone }}">

                    @error('medfone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

               <div class="btn-list d-flex">
                <button type="submit" class="btn-fisio-save">Salvar</button>
            </form>
            <form action="/avaliacao/deletar/{{ $avaliacao->id }}" method="post" onsubmit="return confirmarExclusao()">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger ms-1" value="E"><i class="bi bi-trash3-fill"></i>Excluir</button>
               </div>
            </form>
            </div>
        @endforeach
    </div>
</div>

@endsection

<script>
    function confirmarExclusao() {
        return confirm('Tem certeza que deseja excluir esta avaliação?');
    }

    
    document.addEventListener('DOMContentLoaded', function() {
        var crmInput = document.getElementById('ava_crm');

        VMasker(crmInput).maskPattern('99.999');
    });

    document.addEventListener('DOMContentLoaded', function() {
        var celularInput = document.getElementById('ava_med_fone');

        VMasker(celularInput).maskPattern('(99) 99999-9999');
    });

</script>
