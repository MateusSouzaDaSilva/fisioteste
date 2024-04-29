<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'agendamento';

    protected $fillable = ['age_horario', 'age_ativo', 'age_dtcad', 'age_dtalt']; // Campos preenchíveis

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'id_aluno');
    }
}
