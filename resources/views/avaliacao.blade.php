@extends('layouts.main')
@section('title', 'Avaliação: ' . $aluno->alu_nome . ' ' . $aluno->alu_sobrenome)
@section('content')

<div id="aluno-register-container" class="col-md-6 offset-md-3 dados">
    <h1>Ficha de avaliação: {{ $aluno->alu_nome }} {{ $aluno->alu_sobrenome }} </h1>

    <form action="{{ route('salvarAvaliacao') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="alu_id" value="{{ $aluno->id }}">

        <div class="form-group">
            <label for="ava_diagn_clinico" id="form-label">Diagnóstico clínico:</label>
            <textarea class="form-control @error('ava_diagn_clinico') is-invalid @enderror" id="ava_diagn_clinico" name="ava_diagn_clinico"></textarea>
            @error('ava_diagn_clinico')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ava_queixa_principal" id="form-label">Queixa principal:</label>
            <textarea class="form-control @error('ava_queixa_principal') is-invalid @enderror" id="ava_queixa_principal" name="ava_queixa_principal"></textarea>
            @error('ava_queixa_principal')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ava_hda" id="form-label">Histórico de doença atual:</label>
            <textarea class="form-control @error('ava_hda') is-invalid @enderror" id="ava_hda" name="ava_hda"></textarea>
            @error('ava_hda')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ava_hpp" id="form-label">Histórico patológico pregresso:</label>
            <textarea class="form-control @error('ava_hpp') is-invalid @enderror" id="ava_hpp" name="ava_hpp"></textarea>
            @error('ava_hpp')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ava_ex_complementar" id="form-label">Exame complementar:</label>
            <textarea class="form-control @error('ava_ex_complementar') is-invalid @enderror" id="ava_ex_complementar" name="ava_ex_complementar"></textarea>
            @error('ava_ex_complementar')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ava_inspecao" id="form-label">Inspeção:</label>
            <textarea class="form-control @error('ava_inspecao') is-invalid @enderror" id="ava_inspecao" name="ava_inspecao"></textarea>
            @error('ava_inspecao')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ava_palpacao" id="form-label">Palpação:</label>
            <textarea class="form-control @error('ava_palpacao') is-invalid @enderror" id="ava_palpacao" name="ava_palpacao"></textarea>
            @error('ava_palpacao')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ava_teste_articular" id="form-label">Teste articular:</label>
            <textarea class="form-control @error('ava_teste_articular') is-invalid @enderror" id="ava_teste_articular" name="ava_teste_articular"></textarea>
            @error('ava_teste_articular')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ava_teste_muscular" id="form-label">Teste muscular:</label>
            <textarea class="form-control @error('ava_teste_muscular') is-invalid @enderror" id="ava_teste_muscular" name="ava_teste_muscular"></textarea>
            @error('ava_teste_muscular')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ava_medico" id="form-label">Nome do médico:</label>
            <input type="text" class="form-control @error('ava_medico') is-invalid @enderror" id="ava_medico" name="ava_medico">
            @error('ava_medico')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ava_crm" id="form-label">CRM:</label>
            <input type="text" class="form-control @error('ava_crm') is-invalid @enderror" id="ava_crm" name="ava_crm">
            @error('ava_crm')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ava_especialidade" id="form-label">Especialidade:</label>
            <input type="text" class="form-control @error('ava_especialidade') is-invalid @enderror" id="ava_especialidade" name="ava_especialidade">
            @error('ava_especialidade')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ava_med_fone" id="form-label">Telefone do médico:</label>
            <input type="text" class="form-control @error('ava_med_fone') is-invalid @enderror" id="ava_med_fone" name="ava_med_fone">
            @error('ava_med_fone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <input type="submit" value="Adicionar avaliação" class="btn-fisio registrar mb-5" id="send">
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var crmInput = document.getElementById('ava_crm');
        VMasker(crmInput).maskPattern('99.999');
    });

    document.addEventListener('DOMContentLoaded', function() {
        var celularInput = document.getElementById('ava_med_fone');
        VMasker(celularInput).maskPattern('(99) 99999-9999');
    });
</script>

@endsection
