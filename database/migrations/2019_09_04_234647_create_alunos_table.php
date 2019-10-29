<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('idAluno');
            $table->integer('idEndereco');
            $table->string('nome', 50);
            $table->date('dataNasc');
            $table->integer('idade');
            $table->char('sexo');
            $table->string('email',30);
            $table->string('profissao',20);
            $table->boolean('aposentado');
            $table->string('estadoCivil',15);
            $table->string('escolaridade',20);
            $table->string('classeSocialFamilia',30);
            $table->foreign('idEndereco')->references('idEndereco')->on('enderecos');
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
        Schema::dropIfExists('alunos');
    }
}
