<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsoMedicamentosContinuos extends Model
{
    protected $table = 'UsoMedicamentosContinuos';
    protected $fillable = [
        'idTreinamento', 'nomeComercial','nomeCientifico','dosagem','posologia', 'inicio'
    ];

}
