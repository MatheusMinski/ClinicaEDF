@extends('layout.site')

@section('titulo','Anamnese')

@section('conteudo')
    <div class="container">
        <div class="col s12 m7">

            <div class="card horizontal" style="width: 45%; float: left; margin: 2%">

                <div class="card-stacked">
                    <div class="card-content" style="box-shadow:  15px 15px 27px #e1e1e3, 15px 15px 27px #ffffff;">

                        <h6 style="padding-bottom: 10px">PAS: {{$dadosAvaliacaoFuncional->pressaoArterialPAS}}</h6>
                        <h6 style="padding-bottom: 10px">PAD: {{$dadosAvaliacaoFuncional->pressaoArterialPAD}}</h6>
                        <h6 style="padding-bottom: 10px">Frequência cardíaca média: {{ $dadosAvaliacaoFuncional->freqCardiacaMedia }}</h6>
                        <h6 style="padding-bottom: 10px">Saturação O2: {{ $dadosAvaliacaoFuncional->saturacaoO2 }}</h6>
                        <h6 style="padding-bottom: 10px">Capacidade Vital (1): {{$dadosAvaliacaoFuncional->capacidadeVital1}}</h6>
                        <h6 style="padding-bottom: 10px">Capacidade Vital (2): {{$dadosAvaliacaoFuncional->capacidadeVital2}}</h6>
                        <h6 style="padding-bottom: 10px">Capacidade Vital (3): {{$dadosAvaliacaoFuncional->capacidadeVital3}}</h6>
                        <h6 style="padding-bottom: 10px">Massa Corporal: {{$dadosAvaliacaoFuncional->massaCorporal}}</h6>
                        <h6 style="padding-bottom: 10px">Estatura (cm): {{$dadosAvaliacaoFuncional->estaturaCm}}</h6>
                        <h6 style="padding-bottom: 10px">Circunferência cintura (cm): {{$dadosAvaliacaoFuncional->circunferenciaCintura}}</h6>
                        <h6 style="padding-bottom: 10px">Circunferência pescoço (cm): {{$dadosAvaliacaoFuncional->circunferenciaPescoco}}</h6>
                        <h6 style="padding-bottom: 10px">Massa magra: {{$dadosAvaliacaoFuncional->massaMagra}}</h6>
                        <h6 style="padding-bottom: 10px">Gordura: {{$dadosAvaliacaoFuncional->gordura}}</h6>
                        <h6 style="padding-bottom: 10px">h2o: {{$dadosAvaliacaoFuncional->h2o}}</h6>
                        <h6 style="padding-bottom: 10px">TMB: {{$dadosAvaliacaoFuncional->tmb}}</h6>
                        <h6 style="padding-bottom: 10px">Sentar e Alcaçar Maior: {{$dadosAvaliacaoFuncional->sentarEAlcancarMaior}}</h6>
                        <h6 style="padding-bottom: 10px">Ombro Direito: {{$dadosAvaliacaoFuncional->ombroDireito}}</h6>
                        <h6 style="padding-bottom: 10px">Ombro Esquerdo: {{$dadosAvaliacaoFuncional->ombroEsquerdo}}</h6>
                        <h6 style="padding-bottom: 10px">Apoio unipodal direita: {{$dadosAvaliacaoFuncional->apoioUnipodalDireita}}</h6>
                        <h6 style="padding-bottom: 10px">Apoio unipodal esquerda: {{$dadosAvaliacaoFuncional->apoioUnipodalEsquerda}}</h6>
                        <h6 style="padding-bottom: 10px">Alcance funcional: {{$dadosAvaliacaoFuncional->alcanceFuncional}}</h6>
                        <h6 style="padding-bottom: 10px">Pressão manual direita: {{$dadosAvaliacaoFuncional->pressaoManualDireita}}</h6>
                        <h6 style="padding-bottom: 10px">Pressão manual esquerda: {{$dadosAvaliacaoFuncional->pressaoManualEsquerda}}</h6>
                        <h6 style="padding-bottom: 10px">Sentar e levantar cadeira (rep): {{$dadosAvaliacaoFuncional->sentarLevantarCadeiraRep}}</h6>
                        <h6 style="padding-bottom: 10px">Sentar e Levantar (FCMax): {{$dadosAvaliacaoFuncional->sentarLevantarCadeiraFCMax}}</h6>
                        <h6 style="padding-bottom: 10px">Distância teste 6min: {{$dadosAvaliacaoFuncional->distanciaTeste6Min}}</h6>
                        <h6 style="padding-bottom: 10px">Pedometro Teste 6min: {{$dadosAvaliacaoFuncional->pedometroTeste6Min}}</h6>

                        <a class="btn blue"  href="{{route('aluno.cadastro.avaliacao.editar', $dadosAvaliacaoFuncional->idTreinamento)}}">Editar</a>
                    </div>
                </div>
            </div>

            <div class="col s12 m7">

                <div class="card horizontal" style="width: 45%; float: left; margin: 2%">

                    <div class="card-stacked">
                        <div class="card-content" style="box-shadow:  15px 15px 27px #e1e1e3, 15px 15px 27px #ffffff;">
                            <h6 style="padding-bottom: 10px">FC teste 6min (1): {{$dadosAvaliacaoFuncional->fcTeste6Min1}}</h6>
                            <h6 style="padding-bottom: 10px">FC teste 6min (2): {{$dadosAvaliacaoFuncional->fcTeste6Min2}}</h6>
                            <h6 style="padding-bottom: 10px">FC teste 6min (3): {{$dadosAvaliacaoFuncional->fcTeste6Min3}}</h6>
                            <h6 style="padding-bottom: 10px">FC teste 6min (4): {{$dadosAvaliacaoFuncional->fcTeste6Min4}}</h6>
                            <h6 style="padding-bottom: 10px">FC teste 6min (5): {{$dadosAvaliacaoFuncional->fcTeste6Min5}}</h6>
                            <h6 style="padding-bottom: 10px">FC teste 6min (6): {{$dadosAvaliacaoFuncional->fcTeste6Min6}}</h6>
                            <h6 style="padding-bottom: 10px">FC recuperação (1min): {{$dadosAvaliacaoFuncional->fcRecuperacaoUmMin}}</h6>
                            <h6 style="padding-bottom: 10px">FC recuperação (3min): {{$dadosAvaliacaoFuncional->fcRecuperacaoTresMin}}</h6>
                            <h6 style="padding-bottom: 10px">FC recuperação (5min): {{$dadosAvaliacaoFuncional->fcRecuperacaoCincoMin}}</h6>
                            <h6 style="padding-bottom: 10px">PAS teste 6min (mmHg) (1min): {{$dadosAvaliacaoFuncional->pasTesteUmMin}}</h6>
                            <h6 style="padding-bottom: 10px">PAS teste 6min (mmHg) (5min): {{$dadosAvaliacaoFuncional->pasTesteCincoMin}}</h6>
                            <h6 style="padding-bottom: 10px">PAS teste 6min (mmHg) (10min): {{$dadosAvaliacaoFuncional->pasTesteDezMin}}</h6>
                            <h6 style="padding-bottom: 10px">PAD teste 6min (mmHg) (1min): {{$dadosAvaliacaoFuncional->padTesteUmMin}}</h6>
                            <h6 style="padding-bottom: 10px">PAD teste 6min (mmHg) (5min): {{$dadosAvaliacaoFuncional->padTesteCincoMin}}</h6>
                            <h6 style="padding-bottom: 10px">PAD teste 6min (mmHg) (10min): {{$dadosAvaliacaoFuncional->padTesteDezMin}}</h6>
                            <h6 style="padding-bottom: 10px">Nome Teste Extra 1: {{$dadosAvaliacaoFuncional->testeExtra1}}</h6>
                            <h6 style="padding-bottom: 10px">Resposta teste 1: {{$dadosAvaliacaoFuncional->respostaTesteExtraUm}}</h6>
                            <h6 style="padding-bottom: 10px">Nome Teste Extra 2: {{$dadosAvaliacaoFuncional->testeExtra2}}</h6>
                            <h6 style="padding-bottom: 10px">Resposta teste 2: {{$dadosAvaliacaoFuncional->respostaTesteExtraDois}}</h6>
                            <h6 style="padding-bottom: 10px">Nome Teste Extra 3: {{$dadosAvaliacaoFuncional->testeExtra3}}</h6>
                            <h6 style="padding-bottom: 10px">Resposta teste 3: {{$dadosAvaliacaoFuncional->respostaTesteExtraTres}}</h6>
                            <h6 style="padding-bottom: 10px">Nome Teste Extra 4: {{$dadosAvaliacaoFuncional->testeExtra4}}</h6>
                            <h6 style="padding-bottom: 10px">Resposta teste 4: {{$dadosAvaliacaoFuncional->respostaTesteExtraQuatro}}</h6>

                            <a class="btn blue"  href="{{route('aluno.cadastro.avaliacao.editar', $dadosAvaliacaoFuncional->idTreinamento)}}">Editar</a>
                        </div>
                    </div>
                </div>
        </div>

@endsection
