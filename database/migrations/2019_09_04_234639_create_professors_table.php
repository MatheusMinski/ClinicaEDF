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
            $table->bigIncrements('idPessoa');
            $table->int('idEndereco');
            $table->string('nome', 50);
            $table->string('cpf', 15)->primary();
            $table->string('rg', 15);
            $table->string('telefone', 20);
            $table->date('dataNasc');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreign('idEndereco')->references('idEndereco')->on('endereco');
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
