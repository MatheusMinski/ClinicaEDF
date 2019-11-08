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


    public $rules = [
        'nomePessoaEmprestimo' => 'required|min:3|max:50',
        'cpfPessoaEmprestimo' => 'required|min:14',
        'dataDevolucao' => 'required|min:10',
        'quantidade' => 'required',
    ];
}
