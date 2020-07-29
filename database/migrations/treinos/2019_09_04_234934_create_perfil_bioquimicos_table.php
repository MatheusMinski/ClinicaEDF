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
            $table->integer('id');
            $table->integer('idTreinamento');
            $table->date('glicemiaDataUm');
            $table->string('glicemiaValorUm', 10);
            $table->date('glicemiaDataDois');
            $table->string('glicemiaValorDois', 10);
            $table->date('insulinaDataUm');
            $table->string('insulinaValorUm', 10);
            $table->date('insulinaDataDois');
            $table->string('insulinaValorDois', 10);
            $table->date('creatinaDataUm');
            $table->string('creatinaValorUm', 10);
            $table->date('creatinaDataDois');
            $table->string('creatinaValorDois', 10);
            $table->date('ctDataUm');
            $table->string('ctValorUm', 10);
            $table->date('ctDataDois');
            $table->string('ctValorDois', 10);
            $table->date('hdlDataUm');
            $table->string('hdlValorUm', 10);
            $table->date('hdlDataDois');
            $table->string('hdlValorDois', 10);
            $table->date('ldlDataUm');
            $table->string('ldlValorUm', 10);
            $table->date('ldlDataDois');
            $table->string('ldlValorDois', 10);
            $table->date('tgDataUm');
            $table->string('tgValorUm', 10);
            $table->date('tgDataDois');
            $table->string('tgValorDois', 10);
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
