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

Route::get('/cadastro/professor/endereço', function () {
    return view('cadastros.professoradr');
});

Route::get('/cadastro/professor', function () {
    return view('cadastros.professorcd');
});

Route::get('/login',['as' => 'professor.login', 'uses'=>'LoginProfessorController@index']);

Route::post('/login/entrar', ['as' => 'professor.login.entrar','uses'=>'LoginProfessorController@index']);


Route::get('/cadastro/emprestimo', function () {
    return view('emprestimos.alunoemprestimo');
});

Route::get('/', function () {
    return view('cadastros.professoradr');
});


Route::get('/index/emprestimo' , ['as' => 'emprestimo','uses'=>'LoginProfessorController@emprestimo']);





