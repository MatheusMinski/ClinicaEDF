<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipamento;

class EquipamentosController extends Controller
{

    public function salvar(Request $req){

        $dados = $req->all();


        Equipamento::create([
            'nomeEquipamento' => $dados['nomeEquipamento'],
            'quantidadeDisponivel' => $dados['quantidadeDisponivel'],
            'quantidadeTotal' => $dados['quantidadeDisponivel'],
        ]);


        return redirect()->route('lista.equipamentos');

    }

    public function editar($id){

        $registro = Equipamento::find($id);

        return view('editarequipamento', compact('registro'));
    }

    public function update(Request $req, $id){

        $dados = $req->all();

        $teste=Equipamento::find($id);

        $quantidadeT = $teste -> quantidadeTotal;

        $quantidadeD = $teste -> quantidadeDisponivel;

        $quantidadeDisponivelUpdate = $quantidadeD - $dados['quantidadeRemover'] + $dados['quantidadeAdicionar'];
        $quantidadeTotalUpdate = $quantidadeT - $dados['quantidadeRemover'] + $dados['quantidadeAdicionar'];

        if($quantidadeDisponivelUpdate < 0 or $quantidadeTotalUpdate < 0){
            return redirect()->back()->withInput()->withErrors(['Quantidade retirada é menor que a disponível']);
        }else{
            Equipamento::find($id)->update([
                'nomeEquipamento' => $dados['nomeEquipamento'],
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
     $equipamentos = Equipamento::paginate(4);
     return view('listaequipamentos', compact('equipamentos'));
    }

    public function emprestimo($id){
        $registro = Equipamento::find($id);

        return view('emprestimos.indexemprestimo', compact('registro'));
    }
}
