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


//Emprestimo
    Route::get('/index/emprestimo/{id}', ['as' => 'emprestimo', 'uses' => 'EquipamentosController@emprestimo']);

    Route::get('/emprestimo/finalizar', ['as' => 'emprestimo.finalizar', 'uses' => 'EmprestimosController@finalizar']);

    Route::get('/lista/emprestimo', ['as' => 'lista.emprestimos', 'uses' => 'EmprestimosController@listagem']);

    Route::get('/lista/emprestimo/dados/{idEquipamento}', ['as' => 'emprestimos.dados', 'uses' => 'EmprestimosController@dados']);

    Route::get('/esprestimo/devolver/{idEquipamento}/{quantidade}/{idEmprestimo}', ['as' => 'emprestimos.devolver', 'uses' => 'EmprestimosController@devolver']);


//Equipamento
    Route::get('/cadastro/equipamento', ['as' => 'cadastro.equipamento', 'uses' => 'EquipamentosController@cadastro']);

    Route::get('/lista/equipamento', ['as' => 'lista.equipamentos', 'uses' => 'EquipamentosController@index']);

    Route::get('/lista/equipamento/editar/{id}', ['as' => 'equipamentos.editar', 'uses' => 'EquipamentosController@editar']);

    Route::post('/cadastro/equipamento/salvar', ['as' => 'salvar.equipamento', 'uses' => 'EquipamentosController@salvar']);

    Route::get('/cadastro/equipamento/deletar/{id}', ['as' => 'equipamentos.deletar', 'uses' => 'EquipamentosController@deletar']);

    Route::put('/equipamento/editar/update/{id}', ['as' => 'equipamentos.editar.salvar', 'uses' => 'EquipamentosController@update']);

    //Aluno
    Route::get('/lista/espera', ['as' => 'lista.espera', 'uses' => 'AlunosController@listaEspera']);

    Route::get('/lista/alunos', ['as' => 'aluno.lista', 'uses' => 'AlunosController@index']);


    Route::get('/lista/alunos/cadastro/dados', ['as' => 'aluno.cadastro.dados', 'uses' => 'AlunosController@cadastroDados']);
    Route::post('/lista/alunos/cadastro/dados/salvar', ['as' => 'aluno.cadastro.dados.salvar', 'uses' => 'AlunosController@cadastroSalvarDados']);
    Route::get('/lista/alunos/cadastro/endereco', ['as' => 'aluno.cadastro.endereco', 'uses' => 'AlunosController@cadastroEndereco']);
    Route::get('/lista/alunos/cadastro/anamnese', ['as' => 'aluno.cadastro.anamnese', 'uses' => 'AlunosController@cadastroAnamnese']);
    Route::get('/lista/alunos/cadastro/avaliacaoFuncional', ['as' => 'aluno.cadastro.avaliacao', 'uses' => 'AlunosController@avaliacaoFuncional']);
    Route::get('/lista/alunos/cadastro/emergencia', ['as' => 'aluno.cadastro.emergencia', 'uses' => 'AlunosController@cadastroEmergencia']);
    Route::get('/lista/alunos/cadastro/qualidadeVida', ['as' => 'aluno.cadastro.qualidadeVida', 'uses' => 'AlunosController@cadastroQualidadeVida']);
    Route::get('/lista/alunos/cadastro/medicamentos', ['as' => 'aluno.cadastro.medicamentos', 'uses' => 'AlunosController@cadastroMedicamentos']);
    Route::get('/lista/alunos/cadastro/perfilBioquimico', ['as' => 'aluno.cadastro.perfilBioquimico', 'uses' => 'AlunosController@cadastroPerfilBioquimico']);
    Route::get('/lista/alunos/cadastro/examesAdicionais', ['as' => 'aluno.cadastro.exames', 'uses' => 'AlunosController@cadastroexamesAdicionais']);
    Route::get('/lista/alunos/cadastro/consultas', ['as' => 'aluno.cadastro.consultas', 'uses' => 'AlunosController@cadastroConsultas']);

    Route::post('/lista/alunos/cadastro/salvar', ['as' => 'aluno.cadastro.salvar', 'uses' => 'AlunosController@cadastroSalvar']);




    Route::get('/lista/alunos/treinamento/status/{id}', ['as' => 'treinamento.status', 'uses' => 'AlunosController@treinamentoStatus']);

    Route::get('/lista/alunos/treinamentos/{id}', ['as' => 'aluno.treinamentos', 'uses' => 'AlunosController@treinamentos']);

    Route::get('/lista/alunos/treinamentos/adicionar/{idAluno}', ['as' => 'aluno.treinamento.adicionar', 'uses' => 'AlunosController@treinamentoAdicionar']);

    // lista de presença

    // TODO : Adicionar aqui a rota para a lista de presença assim que existir seu model e seu controller.

});



Route::get('/', ['as' => 'home','uses'=>'Index@home']);

Route::get('/login', ['as' => 'login', 'uses' => 'LoginProfessorController@login']);

Route::post('/entrar', ['as' => 'entrar', 'uses' => 'LoginProfessorController@entrar']);

//Resetar a senha

Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');




