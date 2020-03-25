<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{

    protected $table = 'Pessoas';

    protected $fillable = [
        'nomePessoa', 'cpfPessoa',
    ];
}
