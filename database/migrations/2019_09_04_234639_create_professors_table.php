<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->bigIncrements('idProfessor');
            //$table->int(); adicionar a foreignkey da tabela endereço
            $table->string('nomeProfessor', 50);
            $table->string('cpfProfessor', 15)->primary();
            $table->string('rgProfessor', 15);
            $table->string('telefone', 20);
            $table->date('dataNascimentoProf');
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
        Schema::dropIfExists('professors');
    }
}
