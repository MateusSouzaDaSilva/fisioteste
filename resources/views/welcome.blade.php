@extends('layouts.main')
@section('title', 'Fisiolates')
@section('content')

<div id="tb-agenda">
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
        @for ($hora = 7; $hora <= 20; $hora++)
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


</div>




@endsection