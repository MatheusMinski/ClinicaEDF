<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $table = 'Equipamentos';

    protected $fillable = [
        'id', 'nomeEquipamento', 'numeroPatrimonio', 'quantidadeTotal', 'quantidadeDisponivel',
    ];

}
