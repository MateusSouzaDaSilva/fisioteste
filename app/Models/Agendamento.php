<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'agendamento';

    protected $fillable = ['age_horario', 'age_ativo', 'age_dtcad', 'age_dtalt', 'age_dia']; // Campos preenchíveis

    protected $casts = [
        'age_horario' => 'json'
    ];


    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'alu_id');
    }
}
