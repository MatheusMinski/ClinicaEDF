<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnamneseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'idTreinamento' => 'sometimes|numeric|max:99999',
            'encaminhamento' => 'sometimes|string|max:255|nullable',
            'nomeDoProfissional'=> 'sometimes|string|max:255|nullable',
            'especialidadeDoProfissional'=> 'sometimes|string|max:255|nullable',
            'motivoEncaminhamento'=> 'sometimes|string|max:255|nullable',
            'saudeGeral'=> 'sometimes|string|max:255|nullable',
            'fumaCigarro'=> 'sometimes|boolean|nullable',
            'fumaCigarroQuantidadeDia'=> 'sometimes|numeric|max:99999|nullable',
            'jaFumou'=> 'sometimes|boolean|nullable',
            'jaFumouQuantidadeAnos'=> 'sometimes|numeric|max:99999|nullable',
            'jaFumouParouAQuantoTempoAnos'=> 'sometimes|numeric|max:99999|nullable',
            'descricaoProblemaSaude'=> 'sometimes|string|max:255|nullable',
            'caiu12Meses'=> 'sometimes|boolean|nullable',
            'quantasQuedas'=> 'sometimes|numeric|max:99999|nullable',
            'data'=> 'sometimes|date_format:d/m/Y|nullable',
            'razaoQueda'=> 'sometimes|string|max:255|nullable',
            'localQueda'=> 'sometimes|string|max:255|nullable',
            'hospitalizacao'=> 'sometimes|string|max:255|nullable',
            'objetivosAoProcurarAClinica'=> 'sometimes|string|max:255|nullable',
            'jaTentouResolverAntes' => 'sometimes|string|max:255|nullable',
            'quantasVezes'=> 'sometimes|numeric|max:99999|nullable',
            'jaDesistiu'=> 'sometimes|boolean|nullable',
            'motivoDesistencia'=> 'sometimes|string|max:255|nullable',
            'dorRegiaoDoCorpo'=> 'sometimes|string|max:255|nullable',
            'descricaoSintomaDor1'=> 'sometimes|string|max:255|nullable',
            'ProfissionalQueTratou1'=> 'sometimes|string|max:255|nullable',
            'inicioFim1'=> 'sometimes|string|max:255|nullable',
            'EVA1'=> 'sometimes|string|max:255|nullable',
            'descricaoSintomaDor2'=> 'sometimes|string|max:255|nullable',
            'ProfissionalQueTratou2'=> 'sometimes|string|max:255|nullable',
            'inicioFim2'=> 'sometimes|string|max:255|nullable',
            'EVA2'=> 'sometimes|string|max:255|nullable',
            'descricaoSintomaDor3'=> 'sometimes|string|max:255|nullable',
            'ProfissionalQueTratou3'=> 'sometimes|string|max:255|nullable',
            'inicioFim3'=> 'sometimes|string|max:255|nullable',
            'EVA3'=> 'sometimes|string|max:255|nullable',
            'descricaoSintomaDor4'=> 'sometimes|string|max:255|nullable',
            'ProfissionalQueTratou4'=> 'sometimes|string|max:255|nullable',
            'inicioFim4'=> 'sometimes|string|max:255|nullable',
            'EVA4'=> 'sometimes|string|max:255|nullable',
            'esforcosTarefaCasa'=> 'sometimes|string|max:255|nullable',
            'esforcoAndarForaDeCasa'=> 'sometimes|string|max:255|nullable',
            'esforcoLazer'=> 'sometimes|string|max:255|nullable',
            'esforcoTrabalho'=> 'sometimes|string|max:255|nullable',
            'exercicioFisicoRegular'=> 'sometimes|string|max:255|nullable',
            'quantasVezesSemana'=> 'sometimes|string|max:255|nullable',
            'esforcoParaEsseExercicio'=> 'sometimes|string|max:255|nullable',
        ];
    }
}
