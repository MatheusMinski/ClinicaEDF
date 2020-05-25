<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoTreinamento extends Model
{
    protected $table = 'AlunoTreinamentos';

    protected $fillable = [
        'idAluno',
    ];
}
