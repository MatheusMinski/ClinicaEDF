<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Equipamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomeEquipamento', 50);
            $table->string('classificacao', 50);
            $table->string('numeroPatrimonio', 20)->unique();
            $table->integer('quantidadeTotal');
            $table->integer('quantidadeDisponivel');
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
        Schema::dropIfExists('Equipamentos');
    }
}
