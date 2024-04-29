<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'alunos';
    protected $guarded = [];
    protected $fillable = ['alu_cpf','alu_nome', 'alu_end', 'alu_bairro', 'alu_cidade', 'alu_fone', 'alu_celular', 'alu_sexo', 'alu_dtnasc', 'alu_dtvencimento']; 

    public function avaliacoes() {
        return $this->hasMany(Avaliacao::class);
    }

    public function agendamento()
    {
        return $this->hasOne(Agendamento::class);
    }
}
