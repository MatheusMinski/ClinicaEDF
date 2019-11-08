<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Auth;
use App\PessoaEmprestimo;
use Illuminate\Http\Request;
use App\Equipamento;


class EmprestimosController extends Controller
{

    private $emprestimo;

    public function __construct(PessoaEmprestimo $emprestimo)
    {
        $this->emprestimo = $emprestimo;
    }


    public function finalizar(Request $req){

        $user = Auth::user();

        $dados = $req->all();

        $quantidadeAnterior = Equipamento::find($dados['idEquipamento'])->quantidadeDisponivel;



        //verificação de cpf tem que ser em outro try catch

        $messages = [
            'nomePessoaEmprestimo.required' => 'Campo nome é obrigatório!',
            'cpfPessoaEmprestimo.min' => 'CPF inválido'
        ];


        $this->validate($req, $this->emprestimo->rules, $messages);

        try {

            PessoaEmprestimo::create([
                'idProfessor' => $user['idProfessor'],
                'idEquipamento' => $dados['idEquipamento'],
                'nomeProfessorEmprestimo' => $user['nome'],
                'nomePessoaEmprestimo' => $dados['nomePessoaEmprestimo'],
                'nomeEquipamentoEmprestimo' => $dados['nomeEquipamento'],
                'cpfPessoaEmprestimo' => $dados['cpfPessoaEmprestimo'],
                'quantidade' => $dados['quantidade'],
                'dataDevolucao' => $dados['dataDevolucao'],

            ]);

            Equipamento::find($dados['idEquipamento'])->update([
                'quantidadeDisponivel' => $quantidadeAnterior - $dados['quantidade'],
            ]);
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['Aqui que altera a msg', 'The Message']);
        }


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
