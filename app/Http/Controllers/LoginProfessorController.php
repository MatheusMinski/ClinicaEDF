<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginProfessorController extends Controller
{
    public function index(){
        return view('login');
    }

    public function entrar(Request $req){

        $dados = $req-> all();
        if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password']])){
            return redirect()->route('/login/entrar');
        }

        return redirect()->route('index');
    }

    public function sair(){
        Auth::logout();
        return redirect()->route('index');
    }

    public function emprestimo(){

        return view('emprestimos.indexemprestimo');

    }
}
