<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QualidadeDeVida extends Model
{

    protected $fillable = [
        'idPessoa', 'suaSaudeEmGeral', 'saudeComparadaUmAnoAtras', 'atividadesRigorosas', 'atividadesModeradas',
        'levantarOuCarregarMantimentos','subirVariosLancesDeEscada', 'subirUmLanceDeEscada','curvarAjoelharDobrar',
        'andarMaisDeUmKm','andarVariosQuarteiroes', 'andarUmQuarteirao', 'tomarBanhoOuVestirse', 'diminuiuTempoTrabalhoAtividadesFisica',
        'menosTarefasGostariaFisica','limitadoTempoTrabalhoOutrosFisica', 'dificuldadeFazerTrabalhoFisica', 'diminuiuTempoTrabalhoAtividadesEmocional', 'menosTarefasGostariaEmocional',
        'naoTrabalhouMenosCuidado','maneiraSaudeAfetouSocial', 'dorNoCorpoQuatroSemanas', 'quantoADorInterferiuTrabalho', 'quantoTempoVigor',
        'quantoTempoMuitoNervosa','quantoTempoDeprimido', 'quantoTempoCalmo', 'quantoTempoMuitaEnergia', 'quantoTempoDesanimadoAbatido',
        'quantoTempoEsgotado','quantoTempoFeliz', 'quantoTempoCansado', 'tempoSaudeAfetouSocial', 'costumaAdoecerFacil',
        'taoSaudavelQuantoOutrasPessoas','minhaSaudeVaiPiorar', 'minhaSaudeEExcelente'

    ];


}
