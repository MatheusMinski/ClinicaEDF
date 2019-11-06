<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $fillable = [
        'id', 'nomeEquipamento', 'QuantidadeTotal', 'QuantidadeDisponivel',
    ];

}
