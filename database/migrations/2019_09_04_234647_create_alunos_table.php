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
        Schema::create('Alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idProfessor');
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
            $table->foreign('idProfessor')->references('idProfessor')->on('Users');
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
        Schema::dropIfExists('Alunos');
    }
}
