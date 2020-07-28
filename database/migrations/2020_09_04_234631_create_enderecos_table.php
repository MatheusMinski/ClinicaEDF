<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Enderecos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idAluno');
            $table->string('rua', 50);
            $table->integer('numero');
            $table->string('bairro', 50);
            $table->string('cidade', 30);
            $table->string('cep', 15);
            $table->foreign('idAluno')->references('id')->on('Alunos');

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
        Schema::dropIfExists('Enderecos');
    }
}
