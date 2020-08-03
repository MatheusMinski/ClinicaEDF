@extends('layout.site')

@section('titulo','Avaliação Funcional')

@section('conteudo')
    <div class="container">
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form method="post" action="{{route('aluno.cadastro.avaliacao.update')}}">
                {{csrf_field()}}

                <br /><br />
                <h4>Cadastro de Aluno - Avaliação Funcional</h4>
                <br /><br />
                @if(isset($errors) && count ($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <br /><br />


                <input value="{{$dadosAvaliacaoFuncional->idTreinamento}}" type="hidden" name="idTreinamento">

                <h4>Hemodinâmica</h4>
                <br/>
                <h6>Pressão Arterial</h6>
                <br />

                <label for="">PAS</label>
                <input value="{{$dadosAvaliacaoFuncional->pressaoArterialPAS}}" type='number' id='' name='pressaoArterialPAS' value="" class="form-control">
                <br/>

                <label for="">PAD</label>
                <input value="{{$dadosAvaliacaoFuncional->pressaoArterialPAD}}" name="pressaoArterialPAD" id="" value="" type="number" class="form-control">
                <br /><br />

                <label for="">Frequência Cardíaca Média</label>
                <input value="{{$dadosAvaliacaoFuncional->freqCardiacaMedia}}" name="freqCardiacaMedia" id="" value="" type="number" class="form-control">
                <br /><br />

                <label for="">Saturação O2</label>
                <input value="{{$dadosAvaliacaoFuncional->saturacaoO2}}" name="saturacaoO2" id="" value="" type="text" class="form-control">
                <br /><br />

                <h6>Capacidade Vital</h6>
                <br />
                <label for="">Valor 1</label>
                <input value="{{$dadosAvaliacaoFuncional->capacidadeVital1}}" type='number' id='' name='capacidadeVital1' class="form-control">
                <br/>
                <label for="">Valor 2</label>
                <input value="{{$dadosAvaliacaoFuncional->capacidadeVital2}}" type='number' id='' name='capacidadeVital2' class="form-control">
                <br/>
                <label for="">Valor 3</label>
                <input value="{{$dadosAvaliacaoFuncional->capacidadeVital3}}" type='number' id='' name='capacidadeVital3' class="form-control">
                <br/><br/>


                <h4>Antropometria</h4>
                <br/>
                <label for="">Massa Corporal (kg)</label>
                <input value="{{$dadosAvaliacaoFuncional->massaCorporal}}" type='number' id='' name='massaCorporal' class="form-control">
                <br/>

                <label for="">Estatura (cm)</label>
                <input value="{{$dadosAvaliacaoFuncional->estaturaCm}}" type='number' id='' name='estaturaCm' class="form-control">
                <br/>

                <label for="">Circunferência da cintura (cm)</label>
                <input value="{{$dadosAvaliacaoFuncional->circunferenciaCintura}}" type='number' id='' name='circunferenciaCintura' class="form-control">
                <br/>

                <label for="">Circunferência do pescoço (cm)</label>
                <input value="{{$dadosAvaliacaoFuncional->circunferenciaPescoco}}" type='number' id='' name='circunferenciaPescoco' class="form-control">
                <br/><br/>

                <h4>Bioimpedância</h4>
                <br/>
                <label for="">Massa magra (%)</label>
                <input value="{{$dadosAvaliacaoFuncional->massaMagra}}" type='number' id='' name='massaMagra' class="form-control">
                <br/>

                <label for="">Gordura (%)</label>
                <input value="{{$dadosAvaliacaoFuncional->gordura}}" type='number' id='' name='gordura' class="form-control">
                <br/>

                <label for="">H20 (%)</label>
                <input value="{{$dadosAvaliacaoFuncional->h2o}}" type='number' id='' name='h2o' class="form-control">
                <br/>

                <label for="">TMB (kcal)</label>
                <input value="{{$dadosAvaliacaoFuncional->tmb}}" type='number' id='' name='tmb' class="form-control">
                <br/>

                <h4>Flexibilidade</h4>
                <br/>
                <label for="">Sentar-e-alcançar (cm) : Maior valor</label>
                <input value="{{$dadosAvaliacaoFuncional->sentarEAlcancarMaior}}" type='number' id='' name='sentarEAlcancarMaior' class="form-control">
                <br/>

                <label for="">Ombro direito (cm)</label>
                <input value="{{$dadosAvaliacaoFuncional->ombroDireito}}" type='number' id='' name='ombroDireito' class="form-control">
                <br/>

                <label for="">Ombro esquerdo (cm)</label>
                <input value="{{$dadosAvaliacaoFuncional->ombroEsquerdo}}" type='number' id='' name='ombroEsquerdo' class="form-control">
                <br/>


                <h4>Equilíbrio</h4>
                <br/>

                <label for="">Apoio unipodal Direita (seg)</label>
                <input value="{{$dadosAvaliacaoFuncional->apoioUnipodalDireita}}" type='number' id='' name='apoioUnipodalDireita' class="form-control">
                <br/>

                <label for="">Apoio unipodal Esquerda (seg)</label>
                <input value="{{$dadosAvaliacaoFuncional->apoioUnipodalEsquerda}}" type='number' id='' name='apoioUnipodalEsquerda' class="form-control">
                <br/>

                <label for="">Alcance funcional (cm)</label>
                <input value="{{$dadosAvaliacaoFuncional->alcanceFuncional}}" type='number' id='' name='alcanceFuncional' class="form-control">
                <br/>

                <h4>Força e resistência</h4>
                <br/>

                <label for="">Preensão manual Direita (kg)</label>
                <input value="{{$dadosAvaliacaoFuncional->pressaoManualDireita}}" type='number' id='' name='pressaoManualDireita' class="form-control">
                <br/>

                <label for="">Preensão manual Esquerda  (kg)</label>
                <input value="{{$dadosAvaliacaoFuncional->pressaoManualEsquerda}}" type='number' id='' name='pressaoManualEsquerda' class="form-control">
                <br/><br/>

                <h4>Sentar-levantar cadeira</h4>
                <br/>
                <label for="">Rep</label>
                <input value="{{$dadosAvaliacaoFuncional->sentarLevantarCadeiraRep}}" type='number' id='' name='sentarLevantarCadeiraRep' class="form-control">
                <br/>

                <label for="">FCmáx</label>
                <input value="{{$dadosAvaliacaoFuncional->sentarLevantarCadeiraFCMax}}" type='number' id='' name='sentarLevantarCadeiraFCMax' class="form-control">
                <br/>

                <h4>Resistência Aeróbica</h4>
                <br/>
                <label for="">Distância teste de 6 min (m)</label>
                <input value="{{$dadosAvaliacaoFuncional->distanciaTeste6Min}}" type='number' id='' name='distanciaTeste6Min' class="form-control">
                <br/>
                <label for="">Pedômetro teste de 6 min</label>
                <input value="{{$dadosAvaliacaoFuncional->pedometroTeste6Min}}" type='number' id='' name='pedometroTeste6Min' class="form-control">
                <br/>

                <h4>FC teste de 6 minutos</h4>
                <br/>
                <label for="">Minuto 1</label>
                <input value="{{$dadosAvaliacaoFuncional->fcTeste6Min1}}" type='number' id='' name='fcTeste6Min1' class="form-control">
                <br/>
                <label for="">Minuto 2</label>
                <input value="{{$dadosAvaliacaoFuncional->fcTeste6Min2}}" type='number' id='' name='fcTeste6Min2' class="form-control">
                <br/>
                <label for="">Minuto 3</label>
                <input value="{{$dadosAvaliacaoFuncional->fcTeste6Min3}}" type='number' id='' name='fcTeste6Min3' class="form-control">
                <br/>
                <label for="">Minuto 4</label>
                <input value="{{$dadosAvaliacaoFuncional->fcTeste6Min4}}" type='number' id='' name='fcTeste6Min4' class="form-control">
                <br/>
                <label for="">Minuto 5</label>
                <input value="{{$dadosAvaliacaoFuncional->fcTeste6Min5}}" type='number' id='' name='fcTeste6Min5' class="form-control">
                <br/>
                <label for="">Minuto 6</label>
                <input value="{{$dadosAvaliacaoFuncional->fcTeste6Min6}}" type='number' id='' name='fcTeste6Min6' class="form-control">
                <br/><br/>

                <h4>FC Recuperação</h4>
                <br/>
                <label for="">Minuto 1</label>
                <input value="{{$dadosAvaliacaoFuncional->fcRecuperacaoUmMin}}" type='number' id='' name='fcRecuperacaoUmMin' class="form-control">
                <br/>
                <label for="">Minuto 5</label>
                <input value="{{$dadosAvaliacaoFuncional->fcRecuperacaoTresMin}}" type='number' id='' name='fcRecuperacaoTresMin' class="form-control">
                <br/>
                <label for="">Minuto 10</label>
                <input value="{{$dadosAvaliacaoFuncional->fcRecuperacaoCincoMin}}" type='number' id='' name='fcRecuperacaoCincoMin' class="form-control">
                <br/><br/>

                <h4>PAS Teste 6 minutos (mmHg)</h4>
                <br/>
                <label for="">Minuto 1</label>
                <input value="{{$dadosAvaliacaoFuncional->pasTesteUmMin}}" type='number' id='' name='pasTesteUmMin' class="form-control">
                <br/>
                <label for="">Minuto 5</label>
                <input value="{{$dadosAvaliacaoFuncional->pasTesteCincoMin}}" type='number' id='' name='pasTesteCincoMin' class="form-control">
                <br/>
                <label for="">Minuto 10</label>
                <input value="{{$dadosAvaliacaoFuncional->pasTesteDezMin}}" type='number' id='' name='pasTesteDezMin' class="form-control">
                <br/><br/>

                <h4>PAD Teste 6 minutos (mmHg)</h4>
                <br/>
                <label for="">Minuto 1</label>
                <input value="{{$dadosAvaliacaoFuncional->padTesteUmMin}}" type='number' id='' name='padTesteUmMin' class="form-control">
                <br/>
                <label for="">Minuto 5</label>
                <input value="{{$dadosAvaliacaoFuncional->padTesteCincoMin}}" type='number' id='' name='padTesteCincoMin' class="form-control">
                <br/>
                <label for="">Minuto 10</label>
                <input value="{{$dadosAvaliacaoFuncional->padTesteDezMin}}" type='number' id='' name='padTesteDezMin' class="form-control">
                <br/><br/>

                <label for="">Teste extra 1/label>
                    <input value="{{$dadosAvaliacaoFuncional->testeExtra1}}" type='text' id='' name='testeExtra1' class="form-control">

                    <label for="">Resposta teste extra 1</label>
                    <input value="{{$dadosAvaliacaoFuncional->respostaTesteExtraUm}}" type='text' id='' name='respostaTesteExtraUm' class="form-control">

                    <label for="">Teste extra 2</label>
                    <input value="{{$dadosAvaliacaoFuncional->testeExtra2}}" type='text' id='' name='testeExtra2' class="form-control">

                    <label for="">Resposta teste extra 2</label>
                    <input value="{{$dadosAvaliacaoFuncional->respostaTesteExtraDois}}" type='text' id='' name='respostaTesteExtraDois' class="form-control">

                    <label for="">Teste extra 3</label>
                    <input value="{{$dadosAvaliacaoFuncional->testeExtra3}}" type='text' id='' name='testeExtra3' class="form-control">

                    <label for="">Resposta teste extra 3</label>
                    <input value="{{$dadosAvaliacaoFuncional->respostaTesteExtraTres}}" type='text' id='' name='respostaTesteExtraTres' class="form-control">

                    <label for="">Teste extra 4</label>
                    <input value="{{$dadosAvaliacaoFuncional->testeExtra4}}" type='text' id='' name='testeExtra4' class="form-control">

                    <label for="">Resposta teste extra 4</label>
                    <input value="{{$dadosAvaliacaoFuncional->respostaTesteExtraQuatro}}" type='text' id='' name='respostaTesteExtraQuatro' class="form-control">



                    <button class="btn blue"> FINALIZAR &raquo</button>
                    <br /><br /><br /><br />

            </form>


        </div>
    </div>
    </div>



@endsection
