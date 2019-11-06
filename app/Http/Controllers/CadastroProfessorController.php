<?php

namespace App\Http\Controllers;

use App\Endereco;
use App\User;
use Illuminate\Http\Request;

class CadastroProfessorController extends Controller
{
    public function index(){

        return view('cadastros.professorcd');
    }

    public function salvar(Request $req){

        $dados = $req->all();


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
        $registros = User::all();
        return view('listaprofessores', compact('registros'));
    }
}