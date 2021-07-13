<?php

namespace App\Http\Controllers;

use App\Equipamento;
use App\PessoaEmprestimo;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as Request2;


class EmprestimosController extends Controller
{

    private $emprestimo;

    public function __construct(PessoaEmprestimo $emprestimo)
    {
        $this->emprestimo = $emprestimo;
    }

//comentário
    public function finalizar(Request $req)
    {

        $user = Auth::user();

        $dados = $req->all();

        $quantidadeAnterior = Equipamento::find($dados['idEquipamento'])->quantidadeDisponivel;

        $numeroPat = Equipamento::find($dados['idEquipamento'])->numeroPatrimonio;


        //verificação de cpf tem que ser em outro try catch

        $messages = [
            'nomePessoaEmprestimo.required' => 'O campo de Nome é de preenchimento obrigatório.',
            'nomePessoaEmprestimo.min' => 'O campo de Nome deve conter no mínimo 3 caracteres.',
            'cpfPessoaEmprestimo.cpf' => 'CPF inválido',
            'cpfPessoaEmprestimo.required' => 'O campo de CPF é de preenchimento obrigatório.',
            'dataDevolucao.required' => 'O campo de Data de Devolução é de preenchimento obrigatório.',
            'dataDevolucao.min' => 'O campo de Data de Devolução deve conter no mínimo 8 caracteres.',
            'quantidade' => 'O campo de Quantidade é de preenchimento obrigatório.',
            'nomePessoaEmprestimo.alpha' => 'O campo de Nome deve conter apenas letras.',
            'contato.required' => 'Contato obrigatório'
        ];


        $this->validate($req, $this->emprestimo->rules, $messages);


        //Controle da data

        $data_agora = new DateTime();
        $dataDigitadaParaComparar = DateTime::createFromFormat('d/m/Y', $dados['dataDevolucao']);

        if ($dataDigitadaParaComparar < $data_agora) {
            return redirect()->back()->withInput()->withErrors(['Por favor, insira uma data válida']);
        }


        $dados['dataDevolucao'] = $dataDigitadaParaComparar;


        try {

            if (($quantidadeAnterior - $dados['quantidade']) < 0) {

                return redirect()->back()->withInput()->withErrors(['Quantidade de Estoque insuficiente']);

            } else {

                PessoaEmprestimo::create([
                    'idProfessor' => $user['idProfessor'],
                    'idEquipamento' => $dados['idEquipamento'],
                    'nomeProfessorEmprestimo' => $user['nome'],
                    'nomePessoaEmprestimo' => $dados['nomePessoaEmprestimo'],
                    'contato' => $dados['contato'],
                    'nomeEquipamentoEmprestimo' => $dados['nomeEquipamento'],
                    'numeroPatrimonio' => $numeroPat,
                    'cpfPessoaEmprestimo' => $dados['cpfPessoaEmprestimo'],
                    'quantidade' => $dados['quantidade'],
                    'dataDevolucao' => $dados['dataDevolucao'],

                ]);

                Equipamento::find($dados['idEquipamento'])->update([
                    'quantidadeDisponivel' => $quantidadeAnterior - $dados['quantidade'],
                ]);
            }

        } catch (\Exception $ex) {
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }


        return redirect()->route('lista.emprestimos');

    }

    public function devolver($idEquipamento, $quantidade, $idEmprestimo)
    {


        $quantidadeAnterior = Equipamento::find($idEquipamento)->quantidadeDisponivel;

        Equipamento::find($idEquipamento)->update([
            'quantidadeDisponivel' => $quantidadeAnterior + $quantidade,
        ]);


        $confirmacao = PessoaEmprestimo::find($idEmprestimo);

        $confirmacao->devolvido = true;

        $confirmacao->update();

        return redirect()->route('lista.emprestimos');

    }


    public function listagem()
    {
        $emprestimos = PessoaEmprestimo::orderBy('devolvido')->paginate(4);
        return view('emprestimos.listaemprestimo', compact('emprestimos'));
    }

    public function dados($id)
    {
        $dados = PessoaEmprestimo::find($id);
        //$dataDigitada = DateTime::createFromFormat('d/m/Y', $dados['dataDevolucao']);
        //dd($dados['dataDevolucao']);
        return view('emprestimos.dados_emprestimo', compact('dados'));
    }

    public function procurar(Request $req)
    {
        $pesquisa = $req->get('nomeEmprestimo');

        $status = $req->get('checkbox');

        $nome = $pesquisa;


        if (isset($status)) {
            $status = 'True';
        } else {
            $status = 'False';
        }

        if ($nome == null) {
            $emprestimos = PessoaEmprestimo::where('nomeEquipamentoEmprestimo', 'ILIKE', '%' . $nome . '%')->where('devolvido', 'ILIKE', '%' . $status . '%')->orWhere('numeroPatrimonio', 'ILIKE', '%' . $nome . '%')->where('devolvido', 'ILIKE', '%' . $status . '%')->paginate(4);
            return view('emprestimos.listaemprestimo', compact('emprestimos'));
        }

        $emprestimos = PessoaEmprestimo::where('nomeEquipamentoEmprestimo', 'ILIKE', '%' . $nome . '%')->where('devolvido', 'ILIKE', '%' . $status . '%')->orWhere('numeroPatrimonio', 'ILIKE', '%' . $nome . '%')->where('devolvido', 'ILIKE', '%' . $status . '%')->paginate(4);

        $emprestimos->appends(Request2::all())->links();
        if (count($emprestimos) > 0)
            return view('emprestimos.listaemprestimo', compact('emprestimos'));
        else
            return view('emprestimos.listaemprestimo', compact('emprestimos'))->withErrors(['Empréstimo não encontrado']);
    }
}
