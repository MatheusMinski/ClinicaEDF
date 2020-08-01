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

    //comando para rodar só ela na migrate:
    //php artisan migrate:refresh --path=/database/migrations/2019_09_04_234647_create_alunos_table.php
    public function up()
    {
        Schema::create('Alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idProfessor');
            $table->string('nome', 50);
            $table->date('dataNasc');
            $table->integer('idade');
            $table->char('sexo');
            $table->string('telefone',30);
            $table->string('email',30)->nullable();
            $table->string('profissao',20);
            $table->string('aposentado', 10);
            $table->string('estadoCivil',15);
            $table->string('escolaridade',30);
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
