<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;

class CadastroPessoaEmprestimoController extends Controller
{
    public function index(){
        return view('emprestimos/indexemprestimo');
    }

    public function cadastro(){
        return view('emprestimos/alunoemprestimo');
    }

    public function salvar(Request $req){

        $dados = $req->all();


        Pessoa::create($dados);


        return redirect()->route('emprestimos');

    }
}
