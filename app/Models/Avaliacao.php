<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;
    protected $table = 'avaliacao';

    protected $fillable = ['ava_diagn_clinico', 'ava_queixa_principal', 'ava_hda', 'ava_hpp', 'ava_ex_complementar', 'ava_inspecao', 'ava_palpacao', 'ava_teste_articular', 'ava_teste_muscular', 'ava_medico', 'ava_crm', 'ava_especialidade', 'ava_med_fone']; 
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
