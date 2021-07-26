<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\AlunoTreinamento;
use App\Anamnese;
use App\AvaliacaoFuncional;
use App\ContatosDeEmergencia;
use App\Endereco;
use App\ExamesAdicionais;
use App\Http\Controllers\Exportar\ExportarDadosAluno;
use App\Http\Requests\AnamneseRequest;
use App\PerfilBioquimico;
use App\QuantasConsultas;
use App\UsoMedicamentosContinuos;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AlunosController extends Controller
{
    public $dataAdapter;

    public function __construct()
    {
        $this->dataAdapter = new DataAdapter();
    }


    //Sucesso no cadastro PRG

    public function sucessoCadastro($idAluno)
    {
        return view('aluno.cadastro_sucesso', compact('idAluno'));
    }

    public function listaEspera()
    {
        return view('listaespera');
    }

    public function index()
    {
        $id = Auth::user()->idProfessor;
        $alunos = Aluno::where('idProfessor', '=', $id)->paginate(4);
        return view('aluno.aluno_lista', compact('alunos'));
    }

    public function treinamentos($id)
    {
        if (!$this->verificarProfessorAluno($id) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }
        $treinamentos = AlunoTreinamento::where('idAluno', '=', $id)->paginate(4);
        $aluno = Aluno::find($id);
        $idAluno = $id;


        return view('aluno.aluno_treinamentos', compact('treinamentos', 'idAluno', 'aluno'));
    }

    public function verificarProfessorAluno($idAluno)
    {
        $idLogado = Auth::user()->idProfessor;
        $idProfessorAluno = Aluno::find($idAluno)->idProfessor;
        if ($idLogado != $idProfessorAluno) {
            return False;
        } else {
            return True;
        }
    }

    //-----------------------------

    //Exibir Dados Treinamentos

    public function treinamentoAdicionar($idAluno)
    {

        if (!$this->verificarProfessorAluno($idAluno) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }
        try {
            AlunoTreinamento::create([
                'idAluno' => $idAluno,
            ]);
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['Ocorreu um erro ao adicionar treinamento']);
        }

    }

    public function cadastroDados()
    {
        return view('aluno.aluno_cadastro_dados');
    }
//-----------------------------

