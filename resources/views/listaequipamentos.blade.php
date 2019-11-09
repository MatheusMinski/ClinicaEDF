@extends('layout.site')

@section('titulo','Cursos')

@section('conteudo')
    <div class="container">
        <br/>
        <h3 class="center">Equipamentos</h3>
        <br/><br/><br/>
        <div class="row">
            <table>
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Quantidade Total</th>
                    <th>Quantidade Disponível</th>

                </tr>
                </thead>
                <tbody>
                @foreach($equipamentos as $equipamento)
                    <tr>
                        <td>{{ $equipamento->nomeEquipamento }}</td>
                        <td>{{ $equipamento->quantidadeTotal }}</td>
                        <td>{{ $equipamento->quantidadeDisponivel }}</td>
                        <td>
                            <a class="btn deep orange" href="{{route('emprestimo',$equipamento->id)}}">Emprestar</a>
                        </td>
                        <td>
                            <a class="btn deep green" href="{{route('equipamentos.editar',$equipamento->id)}}">Editar</a>
                        </td>

                        <td>
                            <a class="btn red" href="{{route('equipamentos.deletar',$equipamento->id)}}">Deletar</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn blue" href="{{route('cadastro.equipamento')}}">Cadastrar novo Equipamento</a>
        </div>
        <div class="row" align="center">
            {{$equipamentos->links()}}
        </div>

    </div>



@endsection
