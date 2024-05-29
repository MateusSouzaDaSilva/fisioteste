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
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();

            // Foreign key for student (aluno) with cascade delete
            $table->unsignedBigInteger('alu_id');
            $table->foreign('alu_id')->references('id')->on('alunos')->onDelete('cascade');

            // Foreign key for time slot (horario) with cascade delete
            $table->unsignedBigInteger('horario_id');
            $table->foreign('horario_id')->references('id')->on('horarios')->onDelete('cascade');


            // Active flag (age_ativo) with default true
            $table->boolean('age_ativo')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
