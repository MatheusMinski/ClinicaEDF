@extends('layout.site')

@section('titulo','Lista Professores')

@section('conteudo')
    <div class="container">
        <br/>
        <h3 class="center">Selecionar novo professor:</h3>
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
                    <form action={{route('professores.procurar.admin', $idAluno)}} method="POST" role="search">
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
                        <td><a class="btn blue" href="{{route('professor.trocar',['idAluno' => $idAluno, 'idProfessor'=>  $registro->idProfessor])}}">Selecionar</a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="row" align="center">
            {{$registros->links('vendor.pagination.materializecss')}}
        </div>

    </div>



@endsection
