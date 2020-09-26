@extends('layout.site')

@section('titulo','Lista de Espera')

@section('conteudo')
    <div class="container">
        <br/>
        <h3 class="center">Lista De Espera</h3>
        @if(isset($errors) && count ($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p align="center">{{$error}}</p>
                @endforeach
            </div>
        @endif
        <br/><br/><br/>
        <div class="row">
            <table>
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Outro contato</th>
                    <th>Prioridade</th>
                    <th>Status</th>
                    <th>-</th>
                    <th>-</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lista as $objeto) <!-- TODO: Aqui eu apenas usei como exemplo a tabela de equipamentos. Trocar para os nomes e informaçoes de quem está na lista de presença. -->
                <tr>
                    <td>{{ $objeto->nomeAlunoEspera }}</td>
                    <td>{{$objeto->telefone}}</td>
                    <td>{{$objeto->outroContato}}</td>
                    <td>{{ $objeto->prioridade }}</td>
                    @if($objeto->contatado)
                        <td>Já foi contatado</td>
                    @else
                        <td>Não foi contatado</td>
                    @endif

                    @if(!$objeto->contatado)
                        <td>
                            <a class="btn deep orange" href="{{route('lista.espera.contatado',$objeto->id)}}">Confirmar
                                Contato Realizado</a>
                        </td>
                    @endif
                    <td>
                        <a class="btn deep red" href="{{route('lista.espera.remover',$objeto->id)}}">Remover</a>
                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{--        <div class="row" align="center">--}}
        {{--            {{$objeto->links('vendor.pagination.materializecss')}}--}}
        {{--        </div>--}}

    </div>

@endsection
