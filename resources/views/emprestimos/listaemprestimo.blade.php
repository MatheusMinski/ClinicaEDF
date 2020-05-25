@extends('layout.site')

@section('titulo','Cursos')

@section('conteudo')
    <div class="container" style="width: 100%">
        <br/>
        <h3 class="center">Empréstimos Realizados</h3>
        <br/><br/><br/>
        <div class="row">
            <table>
                <thead>
                <tr>
                    <th>Professor</th>
                    <th>Aluno</th>
                    <th>Equipamento</th>
                    <th>Data Devolução</th>
                    <th>Quantidade</th>
                </tr>
                </thead>
                <tbody>
                @foreach($emprestimos as $emprestimo)
                    <tr>
                        <td>{{ $emprestimo->nomeProfessorEmprestimo }}</td>
                        <td>{{ $emprestimo->nomePessoaEmprestimo }}</td>
                        <td>{{ $emprestimo->nomeEquipamentoEmprestimo }}</td>
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
