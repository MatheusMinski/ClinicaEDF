@extends('layout.site')

@section('titulo','Treinamentos')

@section('conteudo')
    <div class="container">
        <br/>
        <h3 class="center">{{$aluno->nome}}</h3>
        @if(isset($errors) && count ($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
        <br/><br/><br/>
        @if($treinamentos != null)
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
                            <td>{{ date('d/m/Y', strtotime($treinamento->created_at))}}</td>
                            <td>
                                <a class="btn deep orange" href="{{route('treinamento.status',$treinamento->id)}}">Status</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row" align="center">
                {{$treinamentos->links('vendor.pagination.materializecss')}}
            </div>
        @else
            <h4 class="center">O aluno ainda não possui treinamentos</h4>
        @endif
        <div style="margin-top: 20px;" class="container">
            <a class="btn blue" href="{{route('aluno.treinamento.adicionar', ['idAluno' => $idAluno])}}">Criar nova avaliação</a>
        </div>



    </div>



@endsection
