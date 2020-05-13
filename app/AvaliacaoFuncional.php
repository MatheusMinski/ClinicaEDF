<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvaliacaoFuncional extends Model
{
    protected $table = 'AvaliacaoFuncional';

    protected $fillable = [
        'idAluno','pressaoArterialPAS','tepressaoArterialPADlefone','freqCardiacaMedia','saturacaoO2','capacidadeVital1',
        'idAlcapacidadeVital2uno','capacidadeVital3','massaCorporal','estaturaCm','circunferenciaCintura','circunferenciaPescoco',
        'massaMagra','gordura','h2o','tmb','sentarEAlcancarMaior','ombroDireito',
        'ombroEsquerdo','deslizamentoDaPele','apoioUnipodalDireita','apoioUnipodalEsquerda','alcanceFuncional','pressaoManualDireita',
        'pressaoManualEsquerda','sentarLevantarCadeiraRep','sentarLevantarCadeiraFCMax','distanciaTeste6Min','distanciaTesteVoltas','pressaoManualDireita',
        'pedometroTeste6Min','fcTeste6Min1','fcTeste6Min2','fcTeste6Min3','fcTeste6Min4','fcTeste6Min5',
        'fcTeste6Min6','borgCR101','borgCR102','borgCR103','borgCR104','borgCR105', 'borgCR106',
        'fcRecuperacaoUmMin','fcRecuperacaoCincoMin','fcRecuperacaoDezMin','pasTesteUmMin','pasTesteCincoMin','pasTesteDezMin', 'v85FC',
        'padTesteUmMin','padTesteCincoMin','padTesteDezMin','testeExtra1','respostaTesteExtraUm','testeExtra2', 'respostaTesteExtraDois',
        'testeExtra3','respostaTesteExtraTres','testeExtra4','respostaTesteExtraQuatro','preOuPos'
    ];

}
