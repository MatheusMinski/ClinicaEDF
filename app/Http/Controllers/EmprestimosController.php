<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Auth;
use App\PessoaEmprestimo;
use Illuminate\Http\Request;
use App\Equipamento;
use DateTime;


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
            'cpfPessoaEmprestimo.cpf' => 'CPF inválido',
            'cpfPessoaEmprestimo.required' => 'O campo de CPF é de preenchimento obrigatório.',
            'dataDevolucao.required' => 'O campo de Data de Devolução é de preenchimento obrigatório.',
            'dataDevolucao.min' => 'O campo de Data de Devolução deve conter no mínimo 8 caracteres.',
            'quantidade' => 'O campo de Quantidade é de preenchimento obrigatório.',
            'nomePessoaEmprestimo.alpha' => 'O campo de Nome deve conter apenas letras.'
        ];


        $this->validate($req, $this->emprestimo->rules, $messages);


        //Controle da data

        $data_agora = new DateTime();
        $dataDigitada = DateTime::createFromFormat('d/m/Y', $dados['dataDevolucao']);


        if ($dataDigitada < $data_agora) {
            return redirect()->back()->withInput()->withErrors(['Por favor, insira uma data válida']);
        }

        $dataConvertida = DateTime::createFromFormat('m/d/Y', $dados['dataDevolucao']);
        $dados['dataDevolucao'] = $dataConvertida;

        try {

            if(($quantidadeAnterior - $dados['quantidade'])<0){

                return redirect()->back()->withInput()->withErrors(['Quantidade de Estoque insuficiente']);

            }else{

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
            }

        }catch(\Exception $ex){
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
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
