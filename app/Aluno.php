<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{

    protected $table = 'Alunos';


    protected $fillable = [
        'idProfessor','nome', 'dataNasc', 'idade', 'sexo', 'telefone','email','profissao','aposentado','estadoCivil','escolaridade','classeSocialFamilia',
    ];

}
