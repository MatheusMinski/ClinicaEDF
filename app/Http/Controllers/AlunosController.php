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
        $dadosEnderecoBanco = Endereco::where('idAluno', '=', $id)->get()->first();
        $dadosEmergencia = ContatosDeEmergencia::where('idAluno', '=', $id)->get()->first();

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

        if($dadosEmergencia == null){
            $dadosEmergencia = [
                "id" => 'Não cadastrado',
                "nome" => 'Não cadastrado',
                "parentesco" => 'Não cadastrado',
                "telefone"=>"Não cadastrado",
                ];
        }else{
            $dadosEmergencia = [
                "id" => $dadosEmergencia['id'],
                "nome" => $dadosEmergencia['nome'],
                "parentesco" => $dadosEmergencia['parentesco'],
                "telefone"=>$dadosEmergencia['telefone'],
            ];
        }

        return view('aluno.aluno_dados_pessoais', compact('dadosAluno','dadosEndereco', 'dadosEmergencia'));
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

    //CRUD Emergencia

    public function cadastroEmergencia($idAluno){
        return view('aluno.aluno_cadastro_emergencia', compact('idAluno'));
    }

    public function cadastroEmergenciaSalvar(Request $req){
        $dados = $req->all();

        try{
            ContatosDeEmergencia::create($dados);
            $id = "Lista de Alunos"; //indicador pro js redirecionar para a lista de alunos
            return redirect()->route('cadastro.sucesso',['id' => $id]);

        }catch(\Exception $ex){
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }

    }
    public function cadastroEmergenciaEditar($id){
        $dadosEmergencia = ContatosDeEmergencia::find($id);

        return view('aluno.aluno_editar_emergencia', compact('dadosEmergencia'));
    }

    public function cadastroEmergenciaUpdate(Request $req){
        $dados = $req->all();
        $antigo = ContatosDeEmergencia::find($dados['id']);

        try{

            $antigo->nome = $dados['nome'];
            $antigo->parentesco = $dados['parentesco'];
            $antigo->telefone = $dados['telefone'];
            $antigo->save();

            return $this->dadosPessoais($dados['idAluno']);

        }catch(\Exception $ex){
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }

    }
