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
            $table->integer('idTreinamento')->unique();
            $table->integer('pressaoArterialPAS')->nullable();
            $table->integer('pressaoArterialPAD')->nullable();
            $table->decimal('freqCardiacaMedia',3,1)->nullable();
            $table->string('saturacaoO2', 15)->nullable();
            $table->integer('capacidadeVital1')->nullable();
            $table->integer('capacidadeVital2')->nullable();
            $table->integer('capacidadeVital3')->nullable();
            $table->decimal('massaCorporal',3,1)->nullable();
            $table->integer('estaturaCm')->nullable();
            $table->integer('circunferenciaCintura')->nullable();
            $table->decimal('circunferenciaPescoco',3,1)->nullable();
            $table->decimal('massaMagra',3,1)->nullable();
            $table->decimal('gordura',3,1)->nullable();
            $table->decimal('h2o',3,1)->nullable();
            $table->integer('tmb')->nullable();
            $table->integer('sentarEAlcancarMaior')->nullable();
            $table->integer('ombroDireito')->nullable();
            $table->integer('ombroEsquerdo')->nullable();
            $table->integer('apoioUnipodalDireita')->nullable();
            $table->integer('apoioUnipodalEsquerda')->nullable();
            $table->decimal('alcanceFuncional',3,1)->nullable();
            $table->decimal('pressaoManualDireita',3,1)->nullable();
            $table->decimal('pressaoManualEsquerda',3,1)->nullable();
            $table->integer('sentarLevantarCadeiraRep')->nullable();
            $table->integer('sentarLevantarCadeiraFCMax')->nullable();
            $table->integer('distanciaTeste6Min')->nullable();
            $table->integer('pedometroTeste6Min')->nullable();
            $table->decimal('fcTeste6Min1',4,2)->nullable();
            $table->decimal('fcTeste6Min2',4,2)->nullable();
            $table->decimal('fcTeste6Min3',4,2)->nullable();
            $table->decimal('fcTeste6Min4',4,2)->nullable();
            $table->decimal('fcTeste6Min5',4,2)->nullable();
            $table->decimal('fcTeste6Min6',4,2)->nullable();
            $table->integer('fcRecuperacaoUmMin')->nullable();
            $table->integer('fcRecuperacaoTresMin')->nullable();
            $table->integer('fcRecuperacaoCincoMin')->nullable();
            $table->integer('pasTesteUmMin')->nullable();
            $table->integer('pasTesteCincoMin')->nullable();
            $table->integer('pasTesteDezMin')->nullable();
            $table->integer('padTesteUmMin')->nullable();
            $table->integer('padTesteCincoMin')->nullable();
            $table->integer('padTesteDezMin')->nullable();
            $table->string('testeExtra1', 30)->nullable();
            $table->string('respostaTesteExtraUm', 10)->nullable();
            $table->string('testeExtra2', 30)->nullable();
            $table->string('respostaTesteExtraDois', 10)->nullable();
            $table->string('testeExtra3', 30)->nullable();
            $table->string('respostaTesteExtraTres', 10)->nullable();
            $table->string('testeExtra4', 30)->nullable();
            $table->string('respostaTesteExtraQuatro', 10)->nullable();
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
