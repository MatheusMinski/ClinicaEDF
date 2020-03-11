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
            $table->string('nomeDoProfissional',30);
            $table->string('especialidadeDoProfissional',25);
            $table->string('encaminhamento',15);
            $table->string('motivoEncaminhamento',300);
            $table->boolean('fumaCigarro');
            $table->integer('fumaCigarroQuantidadeDia');
            $table->boolean('jaFumou');
            $table->integer('jaFumouQuantidadeAnos');
            $table->integer('jaFumouParouAQuantoTempoAnos');
            $table->string('descricaoProblemaSaude',300);
            $table->boolean('caiu12Meses');
            $table->integer('quantasQuedas');
            $table->string('lesaoQueda',300);
            $table->string('razaoQueda',30);
            $table->string('localQueda',20);
            $table->string('objetivosAoProcurarAClinica',300);
            $table->integer('quantasVezes');
            $table->boolean('jaDesistiu');
            $table->string('motivoDesistencia',300);
            $table->string('praticaExercicio',80);
            $table->boolean('problemaCardiacoSupervisionado');
            $table->boolean('dorNoPeitoPorAtividades');
            $table->boolean('dorNoPeitoUltimoMes');
            $table->boolean('perderConscienciaTontura');
            $table->boolean('problemaOsseoOuArticular');
            $table->boolean('remedioPressaoOuCoracao');
            $table->boolean('problemaEmAtividadesFisicas');
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
