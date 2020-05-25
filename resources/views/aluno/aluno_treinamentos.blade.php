@extends('layout.site')

@section('titulo','Treinamentos')

@section('conteudo')
    <div class="container">
        <br/>
        <h3 class="center">Alunos</h3>
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
                    <th>Data</th>
                    <th>Editar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($treinamentos as $treinamento)
                    <tr>
                        <td>{{ $treinamento->created_at }}</td>
                        <td>
                            <a class="btn deep orange" href="{{route('aluno.treinamentos',$aluno->id)}}">Treinamentos</a>
                        </td>
                        <td>
                            <a class="btn deep orange" href="{{route('aluno.status',$aluno->id)}}">Status</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn blue" href="{{route('aluno.cadastro')}}">Cadastrar novo aluno</a>
        </div>
        <div class="row" align="center">
            {{$alunos->links('vendor.pagination.materializecss')}}
        </div>


    </div>



@endsection
