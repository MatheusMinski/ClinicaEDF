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
use App\User;
use App\UsoMedicamentosContinuos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

class AlunosController extends Controller
{

    //Exibir Dados Pessoais
    public function listaEspera ()
    {
        return view('listaespera');
    }

    public function index(){
        $id = Auth::user()->idProfessor;
        $alunos =  Aluno::where('idProfessor', '=', $id)->paginate(4);
        return view('aluno.aluno_lista', compact('alunos'));
    }

    public function dadosPessoais($id){
        $dadosAluno = Aluno::where('id', '=', $id)->get()->first();
        $dadosEnderecoBanco = Endereco::where('id', '=', $id)->get()->first();

        if($dadosEnderecoBanco == null){
            $dadosEndereco = ["rua"=>"Não cadastrado",
                "bairro"=>"Não cadastrado",
                "cidade"=>"Não cadastrado",
                "cep"=>"Não cadastrado",
                "numero"=>"Não cadastrado"];
        }else{
            $dadosEndereco = ["rua"=>$dadosEnderecoBanco['rua'],
                "bairro"=>$dadosEnderecoBanco['bairro'],
                "cidade"=>$dadosEnderecoBanco['cidade'],
                "cep"=>$dadosEnderecoBanco['cep'],
                "numero"=>$dadosEnderecoBanco['numero']
            ];
        }
        return view('aluno.aluno_dados_pessoais', compact('dadosAluno','dadosEndereco'));
    }
    //-----------------------------

    //Exibir Dados Treinamentos
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

        return view('aluno.aluno_status', compact('aluno', 'anamnese','avaliacaoFuncional',
            'qualidadeDeVidas', 'usoMedicamentosContinuos', 'perfilBioquimico', 'examesAdicionais', 'quantasConsultas'));
    }

    public function treinamentos($id){
        $treinamentos = AlunoTreinamento::where('idAluno', '=', $id)->paginate(4);
        $idAluno = $id;


        return view('aluno.aluno_treinamentos', compact('treinamentos','idAluno'));
    }
//-----------------------------

//Criar Novos Treinamentos

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
    //-----------------------------

    //CRUD Dados Pessoais

    public function cadastroDados(){
        return view('aluno.aluno_cadastro_dados');
    }
    public function cadastroDadosSalvar(Request $req){
        $dados = $req->all();

        try{
            $alunoNovo = Aluno::create($dados);
            $idAluno = $alunoNovo['id'];
            return $this->cadastroEndereco($idAluno);

        }catch(\Exception $ex){
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }


    }

    public function dadosEditar(){

    }
//-----------------------------

    //CRUD Enderecos

    public function cadastroEndereco($idAluno){
        return view('aluno.aluno_cadastro_endereco', compact('idAluno'));
    }

    public function cadastroEnderecoSalvar(Request $req){
        $dados = $req->all();

        try{
            Endereco::create($dados);
            return route('aluno.lista');

        }catch(\Exception $ex){
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }

    }

    public function enderecosEditar(){

    }
//-----------------------------

    //CRUD Avaliacao Funcional

    public function avaliacaoFuncional(){
        return view('aluno.aluno_cadastro_avaliacaoFuncional');
    }

    public function avaliacaoFuncionalSalvar(){

    }

    public function avaliacaoFuncionalEditar(){

    }
//-----------------------------

    //CRUD Anamnese

    public function cadastroAnamnese(){
        return view('aluno.aluno_cadastro_anamnese');
    }
//-----------------------------

    //CRUD Emergencia

    public function cadastroEmergencia(){
        return view('aluno.aluno_cadastro_emergencia');
    }
//-----------------------------

    //CRUD Qualidade de Vida

    public function cadastroQualidadeVida(){
        return view('aluno.aluno_cadastro_qualidadeVida');
    }
//-----------------------------

    //CRUD Medicamentos

    public function cadastroMedicamentos(){
        return view('aluno.aluno_cadastro_medicamentos');
    }
//-----------------------------

    //CRUD Perfil Bioquimico

    public function cadastroPerfilBioquimico(){
        return view('aluno.aluno_cadastro_perfilBioquimico');
    }
//-----------------------------

    //CRUD Exames Adicionais

    public function cadastroexamesAdicionais(){
        return view('aluno.aluno_cadastro_exames');
    }
//-----------------------------

    //CRUD Consultas

    public function cadastroConsultas(){
        return view('aluno.aluno_cadastro_consultas');
    }
//-----------------------------



}