//Criar Novos Treinamentos

    public function cadastroDadosSalvar(Request $req)
    {
        $dados = $req->all();

        try {

            $dataNascFormatada = DateTime::createFromFormat('d/m/Y', $dados['dataNasc']);

            $dados['dataNasc'] = $dataNascFormatada;

            $alunoNovo = Aluno::create($dados);

            $id = $alunoNovo['id'];
            return redirect()->route('cadastro.sucesso', ['id' => $id]);

        } catch (\Exception $ex) {
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }


    }
    //-----------------------------
    //-----------------------------

    //CRUD Dados Pessoais

    public function cadastroDadosEditar($id)
    {
        if (!$this->verificarProfessorAluno($id) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        $dadosAluno = Aluno::find($id);

        return view('aluno.aluno_editar_dados_pessoais', compact('dadosAluno'));
    }

    public function cadastroDadosUpdate(Request $req)
    {
        $dados = $req->all();
        $antigo = Aluno::find($dados['id']);

        if (!$this->verificarProfessorAluno($dados['id']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        try {

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

        } catch (\Exception $ex) {
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }

    }

    public function dadosPessoais($id)
    {
        if (!$this->verificarProfessorAluno($id) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        $dadosAluno = Aluno::where('id', '=', $id)->get()->first();
        $dadosEnderecoBanco = Endereco::where('idAluno', '=', $id)->get()->first();
        $dadosEmergencia = ContatosDeEmergencia::where('idAluno', '=', $id)->get()->first();

        if ($dadosEnderecoBanco == null) {
            $dadosEndereco = [
                "id" => 'Não cadastrado',
                "idAluno" => 'Não cadastrado',
                "rua" => "Não cadastrado",
                "bairro" => "Não cadastrado",
                "cidade" => "Não cadastrado",
                "cep" => "Não cadastrado",
                "numero" => "Não cadastrado"];
        } else {
            $dadosEndereco = [
                "id" => $dadosEnderecoBanco['id'],
                "idAluno" => $dadosEnderecoBanco['idAluno'],
                "rua" => $dadosEnderecoBanco['rua'],
                "bairro" => $dadosEnderecoBanco['bairro'],
                "cidade" => $dadosEnderecoBanco['cidade'],
                "cep" => $dadosEnderecoBanco['cep'],
                "numero" => $dadosEnderecoBanco['numero']
            ];
        }

        if ($dadosEmergencia == null) {
            $dadosEmergencia = [
                "id" => 'Não cadastrado',
                "nome" => 'Não cadastrado',
                "parentesco" => 'Não cadastrado',
                "telefone" => "Não cadastrado",
            ];
        } else {
            $dadosEmergencia = [
                "id" => $dadosEmergencia['id'],
                "nome" => $dadosEmergencia['nome'],
                "parentesco" => $dadosEmergencia['parentesco'],
                "telefone" => $dadosEmergencia['telefone'],
            ];
        }

        return view('aluno.aluno_dados_pessoais', compact('dadosAluno', 'dadosEndereco', 'dadosEmergencia'));
    }

    public function cadastroEndereco($idAluno)
    {
        if (!$this->verificarProfessorAluno($idAluno) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }
        return view('aluno.aluno_cadastro_endereco', compact('idAluno'));
    }

    public function cadastroEnderecoSalvar(Request $req)
    {
        $dados = $req->all();
        if (!$this->verificarProfessorAluno($dados['idAluno']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }
        try {
            Endereco::create($dados);
            $id = "Lista de Alunos"; //indicador pro js redirecionar para a lista de alunos
            return redirect()->route('cadastro.sucesso', ['id' => $id]);

        } catch (\Exception $ex) {
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }

    }
//-----------------------------

    //CRUD Enderecos

    public function cadastroEnderecoEditar($id)
    {
        $dadosEndereco = Endereco::find($id);

        if (!$this->verificarProfessorAluno($dadosEndereco['idAluno']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        return view('aluno.aluno_editar_endereco', compact('dadosEndereco'));
    }

    public function cadastroEnderecoUpdate(Request $req)
    {
        $dados = $req->all();
        $antigo = Endereco::find($dados['id']);

        if (!$this->verificarProfessorAluno($antigo['idAluno']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        try {

            $antigo->rua = $dados['rua'];
            $antigo->numero = $dados['numero'];
            $antigo->bairro = $dados['bairro'];
            $antigo->cidade = $dados['cidade'];
            $antigo->cep = $dados['cep'];
            $antigo->save();

            return $this->dadosPessoais($dados['idAluno']);

        } catch (\Exception $ex) {
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }

    }

    public function cadastroEmergencia($idAluno)
    {
        if (!$this->verificarProfessorAluno($idAluno) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }
        return view('aluno.aluno_cadastro_emergencia', compact('idAluno'));
    }

    public function cadastroEmergenciaSalvar(Request $req)
    {
        $dados = $req->all();
        if (!$this->verificarProfessorAluno($dados['idAluno']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        try {
            ContatosDeEmergencia::create($dados);
            $id = "Lista de Alunos"; //indicador pro js redirecionar para a lista de alunos
            return redirect()->route('cadastro.sucesso', ['id' => $id]);

        } catch (\Exception $ex) {
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }

    }


//-----------------------------

    //CRUD Emergencia

    public function cadastroEmergenciaEditar($id)
    {
        $dadosEmergencia = ContatosDeEmergencia::find($id);
        if (!$this->verificarProfessorAluno($dadosEmergencia['idAluno']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        return view('aluno.aluno_editar_emergencia', compact('dadosEmergencia'));
    }

    public function cadastroEmergenciaUpdate(Request $req)
    {
        $dados = $req->all();
        $antigo = ContatosDeEmergencia::find($dados['id']);
        if (!$this->verificarProfessorAluno($antigo['idAluno']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        try {

            $antigo->nome = $dados['nome'];
            $antigo->parentesco = $dados['parentesco'];
            $antigo->telefone = $dados['telefone'];
            $antigo->save();

            return $this->dadosPessoais($dados['idAluno']);

        } catch (\Exception $ex) {
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }

    }

    public function avaliacaoFuncional($idTreinamento)
    {

        if (!$this->verificarProfessorTreinamento($idTreinamento) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        $dadosAvaliacaoFuncional = AvaliacaoFuncional::where("idTreinamento", "=", $idTreinamento)->get()->first();


        if ($dadosAvaliacaoFuncional == null) {
            return view('aluno.aluno_cadastro_avaliacaoFuncional', compact('idTreinamento'));
        } else {
            return view('aluno.aluno_avaliacao_funcional', compact('dadosAvaliacaoFuncional'));
        }

    }

    public function verificarProfessorTreinamento($idTreinamento)
    {
        $idLogado = Auth::user()->idProfessor;
        $idAluno = AlunoTreinamento::find($idTreinamento)->idAluno;
        $idProfessorAluno = Aluno::find($idAluno)->idProfessor;
        if ($idLogado != $idProfessorAluno) {
            return False;
        } else {
            return True;
        }
    }

    //-----------------------------
    //-----------------------------

    //CRUD Avaliacao Funcional

    public function avaliacaoFuncionalSalvar(Request $req)
    {
        $dados = $req->all();

        if (!$this->verificarProfessorTreinamento($dados['idTreinamento']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        AvaliacaoFuncional::create($dados);

        return $this->treinamentoStatus($dados['idTreinamento']);


    }

    public function treinamentoStatus($idTreinamento)
    {
        if (!$this->verificarProfessorTreinamento($idTreinamento) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        $aluno = AlunoTreinamento::find($idTreinamento)->idAluno;

        $nome = Aluno::find($aluno)->nome;


        return view('aluno.aluno_status', compact('aluno', 'idTreinamento', 'nome'));
    }

    public function avaliacaoFuncionalEditar($idTreinamento)
    {
        if (!$this->verificarProfessorTreinamento($idTreinamento) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }
        $dadosAvaliacaoFuncional = AvaliacaoFuncional::where("idTreinamento", "=", $idTreinamento)->get()->first();

        return view('aluno.aluno_editar_avaliacao_funcional', compact('dadosAvaliacaoFuncional'));
    }

    public function avaliacaoFuncionalUpdate(Request $req)
    {

        $dados = $req->all();


        if (!$this->verificarProfessorTreinamento($dados['idTreinamento']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        $aval = AvaliacaoFuncional::where("idTreinamento", "=", $dados['idTreinamento'])->get()->first();


        $aval->update($dados);

        $dadosAvaliacaoFuncional = AvaliacaoFuncional::where("idTreinamento", "=", $dados['idTreinamento'])->get()->first();

        return view('aluno.aluno_avaliacao_funcional', compact('dadosAvaliacaoFuncional'));


    }


    //-----------------------------
    //-----------------------------

    //CRUD Anamnese

    public function cadastroAnamnese($idTreinamento)
    {

        if (!$this->verificarProfessorTreinamento($idTreinamento) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        $dadosAnamnese = Anamnese::where("idTreinamento", "=", $idTreinamento)->get()->first();


        if ($dadosAnamnese == null) {
            return view('aluno.aluno_cadastro_anamnese', compact('idTreinamento'));
        } else {
            return view('aluno.aluno_anamnese', compact('dadosAnamnese'));
        }

    }

    public function cadastroAnamneseSalvar(AnamneseRequest $req)
    {
        $dados = $req->validated();

        if (!$this->verificarProfessorTreinamento($dados['idTreinamento']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        $dados = $this->dataAdapter->formatarDataArmazenarAnamnese($dados);
        Anamnese::create($dados);

        return $this->treinamentoStatus($dados['idTreinamento']);
    }


    public function cadastroAnamneseEditar($idTreinamento)
    {

        if (!$this->verificarProfessorTreinamento($idTreinamento) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        $dadosAnamnese = Anamnese::where("idTreinamento", "=", $idTreinamento)->get()->first();

        return view('aluno.aluno_editar_anamnese', compact('dadosAnamnese'));

    }

    public function cadastroAnamneseUpdate(AnamneseRequest $req)
    {
        $dados = $req->validated();

        if (!$this->verificarProfessorTreinamento($dados['idTreinamento']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        $anamnese = Anamnese::where("idTreinamento", "=", $dados['idTreinamento'])->get()->first();

        $dados = $this->dataAdapter->formatarDataArmazenarAnamnese($dados);

        $anamnese->update($dados);

        $dadosAnamnese = Anamnese::where("idTreinamento", "=", $dados['idTreinamento'])->get()->first();

        return view('aluno.aluno_anamnese', compact('dadosAnamnese'));

    }


    //-----------------------------
    //-----------------------------

    //CRUD Qualidade de Vida

    public function cadastroQualidadeVida()
    {
        return view('aluno.aluno_cadastro_qualidadeVida');
    }


    //-----------------------------
    //-----------------------------

    //CRUD Perfil Bioquimico

    public function cadastroPerfilBioquimico($idTreinamento)
    {

        if (!$this->verificarProfessorTreinamento($idTreinamento) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        $dadosPerfilBioquimico = PerfilBioquimico::where("idTreinamento", "=", $idTreinamento)->get()->first();


        if ($dadosPerfilBioquimico == null) {
            return view('aluno.aluno_cadastro_perfilBioquimico', compact('idTreinamento'));
        } else {
            return view('aluno.aluno_perfil_bioquimico', compact('dadosPerfilBioquimico'));
        }

    }

    public function cadastroPerfilBioquimicoSalvar(Request $req)
    {
        $dados = $req->all();
        if (!$this->verificarProfessorTreinamento($dados['idTreinamento']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        $dados = $this->dataAdapter->formatarDataArmazenarPerfilBioquimico($dados);

        PerfilBioquimico::create($dados);

        return $this->treinamentoStatus($dados['idTreinamento']);
    }

    public function cadastroPerfilBioquimicoEditar($idTreinamento)
    {
        if (!$this->verificarProfessorTreinamento($idTreinamento) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        $dadosPerfilBioquimico = PerfilBioquimico::where("idTreinamento", "=", $idTreinamento)->get()->first();

        return view('aluno.aluno_editar_perfil_bioquimico', compact('dadosPerfilBioquimico'));

    }

    public function cadastroPerfilBioquimicoUpdate(Request $req)
    {
        $dados = $req->all();

        if (!$this->verificarProfessorTreinamento($dados['idTreinamento']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }


        $perfil = PerfilBioquimico::where("idTreinamento", "=", $dados['idTreinamento'])->get()->first();


        $dados = $this->dataAdapter->formatarDataArmazenarPerfilBioquimico($dados);

        $perfil->update($dados);
        $dadosPerfilBioquimico = PerfilBioquimico::where("idTreinamento", "=", $dados['idTreinamento'])->get()->first();

        return view('aluno.aluno_perfil_bioquimico', compact('dadosPerfilBioquimico'));
    }


    //-----------------------------
    //-----------------------------

    //CRUD Exames Adicionais

    public function cadastroexamesAdicionais($idTreinamento)
    {

        if (!$this->verificarProfessorTreinamento($idTreinamento) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        $dadosExamesAdicionais = ExamesAdicionais::where("idTreinamento", "=", $idTreinamento)->paginate(5);

        return view('aluno.aluno_cadastro_exames', compact('dadosExamesAdicionais', 'idTreinamento'));


    }

    public function cadastroexamesAdicionaisSalvar(Request $req)
    {
        $dados = $req->all();

        if (!$this->verificarProfessorTreinamento($dados['idTreinamento']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        try {
            $dados = $this->dataAdapter->formatarDataExamesAdicionais($dados);
            ExamesAdicionais::create($dados);
            $dadosExamesAdicionais = ExamesAdicionais::where("idTreinamento", "=", $dados['idTreinamento'])->paginate(5);
            $idTreinamento = $dados['idTreinamento'];

            return redirect()->route('aluno.cadastro.exames', $idTreinamento);
            //return view('aluno.aluno_cadastro_exames', compact('dadosExamesAdicionais','idTreinamento'));
        } catch (\Exception $ex) {
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }
    }

    public function cadastroexamesAdicionaisEditar($idExameAdicional, $idTreinamento)
    {

        if (!$this->verificarProfessorTreinamento($idTreinamento) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        $dadosExameAdicional = ExamesAdicionais::find($idExameAdicional);

        return view('aluno.aluno_editar_exames', compact('dadosExameAdicional', 'idTreinamento'));

    }

    public function cadastroexamesAdicionaisUpdate(Request $req)
    {
        $dados = $req->all();

        if (!$this->verificarProfessorTreinamento($dados['idTreinamento']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        try {
            $dadosAntigos = ExamesAdicionais::find($dados['id']);

            $dadosAntigos->tipoDoExame = $dados['tipoDoExame'];
            $dadosAntigos->dataExame = $dados['dataExame'];
            $dadosAntigos->resultadosPrincipais = $dados['resultadosPrincipais'];

            $dadosAntigos = $this->dataAdapter->formatarDataExamesAdicionais($dadosAntigos);

            $dadosAntigos->save();
            $dadosExamesAdicionais = ExamesAdicionais::where("idTreinamento", "=", $dados['idTreinamento'])->paginate(5);

            $idTreinamento = $dados['idTreinamento'];

            return view('aluno.aluno_cadastro_exames', compact('dadosExamesAdicionais', 'idTreinamento'));

        } catch (\Exception $ex) {
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }
    }


    //-----------------------------
    //-----------------------------

    //CRUD Medicamentos

    public function cadastroMedicamentos($idTreinamento)
    {

        if (!$this->verificarProfessorTreinamento($idTreinamento) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        $dadosMedicamentos = UsoMedicamentosContinuos::where("idTreinamento", "=", $idTreinamento)->paginate(5);

        return view('aluno.aluno_cadastro_medicamentos', compact('dadosMedicamentos', 'idTreinamento'));

    }

    public function cadastroMedicamentosSalvar(Request $req)
    {
        $dados = $req->all();

        if (!$this->verificarProfessorTreinamento($dados['idTreinamento']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        try {
            $dados = $this->dataAdapter->formatarDataUsoMedicamentosContinuos($dados);
            UsoMedicamentosContinuos::create($dados);
            $idTreinamento = $dados['idTreinamento'];

            return redirect()->route('aluno.cadastro.medicamentos', $idTreinamento);
        } catch (\Exception $ex) {
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }
    }

    public function cadastroMedicamentosEditar($idMedicamento, $idTreinamento)
    {

        if (!$this->verificarProfessorTreinamento($idTreinamento) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        $dadosMedicamentos = UsoMedicamentosContinuos::find($idMedicamento);

        return view('aluno.aluno_editar_medicamentos', compact('dadosMedicamentos', 'idTreinamento'));

    }

    public function cadastroMedicamentosUpdate(Request $req)
    {
        $dados = $req->all();

        if (!$this->verificarProfessorTreinamento($dados['idTreinamento']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        try {
            $dadosAntigos = UsoMedicamentosContinuos::find($dados['id']);

            $dadosAntigos->nomeComercial = $dados['nomeComercial'];
            $dadosAntigos->nomeCientifico = $dados['nomeCientifico'];
            $dadosAntigos->dosagem = $dados['dosagem'];
            $dadosAntigos->posologia = $dados['posologia'];
            $dadosAntigos->inicio = $dados['inicio'];
            $dadosAntigos = $this->dataAdapter->formatarDataUsoMedicamentosContinuos($dadosAntigos);


            $dadosAntigos->save();
            $dadosMedicamentos = UsoMedicamentosContinuos::where("idTreinamento", "=", $dados['idTreinamento'])->paginate(5);

            $idTreinamento = $dados['idTreinamento'];

            return view('aluno.aluno_cadastro_medicamentos', compact('dadosMedicamentos', 'idTreinamento'));

        } catch (\Exception $ex) {
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }
    }

//-----------------------------
//-----------------------------

    //CRUD Consultas

    public function cadastroConsultas($idTreinamento)
    {

        if (!$this->verificarProfessorTreinamento($idTreinamento) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        $dadosConsultas = QuantasConsultas::where("idTreinamento", "=", $idTreinamento)->paginate(5);

        return view('aluno.aluno_cadastro_consultas', compact('dadosConsultas', 'idTreinamento'));

    }

    public function cadastroConsultasSalvar(Request $req)
    {
        $dados = $req->all();

        if (!$this->verificarProfessorTreinamento($dados['idTreinamento']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        try {
            $dados = $this->dataAdapter->formatarDataConsultasMedicas($dados);
            QuantasConsultas::create($dados);
            $idTreinamento = $dados['idTreinamento'];

            return redirect()->route('aluno.cadastro.consultas', $idTreinamento);
        } catch (\Exception $ex) {
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }
    }

    public function cadastroConsultasEditar($idConsulta, $idTreinamento)
    {

        if (!$this->verificarProfessorTreinamento($idTreinamento) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        $dadosConsulta = QuantasConsultas::find($idConsulta);

        return view('aluno.aluno_editar_consultas', compact('dadosConsulta', 'idTreinamento'));

    }

    public function cadastroConsultasUpdate(Request $req)
    {
        $dados = $req->all();

        if (!$this->verificarProfessorTreinamento($dados['idTreinamento']) && !auth()->user()->isAdmin()) {
            return redirect()->back()->withInput()->withErrors(['Acesso negado']);
        }

        try {
            $dadosAntigos = QuantasConsultas::find($dados['id']);

            $dadosAntigos->dataAproximada = $dados['dataAproximada'];
            $dadosAntigos->especialidade = $dados['especialidade'];
            $dadosAntigos->motivo = $dados['motivo'];

            $dadosAntigos = $this->dataAdapter->formatarDataConsultasMedicas($dadosAntigos);

            $dadosAntigos->save();
            $dadosConsultas = QuantasConsultas::where("idTreinamento", "=", $dados['idTreinamento'])->paginate(5);

            $idTreinamento = $dados['idTreinamento'];

            return view('aluno.aluno_cadastro_consultas', compact('dadosConsultas', 'idTreinamento'));

        } catch (\Exception $ex) {
            return redirect()->back()->withInput()->withErrors(['Verifique se os dados foram inseridos corretamente']);
        }
    }

//-----------------------------

    public function export()
    {
        return Excel::download(new ExportarDadosAluno, 'alunos.ods');
    }

}
