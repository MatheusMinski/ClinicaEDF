<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginProfessorController extends Controller
{




    public function login(){
        return view('login');
    }

    public function entrar(Request $req){

        $dados = $req-> all();
        if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password']])){
            return redirect()->route('home');
        }

        return redirect()->route('login');
    }

    public function sair(){
        Auth::logout();
        return redirect()->route('login');
    }


}
