<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualidadeDeVidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QualidadeDeVidas', function (Blueprint $table) {
            $table->integer('idPessoa');
            $table->integer('suaSaudeEmGeral');
            $table->integer('saudeComparadaUmAnoAtras');
            $table->integer('atividadesRigorosas');
            $table->integer('atividadesModeradas');
            $table->integer('levantarOuCarregarMantimentos');
            $table->integer('subirVariosLancesDeEscada');
            $table->integer('subirUmLanceDeEscada');
            $table->integer('curvarAjoelharDobrar');
            $table->integer('andarMaisDeUmKm');
            $table->integer('andarVariosQuarteiroes');
            $table->integer('andarUmQuarteirao');
            $table->integer('tomarBanhoOuVestirse');
            $table->boolean('diminuiuTempoTrabalhoAtividadesFisica');
            $table->boolean('menosTarefasGostariaFisica');
            $table->boolean('limitadoTempoTrabalhoOutrosFisica');
            $table->boolean('dificuldadeFazerTrabalhoFisica');
            $table->boolean('diminuiuTempoTrabalhoAtividadesEmocional');
            $table->boolean('menosTarefasGostariaEmocional');
            $table->boolean('naoTrabalhouMenosCuidado');
            $table->integer('maneiraSaudeAfetouSocial');
            $table->integer('dorNoCorpoQuatroSemanas');
            $table->integer('quantoADorInterferiuTrabalho');
            $table->integer('quantoTempoVigor');
            $table->integer('quantoTempoMuitoNervosa');
            $table->integer('quantoTempoDeprimido');
            $table->integer('quantoTempoCalmo');
            $table->integer('quantoTempoMuitaEnergia');
            $table->integer('quantoTempoDesanimadoAbatido');
            $table->integer('quantoTempoEsgotado');
            $table->integer('quantoTempoFeliz');
            $table->integer('quantoTempoCansado');
            $table->integer('tempoSaudeAfetouSocial');
            $table->integer('costumaAdoecerFacil');
            $table->integer('taoSaudavelQuantoOutrasPessoas');
            $table->integer('minhaSaudeVaiPiorar');
            $table->integer('minhaSaudeEExcelente');

            $table->timestamps();
        });
    }

    /**


     */
    public function down()
    {
        Schema::dropIfExists('QualidadeDeVidas');
    }
}
