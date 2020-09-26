<?php

namespace App\Http\Controllers;

use App\ListaDeEspera;
use App\User;
use Illuminate\Http\Request;

class ListaEsperaController extends Controller
{

    private $aluno;

    public function __construct(ListaDeEspera $aluno)
    {
        $this->aluno = $aluno;
    }

    public function index(){
        return view('listaespera');
        //TODO: RETORNAR A VIEW DA MINHA LISTA DE ESPERA;
    }

    public function store(Request $request){
        $data = $request->all();

        try {
            $this->aluno->create($data);
        } catch (\Exception $e){
            return redirect()->back()->withErrors(['Ocorreu algum problema. Tente novamente!']);
        }

    }

    public function show(){

        $lista = $this->aluno->orderBy('prioridade', 'asc')->paginate(10);

        // TODO : TROCAR PARA "listaespera";
        return view('listaespera', compact('lista'));
    }

    public function updateContato($id){

        $aluno = $this->aluno->findOrFail($id);

        try {
            $aluno->update([
                'nomeAlunoEspera' => $aluno['nomeAlunoEspera'],
                'prioridade' => $aluno['prioridade'],
                'telefone' => $aluno['telefone'],
                'outroContato' => $aluno['outroContato'],
                'contatado' => true
            ]);

            $lista = $this->aluno->orderBy('prioridade', 'asc')->paginate(10);
            return redirect()->route('lista.espera');

        } catch (\Exception $e){
            return redirect()->back()->withErrors(['Ocorreu algum problema. Tente novamente!']);
        }
    }

    public function removerListaDeEspera($id){
        $aluno = $this->aluno->findOrFail($id);

        try {
            $aluno->delete();

            $lista = $this->aluno->orderBy('prioridade', 'asc')->paginate(10);
            return redirect()->route('lista.espera');

        } catch (\Exception $e){
            return redirect()->back()->withErrors(['Ocorreu algum problema. Tente novamente!']);
        }
    }
}
