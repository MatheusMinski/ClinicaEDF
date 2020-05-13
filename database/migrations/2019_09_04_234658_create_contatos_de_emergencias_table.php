<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatosDeEmergenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ContatosDeEmergencias', function (Blueprint $table) {
            $table->integer('id');
            $table->string('nome', 50);
            $table->string('parentesco', 20);
            $table->string('telefone', 20);
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
        Schema::dropIfExists('ContatosDeEmergencias');
    }
}
