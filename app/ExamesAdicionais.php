<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamesAdicionais extends Model
{
    protected $fillable = [
        'integer', 'tipoDoExame','dataExame','resultadosPrincipais'

    ];
}
