<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuantasConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QuantasConsultas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idTreinamento');
            $table->date('dataAproximada');
            $table->string('especialidade', 30);
            $table->string('motivo', 200);
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
        Schema::dropIfExists('QuantasConsultas');
    }
}
