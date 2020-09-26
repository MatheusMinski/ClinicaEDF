<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaDeEsperasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ListaDeEspera', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomeAlunoEspera');
            $table->integer('prioridade');
            $table->string('telefone', 20);
            $table->string('outroContato', 50);
            $table->boolean('contatado');
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
        Schema::dropIfExists('ListaDeEspera');
    }
}
