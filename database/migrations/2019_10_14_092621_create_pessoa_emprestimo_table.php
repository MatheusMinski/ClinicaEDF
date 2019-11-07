<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoaEmprestimoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoaEmprestimo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idProfessor');
            $table->string('nomeProfessorEmprestimo', 50);
            $table->string('nomePessoaEmprestimo', 50);
            $table->string('cpfPessoaEmprestimo', 15);
            $table->string('nomeEquipamentoEmprestimo', 30);
            $table->date('dataDevolucao');
            $table->foreign('idProfessor')->references('idProfessor')->on('users');
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
        Schema::dropIfExists('pessoaEmprestimo');
    }
}
