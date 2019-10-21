<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaEmprestimo extends Model
{
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
