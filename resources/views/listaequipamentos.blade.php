@extends('layout.site')

@section('titulo','Lista de Equipamentos')
@section('conteudo')
    <div class="container" style="width: 100%">
        <br/>
        <h3 class="center">Equipamentos</h3>
        <div style="padding: 30px; color: red" class="center">
            @if(isset($errors) && count ($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="row">
            <table>
                <thead>
                <tr>
                    <th class="center" >Nome</th>
                    <th class="center" >Classificação</th>
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
                    <th>
                        <a class="btn blue-grey" href="javascript:newPopup()">Classificações</a>
                    </th>

                </tr>
                </thead>
                <tbody>
                @foreach($equipamentos as $equipamento)
                    <tr >
                        <td class="center">{{ $equipamento->nomeEquipamento }}</td>
                        <td class="center">{{ $equipamento->classificacao }}</td>
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

    <script>
        function newPopup(){
            varWindow = window.open ('{{route('equipamentos.classificacao')}}', 'popup', "width=350, height=255, top=100, left=110, scrollbars=no " )
        }
    </script>


@endsection
