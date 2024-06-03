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
        Schema::create('avaliacao', function (Blueprint $table) {
            $table->id();
            $table->string('ava_diagn_clinico');
            $table->string('ava_queixa_principal');
            $table->string('ava_hda');
            $table->string('ava_hpp');
            $table->string('ava_ex_complementar');
            $table->string('ava_inspecao');
            $table->string('ava_palpacao');
            $table->string('ava_teste_articular');
            $table->string('ava_teste_muscular');
            $table->string('ava_medico');
            $table->integer('ava_crm');
            $table->string('ava_especialidade');
            $table->string('ava_med_fone');
            $table->unsignedBigInteger('alu_id');
            $table->timestamps();

            $table->foreign('alu_id')->references('id')->on('alunos')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacao');
    }
};
