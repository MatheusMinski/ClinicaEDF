<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacaoFuncionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AvaliacaoFuncional', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idTreinamento');
            $table->integer('pressaoArterialPAS');
            $table->integer('pressaoArterialPAD');
            $table->decimal('freqCardiacaMedia',3,1);
            $table->string('saturacaoO2', 15);
            $table->integer('capacidadeVital1');
            $table->integer('capacidadeVital2');
            $table->integer('capacidadeVital3');
            $table->decimal('massaCorporal',3,1);
            $table->integer('estaturaCm');
            $table->integer('circunferenciaCintura');
            $table->decimal('circunferenciaPescoco',3,1);
            $table->decimal('massaMagra',3,1);
            $table->decimal('gordura',3,1);
            $table->decimal('h2o',3,1);
            $table->integer('tmb');
            $table->integer('sentarEAlcancarMaior');
            $table->integer('ombroDireito');
            $table->integer('ombroEsquerdo');
            $table->integer('apoioUnipodalDireita');
            $table->integer('apoioUnipodalEsquerda');
            $table->decimal('alcanceFuncional',3,1);
            $table->decimal('pressaoManualDireita',3,1);
            $table->decimal('pressaoManualEsquerda',3,1);
            $table->integer('sentarLevantarCadeiraRep');
            $table->integer('sentarLevantarCadeiraFCMax');
            $table->integer('pedometroTeste6Min');
            $table->decimal('fcTeste6Min1',4,2);
            $table->decimal('fcTeste6Min2',4,2);
            $table->decimal('fcTeste6Min3',4,2);
            $table->decimal('fcTeste6Min4',4,2);
            $table->decimal('fcTeste6Min5',4,2);
            $table->decimal('fcTeste6Min6',4,2);
            $table->integer('fcRecuperacaoUmMin');
            $table->integer('fcRecuperacaoTresMin');
            $table->integer('fcRecuperacaoCincoMin');
            $table->integer('pasTesteUmMin');
            $table->integer('pasTesteCincoMin');
            $table->integer('pasTesteDezMin');
            $table->integer('padTesteUmMin');
            $table->integer('padTesteCincoMin');
            $table->integer('padTesteDezMin');
            $table->string('testeExtra1', 30);
            $table->string('respostaTesteExtraUm', 10);
            $table->string('testeExtra2', 30);
            $table->string('respostaTesteExtraDois', 10);
            $table->string('testeExtra3', 30);
            $table->string('respostaTesteExtraTres', 10);
            $table->string('testeExtra4', 30);
            $table->string('respostaTesteExtraQuatro', 10);
            $table->foreign('idTreinamento')->references('id')->on('AlunoTreinamentos');
            $table->timestamps();
        });
    }

    /**


     */
    public function down()
    {
        Schema::dropIfExists('AvaliacaoFuncional');
    }
}