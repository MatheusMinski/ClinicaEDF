<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamesAdicionaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ExamesAdicionais', function (Blueprint $table) {
            $table->integer('idAluno');
            $table->string('tipoDoExame', 30);
            $table->date('dataExame');
            $table->string('resultadosPrincipais', 50);
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
        Schema::dropIfExists('ExamesAdicionais');
    }
}
