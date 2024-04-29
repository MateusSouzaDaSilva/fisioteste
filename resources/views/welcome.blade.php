@extends('layouts.main')
@section('title', 'Fisiolates')
@section('content')

    <div id="tb-agenda">


    @foreach($agendamentos as $agendamento)
    <p>{{ $agendamento->aluno->nome }} - {{ $agendamento->horario }}</p>
@endforeach

<form method="post" action="{{ route('agendamentos.store') }}">
    @csrf
    <select name="id_aluno">
        @foreach($alunos as $aluno)
            <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
        @endforeach
    </select>
    <input type="text" name="horario">
    <button type="submit">Agendar</button>
</form>

      

    </div>
@endsection