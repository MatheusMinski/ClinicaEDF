@extends('layout.site')

@section('titulo','Cursos')

@section('conteudo')
    <div class="container center" style="width: 100%">
        <br/>
        <h3 class="center">{{$aluno->nome}}</h3>
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
                        <td><a class="btn blue">Endereço</a></td>
                        <td>{{ $enderecos }}</td>
                    </tr>
                    <tr>
                        <td><a class="btn blue">Ficha de Treino</a></td>
                        <td>Sem estatus</td>
                    </tr>
                   <tr>
                        <td><a class="btn blue">Anamnese</a></td>
                        <td>{{ $anamnese }}</td>
                    </tr>
                    <tr>
                        <td><a class="btn blue">Contatos de Emergência</a></td>
                        <td>{{ $contatosDeEmergencias }}</td>
                    </tr>
                    <tr>
                        <td><a class="btn blue">Avaliação Funcional</a></td>
                        <td>{{ $avaliacaoFuncional }}</td>
                    </tr>
                    <tr>
                        <td><a class="btn blue">Qualidade de Vida</a></td>
                        <td>{{ $qualidadeDeVidas }}</td>
                    </tr>
                    <tr>
                        <td><a class="btn blue">Uso de Medicamentos Contínuos</a></td>
                        <td>{{ $usoMedicamentosContinuos }}</td>
                    </tr>
                    <tr>
                        <td><a class="btn blue">Perfil Bioquímico</a></td>
                        <td>{{ $perfilBioquimico }}</td>
                    </tr>
                    <tr>
                        <td><a class="btn blue">Exames Adicionais (Se houver)</a></td>
                        <td>{{ $examesAdicionais }}</td>
                    </tr>
                    <tr>
                        <td><a class="btn blue">Quantas Consultas (Se houver)</a></td>
                        <td>{{ $quantasConsultas }}</td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>




@endsection
