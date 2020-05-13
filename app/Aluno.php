<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{

    protected $table = 'Alunos';


    protected $fillable = [
        'nome', 'dataNasc', 'idade', 'sexo','email','profissao','aposentado','estadoCivil','escolaridade','classeSocialFamilia',
    ];

}
