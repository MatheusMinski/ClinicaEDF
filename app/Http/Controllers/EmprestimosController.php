<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Auth;
use App\PessoaEmprestimo;
use Illuminate\Http\Request;
use App\Equipamento;


class EmprestimosController extends Controller
{

    public function finalizar(Request $req){

        $user = Auth::user();

        $dados = $req->all();

        $quantidadeAnterior = Equipamento::find($dados['idEquipamento'])->quantidadeDisponivel;

        Equipamento::find($dados['idEquipamento'])->update([
            'quantidadeDisponivel' => $quantidadeAnterior - $dados['quantidade'],
        ]);


        PessoaEmprestimo::create([
            'idProfessor' => $user['idProfessor'],
            'idEquipamento' => $dados['idEquipamento'],
            'nomeProfessorEmprestimo'=> $user['nome'],
            'nomePessoaEmprestimo'=> $dados['nomePessoaEmprestimo'],
            'nomeEquipamentoEmprestimo'=> $dados['nomeEquipamento'],
            'cpfPessoaEmprestimo'=> $dados['cpfPessoaEmprestimo'],
            'quantidade'=> $dados['quantidade'],
            'dataDevolucao'=> $dados['dataDevolucao'],

        ]);


        return redirect()->route('lista.emprestimos');

    }

    public function devolver($idEquipamento, $quantidade, $idEmprestimo){



        $quantidadeAnterior = Equipamento::find($idEquipamento)->quantidadeDisponivel;

        Equipamento::find($idEquipamento)->update([
            'quantidadeDisponivel' => $quantidadeAnterior + $quantidade,
        ]);



        $confirmacao = PessoaEmprestimo::find($idEmprestimo);

        $confirmacao->devolvido = true;

        $confirmacao->update();

        return redirect()->route('lista.emprestimos');

    }

    public function listagem(){
        $emprestimos = PessoaEmprestimo::all();
        return view('emprestimos.listaemprestimo', compact('emprestimos'));
    }
}
