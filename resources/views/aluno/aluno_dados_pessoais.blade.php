@extends('layout.site')

@section('titulo','Dados Principais')

@section('conteudo')

    <div class="container">
        <div class="col s12 m7">

            <div class="card horizontal" style="width: 45%; float: left; margin: 2%">

                <div class="card-stacked">
                    <div class="card-content" style="box-shadow:  15px 15px 27px #e1e1e3, 15px 15px 27px #ffffff;">
                        <h4 style="padding-bottom: 2%">{{$dadosAluno->nome}}:</h4>
                        <h6 style="padding-bottom: 10px">Data de Nascimento: {{date('d/m/Y', strtotime($dadosAluno->dataNasc))}}</h6>
                        <h6 style="padding-bottom: 10px">Idade: {{$dadosAluno->idade}}</h6>
                        <h6 style="padding-bottom: 10px">Sexo: {{$dadosAluno->sexo}}</h6>
                        <h6 style="padding-bottom: 10px">Telefone: {{ $dadosAluno->telefone }}</h6>
                        <h6 style="padding-bottom: 10px">Email: {{ $dadosAluno->email }}</h6>
                        <h6 style="padding-bottom: 10px">Profissão: {{$dadosAluno->profissao}}</h6>
                        <h6 style="padding-bottom: 10px">Aposentado: {{$dadosAluno->aposentado}}</h6>
                        <h6 style="padding-bottom: 10px">Estado Civil: {{$dadosAluno->estadoCivil}}</h6>
                        <h6 style="padding-bottom: 10px">Escolaridade: {{$dadosAluno->escolaridade}}</h6>
                        <h6 style="padding-bottom: 10px">Classe Social: {{$dadosAluno->classeSocialFamilia}}</h6>
                        <a class="btn blue">Editar</a>
                    </div>
                </div>
            </div>

            <div class="card horizontal" style="width: 45%; float: left; margin: 2%">

                <div class="card-stacked">
                    <div class="card-content" style="box-shadow:  15px 15px 27px #e1e1e3, 15px 15px 27px #ffffff;">
                        <h5 style="padding-bottom: 10px">Endereço:</h5>
                        <h6 style="padding-bottom: 10px">Bairro: {{$dadosEndereco['bairro']}}</h6>
                        <h6 style="padding-bottom: 10px">Rua: {{$dadosEndereco['rua']}}</h6>
                        <h6 style="padding-bottom: 10px">Numero: {{ $dadosEndereco['numero'] }}</h6>
                        <h6 style="padding-bottom: 10px">Cidade: {{ $dadosEndereco['cidade'] }}</h6>
                        <h6 style="padding-bottom: 10px">CEP: {{$dadosEndereco['cep']}}</h6>
                    </div>
                </div>
            </div>

        </div>






@endsection

