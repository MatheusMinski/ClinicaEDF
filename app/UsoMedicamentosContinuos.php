<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsoMedicamentosContinuos extends Model
{
    protected $fillable = [
        'idAluno', 'nomeComercial','nomeCientifico','dosagem','posologia', 'inicio'
    ];

}
