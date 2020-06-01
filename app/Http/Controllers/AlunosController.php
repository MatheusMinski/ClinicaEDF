<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\AlunoTreinamento;
use App\Anamnese;
use App\AvaliacaoFuncional;
use App\ContatosDeEmergencia;
use App\Endereco;
use App\ExamesAdicionais;
use App\PerfilBioquimico;
use App\QualidadeDeVida;
use App\UsoMedicamentosContinuos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

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



    public function cadastroDados(){
        return view('aluno.aluno_cadastro_dados');
    }

    public function cadastroEndereco(){
        return view('aluno.aluno_cadastro_endereco');
    }

    public function avaliacaoFuncional(){
        return view('aluno.aluno_cadastro_avaliacaoFuncional');
    }



    public function cadastroAnamnese(){
        return view('aluno.aluno_cadastro_anamnese');
    }

    public function cadastroEmergencia(){
        return view('aluno.aluno_cadastro_emergencia');
    }

    public function cadastroQualidadeVida(){
        return view('aluno.aluno_cadastro_qualidadeVida');
    }

    public function cadastroMedicamentos(){
        return view('aluno.aluno_cadastro_medicamentos');
    }

    public function cadastroPerfilBioquimico(){
        return view('aluno.aluno_cadastro_perfilBioquimico');
    }

    public function cadastroexamesAdicionais(){
        return view('aluno.aluno_cadastro_exames');
    }

    public function cadastroConsultas(){
        return view('aluno.aluno_cadastro_consultas');
    }



    public function treinamentoStatus($id){

        $anamneseTeste = Anamnese::where('idTreinamento', '=', $id)->paginate(4);
        $avaliacaoFuncionalTeste = AvaliacaoFuncional::where('idTreinamento', '=', $id)->paginate(4);
        $qualidadeDeVidasTeste = QualidadeDeVida::where('idTreinamento', '=', $id)->paginate(4);
        $usoMedicamentosContinuosTeste = UsoMedicamentosContinuos::where('idTreinamento', '=', $id)->paginate(4);
        $perfilBioquimicoTeste = PerfilBioquimico::where('idTreinamento', '=', $id)->paginate(4);
        $examesAdicionaisTeste = ExamesAdicionais::where('idTreinamento', '=', $id)->paginate(4);
        $quantasConsultasTeste = QualidadeDeVida::where('idTreinamento', '=', $id)->paginate(4);

        if(count($anamneseTeste) == 0){
            $anamnese = "Incompleto";
        }else{
            $anamnese = "Completo";
        }


        if(count($avaliacaoFuncionalTeste) == 0){
            $avaliacaoFuncional = "Incompleto";
        }else{
            $avaliacaoFuncional = "Completo";
        }

        if(count($qualidadeDeVidasTeste) == 0){
            $qualidadeDeVidas = "Incompleto";
        }else{
            $qualidadeDeVidas = "Completo";
        }

        if(count($usoMedicamentosContinuosTeste) == 0){
            $usoMedicamentosContinuos = "Incompleto";
        }else{
            $usoMedicamentosContinuos = "Completo";
        }

        if(count($perfilBioquimicoTeste) == 0){
            $perfilBioquimico = "Incompleto";
        }else{
            $perfilBioquimico = "Completo";
        }

        if(count($examesAdicionaisTeste) == 0){
            $examesAdicionais = "Incompleto";
        }else{
            $examesAdicionais = "Completo";
        }

        if(count($quantasConsultasTeste) == 0){
            $quantasConsultas = "Incompleto";
        }else{
            $quantasConsultas = "Completo";
        }

        $aluno = Aluno::find($id);

        return view('aluno.aluno_status', compact('aluno', 'anamnese','contatosDeEmergencias','avaliacaoFuncional',
        'qualidadeDeVidas', 'usoMedicamentosContinuos', 'perfilBioquimico', 'examesAdicionais', 'quantasConsultas', 'enderecos'));
    }

    public function treinamentos($id){
        $treinamentos = AlunoTreinamento::where('idAluno', '=', $id)->paginate(4);
        $idAluno = $id;


        return view('aluno.aluno_treinamentos', compact('treinamentos','idAluno'));
    }

    public function treinamentoAdicionar($idAluno){
        $idProfessor = Auth::user()->idProfessor;
        $idProfessorAluno = Aluno::find($idAluno)->idProfessor;

        if($idProfessor == $idProfessorAluno){
            try {
                AlunoTreinamento::create([
                    'idAluno' => $idAluno,
                ]);
                return redirect()->back();
            }catch (Exception $e){
                return redirect()->back()->withErrors(['Ocorreu um erro ao adicionar treinamento']);
            }
        }else{
            return redirect()->back()->withErrors(['Permissão negada']);
        }

        return view('aluno.aluno_treinamentos', compact('treinamentos'));
    }

    public function cadastroSalvar(){
        return $this->index();
    }

}
