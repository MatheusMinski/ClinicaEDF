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

    //Sucesso no cadastro PRG

    public function sucessoCadastro($idAluno){
        return view('aluno.cadastro_sucesso', compact('idAluno'));
    }


    public function listaEspera ()
    {
        return view('listaespera');
    }

    public function index(){
        $id = Auth::user()->idProfessor;
        $alunos =  Aluno::where('idProfessor', '=', $id)->paginate(4);
        return view('aluno.aluno_lista', compact('alunos'));
    }

    //-----------------------------

    //Exibir Dados Treinamentos
    public function treinamentoStatus($idTreinamento){

        $aluno = AlunoTreinamento::find($idTreinamento)->idAluno;


        return view('aluno.aluno_status', compact('aluno', 'idTreinamento'));
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

    public function dadosPessoais($id){
        $dadosAluno = Aluno::where('id', '=', $id)->get()->first();
        $dadosEnderecoBanco = Endereco::where('id', '=', $id)->get()->first();

        if($dadosEnderecoBanco == null){
            $dadosEndereco = [
                "id" => 'Não cadastrado',
                "idAluno" => 'Não cadastrado',
                "rua"=>"Não cadastrado",
                "bairro"=>"Não cadastrado",
                "cidade"=>"Não cadastrado",
                "cep"=>"Não cadastrado",
                "numero"=>"Não cadastrado"];
        }else{
            $dadosEndereco = [
                "id" => $dadosEnderecoBanco['id'],
                "idAluno" => $dadosEnderecoBanco['idAluno'],
                "rua"=>$dadosEnderecoBanco['rua'],
                "bairro"=>$dadosEnderecoBanco['bairro'],
                "cidade"=>$dadosEnderecoBanco['cidade'],
                "cep"=>$dadosEnderecoBanco['cep'],
                "numero"=>$dadosEnderecoBanco['numero']
            ];
        }
        return view('aluno.aluno_dados_pessoais', compact('dadosAluno','dadosEndereco'));
    }

    public function cadastroDados(){
        return view('aluno.aluno_cadastro_dados');
    }

    public function cadastroDadosSalvar(Request $req){
        $dados = $req->all();

        try{
            $alunoNovo = Aluno::create($dados);
            $id = $alunoNovo['id'];
            return redirect()->route('cadastro.sucesso',['id' => $id]);

        }catch(\Exception $ex){
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }


    }

    public function cadastroDadosEditar($id){
        $dadosAluno = Aluno::find($id);

        return view('aluno.aluno_editar_dados_pessoais', compact('dadosAluno'));
    }

    public function cadastroDadosUpdate(Request $req){
        $dados = $req->all();
        $antigo = Aluno::find($dados['id']);

        try{

            $antigo->nome = $dados['nome'];
            $antigo->dataNasc = $dados['dataNasc'];
            $antigo->idade = $dados['idade'];
            $antigo->sexo = $dados['sexo'];
            $antigo->telefone = $dados['telefone'];
            $antigo->email = $dados['email'];
            $antigo->profissao = $dados['profissao'];
            $antigo->aposentado = $dados['aposentado'];
            $antigo->estadoCivil = $dados['estadoCivil'];
            $antigo->escolaridade = $dados['escolaridade'];
            $antigo->classeSocialFamilia = $dados['classeSocialFamilia'];
            $antigo->save();

            return $this->dadosPessoais($dados['id']);

        }catch(\Exception $ex){
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }

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
            $id = "Lista de Alunos"; //indicador pro js redirecionar para a lista de alunos
            return redirect()->route('cadastro.sucesso',['id' => $id]);

        }catch(\Exception $ex){
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }

    }

    public function cadastroEnderecoEditar($id){
        $dadosEndereco = Endereco::find($id);

        return view('aluno.aluno_editar_endereco', compact('dadosEndereco'));
    }

    public function cadastroEnderecoUpdate(Request $req){
        $dados = $req->all();
        $antigo = Endereco::find($dados['id']);

        try{

            $antigo->rua = $dados['rua'];
            $antigo->numero = $dados['numero'];
            $antigo->bairro = $dados['bairro'];
            $antigo->cidade = $dados['cidade'];
            $antigo->cep = $dados['cep'];
            $antigo->save();

            return $this->dadosPessoais($dados['idAluno']);

        }catch(\Exception $ex){
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }

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

    public function cadastroAnamnese($idTreinamento){
        $dadosAnamnese = Anamnese::where("idTreinamento", "=", $idTreinamento)->get()->first();


        if($dadosAnamnese == null){
            return view('aluno.aluno_cadastro_anamnese', compact('idTreinamento'));
        } else{
            return view('aluno.aluno_anamnese', compact('dadosAnamnese'));
        }

    }

    public function cadastroAnamneseSalvar(Request $req){
        $dados = $req->all();

        try{

            Anamnese::create($dados);

            return $this->treinamentoStatus($dados['idTreinamento']);

        }catch(\Exception $ex){
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }
    }


    public function cadastroAnamneseEditar($idTreinamento){

        $dadosAnamnese = Anamnese::where("idTreinamento", "=", $idTreinamento)->get()->first();

        return view('aluno.aluno_editar_anamnese', compact('dadosAnamnese'));

    }

    public function cadastroAnamneseUpdate(Request $req){
        $dados = $req->all();


        $dadosAntigos = Anamnese::where("idTreinamento", "=", $dados['idTreinamento'])->get()->first();

        $dadosAntigos->encaminhamento = $dados['encaminhamento'];
        $dadosAntigos->nomeDoProfissional = $dados['nomeDoProfissional'];
        $dadosAntigos->especialidadeDoProfissional = $dados['especialidadeDoProfissional'];
        $dadosAntigos->motivoEncaminhamento = $dados['motivoEncaminhamento'];
        $dadosAntigos->saudeGeral = $dados['saudeGeral'];
        $dadosAntigos->fumaCigarro = $dados['fumaCigarro'];
        $dadosAntigos->fumaCigarroQuantidadeDia = $dados['fumaCigarroQuantidadeDia'];
        $dadosAntigos->jaFumou = $dados['jaFumou'];
        $dadosAntigos->jaFumouQuantidadeAnos = $dados['jaFumouQuantidadeAnos'];
        $dadosAntigos->jaFumouParouAQuantoTempoAnos = $dados['jaFumouParouAQuantoTempoAnos'];
        $dadosAntigos->descricaoProblemaSaude = $dados['descricaoProblemaSaude'];
        $dadosAntigos->caiu12Meses = $dados['caiu12Meses'];
        $dadosAntigos->quantasQuedas = $dados['quantasQuedas'];
        $dadosAntigos->data = $dados['data'];
        $dadosAntigos->razaoQueda = $dados['razaoQueda'];
        $dadosAntigos->localQueda = $dados['localQueda'];
        $dadosAntigos->hospitalizacao = $dados['hospitalizacao'];
        $dadosAntigos->objetivosAoProcurarAClinica = $dados['objetivosAoProcurarAClinica'];
        $dadosAntigos->jaTentouResolverAntes = $dados['jaTentouResolverAntes'];
        $dadosAntigos->quantasVezes = $dados['quantasVezes'];
        $dadosAntigos->jaDesistiu = $dados['jaDesistiu'];
        $dadosAntigos->motivoDesistencia = $dados['motivoDesistencia'];
        $dadosAntigos->dorRegiaoDoCorpo = $dados['dorRegiaoDoCorpo'];
        $dadosAntigos->descricaoSintomaDor1 = $dados['descricaoSintomaDor1'];
        $dadosAntigos->ProfissionalQueTratou1 = $dados['ProfissionalQueTratou1'];
        $dadosAntigos->inicioFim1 = $dados['inicioFim1'];
        $dadosAntigos->EVA1 = $dados['EVA1'];
        $dadosAntigos->descricaoSintomaDor2 = $dados['descricaoSintomaDor2'];
        $dadosAntigos->ProfissionalQueTratou2 = $dados['ProfissionalQueTratou2'];
        $dadosAntigos->inicioFim2 = $dados['inicioFim2'];
        $dadosAntigos->EVA2 = $dados['EVA2'];
        $dadosAntigos->descricaoSintomaDor3 = $dados['descricaoSintomaDor3'];
        $dadosAntigos->ProfissionalQueTratou3 = $dados['ProfissionalQueTratou3'];
        $dadosAntigos->inicioFim3 = $dados['inicioFim3'];
        $dadosAntigos->EVA3 = $dados['EVA3'];
        $dadosAntigos->descricaoSintomaDor4 = $dados['descricaoSintomaDor4'];
        $dadosAntigos->ProfissionalQueTratou4 = $dados['ProfissionalQueTratou4'];
        $dadosAntigos->inicioFim4 = $dados['inicioFim4'];
        $dadosAntigos->EVA4 = $dados['EVA4'];
        $dadosAntigos->esforcosTarefaCasa = $dados['esforcosTarefaCasa'];
        $dadosAntigos->esforcoAndarForaDeCasa = $dados['esforcoAndarForaDeCasa'];
        $dadosAntigos->esforcoLazer = $dados['esforcoLazer'];
        $dadosAntigos->esforcoTrabalho = $dados['esforcoTrabalho'];
        $dadosAntigos->exercicioFisicoRegular = $dados['exercicioFisicoRegular'];
        $dadosAntigos->quantasVezesSemana = $dados['quantasVezesSemana'];
        $dadosAntigos->esforcoParaEsseExercicio = $dados['esforcoParaEsseExercicio'];


        $dadosAntigos->save();
        $dadosAnamnese = Anamnese::where("idTreinamento", "=", $dados['idTreinamento'])->get()->first();

        return view('aluno.aluno_anamnese', compact('dadosAnamnese'));

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
