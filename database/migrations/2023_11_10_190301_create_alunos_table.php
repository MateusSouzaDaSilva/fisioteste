<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id('alu_codigo');
            $table->timestamps();
            $table->string('alu_nome');
            $table->string('alu_cpf')->unique();
            $table->string('alu_end');
            $table->string('alu_bairro');
            $table->string('alu_cidade');
            $table->string('alu_fone', 14);
            $table->string('alu_celular', 15);
            $table->char('alu_sexo', 1);
            $table->date('alu_dtnasc');
            $table->char('alu_ativo', 3)->default('sim');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
