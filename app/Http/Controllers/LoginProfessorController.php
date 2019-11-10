<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class LoginProfessorController extends Controller
{




    public function login(){
        return view('login');
    }

    public function entrar(Request $req){

        $dados = $req-> all();


        $prof = User::where('email', $dados['email'])->first();

        if($prof != null){
            if($prof->ativo){
                if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password']])) {
                    return redirect()->route('home');
                }
                    return redirect()->back()->withErrors(['Login ou senha inválidos']);
            }else{
                return redirect()->back()->withErrors(['O professor está inativo!']);
            }
        }else{
            return redirect()->back()->withErrors(['O e-mail não está cadastrado']);
        }

    }

    //modificação teste

    public function sair(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function inativar($id){

        $prof = User::find($id);

        $prof->ativo = false;

        $prof->update();

        return redirect()->route('lista.professor');

    }

    public function reativar($id){

        $prof = User::find($id);

        $prof->ativo = true;

        $prof->update();

        return redirect()->route('lista.professor');

    }


}
