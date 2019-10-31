<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'idEndereco', 'rua', 'numero','bairro','cidade','cep',
    ];

}
