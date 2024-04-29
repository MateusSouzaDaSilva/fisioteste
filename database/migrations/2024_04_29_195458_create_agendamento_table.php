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
        Schema::create('agendamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alu_id');
            $table->integer('age_horario'); // Campo para armazenar o horário
            $table->boolean('age_ativo')->default(true);
            $table->timestamp('age_dtcad')->useCurrent();
            $table->timestamp('age_dtalt')->nullable();

            $table->foreign('alu_id')->references('id')->on('alunos')->onDelete('cascade');
           

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamento');
    }
};
