<?php

namespace App\Http\Controllers;

use App\ListaDeEspera;
use Illuminate\Http\Request;

class ListaEsperaController extends Controller
{

    private $aluno;

    public function __construct(ListaDeEspera $aluno)
    {
        $this->aluno = $aluno;
    }

    public function index()
    {
        $lista = $this->aluno->orderBy('prioridade', 'asc')->paginate(10);

        return view('listaespera', compact('lista'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $this->aluno->create($data);

        return $this->index();
    }


    public function create()
    {
        return view('listaespera_criar');
    }

    public function edit($id)
    {
        $aluno = ListaDeEspera::query()->findOrFail($id);

        return view('listaespera_criar', compact('aluno'));
    }

    public function update(ListaDeEspera $listaEspera, Request $request)
    {

        $dados = $request->all();
        $listaEspera->update($dados);
        $lista = ListaDeEspera::query()->orderBy('prioridade', 'asc')->paginate(10);

        return redirect()->route('lista.espera');
    }

    public function updateContato($id)
    {

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

    public function removerListaDeEspera($id)
    {
        $aluno = $this->aluno->findOrFail($id);

        try {
            $aluno->delete();

            $lista = $this->aluno->orderBy('prioridade', 'asc')->paginate(10);
            return redirect()->route('lista.espera');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Ocorreu algum problema. Tente novamente!']);
        }
    }
}