//-----------------------------

    //CRUD Avaliacao Funcional

    public function avaliacaoFuncional($idTreinamento){

        $dadosAvaliacaoFuncional = AvaliacaoFuncional::where("idTreinamento", "=", $idTreinamento)->get()->first();


        if($dadosAvaliacaoFuncional == null){
            return view('aluno.aluno_cadastro_avaliacaoFuncional', compact('idTreinamento'));
        } else{
            return view('aluno.aluno_avaliacao_funcional', compact('dadosAvaliacaoFuncional'));
        }

    }

    public function avaliacaoFuncionalSalvar(Request $req){
        $dados = $req->all();


        try{
            AvaliacaoFuncional::create($dados);
            return $this->treinamentoStatus($dados['idTreinamento']);

        }catch(\Exception $ex){
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }




    }

    public function avaliacaoFuncionalEditar($idTreinamento){
        $dadosAvaliacaoFuncional = AvaliacaoFuncional::where("idTreinamento", "=", $idTreinamento)->get()->first();

        return view('aluno.aluno_editar_avaliacao_funcional', compact('dadosAvaliacaoFuncional'));
    }

    public function avaliacaoFuncionalUpdate(Request $req){

        $dados = $req->all();


        $dadosAntigos = AvaliacaoFuncional::where("idTreinamento", "=", $dados['idTreinamento'])->get()->first();


        try{
            $dadosAntigos->pressaoArterialPAS = $dados['pressaoArterialPAS'];
            $dadosAntigos->pressaoArterialPAD = $dados['pressaoArterialPAD'];
            $dadosAntigos->freqCardiacaMedia = $dados['freqCardiacaMedia'];
            $dadosAntigos->saturacaoO2 = $dados['saturacaoO2'];
            $dadosAntigos->capacidadeVital1 = $dados['capacidadeVital1'];
            $dadosAntigos->capacidadeVital2 = $dados['capacidadeVital2'];
            $dadosAntigos->capacidadeVital3 = $dados['capacidadeVital3'];
            $dadosAntigos->massaCorporal = $dados['massaCorporal'];
            $dadosAntigos->estaturaCm = $dados['estaturaCm'];
            $dadosAntigos->circunferenciaCintura = $dados['circunferenciaCintura'];
            $dadosAntigos->circunferenciaPescoco = $dados['circunferenciaPescoco'];
            $dadosAntigos->massaMagra = $dados['massaMagra'];
            $dadosAntigos->gordura = $dados['gordura'];
            $dadosAntigos->h2o = $dados['h2o'];
            $dadosAntigos->tmb = $dados['tmb'];
            $dadosAntigos->sentarEAlcancarMaior = $dados['sentarEAlcancarMaior'];
            $dadosAntigos->ombroDireito = $dados['ombroDireito'];
            $dadosAntigos->ombroEsquerdo = $dados['ombroEsquerdo'];
            $dadosAntigos->apoioUnipodalDireita = $dados['apoioUnipodalDireita'];
            $dadosAntigos->apoioUnipodalEsquerda = $dados['apoioUnipodalEsquerda'];
            $dadosAntigos->alcanceFuncional = $dados['alcanceFuncional'];
            $dadosAntigos->pressaoManualDireita = $dados['pressaoManualDireita'];
            $dadosAntigos->pressaoManualEsquerda = $dados['pressaoManualEsquerda'];
            $dadosAntigos->sentarLevantarCadeiraRep = $dados['sentarLevantarCadeiraRep'];
            $dadosAntigos->sentarLevantarCadeiraFCMax = $dados['sentarLevantarCadeiraFCMax'];
            $dadosAntigos->distanciaTeste6Min = $dados['distanciaTeste6Min'];
            $dadosAntigos->pedometroTeste6Min = $dados['pedometroTeste6Min'];
            $dadosAntigos->fcTeste6Min1 = $dados['fcTeste6Min1'];
            $dadosAntigos->fcTeste6Min2 = $dados['fcTeste6Min2'];
            $dadosAntigos->fcTeste6Min3 = $dados['fcTeste6Min3'];
            $dadosAntigos->fcTeste6Min4 = $dados['fcTeste6Min4'];
            $dadosAntigos->fcTeste6Min5 = $dados['fcTeste6Min5'];
            $dadosAntigos->fcTeste6Min6 = $dados['fcTeste6Min6'];
            $dadosAntigos->fcRecuperacaoUmMin = $dados['fcRecuperacaoUmMin'];
            $dadosAntigos->fcRecuperacaoTresMin = $dados['fcRecuperacaoTresMin'];
            $dadosAntigos->fcRecuperacaoCincoMin = $dados['fcRecuperacaoCincoMin'];
            $dadosAntigos->pasTesteUmMin = $dados['pasTesteUmMin'];
            $dadosAntigos->pasTesteCincoMin = $dados['pasTesteCincoMin'];
            $dadosAntigos->pasTesteDezMin = $dados['pasTesteDezMin'];
            $dadosAntigos->padTesteUmMin = $dados['padTesteUmMin'];
            $dadosAntigos->padTesteCincoMin = $dados['padTesteCincoMin'];
            $dadosAntigos->padTesteDezMin = $dados['padTesteDezMin'];
            $dadosAntigos->testeExtra1 = $dados['testeExtra1'];
            $dadosAntigos->respostaTesteExtraUm = $dados['respostaTesteExtraUm'];
            $dadosAntigos->testeExtra2 = $dados['testeExtra2'];
            $dadosAntigos->respostaTesteExtraDois = $dados['respostaTesteExtraDois'];
            $dadosAntigos->testeExtra3 = $dados['testeExtra3'];
            $dadosAntigos->respostaTesteExtraTres = $dados['respostaTesteExtraTres'];
            $dadosAntigos->testeExtra4 = $dados['testeExtra4'];
            $dadosAntigos->respostaTesteExtraQuatro = $dados['respostaTesteExtraQuatro'];


            $dadosAntigos->save();

            $dadosAvaliacaoFuncional = AvaliacaoFuncional::where("idTreinamento", "=", $dados['idTreinamento'])->get()->first();

            return view('aluno.aluno_avaliacao_funcional', compact('dadosAvaliacaoFuncional'));

        }catch(\Exception $ex){
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }




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

    public function cadastroPerfilBioquimico($idTreinamento){

        $dadosPerfilBioquimico = PerfilBioquimico::where("idTreinamento", "=", $idTreinamento)->get()->first();


        if($dadosPerfilBioquimico == null){
            return view('aluno.aluno_cadastro_perfilBioquimico', compact('idTreinamento'));
        } else{
            return view('aluno.aluno_perfil_bioquimico', compact('dadosPerfilBioquimico'));
        }

    }

    public function cadastroPerfilBioquimicoSalvar(Request $req){
        $dados = $req->all();

        try{
            PerfilBioquimico::create($dados);
            return $this->treinamentoStatus($dados['idTreinamento']);

        }catch(\Exception $ex){
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }
    }

    public function cadastroPerfilBioquimicoEditar($idTreinamento){

        $dadosPerfilBioquimico = PerfilBioquimico::where("idTreinamento", "=", $idTreinamento)->get()->first();

        return view('aluno.aluno_editar_perfil_bioquimico', compact('dadosPerfilBioquimico'));

    }

    public function cadastroPerfilBioquimicoUpdate(Request $req){
        $dados = $req->all();

        try{

            $dadosAntigos = PerfilBioquimico::where("idTreinamento", "=", $dados['idTreinamento'])->get()->first();

            $dadosAntigos->glicemiaDataUm = $dados['glicemiaDataUm'];
            $dadosAntigos->glicemiaValorUm = $dados['glicemiaValorUm'];
            $dadosAntigos->glicemiaDataDois = $dados['glicemiaDataDois'];
            $dadosAntigos->glicemiaValorDois = $dados['glicemiaValorDois'];
            $dadosAntigos->insulinaDataUm = $dados['insulinaDataUm'];
            $dadosAntigos->insulinaValorUm = $dados['insulinaValorUm'];
            $dadosAntigos->insulinaDataDois = $dados['insulinaDataDois'];
            $dadosAntigos->insulinaValorDois = $dados['insulinaValorDois'];
            $dadosAntigos->creatinaDataUm = $dados['creatinaDataUm'];
            $dadosAntigos->creatinaValorUm = $dados['creatinaValorUm'];
            $dadosAntigos->creatinaDataDois = $dados['creatinaDataDois'];
            $dadosAntigos->creatinaValorDois = $dados['creatinaValorDois'];
            $dadosAntigos->ctDataUm = $dados['ctDataUm'];
            $dadosAntigos->ctValorUm = $dados['ctValorUm'];
            $dadosAntigos->ctDataDois = $dados['ctDataDois'];
            $dadosAntigos->ctValorDois = $dados['ctValorDois'];
            $dadosAntigos->hdlDataUm = $dados['hdlDataUm'];
            $dadosAntigos->hdlValorUm = $dados['hdlValorUm'];
            $dadosAntigos->hdlDataDois = $dados['hdlDataDois'];
            $dadosAntigos->hdlValorDois = $dados['hdlValorDois'];
            $dadosAntigos->ldlDataUm = $dados['ldlDataUm'];
            $dadosAntigos->ldlValorUm = $dados['ldlValorUm'];
            $dadosAntigos->ldlDataDois = $dados['ldlDataDois'];
            $dadosAntigos->ldlValorDois = $dados['ldlValorDois'];
            $dadosAntigos->tgDataUm = $dados['tgDataUm'];
            $dadosAntigos->tgValorUm = $dados['tgValorUm'];
            $dadosAntigos->tgDataDois = $dados['tgDataDois'];
            $dadosAntigos->tgValorDois = $dados['tgValorDois'];

            $dadosAntigos->save();
            $dadosPerfilBioquimico = PerfilBioquimico::where("idTreinamento", "=", $dados['idTreinamento'])->get()->first();

            return view('aluno.aluno_perfil_bioquimico', compact('dadosPerfilBioquimico'));

        }catch(\Exception $ex){
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }


    }

//-----------------------------

    //CRUD Exames Adicionais

    public function cadastroexamesAdicionais($idTreinamento){

        $dadosExamesAdicionais = ExamesAdicionais::where("idTreinamento", "=", $idTreinamento)->paginate(5);

        return view('aluno.aluno_cadastro_exames', compact('dadosExamesAdicionais', 'idTreinamento'));


    }

    public function cadastroexamesAdicionaisSalvar(Request $req){
        $dados = $req->all();
        try{
            ExamesAdicionais::create($dados);
            $dadosExamesAdicionais = ExamesAdicionais::where("idTreinamento", "=", $dados['idTreinamento'])->paginate(5);
            $idTreinamento = $dados['idTreinamento'];

            return view('aluno.aluno_cadastro_exames', compact('dadosExamesAdicionais','idTreinamento'));
        }catch(\Exception $ex){
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }
    }

    public function cadastroexamesAdicionaisEditar($idExameAdicional, $idTreinamento){
        $dadosExameAdicional = ExamesAdicionais::find($idExameAdicional);

        return view('aluno.aluno_editar_exames', compact('dadosExameAdicional', 'idTreinamento'));

    }

    public function cadastroexamesAdicionaisUpdate(Request $req){
        $dados = $req->all();

        $dadosAntigos = ExamesAdicionais::find($dados['id']);

        $dadosAntigos->tipoDoExame = $dados['tipoDoExame'];
        $dadosAntigos->dataExame = $dados['dataExame'];
        $dadosAntigos->resultadosPrincipais = $dados['resultadosPrincipais'];


        $dadosAntigos->save();
        $dadosExamesAdicionais = ExamesAdicionais::where("idTreinamento", "=", $dados['idTreinamento'])->paginate(5);

        $idTreinamento = $dados['idTreinamento'];
        try{
            return view('aluno.aluno_cadastro_exames', compact('dadosExamesAdicionais','idTreinamento'));

        }catch(\Exception $ex){
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }
    }

//-----------------------------

    //CRUD Consultas

    public function cadastroConsultas(){
        return view('aluno.aluno_cadastro_consultas');
    }
//-----------------------------



}
