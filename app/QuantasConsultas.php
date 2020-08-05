<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuantasConsultas extends Model
{
    protected $table = 'QuantasConsultas';
    protected $fillable = [
        'idTreinamento', 'dataAproximada', 'especialidade', 'motivo'
    ];

}
