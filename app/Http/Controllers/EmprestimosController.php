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
            'nomePessoaEmprestimo.required' => 'O campo de Nome é de preenchimento obrigatório.',
            'nomePessoaEmprestimo.min' => 'O campo de Nome deve conter no mínimo 3 caracteres.',
            'cpfPessoaEmprestimo.min' => 'O campo de CPF deve conter no mínimo 11 caracteres.',
            'cpfPessoaEmprestimo.required' => 'O campo de CPF é de preenchimento obrigatório.',
            'dataDevolucao.required' => 'O campo de Data de Devolução é de preenchimento obrigatório.',
            'dataDevolucao.min' => 'O campo de Data de Devolução deve conter no mínimo 8 caracteres.',
            'quantidade' => 'O campo de Quantidade é de preenchimento obrigatório.',
            'nomePessoaEmprestimo.alpha' => 'O campo de Nome deve conter apenas letras.'
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
        $emprestimos = PessoaEmprestimo::paginate(4);
        return view('emprestimos.listaemprestimo', compact('emprestimos'));
    }
}
