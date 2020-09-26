<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaDeEspera extends Model
{
    protected $table = 'ListaDeEspera';
    protected $fillable = [
        'nomeAlunoEspera', 'prioridade', 'telefone', 'outroContato', 'contatado'
    ];

}
