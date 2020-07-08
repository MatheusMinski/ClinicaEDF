<?php

namespace App\Http\Controllers;

use App\StatusProfessor;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DateTime;

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

        $data_agora = new DateTime();

        StatusProfessor::create([
            'id_professor' => $id,
            'is_active' => "Inativado",
            'date' => $data_agora,
        ]);


        return redirect()->route('lista.professor');

    }

    public function reativar($id){

        $prof = User::find($id);

        $prof->ativo = true;

        $prof->update();

        $data_agora = new DateTime();

        StatusProfessor::create([
            'id_professor' => $id,
            'is_active' => "Reativado",
            'date' => $data_agora,
        ]);

        return redirect()->route('lista.professor');

    }

    public function status($id){

        $datas = StatusProfessor::where('id_professor', '=', $id)->paginate(10);

        return view('status_professor', compact('datas'));

    }

    public function permissaoNegada(){

        return view('permissaonegada');
    }


}
