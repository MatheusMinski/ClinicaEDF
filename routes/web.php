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


//Login, Logout
Route::get('/', ['as' => 'home','uses'=>'Index@home']);

Route::get('/login', ['as' => 'login','uses'=>'LoginProfessorController@login']);

Route::post('/entrar',['as' => 'entrar', 'uses'=>'LoginProfessorController@entrar']);

Route::get('/sair',['as' => 'sair', 'uses'=>'LoginProfessorController@sair']);


//Professor
Route::get('/cadastro/professor',['as' => 'cadastro.professor', 'uses'=>'CadastroProfessorController@index']);

Route::get('/lista/professor',['as' => 'lista.professor', 'uses'=>'CadastroProfessorController@listagem']);

Route::post('/cadastro/professor/salvar',['as' => 'salvar.professor', 'uses'=>'CadastroProfessorController@salvar']);


//Emprestimo
Route::get('/index/emprestimo/{id}' , ['as' => 'emprestimo','uses'=>'EquipamentosController@emprestimo']);

Route::get('/emprestimo/finalizar', ['as' => 'emprestimo.finalizar','uses'=>'EmprestimosController@finalizar']);

Route::get('/lista/emprestimo', ['as' => 'lista.emprestimos','uses'=>'EmprestimosController@listagem']);


//Equipamento
Route::get('/cadastro/equipamento', ['as' => 'cadastro.equipamento','uses'=>'EquipamentosController@cadastro']);

Route::get('/lista/equipamento', ['as' => 'lista.equipamentos','uses'=>'EquipamentosController@index']);

Route::get('/lista/equipamento/editar/{id}', ['as' => 'equipamentos.editar','uses'=>'EquipamentosController@editar']);

Route::post('/cadastro/equipamento/salvar', ['as' => 'salvar.equipamento','uses'=>'EquipamentosController@salvar']);

Route::get('/cadastro/equipamento/deletar/{id}', ['as' => 'equipamentos.deletar','uses'=>'EquipamentosController@deletar']);

Route::put('/equipamento/editar/update/{id}', ['as' => 'equipamentos.editar.salvar','uses'=>'EquipamentosController@update']);












