<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamesAdicionais extends Model
{
    protected $table = 'ExamesAdicionais';
    protected $fillable = [
        'integer', 'tipoDoExame','dataExame','resultadosPrincipais'

    ];
}
