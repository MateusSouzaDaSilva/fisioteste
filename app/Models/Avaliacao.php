<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;
    protected $table = 'avaliacao';
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
