<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anamnese extends Model
{
    protected $table = 'Anamnese';

    protected $fillable = [
        'nomeDoProfissional', 'especialidadeDoProfissional', 'encaminhamento', 'motivoEncaminhamento', 'fumaCigarro', 'fumaCigarroQuantidadeDia', 'jaFumou', 'jaFumouQuantidadeAnos', 'jaFumouParouAQuantoTempoAnos', 'descricaoProblemaSaude',
        'caiu12Meses', 'quantasQuedas', 'lesaoQueda', 'razaoQueda', 'localQueda', 'objetivosAoProcurarAClinica', 'quantasVezes', 'jaDesistiu', 'motivoDesistencia', 'praticaExercicio',
        'problemaCardiacoSupervisionado', 'dorNoPeitoPorAtividades', 'dorNoPeitoUltimoMes', 'problemaOsseoOuArticular', 'perderConscienciaTontura', 'problemaOsseoOuArticular', 'remedioPressaoOuCoracao', 'problemaEmAtividadesFisicas'
    ];

    //
}
