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
            $table->timestamps();
            $table->foreignId('alu_id')->constrained();
            $table->text('ava_diagn_clinico');
            $table->text('ava_queixa_principal');
            $table->text('ava_HDA');
            $table->text('ava_HPP');
            $table->text('ava_ex_complementar');
            $table->text('ava_inspecao');
            $table->text('ava_palpacao');
            $table->text('ava_teste_articular');
            $table->text('ava_teste_muscular');
            $table->text('ava_medico');
            $table->text('ava_crm');
            $table->text('ava_especialidade');
            $table->text('ava_med_fone');
            $table->char('ava_ativo', 3)->default('sim');
            
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
