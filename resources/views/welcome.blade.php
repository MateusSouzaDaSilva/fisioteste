@extends('layouts.main')
@section('title', 'Fisiolates')
@section('content')

<!-- <div id="tb-agenda">
<form action="/atualizar-agendamento" method="post">
    @csrf
    @method('PUT')
    <table>
        <tr>
            <th>Horário</th>
            <th>Segunda-feira</th>
            <th>Terça-feira</th>
            <th>Quarta-feira</th>
            <th>Quinta-feira</th>
            <th>Sexta-feira</th>
        </tr>
        @for ($hora = 8; $hora <= 17; $hora++)
        <tr>
            <td>{{ str_pad($hora, 2, '0', STR_PAD_LEFT) }}:00</td>
            @for ($dia = 1; $dia <= 5; $dia++)
            <td>
                <select name="agendamento[{{ $hora }}][{{ $dia }}]">
                    <option value="" selected></option>
                    
                </select>
            </td>
            @endfor
        </tr>
        @endfor
    </table>
    <input type="submit" class="btn-fisio" value="Atualizar agendamento" id="send">
</form>


</div> -->

<div class="container mt-5">
        <h1 class="text-center">Weekly Schedule</h1>
        <div class="row">
            <div class="col-md-2"><strong>Time</strong></div>
            @php
                $weekdays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
            @endphp
            @foreach ($weekdays as $weekday)
                <div class="col-md">
                    <strong>{{ $weekday }}</strong>
                </div>
            @endforeach
        </div>
        @foreach ($horarios as $horario)
            <div class="row">
                <div class="col-md-2">
                    {{ \Carbon\Carbon::parse($horario->hora)->format('H:i') }}
                </div>
                @foreach ($weekdays as $weekday)
                    @php
                        $currentDate = now()->startOfWeek()->modify("next $weekday")->format('Y-m-d');
                        $agendamentosDia = $agendamentos[$currentDate] ?? collect();
                        $agendamento = $agendamentosDia->firstWhere('horario_id', $horario->id);
                    @endphp
                    <div class="col-md timeslot">
                        @if ($agendamento)
                            <div class="{{ $agendamentosDia->count() >= 7 ? 'full' : '' }}">
                                @foreach ($agendamentosDia as $age)
                                    @if ($age->horario_id == $horario->id)
                                        {{ $age->aluno->alu_nome }} {{ $age->aluno->alu_sobrenome }}<br>
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <form action="{{ route('agendamentos.allocate', $horario->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <select name="alu_id" class="form-control">
                                        @foreach ($alunos as $aluno)
                                            <option value="{{ $aluno->id }}">{{ $aluno->alu_nome }} {{ $aluno->alu_sobrenome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Add</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>


@endsection