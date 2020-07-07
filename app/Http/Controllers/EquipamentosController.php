<?php

namespace App\Http\Controllers;
use App\PessoaEmprestimo;
use Illuminate\Support\Facades\Request as Request2;
use Illuminate\Http\Request;
use App\Equipamento;



class EquipamentosController extends Controller
{

    public function salvar(Request $req){

        $dados = $req->all();


        try{
            Equipamento::create([
                'nomeEquipamento' => $dados['nomeEquipamento'],
                'quantidadeDisponivel' => $dados['quantidadeDisponivel'],
                'quantidadeTotal' => $dados['quantidadeDisponivel'],
                'numeroPatrimonio' => $dados['numeroPatrimonio'],
            ]);

        }catch(\Exception $e){
            return redirect()->back()->withErrors(['Número do patrimônio já cadastrado']);
        }




        return redirect()->route('lista.equipamentos');

    }

    public function editar($id){

        $registro = Equipamento::find($id);

        return view('editarequipamento', compact('registro'));
    }

    public function update(Request $req, $id){

        $dados = $req->all();

        $teste=Equipamento::find($id);

        $emprestimos = PessoaEmprestimo::where('idEquipamento', '=', $id)->get();

        foreach($emprestimos as $emprestimo){
            $emprestimo['nomeEquipamentoEmprestimo'] = $dados['nomeEquipamento'];
            $emprestimo['numeroPatrimonio'] = $dados['numeroPatrimonio'];
            $emprestimo->update();
        }

        $quantidadeT = $teste -> quantidadeTotal;

        $quantidadeD = $teste -> quantidadeDisponivel;

        $quantidadeDisponivelUpdate = $quantidadeD - $dados['quantidadeRemover'] + $dados['quantidadeAdicionar'];
        $quantidadeTotalUpdate = $quantidadeT - $dados['quantidadeRemover'] + $dados['quantidadeAdicionar'];

        if($quantidadeDisponivelUpdate < 0 or $quantidadeTotalUpdate < 0){
            return redirect()->back()->withInput()->withErrors(['Quantidade retirada é menor que a disponível']);
        }else{
            Equipamento::find($id)->update([
                'nomeEquipamento' => $dados['nomeEquipamento'],
                'numeroPatrimonio' => $dados['numeroPatrimonio'],
                'quantidadeDisponivel' => $quantidadeD - $dados['quantidadeRemover'] + $dados['quantidadeAdicionar'],
                'quantidadeTotal' => $quantidadeT - $dados['quantidadeRemover'] + $dados['quantidadeAdicionar'],
            ]);

            return redirect()->route('lista.equipamentos');
        }


    }

    public function deletar($id){
        $equip = Equipamento::find($id);

        if ($equip['quantidadeDisponivel'] == $equip['quantidadeTotal']){
            Equipamento::find($id)->delete();
        }else{
            return redirect()->back()->withErrors(['Por favor, devolva todos os equipamentos antes de excluir']);
        }


        return redirect()->route('lista.equipamentos');
    }

    public function cadastro(){
        return view('cadastroequipamento');
    }


    public function index(){
     $equipamentos = Equipamento::orderBy('nomeEquipamento')->paginate(4);
     return view('listaequipamentos', compact('equipamentos'));
    }

    public function emprestimo($id){
        $registro = Equipamento::find($id);

        return view('emprestimos.indexemprestimo', compact('registro'));
    }

    public function procurar(Request $req){
        $pesquisa = $req->get('pesquisa');

        $nome = $pesquisa;

        $equipamentos = Equipamento::where('nomeEquipamento','ILIKE','%'.$nome.'%')->orWhere('numeroPatrimonio','ILIKE','%'.$nome.'%')->paginate(4);
        $equipamentos->appends(Request2::all())->links();
        if(count($equipamentos) > 0)
            return view('listaequipamentos', compact('equipamentos'));
        else
            return view ('listaequipamentos', compact('equipamentos'))->withErrors(['Equipamento não encontrado']);
    }
}
