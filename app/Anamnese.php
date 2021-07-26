<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anamnese extends Model
{
    protected $table = 'Anamnese';

    protected $fillable = [
        'idTreinamento',
        'encaminhamento',
        'nomeDoProfissional',
        'especialidadeDoProfissional',
        'motivoEncaminhamento',
        'saudeGeral',
        'fumaCigarro',
        'fumaCigarroQuantidadeDia',
        'jaFumou',
        'jaFumouQuantidadeAnos',
        'jaFumouParouAQuantoTempoAnos',
        'descricaoProblemaSaude',
        'caiu12Meses',
        'quantasQuedas',
        'data',
        'razaoQueda',
        'localQueda',
        'hospitalizacao',
        'objetivosAoProcurarAClinica',
        'jaTentouResolverAntes' ,
        'quantasVezes',
        'jaDesistiu',
        'motivoDesistencia',
        'dorRegiaoDoCorpo',
        'descricaoSintomaDor1',
        'ProfissionalQueTratou1',
        'inicioFim1',
        'EVA1',
        'descricaoSintomaDor2',
        'ProfissionalQueTratou2',
        'inicioFim2',
        'EVA2',
        'descricaoSintomaDor3',
        'ProfissionalQueTratou3',
        'inicioFim3',
        'EVA3',
        'descricaoSintomaDor4',
        'ProfissionalQueTratou4',
        'inicioFim4',
        'EVA4',
        'esforcosTarefaCasa',
        'esforcoAndarForaDeCasa',
        'esforcoLazer',
        'esforcoTrabalho',
        'exercicioFisicoRegular',
        'quantasVezesSemana',
        'esforcoParaEsseExercicio',

    ];

    //
}
