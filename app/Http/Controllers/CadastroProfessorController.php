<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CadastroProfessorController extends Controller
{
    public function index(){
        return view('cadastros.professorcd');
    }

    public function salvar(Request $req){

        $dados = $req->all();

        User::create($dados);

        return redirect()->routes('');

    }
}
