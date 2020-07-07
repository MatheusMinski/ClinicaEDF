@extends('layout.site')

@section('titulo','Cursos')

@section('conteudo')
    <div class="container" style="width: 100%">
        <br/>
        <h3 class="center">Empréstimos Realizados</h3>

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
                    <th>Professor</th>
                    <th>Aluno</th>
                    <th>Equipamento</th>
                    <th>Nº Patrimônio</th>
                    <th>Data Devolução</th>
                    <th>Quantidade</th>
                    <form action={{route('emprestimos.procurar')}} method="GET" role="search">
                        <th>
                            <input type="text" class="form-control" name="nomeEmprestimo"
                                   placeholder="Procurar Emprestimos">
                        </th>
                        <th>
                            <label>
                                <input type="checkbox" checked="checked" name="checkbox" />
                                <span>Devolvido</span>
                            </label>
                        </th>
                        <th>
                            <button type="submit" class="btn btn-default">Procurar</button>
                        </th>
                    </form>
                </tr>
                </thead>
                <tbody>
                @foreach($emprestimos as $emprestimo)
                    <tr>
                        <td>{{ $emprestimo->nomeProfessorEmprestimo }}</td>
                        <td>{{ $emprestimo->nomePessoaEmprestimo }}</td>
                        <td>{{ $emprestimo->nomeEquipamentoEmprestimo }}</td>
                        <td>{{ $emprestimo->numeroPatrimonio }}</td>
                        <td>{{ date('d/m/Y', strtotime($emprestimo->dataDevolucao)) }}</td>
                        <td>{{ $emprestimo->quantidade }}</td>
                        <td>
                            <a class="btn blue" style="height: 40px;" href="{{route('emprestimos.dados',['idEquipamento' => $emprestimo->id])}}">Dados</a>
                        </td>

                        @if(!$emprestimo->devolvido)
                        <td>
                            <a class="btn deep-orange" style="height: 40px;" href="{{route('emprestimos.devolver', ['idEquipamento' => $emprestimo->idEquipamento, 'quantidade' => $emprestimo->quantidade, 'idEmprestimo' => $emprestimo->id] )}}">Marcar Devolução</a>
                        </td>

                            @else
                            <td>
                                <a class="btn green">Devolvido</a>
                            </td>
                        @endif

                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row" align="center">
            {{$emprestimos->links('vendor.pagination.materializecss')}}
        </div>

    </div>



@endsection
