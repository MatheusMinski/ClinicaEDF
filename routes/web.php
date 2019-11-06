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

Route::get('/', ['as' => 'home','uses'=>'Index@home']);

Route::get('/cadastro/professor',['as' => 'cadastro.professor', 'uses'=>'CadastroProfessorController@index']);

Route::get('/lista/professor',['as' => 'lista.professor', 'uses'=>'CadastroProfessorController@listagem']);

Route::post('/cadastro/professor/salvar',['as' => 'salvar.professor', 'uses'=>'CadastroProfessorController@salvar']);

Route::post('/entrar',['as' => 'entrar', 'uses'=>'LoginProfessorController@entrar']);


Route::post('/cadastro/pessoa',['as' => 'salvar.pessoa', 'uses'=>'CadastroPessoaEmprestimoController@salvar']);

Route::get('/sair',['as' => 'sair', 'uses'=>'LoginProfessorController@sair']);


Route::get('/emprestimo', ['as' => 'emprestimos','uses'=>'CadastroPessoaEmprestimoController@index']);

Route::get('/cadastro/emprestimo', ['as' => 'cadastro.pessoa','uses'=>'CadastroPessoaEmprestimoController@cadastro']);


Route::get('/cadastro/equipamento', ['as' => 'cadastro.equipamento','uses'=>'EquipamentosController@cadastro']);

Route::get('/lista/equipamento', ['as' => 'lista.equipamentos','uses'=>'EquipamentosController@index']);

Route::post('/cadastro/equipamento/salvar', ['as' => 'salvar.equipamento','uses'=>'EquipamentosController@salvar']);

Route::get('/cadastro/equipamento/deletar/{id}', ['as' => 'equipamentos.deletar','uses'=>'EquipamentosController@deletar']);




Route::get('/login', ['as' => 'login','uses'=>'LoginProfessorController@login']);


Route::get('/index/emprestimo' , ['as' => 'emprestimo','uses'=>'LoginProfessorController@emprestimo']);





