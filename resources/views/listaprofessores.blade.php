@extends('layout.site')

@section('titulo','Cursos')

@section('conteudo')
    <div class="container">
        <br/>
        <h3 class="center">Profesores Cadastrados</h3>
        <br/><br/><br/>
        <div class="row">
            <table>
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Data de registro</th>
                </tr>
                </thead>
                <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->nome }}</td>
                        <td>{{ $registro->telefone }}</td>
                        <td>{{ $registro->email }}</td>
                        <td>{{ $registro->created_at }}</td>
                        <td>
                            <a class="btn deep-orange" href="">Inativar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn blue" href="{{route('cadastro.professor')}}">Cadastrar novo professor</a>

        </div>

    </div>



@endsection
