<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as Request2;

class AdminAlunos extends Controller
{
    public function alunosAdmin(){
        $alunos =  Aluno::paginate(4);
        return view('aluno.aluno_lista_admin', compact('alunos'));
    }

    public function alunoTrocarProfessor($idAluno){
        $registros = User::paginate(10);

        return view('lista_professores_admin', compact('registros', 'idAluno'));
    }

    public function alunoTrocarProfessorProcurar(Request $req, $idAluno){

        $pesquisa = $req->get('nomeProfessor');

        $nome = $pesquisa;

        $registros = User::where('nome','ILIKE','%'.$nome.'%')->paginate(4);
        $registros->appends(Request2::all())->links();
        if(count($registros) > 0)
            return view('lista_professores_admin', compact('registros', 'idAluno'));
        else
            return view ('lista_professores_admin', compact('registros', 'idAluno'))->withErrors(['Professor não encontrado']);
    }

    public function realizarTroca($idAluno, $idProfessor){
        $aluno = Aluno::find($idAluno);

        $aluno->idProfessor = $idProfessor;

        $aluno->save();

        return redirect()->back()->withErrors(['Professor trocado com sucesso!']);
    }
}
