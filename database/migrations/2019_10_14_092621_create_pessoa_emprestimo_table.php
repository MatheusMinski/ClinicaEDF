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
        Schema::create('PessoaEmprestimo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idProfessor');
            $table->integer('idEquipamento');
            $table->string('nomeProfessorEmprestimo', 50);
            $table->string('nomePessoaEmprestimo', 50);
            $table->string('contato', 50);
            $table->string('cpfPessoaEmprestimo', 15);
            $table->string('nomeEquipamentoEmprestimo', 50);
            $table->string('numeroPatrimonio', 20);
            $table->date('dataDevolucao');
            $table->integer('quantidade');
            $table->boolean('devolvido')->default(false);
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
        Schema::dropIfExists('PessoaEmprestimo');
    }
}
