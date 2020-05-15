<?php

namespace App\Http\Controllers;

use App\Endereco;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CadastroProfessorController extends Controller
{


    private $professor;

    public function __construct(User $professor)
    {
        $this->professor = $professor;
    }


    public function index(){

        return view('cadastros.professorcd');
    }

    public function salvar(Request $req){

        $dados = $req->all();

        //$this->validate($req, $this->professor->rules);

        $messages = [
            'cpf.required' => 'O campo de CPF é de preenchimento obrigatório.',
            'cpf.cpf' => 'O CPF não é válido',
            'telefone.required' => 'O campo de telefone é de preenchimento obrigatório',
            'telefone.min' => 'O campo de Telefone deve conter no mínimo 10 caracteres.',
            'dataNasc.required' => 'O campo de Data de Nascimento é de preenchimento obrigatório.',
            'dataNasc.min' => 'O campo de Data de Nascimento deve conter no mínimo 8 caracteres.',
            'nome.alpha' => 'O campo de Nome deve conter apenas letras.'

        ];

        $validate = validator($dados, $this->professor->rules, $messages);
        if ($validate->fails()){
            return redirect()
                ->back()
                ->withErrors($validate)
                ->withInput();
        }


        //Controle da data
        $data_agora = new DateTime();
        $dataDigitada = DateTime::createFromFormat('d/m/Y', $dados['dataNasc']);


        if ($dataDigitada > $data_agora) {
            return redirect()->back()->withErrors(['Por favor, insira uma data válida']);
        }

        $dataConvertida = DateTime::createFromFormat('m/d/Y', $dados['dataNasc']);
        $dados['dataNasc'] = $dataConvertida;
        try{
            User::create([
                'nome' => $dados['nome'],
                'email' => $dados['email'],
                'password' => bcrypt($dados['password']),
                'cpf' => $dados['cpf'],
                'telefone' => $dados['telefone'],
                'dataNasc' => $dados['dataNasc'],
            ]);

        }catch(\Exception $e){
            dd($e);
            return redirect()->back()->withErrors(['CPF ou e-mail já cadastrado']);
        }




        return redirect()->route('lista.professor');

    }

    public function listagem(){

        $id = Auth::user()->idProfessor;

        $registros =  User::where('idProfessor', '!=', $id)->paginate(4);

        //$registros = User::paginate(4);
        return view('listaprofessores', compact('registros'));
    }
}
