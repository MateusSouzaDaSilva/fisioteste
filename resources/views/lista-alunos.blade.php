@extends('layouts.main')
@section('title', 'Fisiolates')
@section('content')

<div class="d-flex justify-content-center title-alunos">
    <h1>Lista de alunos</h1>
</div>
<div class="btn-area">
    <a href="/lista-alunos/cadastrar" class="btn-fisio btn-float"><i class="bi bi-plus-lg"></i> Aluno</a>
</div>


<div class="lista-alunos d-flex justify-content-center align-items-center" style="flex-direction: column;">

@if ($expiredAlunos->isNotEmpty())
<div class="grid-lay">
    <!-- Seção de Alunos com Vencimento Expirado -->
    <h2 class="table-title">Alunos com Vencimento Expirado</h2>
    <span><strong>Nome</strong></span>
    <span><strong>Idade</strong></span>
    <span><strong>Sexo</strong></span>
    <span><strong>Vencimento</strong></span>
    <span><strong>Confirmar Pagamento</strong></span>
    <span><strong>Editar/Apagar</strong></span>

    @foreach ($expiredAlunos as $aluno)
    <span>{{ $aluno->alu_nome }} {{ $aluno->alu_sobrenome }}</span>
    <span>{{ \Carbon\Carbon::parse($aluno->alu_dtnasc)->age }}</span>
    <span>
        @if ($aluno->alu_sexo === 'M')
        Masculino
        @elseif ($aluno->alu_sexo === 'F')
        Feminino
        @endif
    </span>
    <span id="aluDtvencimento" class="{{ \Carbon\Carbon::parse($aluno->alu_dtvencimento)->isPast() ? 'text-danger' : '' }}">{{ \Carbon\Carbon::parse($aluno->alu_dtvencimento)->format('d-m-Y') }}</span>
    <span>
        <form action="{{ route('aluno.pagou', ['id' => $aluno->id]) }}" method="POST" onsubmit="return confirmarPagamento()">
            @csrf
            <button type="submit" class="btn btn-success">Confirmar</button>
        </form>
    </span>
    <span>
        <div class="editar">
            <a href="/aluno/edit/{{ $aluno->id }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
            <form action="/aluno/{{ $aluno->id }}" method="post" onsubmit="return confirmarExclusao()">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" value="E"><i class="bi bi-trash3-fill"></i></button>
            </form>
        </div>
    </span>
    @endforeach
</div>
@endif

<div class="grid-lay">
    <!-- Seção de Alunos com Vencimento Válido -->
    <h2 class="table-title">Alunos</h2>
    <span><strong>Nome</strong></span>
    <span><strong>Idade</strong></span>
    <span><strong>Sexo</strong></span>
    <span><strong>Vencimento</strong></span>
    <span><strong>Confirmar Pagamento</strong></span>
    <span><strong>Editar/Apagar</strong></span>

    @foreach ($validAlunos as $aluno)
    <span>{{ $aluno->alu_nome }} {{ $aluno->alu_sobrenome }}</span>
    <span>{{ \Carbon\Carbon::parse($aluno->alu_dtnasc)->age }}</span>
    <span>
        @if ($aluno->alu_sexo === 'M')
        Masculino
        @elseif ($aluno->alu_sexo === 'F')
        Feminino
        @endif
    </span>
    <span id="aluDtvencimento" class="{{ \Carbon\Carbon::parse($aluno->alu_dtvencimento)->isPast() ? 'text-danger' : '' }}">{{ \Carbon\Carbon::parse($aluno->alu_dtvencimento)->format('d-m-Y') }}</span>
    <span>
        <form action="{{ route('aluno.pagou', ['id' => $aluno->id]) }}" method="POST" onsubmit="return confirmarPagamento()">
            @csrf
            <button type="submit" class="btn btn-success">Confirmar</button>
        </form>
    </span>
    <span>
        <div class="editar">
            <a href="/aluno/edit/{{ $aluno->id }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
            <form action="/aluno/{{ $aluno->id }}" method="post" onsubmit="return confirmarExclusao()">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" value="E"><i class="bi bi-trash3-fill"></i></button>
            </form>
        </div>
    </span>
    @endforeach
</div>

</div>

<script>

    function confirmarPagamento() {
        return confirm('Tem certeza que deseja alterar a data de pagamento deste aluno?');
    }

    function confirmarExclusao() {
        return confirm('Tem certeza que deseja excluir este aluno?');
    }

    $(document).ready(function() {
        $('#pagamentoButton').click(function() {
            const alunoId = $(this).data('id');
            $.ajax({
                url: '/aluno/confirmarPagamento/', // Replace with your actual controller action URL
                method: 'POST',
                data: {
                    alunoId: alunoId
                },
                success: function(response) {
                    // Update UI elements to indicate successful payment
                    $('#pagamentoButton').text('Pago');
                    $('#aluDtvencimento').text(updatedDate.format('d/m/Y')); // Assuming you have an element with ID 'aluDtvencimento' to display the date
                },
                error: function(error) {
                    // Handle payment update error
                }
            });
        });
    });
</script>




@endsection