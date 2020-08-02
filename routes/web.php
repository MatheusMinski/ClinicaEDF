<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {
    //Login, Logout

    Route::get('/sair', ['as' => 'sair', 'uses' => 'LoginProfessorController@sair']);


//Professor
    Route::get('/cadastro/professor', ['as' => 'cadastro.professor', 'uses' => 'CadastroProfessorController@index'])->middleware('is_admin');

    Route::get('/lista/professor', ['as' => 'lista.professor', 'uses' => 'CadastroProfessorController@listagem']);

    Route::post('/cadastro/professor/salvar', ['as' => 'salvar.professor', 'uses' => 'CadastroProfessorController@salvar'])->middleware('is_admin');

    Route::get('/professor/inativar/{id}', ['as' => 'inativar.professor', 'uses' => 'LoginProfessorController@inativar'])->middleware('is_admin');

    Route::get('/professor/reativar/{id}', ['as' => 'reativar.professor', 'uses' => 'LoginProfessorController@reativar'])->middleware('is_admin');

    Route::get('/permissaonegada', ['as' => 'permissao.negada', 'uses' => 'LoginProfessorController@permissaoNegada']);

    Route::post('/lista/professor/procurar', ['as' => 'professores.procurar', 'uses' => 'CadastroProfessorController@procurar']);

    Route::get('/professor/status/{id}', ['as' => 'professor.status', 'uses' => 'LoginProfessorController@status']);


//Emprestimo
    Route::get('/index/emprestimo/{id}', ['as' => 'emprestimo', 'uses' => 'EquipamentosController@emprestimo']);

    Route::get('/emprestimo/finalizar', ['as' => 'emprestimo.finalizar', 'uses' => 'EmprestimosController@finalizar']);

    Route::get('/lista/emprestimo', ['as' => 'lista.emprestimos', 'uses' => 'EmprestimosController@listagem']);

    Route::get('/lista/emprestimo/dados/{idEquipamento}', ['as' => 'emprestimos.dados', 'uses' => 'EmprestimosController@dados']);

    Route::get('/esprestimo/devolver/{idEquipamento}/{quantidade}/{idEmprestimo}', ['as' => 'emprestimos.devolver', 'uses' => 'EmprestimosController@devolver']);

    Route::get('/esprestimo/procurar', ['as' => 'emprestimos.procurar', 'uses' => 'EmprestimosController@procurar']);


//Equipamento
    Route::get('/cadastro/equipamento', ['as' => 'cadastro.equipamento', 'uses' => 'EquipamentosController@cadastro']);

    Route::get('/lista/equipamento', ['as' => 'lista.equipamentos', 'uses' => 'EquipamentosController@index']);

    Route::get('/lista/equipamento/editar/{id}', ['as' => 'equipamentos.editar', 'uses' => 'EquipamentosController@editar']);

    Route::post('/cadastro/equipamento/salvar', ['as' => 'salvar.equipamento', 'uses' => 'EquipamentosController@salvar']);

    Route::get('/cadastro/equipamento/deletar/{id}', ['as' => 'equipamentos.deletar', 'uses' => 'EquipamentosController@deletar']);

    Route::put('/equipamento/editar/update/{id}', ['as' => 'equipamentos.editar.salvar', 'uses' => 'EquipamentosController@update']);

    Route::get('/equipamento/procurar', ['as' => 'equipamentos.procurar', 'uses' => 'EquipamentosController@procurar']);


    //Aluno
    Route::get('/lista/espera', ['as' => 'lista.espera', 'uses' => 'AlunosController@listaEspera']);

    //Lista Alunos
    Route::get('/lista/alunos', ['as' => 'aluno.lista', 'uses' => 'AlunosController@index']);

    //Dados Pessoais
    Route::get('/lista/aluno/dadospessoais/{id}', ['as' => 'aluno.dados.pessoais', 'uses' => 'AlunosController@dadosPessoais']);
    Route::get('/lista/alunos/cadastro/dados', ['as' => 'aluno.cadastro.dados', 'uses' => 'AlunosController@cadastroDados']);
    Route::post('/lista/alunos/cadastro/dados/salvar', ['as' => 'aluno.cadastro.dados.salvar', 'uses' => 'AlunosController@cadastroDadosSalvar']);
    Route::get('/lista/alunos/cadastro/dados/editar/{id}', ['as' => 'aluno.cadastro.dados.editar', 'uses' => 'AlunosController@cadastroDadosEditar']);
    Route::post('/lista/alunos/cadastro/dados/update', ['as' => 'aluno.cadastro.dados.update', 'uses' => 'AlunosController@cadastroDadosUpdate']);

    //Endereco
    Route::get('/lista/alunos/cadastro/endereco/{idAluno}', ['as' => 'aluno.cadastro.endereco', 'uses' => 'AlunosController@cadastroEndereco']);
    Route::post('/lista/alunos/cadastro/endereco/salvar', ['as' => 'aluno.cadastro.endereco.salvar', 'uses' => 'AlunosController@cadastroEnderecoSalvar']);
    Route::get('/lista/alunos/cadastro/endereco/editar/{id}', ['as' => 'aluno.cadastro.endereco.editar', 'uses' => 'AlunosController@cadastroEnderecoEditar']);
    Route::post('/lista/alunos/cadastro/endereco/update', ['as' => 'aluno.cadastro.endereco.update', 'uses' => 'AlunosController@cadastroEnderecoUpdate']);

    //Anamnese
    Route::get('/lista/alunos/cadastro/anamnese/{idTreinamento}', ['as' => 'aluno.cadastro.anamnese', 'uses' => 'AlunosController@cadastroAnamnese']);
    Route::post('/lista/alunos/cadastro/anamnese/salvar', ['as' => 'aluno.cadastro.anamnese.salvar', 'uses' => 'AlunosController@cadastroAnamneseSalvar']);
    Route::get('/lista/alunos/cadastro/anamnese/editar/{idTreinamento}', ['as' => 'aluno.cadastro.anamnese.editar', 'uses' => 'AlunosController@cadastroAnamneseEditar']);
    Route::post('/lista/alunos/cadastro/anamnese/update', ['as' => 'aluno.cadastro.anamnese.update', 'uses' => 'AlunosController@cadastroAnamneseUpdate']);

    //Avaliacao Funcional
    Route::get('/lista/alunos/cadastro/avaliacaoFuncional', ['as' => 'aluno.cadastro.avaliacao', 'uses' => 'AlunosController@avaliacaoFuncional']);
    Route::post('/lista/alunos/cadastro/avaliacaoFuncional/salvar', ['as' => 'aluno.cadastro.avaliacao.salvar', 'uses' => 'AlunosController@avaliacaoFuncionalSalvar']);
    Route::get('/lista/alunos/cadastro/avaliacaoFuncional/editar', ['as' => 'aluno.cadastro.avaliacao.editar', 'uses' => 'AlunosController@avaliacaoFuncionalEditar']);
    Route::put('/lista/alunos/cadastro/avaliacaoFuncional/update', ['as' => 'aluno.cadastro.avaliacao.update', 'uses' => 'AlunosController@avaliacaoFuncionalUpdate']);

    //Emergencia
    Route::get('/lista/alunos/cadastro/emergencia', ['as' => 'aluno.cadastro.emergencia', 'uses' => 'AlunosController@cadastroEmergencia']);
    Route::post('/lista/alunos/cadastro/emergencia/salvar', ['as' => 'aluno.cadastro.emergencia.salvar', 'uses' => 'AlunosController@cadastroEmergenciaSalvar']);
    Route::get('/lista/alunos/cadastro/emergencia/editar', ['as' => 'aluno.cadastro.emergencia.editar', 'uses' => 'AlunosController@cadastroEmergenciaEditar']);
    Route::put('/lista/alunos/cadastro/emergencia/update', ['as' => 'aluno.cadastro.emergencia.update', 'uses' => 'AlunosController@cadastroEmergenciaUpdate']);

    //Qualidade Vida
    Route::get('/lista/alunos/cadastro/qualidadeVida', ['as' => 'aluno.cadastro.qualidadeVida', 'uses' => 'AlunosController@cadastroQualidadeVida']);

    //Medicamentos
    Route::get('/lista/alunos/cadastro/medicamentos', ['as' => 'aluno.cadastro.medicamentos', 'uses' => 'AlunosController@cadastroMedicamentos']);
    Route::post('/lista/alunos/cadastro/medicamentos/salvar', ['as' => 'aluno.cadastro.medicamentos.salvar', 'uses' => 'AlunosController@cadastroMedicamentosSalvar']);
    Route::get('/lista/alunos/cadastro/medicamentos/editar', ['as' => 'aluno.cadastro.medicamentos.editar', 'uses' => 'AlunosController@cadastroMedicamentosEditar']);
    Route::put('/lista/alunos/cadastro/medicamentos/update', ['as' => 'aluno.cadastro.medicamentos.update', 'uses' => 'AlunosController@cadastroMedicamentosUpdate']);

    //Perfil Bioquimico
    Route::get('/lista/alunos/cadastro/perfilBioquimico', ['as' => 'aluno.cadastro.perfilBioquimico', 'uses' => 'AlunosController@cadastroPerfilBioquimico']);
    Route::post('/lista/alunos/cadastro/perfilBioquimico/salvar', ['as' => 'aluno.cadastro.perfilBioquimico.salvar', 'uses' => 'AlunosController@cadastroPerfilBioquimicoSalvar']);
    Route::get('/lista/alunos/cadastro/perfilBioquimico/editar', ['as' => 'aluno.cadastro.perfilBioquimico.editar', 'uses' => 'AlunosController@cadastroPerfilBioquimicoEditar']);
    Route::put('/lista/alunos/cadastro/perfilBioquimico/update', ['as' => 'aluno.cadastro.perfilBioquimico.update', 'uses' => 'AlunosController@cadastroPerfilBioquimicoUpdate']);

    //Exames Adicionais
    Route::get('/lista/alunos/cadastro/examesAdicionais', ['as' => 'aluno.cadastro.exames', 'uses' => 'AlunosController@cadastroexamesAdicionais']);
    Route::post('/lista/alunos/cadastro/examesAdicionais/salvar', ['as' => 'aluno.cadastro.exames.salvar', 'uses' => 'AlunosController@cadastroexamesAdicionaisSalvar']);
    Route::get('/lista/alunos/cadastro/examesAdicionais/editar', ['as' => 'aluno.cadastro.exames.editar', 'uses' => 'AlunosController@cadastroexamesAdicionaisEditar']);
    Route::put('/lista/alunos/cadastro/examesAdicionais/update', ['as' => 'aluno.cadastro.exames.update', 'uses' => 'AlunosController@cadastroexamesAdicionaisUpdate']);

    //Consultas
    Route::get('/lista/alunos/cadastro/consultas', ['as' => 'aluno.cadastro.consultas', 'uses' => 'AlunosController@cadastroConsultas']);
    Route::post('/lista/alunos/cadastro/consultas/salvar', ['as' => 'aluno.cadastro.consultas.salvar', 'uses' => 'AlunosController@cadastroConsultasSalvar']);
    Route::get('/lista/alunos/cadastro/consultas/editar', ['as' => 'aluno.cadastro.consultas.editar', 'uses' => 'AlunosController@cadastroConsultasEditar']);
    Route::put('/lista/alunos/cadastro/consultas/update', ['as' => 'aluno.cadastro.consultas.update', 'uses' => 'AlunosController@cadastroConsultasUpdate']);

    //Treinamentos
    Route::get('/lista/alunos/treinamento/status/{idTreinamento}', ['as' => 'treinamento.status', 'uses' => 'AlunosController@treinamentoStatus']);
    Route::get('/lista/alunos/treinamentos/{id}', ['as' => 'aluno.treinamentos', 'uses' => 'AlunosController@treinamentos']);
    Route::get('/lista/alunos/treinamentos/adicionar/{idAluno}', ['as' => 'aluno.treinamento.adicionar', 'uses' => 'AlunosController@treinamentoAdicionar']);

    //Sucesso nos cadastros PRG
    Route::get('/cadastro/sucesso/{id}', ['as' => 'cadastro.sucesso', 'uses' => 'AlunosController@sucessoCadastro']);



});

//Login e reset de senha
Route::get('/', ['as' => 'home','uses'=>'Index@home']);

Route::get('/login', ['as' => 'login', 'uses' => 'LoginProfessorController@login']);

Route::post('/entrar', ['as' => 'entrar', 'uses' => 'LoginProfessorController@entrar']);

Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');




