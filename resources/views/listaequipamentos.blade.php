@extends('layout.site')

@section('titulo','Cursos')
@section('conteudo')
    <div class="container">
        <br/>
        <h3 class="center">Equipamentos</h3>
        @if(isset($errors) && count ($errors) > 0)
            <div class="alert alert-danger" >
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
                    <th class="center" >Nome</th>
                    <th class="center">Nº do Patrimônio</th>
                    <th class="center">Quantidade Total</th>
                    <th class="center">Quantidade Disponível</th>
                    <form action={{route('equipamentos.procurar')}} method="GET">
                        <th>
                            <input type="search" class="form-control" name="pesquisa"
                                   placeholder="Procurar Emprestimos">
                        </th>
                        <th>
                            <button type="submit" class="btn btn-default">Procurar</button>
                        </th>
                    </form>

                </tr>
                </thead>
                <tbody>
                @foreach($equipamentos as $equipamento)
                    <tr >
                        <td class="center">{{ $equipamento->nomeEquipamento }}</td>
                        <td class="center">{{ $equipamento->numeroPatrimonio }}</td>
                        <td class="center">{{ $equipamento->quantidadeTotal }}</td>
                        <td class="center">{{ $equipamento->quantidadeDisponivel }}</td>
                        <td class="center">
                            <a class="btn deep orange" href="{{route('emprestimo',$equipamento->id)}}">Emprestar</a>
                        </td>
                        <td class="center">
                            <a class="btn deep green" href="{{route('equipamentos.editar',$equipamento->id)}}">Editar</a>
                        </td>

                        <td class="center">
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
            {{$equipamentos->links('vendor.pagination.materializecss')}}
        </div>


    </div>



@endsection
