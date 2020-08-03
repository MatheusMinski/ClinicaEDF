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
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="" class="btn blue">Ficha de Treino</a></td>
                    </tr>
                   <tr>
                        <td><a href="{{route('aluno.cadastro.anamnese', $idTreinamento)}}" class="btn blue">Anamnese</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{route('aluno.cadastro.avaliacao', $idTreinamento)}}" class="btn blue">Avaliação Funcional</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{route('aluno.cadastro.medicamentos', $idTreinamento)}}" class="btn blue">Uso de Medicamentos Contínuos</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{route('aluno.cadastro.perfilBioquimico', $idTreinamento)}}" class="btn blue">Perfil Bioquímico</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{route('aluno.cadastro.exames', $idTreinamento)}}" class="btn blue">Exames Adicionais (Se houver)</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{route('aluno.cadastro.consultas', $idTreinamento)}}" class="btn blue">Quantas Consultas (Se houver)</a></td>
                    </tr>



                </tbody>
            </table>
        </div>

    </div>




@endsection
