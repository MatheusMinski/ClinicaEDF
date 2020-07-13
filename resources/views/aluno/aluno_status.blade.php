@extends('layout.site')

@section('titulo','Status')

@section('conteudo')
    <div class="container center" style="width: 100%">
        <br/><br/><br/>
        <div class="row">
            <table class="center" style="text-align: center">
                <thead>
                <tr>
                    <th>Ficha</th>
                    <th>Completude</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="" class="btn blue">Ficha de Treino</a></td>
                        <td>Sem estatus</td>
                    </tr>
                   <tr>
                        <td><a href="{{route('aluno.cadastro.anamnese')}}" class="btn blue">Anamnese</a></td>
                        <td>{{ $anamnese }}</td>
                    </tr>
                    <tr>
                        <td><a href="{{route('aluno.cadastro.avaliacao')}}" class="btn blue">Avaliação Funcional</a></td>
                        <td>{{ $avaliacaoFuncional }}</td>
                    </tr>
                    <tr>
                        <td><a href="{{route('aluno.cadastro.qualidadeVida')}}" class="btn blue">Qualidade de Vida</a></td>
                        <td>{{ $qualidadeDeVidas }}</td>
                    </tr>
                    <tr>
                        <td><a href="{{route('aluno.cadastro.medicamentos')}}" class="btn blue">Uso de Medicamentos Contínuos</a></td>
                        <td>{{ $usoMedicamentosContinuos }}</td>
                    </tr>
                    <tr>
                        <td><a href="{{route('aluno.cadastro.perfilBioquimico')}}" class="btn blue">Perfil Bioquímico</a></td>
                        <td>{{ $perfilBioquimico }}</td>
                    </tr>
                    <tr>
                        <td><a href="{{route('aluno.cadastro.exames')}}" class="btn blue">Exames Adicionais (Se houver)</a></td>
                        <td>{{ $examesAdicionais }}</td>
                    </tr>
                    <tr>
                        <td><a href="{{route('aluno.cadastro.consultas')}}" class="btn blue">Quantas Consultas (Se houver)</a></td>
                        <td>{{ $quantasConsultas }}</td>
                    </tr>

                    <tr>
                        <td><a href="{{route('aluno.cadastro.emergencia')}}" class="btn blue">Contato de Emergência</a></td>
                        <!--<td>  //$contatoEmergencia </td> -->
                    </tr>

                </tbody>
            </table>
        </div>

    </div>




@endsection
