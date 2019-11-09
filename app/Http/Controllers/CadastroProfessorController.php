<?php

namespace App\Http\Controllers;

use App\Endereco;
use App\User;
use Illuminate\Http\Request;

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
            'cpf.min' => 'O campo de CPF deve conter no mínimo 11 caracteres.',
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


        User::create([
            'nome' => $dados['nome'],
            'email' => $dados['email'],
            'password' => bcrypt($dados['password']),
            'cpf' => $dados['cpf'],
            'telefone' => $dados['telefone'],
            'dataNasc' => $dados['dataNasc'],
        ]);


        return redirect()->route('lista.professor');

    }

    public function listagem(){
        $registros = User::paginate(4);
        return view('listaprofessores', compact('registros'));
    }
}
