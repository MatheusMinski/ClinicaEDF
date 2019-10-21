<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoaEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoaEmprestimo', function (Blueprint $table) {
            $table->bigIncrements('idEmprestimo');
            $table->integer('idProfessor');
            $table->string('nomePessoaEmprestimo', 50);
            $table->string('cpfPessoaEmprestimo', 15);
            $table->foreign('idProfessor')->references('idPessoa')->on('professors');
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