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
            'QuantidadeDisponivel' => $dados['QuantidadeDisponivel'],
            'QuantidadeTotal' => $dados['QuantidadeDisponivel'],
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

        $quantidadeT = $teste -> QuantidadeTotal;

        $quantidadeD = $teste -> QuantidadeDisponivel;

        Equipamento::find($id)->update([
            'nomeEquipamento' => $dados['nomeEquipamento'],
            'QuantidadeDisponivel' => $quantidadeD - $dados['quantidadeRemover'] + $dados['quantidadeAdicionar'],
            'QuantidadeTotal' => $quantidadeT - $dados['quantidadeRemover'] + $dados['quantidadeAdicionar'],
        ]);

        return redirect()->route('lista.equipamentos');
    }

    public function deletar($id){

        Equipamento::find($id)->delete();

        return redirect()->route('lista.equipamentos');
    }

    public function cadastro(){
        return view('cadastroequipamento');
    }

    public function index(){
        $equipamentos = Equipamento::all();
        return view('listaequipamentos', compact('equipamentos'));
    }

    public function emprestimo($id){
        $registro = Equipamento::find($id);

        return view('emprestimos.indexemprestimo', compact('registro'));
    }
}
