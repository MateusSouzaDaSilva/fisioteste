@extends('layouts.main')
@section('title', 'Fisiolates')
@section('content')

<div class="d-flex justify-content-center">
    <h1>Lista de alunos</h1>
</div>
<a href="/lista-alunos/cadastrar" class="btn btn-primary">Cadastrar</a>
<div class="lista-alunos d-flex justify-content-center">
    
    
    <div class="container">
        <div class="aluno mb-4">
            <div class="card-aluno row">
                <div class="left col">
                    <div class="nome-aluno">Nome: Everton</div>
                    <div class="info row">
                        <div class="idade-aluno col-6">Idade: 30</div>
                        <div class="sexo-aluno col-6">Sexo: Masculino</div>
                    </div>
                    <div class="fone-aluno">Fone: 12 99999 9999</div>
                </div>
                <div class="right col-6">
                    <div class="dtvencimento">Vencimento da mensalidade: 12/11/2023</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="aluno mb-4">
            <div class="card-aluno row">
                <div class="left col">
                    <div class="nome-aluno">Nome: Everton</div>
                    <div class="info row">
                        <div class="idade-aluno col-6">Idade: 30</div>
                        <div class="sexo-aluno col-6">Sexo: Masculino</div>
                    </div>
                    <div class="fone-aluno">Fone: 12 99999 9999</div>
                </div>
                <div class="right col-6">
                    <div class="dtvencimento">Vencimento da mensalidade: 12/11/2023</div>
                </div>
            </div>
        </div>
    </div>
    
    


</div>






@endsection