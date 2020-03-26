@extends('layout.site')

@section('titulo','Lista de presença')

@section('conteudo')
    <div class="container">
        <br/>
        <h3 class="center">Lista De Presença</h3>
        <h5 class="center">  Data : <?php echo date('d/m/Y');?></h5>
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
                    <th>Patologia</th>
                    <th>Status</th>

                </tr>
                </thead>
                <tbody>
                @foreach($equipamentos as $equipamento) <!-- TODO: Aqui eu apenas usei como exemplo a tabela de equipamentos. Trocar para os nomes e informaçoes de quem está na lista de presença. -->
                    <tr>
                        <td>{{ $equipamento->nomeEquipamento }}</td>
                        <td>Buscar o telefone do mano</td>
                        <td>{{ $equipamento->quantidadeTotal }}</td>

                        <td>
                            <a class="btn deep orange" href="{{route('emprestimo',$equipamento->id)}}">Confirmar Presença</a>
                        </td>
                        <!--
                           TODO: Adicionar o if aqui, para mudar o botão de cor quando a presença for confirmada. Nao fiz isso, porque o model e o controller nem nada da Lista de presença está criada até o momento. (26/03/2020 as 08:58am)
                        -->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="row" align="center">
            {{$equipamentos->links('vendor.pagination.materializecss')}}
        </div>


    </div>



@endsection
