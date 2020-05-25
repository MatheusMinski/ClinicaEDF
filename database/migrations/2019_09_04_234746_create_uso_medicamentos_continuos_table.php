<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsoMedicamentosContinuosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UsoMedicamentosContinuos', function (Blueprint $table) {
            $table->integer('id');
            $table->string('nomeComercial', 20);
            $table->string('nomeCientifico', 20);
            $table->string('dosagem', 20);
            $table->string('posologia', 20);
            $table->date('inicio');
            $table->integer('idTreinamento');
            $table->foreign('idTreinamento')->references('id')->on('AlunoTreinamentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('UsoMedicamentosContinuos');
    }
}
