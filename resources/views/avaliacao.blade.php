@extends('layouts.main')
@section('title', 'Fisiolates')
@section('content')



    <div id="aluno-register-container" class="col-md-6 offset-md-3">
        <h1>Ficha de avaliação: {{ $aluno->alu_nome }} </h1>
        <form action="{{ route('salvarAvaliacao') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="alu_id" value="{{ $aluno->id }}">
            <div class="form-group">
                <label for="title" id="form-label">Diagnóstico clinico:</label>
                <textarea type="textbox" class="form-control @error('diagnostico') is-invalid @enderror" id="ava_diagn_clinico" name="ava_diagn_clinico" placeholder="Diagnostico do aluno"
                     value="" ></textarea>

                    @error('diagnostico')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title" id="form-label">Queixa principal: </label>
                <textarea type="text" class="form-control @error('queixa') is-invalid @enderror" id="ava_queixa_principal" name="ava_queixa_principal" placeholder="Queixa principal"
                    value="" ></textarea>

                    @error('queixa')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title" id="form-label">Histórico de doença atual: </label>
                <textarea type="text" class="form-control @error('hda') is-invalid @enderror" id="ava_hda" name="ava_hda" placeholder="hda do aluno"
                    value="" > </textarea>

                    @error('hda')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title" id="form-label">Histórico patológico pregresso: </label>
                <textarea type="text" class="form-control @error('hpp') is-invalid @enderror" id="ava_hpp" name="ava_hpp" placeholder="hpp do aluno"
                    value="" > </textarea>

                    @error('hpp')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title" id="form-label">Exame complementar:</label>
                <textarea type="text" class="form-control @error('complementar') is-invalid @enderror" id="ava_ex_complementar" name="ava_ex_complementar" placeholder="complementar"
                 value=""></textarea>

                    @error('complementar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title" id="form-label">Inspeção:</label>
                <textarea type="text" class="form-control @error('inspecao') is-invalid @enderror" id="ava_inspecao" name="ava_inspecao" placeholder="inspecao"
                    value=""></textarea>

                    @error('inspecao')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title" id="form-label">Palpação:</label>
                <textarea type="text" class="form-control @error('palpacao') is-invalid @enderror" id="ava_palpacao" name="ava_palpacao" placeholder="palpacao"
                    value=""></textarea>

                    @error('palpacao')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title" id="form-label">Teste articular:</label>
                <textarea type="text" class="form-control @error('articular') is-invalid @enderror" id="ava_teste_articular" name="ava_teste_articular" placeholder="articular"
                    value=""></textarea>

                    @error('articular')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title" id="form-label">Teste muscular:</label>
                <textarea type="text" class="form-control @error('muscular') is-invalid @enderror" id="ava_teste_muscular" name="ava_teste_muscular" placeholder="muscular"
                    value=""></textarea>

                    @error('muscular')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="title" id="form-label">Nome do médico:</label>
                <input type="text" class="form-control @error('medico') is-invalid @enderror" id="ava_medico" name="ava_medico" placeholder="medico"
                    value="">

                    @error('medico')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title" id="form-label">CRM:</label>
                <input type="text" class="form-control @error('crm') is-invalid @enderror" id="ava_crm" name="ava_crm" placeholder="CRM"
                    value="">

                    @error('crm')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title" id="form-label">Especialidade:</label>
                <input type="text" class="form-control @error('especialidade') is-invalid @enderror" id="ava_especialidadev" name="ava_especialidade" placeholder="especialidade"
                    value="">

                    @error('especialidade')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title" id="form-label">Telefone do médico:</label>
                <input type="text" class="form-control @error('medfone') is-invalid @enderror" id="ava_med_fone" name="ava_med_fone" placeholder="medfone"
                    value="">

                    @error('medfone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" value="Adicionar avaliação" class="btn btn-primary registrar mb-5" id="send">
    </div>

@endsection