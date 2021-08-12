<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvaliacaoFuncionalRequest extends FormRequest
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
            'pressaoArterialPAS' => 'double',
            'pressaoArterialPAD' => 'double',
            'freqCardiacaMedia' => 'double',
            'saturacaoO2' => 'double',
            'capacidadeVital1' => 'double',
            'pressaoArterialPAS' => 'double',
            'pressaoArterialPAS' => 'double',
            'pressaoArterialPAS' => 'double',
            'pressaoArterialPAS' => 'double',
            'pressaoArterialPAS' => 'double',
        ];
    }
}
