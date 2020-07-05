<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaEmprestimo extends Model

{


    protected $table = 'PessoaEmprestimo';
    protected $fillable = [
        'idProfessor', 'idEquipamento', 'nomeProfessorEmprestimo', 'nomePessoaEmprestimo',
        'nomeEquipamentoEmprestimo', 'numeroPatrimonio', 'cpfPessoaEmprestimo', 'dataDevolucao', 'quantidade',
    ];


    public $rules = [
        'nomePessoaEmprestimo' => 'required|min:3|max:50',
        'cpfPessoaEmprestimo' => 'required|cpf',
        'dataDevolucao' => 'required|min:10',
        'quantidade' => 'required',
    ];
}
