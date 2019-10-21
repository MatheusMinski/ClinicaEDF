<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContatosDeEmergencia extends Model
{
    protected $fillable = [
        'idAluno', 'nome', 'parentesco','telefone',
    ];


}
