<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaEmprestimo extends Model

{
    protected $table = 'pessoaEmprestimo';
    protected $fillable = [
        'idProfessor', 'idEquipamento', 'nomeProfessorEmprestimo', 'nomePessoaEmprestimo',
        'nomeEquipamentoEmprestimo', 'cpfPessoaEmprestimo', 'dataDevolucao', 'quantidade',
    ];
}
