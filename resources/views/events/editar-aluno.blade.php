@extends('layouts.main')
@section('title', 'Editando: ' . $aluno->alu_nome)
@section('content')


    <div id="aluno-register-container" class="col-md-6 offset-md-3">
        <h1>Edite os dados de {{ $aluno->alu_nome }}</h1>
        <form action="/aluno/update/{{ $aluno->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title" id="form-label">Nome do aluno:</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" id="alu_nome" name="alu_nome"
                    placeholder="Nome do aluno" value="{{ $aluno->alu_nome }}">

                @error('nome')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="form-group">
                <label for="title" id="form-label">CPF:</label>
                <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="alu_cpf" name="alu_cpf" placeholder="CPF do aluno"
                    maxlength="14" value="{{ $aluno->alu_cpf }}">

                    @error('cpf')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title" id="form-label">Endereço:</label>
                <input type="text" class="form-control @error('endereco') is-invalid @enderror" id="alu_end" name="alu_end" placeholder="Endereço do aluno"
                    value="{{ $aluno->alu_end }}">

                    @error('endereco')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title" id="form-label">Bairro:</label>
                <input type="text" class="form-control @error('bairro') is-invalid @enderror" id="alu_bairro" name="alu_bairro" placeholder="Bairro do aluno"
                    value="{{ $aluno->alu_bairro }}">

                    @error('bairro')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title" id="form-label">Cidade:</label>
                <input type="text" class="form-control @error('cidade') is-invalid @enderror" id="alu_cidade" name="alu_cidade" placeholder="Cidade do aluno"
                    value="{{ $aluno->alu_cidade }}">

                    @error('cidade')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title" id="form-label">Telefone:</label>
                <input type="text" class="form-control" id="alu_fone" name="alu_fone"
                    placeholder="Telefone residencial do aluno" maxlength="14" value="{{ $aluno->alu_fone }}">
            </div>
            <div class="form-group">
                <label for="title" id="form-label">Celular:</label>
                <input type="text" class="form-control @error('celular') is-invalid @enderror" id="alu_celular" name="alu_celular" placeholder="Celular"
                    maxlength="15" value="{{ $aluno->alu_celular }}">

                    @error('celular')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title" id="form-label">Sexo:</label>
                <select name="alu_sexo" id="alu_sexo" class="form-control">
                    <option value="F" {{ $aluno->alu_sexo == 'F' ? 'selected' : '' }}>Feminino</option>
                    <option value="M" {{ $aluno->alu_sexo == 'M' ? 'selected' : '' }}>Masculino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title" id="form-label">Data de nascimento:</label>
                <input type="date" class="form-control @error('dtnasc') is-invalid @enderror" id="alu_dtnasc" name="alu_dtnasc" placeholder="Data de nascimento"
                    value="{{ $aluno->alu_dtnasc }}">

                @error('dtnasc')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <input type="submit" value="Atualizar aluno" class="btn btn-primary registrar mb-5" id="send">
            <a href="/avaliacao/{{ $aluno->id }}" class="btn-fisio"> Adicionar avaliação</a>
            <a href="/avaliacao/edit/{{ $aluno->id }}" class="btn-fisio">Editar ava</a>
        </form>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var cpfInput = document.getElementById('alu_cpf');

            VMasker(cpfInput).maskPattern('999.999.999-99');
        });

        document.addEventListener('DOMContentLoaded', function() {
            var telefoneInput = document.getElementById('alu_fone');

            VMasker(telefoneInput).maskPattern('(99) 9999-9999');
        });

        document.addEventListener('DOMContentLoaded', function() {
            var celularInput = document.getElementById('alu_celular');

            VMasker(celularInput).maskPattern('(99) 99999-9999');
        });
    </script>



@endsection
