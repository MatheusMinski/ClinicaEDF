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
                                   placeholder="Procurar Equipamentos">
                        </th>
                        <th>
                            <button type="submit" class="btn btn-default">Procurar</button>
                        </th>
                    </form>

                    <th>
                        <button data-target="modal1" class="btn modal-trigger">Classes</button>
                    </th>
                    <div id="modal1" class="modal">
                        <div class="modal-content center">
                            <h4>Classificações usadas:</h4>
                            @foreach($classes as $classe)
                                <h5 style="padding-top: 3vh">{{$classe -> classificacao}}</h5>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Ok</a>
                        </div>
                    </div>

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
        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>




@endsection
