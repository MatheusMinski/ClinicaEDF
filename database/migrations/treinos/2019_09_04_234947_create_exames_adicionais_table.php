<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamesAdicionaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ExamesAdicionais', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('idTreinamento');
            $table->string('tipoDoExame', 30);
            $table->date('dataExame');
            $table->string('resultadosPrincipais', 50);
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
        Schema::dropIfExists('ExamesAdicionais');
    }
}
