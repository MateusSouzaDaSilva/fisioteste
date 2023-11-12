@extends('layouts.main')
@section('title', 'Fisiolates')
@section('content')

<div class="d-flex justify-content-center">
    <h1>Lista de alunos</h1>
</div>
<a href="/lista-alunos/cadastrar" class="btn btn-primary">Cadastrar</a>
<div class="lista-alunos d-flex justify-content-center align-items-center" style="flex-direction: column;">
    
    
    @foreach ($alunos as $aluno)
    <div class="aluno mb-4">
        <div class="card-aluno row">
            <div class="left col">
                <div class="nome-aluno">Nome: {{ $aluno->alu_nome }}</div>
                <div class="info row">
                    <div class="idade-aluno col-6">Idade: {{ \Carbon\Carbon::parse($aluno->alu_dtnasc)->age }}</div>
                    <div class="sexo-aluno col-6">
                        Sexo: 
                        @if ($aluno->alu_sexo === 'M')
                            Masculino
                        @elseif ($aluno->alu_sexo === 'F')
                            Feminino
                        @endif
                    </div>
                </div>
                <div class="fone-aluno">Fone: {{ $aluno->alu_celular }}</div>
            </div>
            <div class="right col-6">
                <div class="dtvencimento">Vencimento: 12/11/2023</div>
            </div>
        </div>
    </div>
    @endforeach
       

    


</div>






@endsection