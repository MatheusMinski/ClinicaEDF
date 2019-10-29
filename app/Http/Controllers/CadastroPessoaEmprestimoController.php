<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroPessoaEmprestimoController extends Controller
{
    public function index(){
        return view('emprestimos/indexemprestimo');
    }

    public function cadastro(){
        return view('emprestimos/alunoemprestimo');
    }
}
