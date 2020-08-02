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
            $table->integer('idTreinamento')->unique();
            $table->string('encaminhamento',15);
            $table->string('nomeDoProfissional',30);
            $table->string('especialidadeDoProfissional',25);
            $table->string('motivoEncaminhamento',300);
            $table->string('saudeGeral',300);
            $table->boolean('fumaCigarro')->nullable();
            $table->integer('fumaCigarroQuantidadeDia')->nullable();
            $table->boolean('jaFumou')->nullable();
            $table->integer('jaFumouQuantidadeAnos')->nullable();
            $table->integer('jaFumouParouAQuantoTempoAnos')->nullable();
            $table->string('descricaoProblemaSaude',300);
            $table->boolean('caiu12Meses')->nullable();
            $table->integer('quantasQuedas');
            $table->date('data');
            $table->string('razaoQueda',30);
            $table->string('localQueda',20);
            $table->string('hospitalizacao',20);
            $table->string('objetivosAoProcurarAClinica',300);
            $table->string('jaTentouResolverAntes',300);
            $table->integer('quantasVezes');
            $table->boolean('jaDesistiu')->nullable();
            $table->string('motivoDesistencia',300);
            $table->string('dorRegiaoDoCorpo',100)->nullable();
            $table->string('descricaoSintomaDor1',100)->nullable();
            $table->string('ProfissionalQueTratou1',100)->nullable();
            $table->string('inicioFim1',100)->nullable();
            $table->integer('EVA1')->nullable();
            $table->string('descricaoSintomaDor2',100)->nullable();
            $table->string('ProfissionalQueTratou2',100)->nullable();
            $table->string('inicioFim2',100)->nullable();
            $table->integer('EVA2')->nullable();
            $table->string('descricaoSintomaDor3',100)->nullable();
            $table->string('ProfissionalQueTratou3',100)->nullable();
            $table->string('inicioFim3',100)->nullable();
            $table->integer('EVA3')->nullable();
            $table->string('descricaoSintomaDor4',100)->nullable();
            $table->string('ProfissionalQueTratou4',100)->nullable();
            $table->string('inicioFim4',100)->nullable();
            $table->integer('EVA4')->nullable();
            $table->integer('esforcosTarefaCasa');
            $table->integer('esforcoAndarForaDeCasa');
            $table->integer('esforcoLazer');
            $table->integer('esforcoTrabalho');
            $table->string('exercicioFisicoRegular', 30);
            $table->string('quantasVezesSemana', 30);
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
