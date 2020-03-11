@extends('layout.site')

@section('titulo','Cursos')

@section('conteudo')
    <div class="container">
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
                        <td>{{ $emprestimo->dataDevolucao }}</td>
                        <td>{{ $emprestimo->quantidade }}</td>

                        @if(!$emprestimo->devolvido)
                        <td>
                            <a class="btn deep-orange" style="height: 70px;" href="{{route('emprestimos.devolver', ['idEquipamento' => $emprestimo->idEquipamento, 'quantidade' => $emprestimo->quantidade, 'idEmprestimo' => $emprestimo->id] )}}">Marcar Devolução</a>
                        
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
