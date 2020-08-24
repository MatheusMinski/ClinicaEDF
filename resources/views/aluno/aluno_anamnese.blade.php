@extends('layout.site')

@section('titulo','Anamnese')

@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="card horizontal" style="width: 45%; float: left; margin: 2%">
                <div class="card-stacked">
                    <div class="card-content" style="box-shadow:  15px 15px 27px #e1e1e3, 15px 15px 27px #ffffff;">
                        <h6 style="padding-bottom: 10px">Encaminhameneto: {{$dadosAnamnese->encaminhamento}}</h6>
                        <h6 style="padding-bottom: 10px">Nome do profissional: {{$dadosAnamnese->nomeDoProfissional}}</h6>
                        <h6 style="padding-bottom: 10px">Especialidade: {{ $dadosAnamnese->especialidadeDoProfissional }}</h6>
                        <h6 style="padding-bottom: 10px">Motivo do encaminhamento: {{ $dadosAnamnese->motivoEncaminhamento }}</h6>
                        <h6 style="padding-bottom: 10px">Saúde geral: {{$dadosAnamnese->saudeGeral}}</h6>
                        <h6 style="padding-bottom: 10px">Fuma cigarro: {{$dadosAnamnese->fumaCigarro}}</h6>
                        <h6 style="padding-bottom: 10px">Quantidade: {{$dadosAnamnese->fumaCigarroQuantidadeDia}}</h6>
                        <h6 style="padding-bottom: 10px">Já fumou antes: {{$dadosAnamnese->jaFumou}}</h6>
                        <h6 style="padding-bottom: 10px">Quantos anos: {{$dadosAnamnese->jaFumouQuantidadeAnos}}</h6>
                        <h6 style="padding-bottom: 10px">Parou a quanto tempo: {{$dadosAnamnese->jaFumouParouAQuantoTempoAnos}}</h6>
                        <h6 style="padding-bottom: 10px">Descrição do problema de saúde: {{$dadosAnamnese->descricaoProblemaSaude}}</h6>
                        <h6 style="padding-bottom: 10px">Caiu nos últimos 12 meses: {{$dadosAnamnese->caiu12Meses}}</h6>
                        <h6 style="padding-bottom: 10px">Quantas vezes: {{$dadosAnamnese->quantasQuedas}}</h6>
                        <h6 style="padding-bottom: 10px">Qual a data: {{date('d/m/Y', strtotime($dadosAnamnese->data))}}</h6>
                        <h6 style="padding-bottom: 10px">Qual a razão da queda: {{$dadosAnamnese->razaoQueda}}</h6>
                        <h6 style="padding-bottom: 10px">Local da queda: {{$dadosAnamnese->localQueda}}</h6>
                        <h6 style="padding-bottom: 10px">Foi hospitalizado: {{$dadosAnamnese->hospitalizacao}}</h6>
                        <h6 style="padding-bottom: 10px">Objetivos ao procurar a clínica: {{$dadosAnamnese->objetivosAoProcurarAClinica}}</h6>
                        <h6 style="padding-bottom: 10px">Já tentou resolver antes: {{$dadosAnamnese->jaTentouResolverAntes}}</h6>
                        <h6 style="padding-bottom: 10px">Quantas vezes: {{$dadosAnamnese->quantasVezes}}</h6>
                        <h6 style="padding-bottom: 10px">Já desistiu: {{$dadosAnamnese->jaDesistiu}}</h6>
                        <h6 style="padding-bottom: 10px">Motivo da desistência: {{$dadosAnamnese->motivoDesistencia}}</h6>
                        <a class="btn blue" style="margin-top: 5%"  href="{{route('aluno.cadastro.anamnese.editar', $dadosAnamnese->idTreinamento)}}">Editar</a>
                    </div>
                </div>
            </div>

            <div class="card horizontal" style="width: 45%; float: left; margin: 2%">
                <div class="card-stacked">
                    <div class="card-content" style="box-shadow:  15px 15px 27px #e1e1e3, 15px 15px 27px #ffffff;">
                        <h6 style="padding-bottom: 10px">Dor em alguma região do corpo: {{$dadosAnamnese->dorRegiaoDoCorpo}}</h6>
                        <h6 style="padding-bottom: 10px">Sintoma ou dor (1): {{$dadosAnamnese->descricaoSintomaDor1}}</h6>
                        <h6 style="padding-bottom: 10px">Profissional que Tratou: {{$dadosAnamnese->ProfissionalQueTratou1}}</h6>
                        <h6 style="padding-bottom: 10px">Início e fim do tratamento: {{$dadosAnamnese->inicioFim1}}</h6>
                        <h6 style="padding-bottom: 10px">Escala da dor 0 a 10: {{$dadosAnamnese->EVA1}}</h6>
                        <h6 style="padding-bottom: 10px">Sintoma ou dor (2): {{$dadosAnamnese->descricaoSintomaDor2}}</h6>
                        <h6 style="padding-bottom: 10px">Profissional que Tratou: {{$dadosAnamnese->ProfissionalQueTratou2}}</h6>
                        <h6 style="padding-bottom: 10px">Início e fim do tratamento: {{$dadosAnamnese->inicioFim2}}</h6>
                        <h6 style="padding-bottom: 10px">Escala da dor 0 a 10: {{$dadosAnamnese->EVA2}}</h6>
                        <h6 style="padding-bottom: 10px">Sintoma ou dor (3): {{$dadosAnamnese->descricaoSintomaDor3}}</h6>
                        <h6 style="padding-bottom: 10px">Profissional que Tratou: {{$dadosAnamnese->ProfissionalQueTratou3}}</h6>
                        <h6 style="padding-bottom: 10px">Início e fim do tratamento: {{$dadosAnamnese->inicioFim3}}</h6>
                        <h6 style="padding-bottom: 10px">Escala da dor 0 a 10: {{$dadosAnamnese->EVA3}}</h6>
                        <h6 style="padding-bottom: 10px">Sintoma ou dor (4): {{$dadosAnamnese->descricaoSintomaDor4}}</h6>
                        <h6 style="padding-bottom: 10px">Profissional que Tratou: {{$dadosAnamnese->ProfissionalQueTratou4}}</h6>
                        <h6 style="padding-bottom: 10px">Início e fim do tratamento: {{$dadosAnamnese->inicioFim4}}</h6>
                        <h6 style="padding-bottom: 10px">Escala da dor 0 a 10: {{$dadosAnamnese->EVA4}}</h6>
                        <h6 style="padding-bottom: 10px">Esforços para realizar as tarefas de casa, 0 a 10: {{$dadosAnamnese->esforcosTarefaCasa}}</h6>
                        <h6 style="padding-bottom: 10px">Esforços para andar fora de casa 0 a 10: {{$dadosAnamnese->esforcoAndarForaDeCasa}}</h6>
                        <h6 style="padding-bottom: 10px">Esforço ao realizar lazer 0 a 10: {{$dadosAnamnese->esforcoLazer}}</h6>
                        <h6 style="padding-bottom: 10px">Esforço ao trabalhar: {{$dadosAnamnese->esforcoTrabalho}}</h6>
                        <h6 style="padding-bottom: 10px">Pratica algum exercício físico: {{$dadosAnamnese->exercicioFisicoRegular}}</h6>
                        <h6 style="padding-bottom: 10px">Quantas vezes por semana: {{$dadosAnamnese->quantasVezesSemana}}</h6>
                        <h6 style="padding-bottom: 10px">Esforço para realizar esse exercício 0 a 10: {{$dadosAnamnese->esforcoParaEsseExercicio}}</h6>

                        <a style="margin-top: 5%" class="btn blue"  href="{{route('aluno.cadastro.anamnese.editar', $dadosAnamnese->idTreinamento)}}">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
