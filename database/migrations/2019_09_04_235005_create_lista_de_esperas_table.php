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
        Schema::create('listaDeEspera', function (Blueprint $table) {
            $table->string('nomeAlunoEspera');
            $table->int('prioridade');
            $table->string('telefone', 20);
            $table->string('outroContato', 50);
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
        Schema::dropIfExists('listaDeEspera');
    }
}
