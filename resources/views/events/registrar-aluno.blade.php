@extends('layouts.main')
@section('title', 'Fisiolates')
@section('content')

<div id="aluno-register-container" class="col-md-6 offset-md-3">
    <h1>Registre um novo aluno</h1>
    <form action="/" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title" id="form-label">Nome do aluno:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do aluno">
        </div>
        <div class="form-group">
            <label for="title" id="form-label">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF do aluno">
        </div>
        <div class="form-group">
            <label for="title" id="form-label">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço do aluno">
        </div>
        <div class="form-group">
            <label for="title" id="form-label">Bairro:</label>
            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro do aluno">
        </div>
        <div class="form-group">
            <label for="title" id="form-label">Cidade:</label>
            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade do aluno">
        </div>
        <div class="form-group">
            <label for="title" id="form-label">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone residencial do aluno">
        </div>
        <div class="form-group">
            <label for="title" id="form-label">Celular:</label>
            <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular">
        </div>
        <div class="form-group">
            <label for="title" id="form-label">Sexo:</label>
            <select name="sexo" id="sexo" class="form-control">
                <option value="F">Feminino</option>
                <option value="M">Masculino</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title" id="form-label">Data de nascimento:</label>
            <input type="date" class="form-control" id="dtnasc" name="dtnasc" placeholder="Data de nascimento">
        </div>
        <input type="submit" value="Registrar aluno" class="btn btn-primary registrar" id="send">
    </form>
</div>


<!-- Adicione este script após a inclusão dos arquivos jQuery e VanillaMasker -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Seletor do campo de entrada do CPF
        var cpfInput = document.getElementById('cpf');

        // Aplicando a máscara
        VMasker(cpfInput).maskPattern('999.999.999-99');
    });
</script>



@endsection