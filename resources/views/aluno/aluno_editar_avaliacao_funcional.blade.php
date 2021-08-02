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


                <input value="{{$dadosAvaliacaoFuncional->idTreinamento ?? old('idTreinamento')}}" type="hidden" name="idTreinamento">

                <h4>Hemodinâmica</h4>
                <br/>
                <h6>Pressão Arterial</h6>
                <br />

                <label for="">PAS</label>
                <input value="{{$dadosAvaliacaoFuncional->pressaoArterialPAS ?? old('pressaoArterialPAS')}}" type='number' step='any' id='' name='pressaoArterialPAS'    class="form-control">
                <br/>

                <label for="">PAD</label>
                <input value="{{$dadosAvaliacaoFuncional->pressaoArterialPAD ?? old('pressaoArterialPAD')}}" name="pressaoArterialPAD" id=""    type="number" class="form-control">
                <br /><br />

                <label for="">Frequência Cardíaca Média</label>
                <input value="{{$dadosAvaliacaoFuncional->freqCardiacaMedia ?? old('freqCardiacaMedia')}}" name="freqCardiacaMedia" id=""    type="number" class="form-control">
                <br /><br />

                <label for="">Saturação O2</label>
                <input value="{{$dadosAvaliacaoFuncional->saturacaoO2 ?? old('saturacaoO2')}}" name="saturacaoO2" id=""    type="text" class="form-control">
                <br /><br />

                <h6>Capacidade Vital</h6>
                <br />
                <label for="">Valor 1</label>
                <input value="{{$dadosAvaliacaoFuncional->capacidadeVital1 ?? old('capacidadeVital1')}}" type='number' step='any' id='' name='capacidadeVital1' class="form-control">
                <br/>
                <label for="">Valor 2</label>
                <input value="{{$dadosAvaliacaoFuncional->capacidadeVital2 ?? old('capacidadeVital2')}}" type='number' step='any' id='' name='capacidadeVital2' class="form-control">
                <br/>
                <label for="">Valor 3</label>
                <input value="{{$dadosAvaliacaoFuncional->capacidadeVital3 ?? old('capacidadeVital3')}}" type='number' step='any' id='' name='capacidadeVital3' class="form-control">
                <br/><br/>


                <h4>Antropometria</h4>
                <br/>
                <label for="">Massa Corporal (kg)</label>
                <input value="{{$dadosAvaliacaoFuncional->massaCorporal ?? old('massaCorporal')}}" type='number' step='any' id='' name='massaCorporal' class="form-control">
                <br/>

                <label for="">Estatura (cm)</label>
                <input value="{{$dadosAvaliacaoFuncional->estaturaCm ?? old('estaturaCm')}}" type='number' step='any' id='' name='estaturaCm' class="form-control">
                <br/>

                <label for="">Circunferência da cintura (cm)</label>
                <input value="{{$dadosAvaliacaoFuncional->circunferenciaCintura ?? old('circunferenciaCintura')}}" type='number' step='any' id='' name='circunferenciaCintura' class="form-control">
                <br/>

                <label for="">Circunferência do pescoço (cm)</label>
                <input value="{{$dadosAvaliacaoFuncional->circunferenciaPescoco ?? old('circunferenciaPescoco')}}" type='number' step='any' id='' name='circunferenciaPescoco' class="form-control">
                <br/><br/>

                <h4>Bioimpedância</h4>
                <br/>
                <label for="">Massa magra (%)</label>
                <input value="{{$dadosAvaliacaoFuncional->massaMagra ?? old('massaMagra')}}" type='number' step='any' id='' name='massaMagra' class="form-control">
                <br/>

                <label for="">Gordura (%)</label>
                <input value="{{$dadosAvaliacaoFuncional->gordura ?? old('gordura')}}" type='number' step='any' id='' name='gordura' class="form-control">
                <br/>

                <label for="">H20 (%)</label>
                <input value="{{$dadosAvaliacaoFuncional->h2o ?? old('h2o')}}" type='number' step='any' id='' name='h2o' class="form-control">
                <br/>

                <label for="">TMB (kcal)</label>
                <input value="{{$dadosAvaliacaoFuncional->tmb ?? old('tmb')}}" type='number' step='any' id='' name='tmb' class="form-control">
                <br/>

                <h4>Flexibilidade</h4>
                <br/>
                <label for="">Sentar-e-alcançar (cm) : Maior valor</label>
                <input value="{{$dadosAvaliacaoFuncional->sentarEAlcancarMaior ?? old('sentarEAlcancarMaior')}}" type='number' step='any' id='' name='sentarEAlcancarMaior' class="form-control">
                <br/>

                <label for="">Ombro direito (cm)</label>
                <input value="{{$dadosAvaliacaoFuncional->ombroDireito ?? old('ombroDireito')}}" type='number' step='any' id='' name='ombroDireito' class="form-control">
                <br/>

                <label for="">Ombro esquerdo (cm)</label>
                <input value="{{$dadosAvaliacaoFuncional->ombroEsquerdo ?? old('ombroEsquerdo')}}" type='number' step='any' id='' name='ombroEsquerdo' class="form-control">
                <br/>


                <h4>Equilíbrio</h4>
                <br/>

                <label for="">Apoio unipodal Direita (seg)</label>
                <input value="{{$dadosAvaliacaoFuncional->apoioUnipodalDireita ?? old('apoioUnipodalDireita')}}" type='number' step='any' id='' name='apoioUnipodalDireita' class="form-control">
                <br/>

                <label for="">Apoio unipodal Esquerda (seg)</label>
                <input value="{{$dadosAvaliacaoFuncional->apoioUnipodalEsquerda ?? old('apoioUnipodalEsquerda')}}" type='number' step='any' id='' name='apoioUnipodalEsquerda' class="form-control">
                <br/>

                <label for="">Alcance funcional (cm)</label>
                <input value="{{$dadosAvaliacaoFuncional->alcanceFuncional ?? old('alcanceFuncional')}}" type='number' step='any' id='' name='alcanceFuncional' class="form-control">
                <br/>

                <h4>Força e resistência</h4>
                <br/>

                <label for="">Preensão manual Direita (kg)</label>
                <input value="{{$dadosAvaliacaoFuncional->pressaoManualDireita ?? old('pressaoManualDireita')}}" type='number' step='any' id='' name='pressaoManualDireita' class="form-control">
                <br/>

                <label for="">Preensão manual Esquerda  (kg)</label>
                <input value="{{$dadosAvaliacaoFuncional->pressaoManualEsquerda ?? old('pressaoManualEsquerda')}}" type='number' step='any' id='' name='pressaoManualEsquerda' class="form-control">
                <br/><br/>

                <h4>Sentar-levantar cadeira</h4>
                <br/>
                <label for="">Rep</label>
                <input value="{{$dadosAvaliacaoFuncional->sentarLevantarCadeiraRep ?? old('sentarLevantarCadeiraRep')}}" type='number' step='any' id='' name='sentarLevantarCadeiraRep' class="form-control">
                <br/>

                <label for="">FCmáx</label>
                <input value="{{$dadosAvaliacaoFuncional->sentarLevantarCadeiraFCMax ?? old('sentarLevantarCadeiraFCMax')}}" type='number' step='any' id='' name='sentarLevantarCadeiraFCMax' class="form-control">
                <br/>

                <h4>Resistência Aeróbica</h4>
                <br/>
                <label for="">Distância teste de 6 min (m)</label>
                <input value="{{$dadosAvaliacaoFuncional->distanciaTeste6Min ?? old('distanciaTeste6Min')}}" type='number' step='any' id='' name='distanciaTeste6Min' class="form-control">
                <br/>
                <label for="">Pedômetro teste de 6 min</label>
                <input value="{{$dadosAvaliacaoFuncional->pedometroTeste6Min ?? old('pedometroTeste6Min')}}" type='number' step='any' id='' name='pedometroTeste6Min' class="form-control">
                <br/>

                <h4>FC teste de 6 minutos</h4>
                <br/>
                <label for="">Minuto 1</label>
                <input value="{{$dadosAvaliacaoFuncional->fcTeste6Min1 ?? old('fcTeste6Min1')}}" type='number' step='any' id='' name='fcTeste6Min1' class="form-control">
                <br/>
                <label for="">Minuto 2</label>
                <input value="{{$dadosAvaliacaoFuncional->fcTeste6Min2 ?? old('fcTeste6Min2')}}" type='number' step='any' id='' name='fcTeste6Min2' class="form-control">
                <br/>
                <label for="">Minuto 3</label>
                <input value="{{$dadosAvaliacaoFuncional->fcTeste6Min3 ?? old('fcTeste6Min3')}}" type='number' step='any' id='' name='fcTeste6Min3' class="form-control">
                <br/>
                <label for="">Minuto 4</label>
                <input value="{{$dadosAvaliacaoFuncional->fcTeste6Min4 ?? old('fcTeste6Min4')}}" type='number' step='any' id='' name='fcTeste6Min4' class="form-control">
                <br/>
                <label for="">Minuto 5</label>
                <input value="{{$dadosAvaliacaoFuncional->fcTeste6Min5 ?? old('fcTeste6Min5')}}" type='number' step='any' id='' name='fcTeste6Min5' class="form-control">
                <br/>
                <label for="">Minuto 6</label>
                <input value="{{$dadosAvaliacaoFuncional->fcTeste6Min6 ?? old('fcTeste6Min6')}}" type='number' step='any' id='' name='fcTeste6Min6' class="form-control">
                <br/><br/>

                <h4>FC Recuperação</h4>
                <br/>
                <label for="">Minuto 1</label>
                <input value="{{$dadosAvaliacaoFuncional->fcRecuperacaoUmMin ?? old('fcRecuperacaoUmMin')}}" type='number' step='any' id='' name='fcRecuperacaoUmMin' class="form-control">
                <br/>
                <label for="">Minuto 5</label>
                <input value="{{$dadosAvaliacaoFuncional->fcRecuperacaoTresMin ?? old('fcRecuperacaoTresMin')}}" type='number' step='any' id='' name='fcRecuperacaoTresMin' class="form-control">
                <br/>
                <label for="">Minuto 10</label>
                <input value="{{$dadosAvaliacaoFuncional->fcRecuperacaoCincoMin ?? old('fcRecuperacaoCincoMin')}}" type='number' step='any' id='' name='fcRecuperacaoCincoMin' class="form-control">
                <br/><br/>

                <h4>PAS Teste 6 minutos (mmHg)</h4>
                <br/>
                <label for="">Minuto 1</label>
                <input value="{{$dadosAvaliacaoFuncional->pasTesteUmMin ?? old('pasTesteUmMin')}}" type='number' step='any' id='' name='pasTesteUmMin' class="form-control">
                <br/>
                <label for="">Minuto 5</label>
                <input value="{{$dadosAvaliacaoFuncional->pasTesteCincoMin ?? old('pasTesteCincoMin')}}" type='number' step='any' id='' name='pasTesteCincoMin' class="form-control">
                <br/>
                <label for="">Minuto 10</label>
                <input value="{{$dadosAvaliacaoFuncional->pasTesteDezMin ?? old('pasTesteDezMin')}}" type='number' step='any' id='' name='pasTesteDezMin' class="form-control">
                <br/><br/>

                <h4>PAD Teste 6 minutos (mmHg)</h4>
                <br/>
                <label for="">Minuto 1</label>
                <input value="{{$dadosAvaliacaoFuncional->padTesteUmMin ?? old('padTesteUmMin')}}" type='number' step='any' id='' name='padTesteUmMin' class="form-control">
                <br/>
                <label for="">Minuto 5</label>
                <input value="{{$dadosAvaliacaoFuncional->padTesteCincoMin ?? old('padTesteCincoMin')}}" type='number' step='any' id='' name='padTesteCincoMin' class="form-control">
                <br/>
                <label for="">Minuto 10</label>
                <input value="{{$dadosAvaliacaoFuncional->padTesteDezMin ?? old('padTesteDezMin')}}" type='number' step='any' id='' name='padTesteDezMin' class="form-control">
                <br/><br/>

                <label for="">Teste extra 1/label>
                    <input value="{{$dadosAvaliacaoFuncional->testeExtra1 ?? old('testeExtra1')}}" type='text' id='' name='testeExtra1' class="form-control">

                    <label for="">Resposta teste extra 1</label>
                    <input value="{{$dadosAvaliacaoFuncional->respostaTesteExtraUm ?? old('respostaTesteExtraUm')}}" type='text' id='' name='respostaTesteExtraUm' class="form-control">

                    <label for="">Teste extra 2</label>
                    <input value="{{$dadosAvaliacaoFuncional->testeExtra2 ?? old('testeExtra2')}}" type='text' id='' name='testeExtra2' class="form-control">

                    <label for="">Resposta teste extra 2</label>
                    <input value="{{$dadosAvaliacaoFuncional->respostaTesteExtraDois ?? old('respostaTesteExtraDois')}}" type='text' id='' name='respostaTesteExtraDois' class="form-control">

                    <label for="">Teste extra 3</label>
                    <input value="{{$dadosAvaliacaoFuncional->testeExtra3 ?? old('testeExtra3')}}" type='text' id='' name='testeExtra3' class="form-control">

                    <label for="">Resposta teste extra 3</label>
                    <input value="{{$dadosAvaliacaoFuncional->respostaTesteExtraTres ?? old('respostaTesteExtraTres')}}" type='text' id='' name='respostaTesteExtraTres' class="form-control">

                    <label for="">Teste extra 4</label>
                    <input value="{{$dadosAvaliacaoFuncional->testeExtra4 ?? old('testeExtra4')}}" type='text' id='' name='testeExtra4' class="form-control">

                    <label for="">Resposta teste extra 4</label>
                    <input value="{{$dadosAvaliacaoFuncional->respostaTesteExtraQuatro ?? old('respostaTesteExtraQuatro')}}" type='text' id='' name='respostaTesteExtraQuatro' class="form-control">



                    <button class="btn blue"> FINALIZAR &raquo</button>
                    <br /><br /><br /><br />

            </form>


        </div>
    </div>
    </div>



@endsection
