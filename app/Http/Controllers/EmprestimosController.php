<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Auth;
use App\PessoaEmprestimo;
use Illuminate\Http\Request;


class EmprestimosController extends Controller
{

    public function finalizar(Request $req){

        $user = Auth::user();

        $dados = $req->all();


        PessoaEmprestimo::create([
            'idProfessor' => $user['idProfessor'],
            'nomeProfessorEmprestimo'=> $user['nome'],
            'nomePessoaEmprestimo'=> $dados['nomePessoaEmprestimo'],
            'nomeEquipamentoEmprestimo'=> $dados['nomeEquipamento'],
            'cpfPessoaEmprestimo'=> $dados['cpfPessoaEmprestimo'],
            'dataDevolucao'=> $dados['dataDevolucao'],

        ]);


        return redirect()->route('lista.emprestimos');

    }

    public function listagem(){
        $emprestimos = PessoaEmprestimo::all();
        return view('emprestimos.listaemprestimo', compact('emprestimos'));
    }
}
