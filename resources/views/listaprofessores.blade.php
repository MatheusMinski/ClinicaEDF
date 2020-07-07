@extends('layout.site')

@section('titulo','Cursos')

@section('conteudo')
    <div class="container">
        <br/>
        <h3 class="center">Professores Cadastrados</h3>
        <br/><br/>
        <div style="padding: 30px; color: red" class="center">
            @if(isset($errors) && count ($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
        </div>
        <br/><br/>
        <div class="row">
            <table>
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Data de registro</th>
                    <form action={{route('professores.procurar')}} method="POST" role="search">
                        {{ csrf_field() }}
                        <th>
                            <input type="text" class="form-control" name="nomeProfessor"
                                   placeholder="Procurar Professores">
                        <th>
                            <button type="submit" class="btn btn-default">Procurar</button>
                        </th>
                    </form>
                </tr>
                </thead>
                <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->nome }}</td>
                        <td>{{ $registro->telefone }}</td>
                        <td>{{ $registro->email }}</td>
                        <td>{{ $registro->created_at }}</td>
                        @if($registro->ativo)
                            <td>
                                <a class="btn red"
                                   href="{{route('inativar.professor',$registro->idProfessor)}}">Inativar</a>
                            </td>
                        @else
                            <td>
                                <a class="btn green" href="{{route('reativar.professor',$registro->idProfessor)}}">Reativar</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn blue" href="{{route('cadastro.professor')}}">Cadastrar novo professor</a>
        </div>

        <div class="row" align="center">
            {{$registros->links('vendor.pagination.materializecss')}}
        </div>

    </div>



@endsection
