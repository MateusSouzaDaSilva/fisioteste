@extends('layouts.main')
@section('title', 'Fisiolates')
@section('content')


    <div id="aluno-register-container" class="col-md-6 offset-md-3">
        <h1>Registre um novo aluno</h1>
        <form action="/aluno/salvar" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title" id="form-label">Nome do aluno:</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome"
                    placeholder="Nome do aluno" value="{{ old('nome') }}">

                @error('nome')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="form-group">
                <label for="title" id="form-label">Sobrenome do aluno:</label>
                <input type="text" class="form-control @error('sobrenome') is-invalid @enderror" id="sobrenome" name="sobrenome"
                    placeholder="Sobrenome do aluno" value="{{ old('sobrenome') }}">

                @error('sobrenome')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="form-group">
                <label for="title" id="form-label">CPF:</label>
                <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf" placeholder="CPF do aluno"
                    maxlength="14" value="{{ old('cpf') }}">

                    @error('cpf')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title" id="form-label">Endereço:</label>
                <input type="text" class="form-control @error('endereco') is-invalid @enderror" id="endereco" name="endereco" placeholder="Endereço do aluno"
                    value="{{ old('endereco') }}">

                    @error('endereco')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title" id="form-label">Bairro:</label>
                <input type="text" class="form-control @error('bairro') is-invalid @enderror" id="bairro" name="bairro" placeholder="Bairro do aluno"
                    value="{{ old('bairro') }}">

                    @error('bairro')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title" id="form-label">Cidade:</label>
                <input type="text" class="form-control @error('cidade') is-invalid @enderror" id="cidade" name="cidade" placeholder="Cidade do aluno"
                    value="{{ old('cidade') }}">

                    @error('cidade')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title" id="form-label">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone"
                    placeholder="Telefone residencial do aluno" maxlength="14" value="{{ old('telefone') }}">
            </div>
            <div class="form-group">
                <label for="title" id="form-label">Celular:</label>
                <input type="text" class="form-control @error('celular') is-invalid @enderror" id="celular" name="celular" placeholder="Celular"
                    maxlength="15" value="{{ old('celular') }}">

                    @error('celular')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title" id="form-label">Sexo:</label>
                <select name="sexo" id="sexo" class="form-control">
                    <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Feminino</option>
                    <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title" id="form-label">Data de nascimento:</label>
                <input type="date" class="form-control @error('dtnasc') is-invalid @enderror" id="dtnasc" name="dtnasc" placeholder="Data de nascimento"
                    value="{{ old('dtnasc') }}">

                @error('dtnasc')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title" id="form-label">Data de Vencimento:</label>
                <input type="date" class="form-control @error('dtvencimento') is-invalid @enderror" id="dtvencimento" name="dtvencimento" placeholder="Data de vencimento"
                    value="{{ old('dtvencimento') }}">

                @error('dtvencimento')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <input type="submit" value="Registrar aluno" class="btn-fisio registrar mb-5" id="send">
        </form>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var cpfInput = document.getElementById('cpf');

            VMasker(cpfInput).maskPattern('999.999.999-99');
        });

        document.addEventListener('DOMContentLoaded', function() {
            var telefoneInput = document.getElementById('telefone');

            VMasker(telefoneInput).maskPattern('(99) 9999-9999');
        });

        document.addEventListener('DOMContentLoaded', function() {
            var celularInput = document.getElementById('celular');

            VMasker(celularInput).maskPattern('(99) 99999-9999');
        });
    </script>



@endsection
