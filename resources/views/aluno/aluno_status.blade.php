@extends('layout.site')

@section('titulo','Cursos')

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
                        <td><a href="aluno_cadastro_anamnese.blade.php" class="btn blue">Anamnese</a></td>
                        <td>{{ $anamnese }}</td>
                    </tr>
                    <tr>
                        <td><a href="aluno_cadastro_avaliacaoFuncional.blade.php" class="btn blue">Avaliação Funcional</a></td>
                        <td>{{ $avaliacaoFuncional }}</td>
                    </tr>
                    <tr>
                        <td><a href="aluno_cadastro_qualidadeVida.blade.php" class="btn blue">Qualidade de Vida</a></td>
                        <td>{{ $qualidadeDeVidas }}</td>
                    </tr>
                    <tr>
                        <td><a href="aluno_cadastro_medicamentos.blade.php" class="btn blue">Uso de Medicamentos Contínuos</a></td>
                        <td>{{ $usoMedicamentosContinuos }}</td>
                    </tr>
                    <tr>
                        <td><a href="aluno_cadastro_perfilBioquimico.blade.php" class="btn blue">Perfil Bioquímico</a></td>
                        <td>{{ $perfilBioquimico }}</td>
                    </tr>
                    <tr>
                        <td><a href="aluno_cadastro_exames.blade.php" class="btn blue">Exames Adicionais (Se houver)</a></td>
                        <td>{{ $examesAdicionais }}</td>
                    </tr>
                    <tr>
                        <td><a href="aluno_cadastro_consultas.blade.php" class="btn blue">Quantas Consultas (Se houver)</a></td>
                        <td>{{ $quantasConsultas }}</td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>




@endsection
