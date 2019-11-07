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
{{--                        <td>{{ $emprestimo->quantidade }}</td>--}}
                        <td>
                            <a class="btn deep-orange" href="{{route('equipamentos.deletar',$emprestimo->id)}}">Marcar Devolução</a>
                        </td>

                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>

    </div>



@endsection
