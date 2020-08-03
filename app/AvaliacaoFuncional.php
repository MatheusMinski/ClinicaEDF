<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvaliacaoFuncional extends Model
{
    protected $table = 'AvaliacaoFuncional';

    protected $fillable = [
        'idTreinamento','pressaoArterialPAS','pressaoArterialPAD','freqCardiacaMedia',
        'saturacaoO2','capacidadeVital1',
        'capacidadeVital2','capacidadeVital3','massaCorporal','estaturaCm',
        'circunferenciaCintura','circunferenciaPescoco',
        'massaMagra','gordura','h2o','tmb','sentarEAlcancarMaior',
        'ombroDireito',
        'ombroEsquerdo','apoioUnipodalDireita','apoioUnipodalEsquerda',
        'alcanceFuncional','pressaoManualDireita',
        'pressaoManualEsquerda','sentarLevantarCadeiraRep',
        'sentarLevantarCadeiraFCMax','distanciaTeste6Min',
        'pedometroTeste6Min','fcTeste6Min1','fcTeste6Min2',
        'fcTeste6Min3','fcTeste6Min4','fcTeste6Min5',
        'fcTeste6Min6', 'fcRecuperacaoUmMin','fcRecuperacaoTresMin',
        'fcRecuperacaoCincoMin','pasTesteUmMin',
        'pasTesteCincoMin','pasTesteDezMin',
        'padTesteUmMin','padTesteCincoMin','padTesteDezMin','testeExtra1',
        'respostaTesteExtraUm','testeExtra2',
        'respostaTesteExtraDois',
        'testeExtra3','respostaTesteExtraTres','testeExtra4',
        'respostaTesteExtraQuatro',
    ];

}
