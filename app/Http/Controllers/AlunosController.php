<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Anamnese;
use App\AvaliacaoFuncional;
use App\ContatosDeEmergencia;
use App\Endereco;
use App\ExamesAdicionais;
use App\PerfilBioquimico;
use App\QualidadeDeVida;
use App\UsoMedicamentosContinuos;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    public function listaEspera ()
    {
        return view('listaespera');
    }

    public function index(){
        $alunos = Aluno::paginate(4);
        return view('aluno.aluno_lista', compact('alunos'));
    }

    public function cadastro(){
        return view('aluno.aluno_cadastro');
    }

    public function status($id){

        $anamneseTeste = Anamnese::find($id);
        $contatosDeEmergenciasTeste = ContatosDeEmergencia::find($id);
        $avaliacaoFuncionalTeste = AvaliacaoFuncional::find($id);
        $qualidadeDeVidasTeste = QualidadeDeVida::find($id);
        $usoMedicamentosContinuosTeste = UsoMedicamentosContinuos::find($id);
        $perfilBioquimicoTeste = PerfilBioquimico::find($id);
        $examesAdicionaisTeste = ExamesAdicionais::find($id);
        $quantasConsultasTeste = QualidadeDeVida::find($id);
        $enderecosTeste = Endereco::find($id);

        if($anamneseTeste == null){
            $anamnese = "Incompleto";
        }else{
            $anamnese = "Completo";
        }

        if($contatosDeEmergenciasTeste == null){
            $contatosDeEmergencias = "Incompleto";
        }else{
            $contatosDeEmergencias = "Completo";
        }

        if($avaliacaoFuncionalTeste == null){
            $avaliacaoFuncional = "Incompleto";
        }else{
            $avaliacaoFuncional = "Completo";
        }

        if($qualidadeDeVidasTeste == null){
            $qualidadeDeVidas = "Incompleto";
        }else{
            $qualidadeDeVidas = "Completo";
        }

        if($usoMedicamentosContinuosTeste == null){
            $usoMedicamentosContinuos = "Incompleto";
        }else{
            $usoMedicamentosContinuos = "Completo";
        }

        if($perfilBioquimicoTeste == null){
            $perfilBioquimico = "Incompleto";
        }else{
            $perfilBioquimico = "Completo";
        }

        if($examesAdicionaisTeste == null){
            $examesAdicionais = "Incompleto";
        }else{
            $examesAdicionais = "Completo";
        }

        if($quantasConsultasTeste == null){
            $quantasConsultas = "Incompleto";
        }else{
            $quantasConsultas = "Completo";
        }

        if($enderecosTeste == null){
            $enderecos = "Incompleto";
        }else{
            $enderecos = "Completo";
        }



        $aluno = Aluno::find($id);
        return view('aluno.aluno_status', compact('aluno', 'anamnese','contatosDeEmergencias','avaliacaoFuncional',
        'qualidadeDeVidas', 'usoMedicamentosContinuos', 'perfilBioquimico', 'examesAdicionais', 'quantasConsultas', 'enderecos'));
    }
}
