<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilBioquimicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PerfilBioquimico', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idTreinamento')->unique();
            $table->date('glicemiaDataUm')->nullable();
            $table->string('glicemiaValorUm', 10)->nullable();
            $table->date('glicemiaDataDois')->nullable();
            $table->string('glicemiaValorDois', 10)->nullable();
            $table->date('insulinaDataUm')->nullable();
            $table->string('insulinaValorUm', 10)->nullable();
            $table->date('insulinaDataDois')->nullable();
            $table->string('insulinaValorDois', 10)->nullable();
            $table->date('creatinaDataUm')->nullable();
            $table->string('creatinaValorUm', 10)->nullable();
            $table->date('creatinaDataDois')->nullable();
            $table->string('creatinaValorDois', 10)->nullable();
            $table->date('ctDataUm')->nullable();
            $table->string('ctValorUm', 10)->nullable();
            $table->date('ctDataDois')->nullable();
            $table->string('ctValorDois', 10)->nullable();
            $table->date('hdlDataUm')->nullable();
            $table->string('hdlValorUm', 10)->nullable();
            $table->date('hdlDataDois')->nullable();
            $table->string('hdlValorDois', 10)->nullable();
            $table->date('ldlDataUm')->nullable();
            $table->string('ldlValorUm', 10)->nullable();
            $table->date('ldlDataDois')->nullable();
            $table->string('ldlValorDois', 10)->nullable();
            $table->date('tgDataUm')->nullable();
            $table->string('tgValorUm', 10)->nullable();
            $table->date('tgDataDois')->nullable();
            $table->string('tgValorDois', 10)->nullable();
            $table->foreign('idTreinamento')->references('id')->on('AlunoTreinamentos');
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
        Schema::dropIfExists('PerfilBioquimico');
    }
}
