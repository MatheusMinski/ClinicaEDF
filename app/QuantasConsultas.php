<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuantasConsultas extends Model
{
    protected $fillable = [
        'idAluno', 'dataAproximada', 'especialidade', 'motivo'
    ];

}
