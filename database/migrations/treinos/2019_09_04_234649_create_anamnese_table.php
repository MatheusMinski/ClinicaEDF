<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnamneseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Anamnese', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idTreinamento');
            $table->string('encaminhamento',15);
            $table->string('nomeDoProfissional',30);
            $table->string('especialidadeDoProfissional',25);
            $table->string('motivoEncaminhamento',300);
            $table->string('saudeGeral',300);
            $table->boolean('fumaCigarro');
            $table->integer('fumaCigarroQuantidadeDia');
            $table->boolean('jaFumou');
            $table->integer('jaFumouQuantidadeAnos');
            $table->integer('jaFumouParouAQuantoTempoAnos');
            $table->string('descricaoProblemaSaude',300);
            $table->boolean('caiu12Meses');
            $table->integer('quantasQuedas');
            $table->date('data');
            $table->string('razaoQueda',30);
            $table->string('localQueda',20);
            $table->string('hospitalizacao',20);
            $table->string('objetivosAoProcurarAClinica',300);
            $table->string('jaTentouResolverAntes',300);
            $table->integer('quantasVezes');
            $table->boolean('jaDesistiu');
            $table->string('motivoDesistencia',300);
            $table->string('dorRegiaoDoCorpo',100);
            $table->string('descricaoSintomaDor1',100);
            $table->string('ProfissionalQueTratou1',100);
            $table->string('inicioFim1',100);
            $table->integer('EVA1');
            $table->string('descricaoSintomaDor2',100);
            $table->string('ProfissionalQueTratou2',100);
            $table->string('inicioFim2',100);
            $table->integer('EVA2');
            $table->string('descricaoSintomaDor3',100);
            $table->string('ProfissionalQueTratou3',100);
            $table->string('inicioFim3',100);
            $table->integer('EVA3');
            $table->string('descricaoSintomaDor4',100);
            $table->string('ProfissionalQueTratou4',100);
            $table->string('inicioFim4',100);
            $table->integer('EVA4');
            $table->integer('esforcosTarefaCasa');
            $table->integer('esforcoAndarForaDeCasa');
            $table->integer('esforcoLazer');
            $table->integer('esforcoTrabalho');
            $table->string('exercicioFisicoRegular', 10);
            $table->string('quantasVezesSemana', 10);
            $table->integer('esforcoParaEsseExercicio');
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
        Schema::dropIfExists('Anamnese');
    }
}
