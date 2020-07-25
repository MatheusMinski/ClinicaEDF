@extends('layout.site')

@section('titulo','Dados Principais')

@section('conteudo')

    <div class="container">
        <div class="col s12 m7">

            <div class="card horizontal" style="width: 45%; float: left; margin: 2%">

                <div class="card-stacked">
                    <div class="card-content" style="box-shadow:  15px 15px 27px #e1e1e3, 15px 15px 27px #ffffff;">
                        <h4 style="padding-bottom: 2%">{{$dados->nome}}:</h4>
                        <h6 style="padding-bottom: 10px">Data de Nascimento: {{date('d/m/Y', strtotime($dados->dataNasc))}}</h6>
                        <h6 style="padding-bottom: 10px">Idade: {{$dados->idade}}</h6>
                        <h6 style="padding-bottom: 10px">Sexo: {{$dados->sexo}}</h6>
                        <h6 style="padding-bottom: 10px">Email: {{ $dados->email }}</h6>
                        <h6 style="padding-bottom: 10px">Profissão: {{$dados->profissao}}</h6>
                        <h6 style="padding-bottom: 10px">Aposentado: {{$dados->aposentado}}</h6>
                        <h6 style="padding-bottom: 10px">Estado Civil: {{$dados->estadoCivil}}</h6>
                        <h6 style="padding-bottom: 10px">Escolaridade: {{$dados->escolaridade}}</h6>
                        <h6 style="padding-bottom: 10px">Classe Social: {{$dados->classeSocialFamilia}}</h6>
                        <a class="btn blue">Editar</a>
                    </div>
                </div>
            </div>

            <div class="card horizontal" style="width: 45%; float: left; margin: 2%">

                <div class="card-stacked">
                    <div class="card-content" style="box-shadow:  15px 15px 27px #e1e1e3, 15px 15px 27px #ffffff;">
                        <h5>Endereço:</h5>
                    </div>
                </div>
            </div>

        </div>






@endsection

