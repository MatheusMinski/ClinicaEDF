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

    public function cadastro(){
        return view('cadastroequipamento');
    }

    public function index(){
        $equipamentos = Equipamento::all();
        return view('listaequipamentos', compact('equipamentos'));
    }
}
