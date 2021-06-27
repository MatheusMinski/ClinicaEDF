@extends('layout.site')

@section('titulo','Avaliação Funcional')

@section('conteudo')
    <div class="container">
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form method="post" action="{{route('aluno.cadastro.avaliacao.salvar')}}">
                {{csrf_field()}}

                <br/><br/>
                <h4>Cadastro de Aluno - Avaliação Funcional</h4>
                <br/><br/>
                @if(isset($errors) && count ($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <br/><br/>


                <input type="hidden" name="idTreinamento" value="{{$idTreinamento}}">

                <h4>Hemodinâmica</h4>
                <br/>
                <h6>Pressão Arterial</h6>
                <br/>

                <label for="">PAS<span style="color: red">*</span></label>
                <input value="{{old('pressaoArterialPAS')}}" type='number' id='' name='pressaoArterialPAS'
                       class="form-control">
                <br/>

                <label for="">PAD<span style="color: red">*</span></label>
                <input value="{{old('pressaoArterialPAD')}}" name="pressaoArterialPAD" id="" type="number"
                       class="form-control">
                <br/><br/>

                <label for="">Frequência Cardíaca Média<span style="color: red">*</span></label>
                <input value="{{old('freqCardiacaMedia')}}" name="freqCardiacaMedia" id="" type="number"
                       class="form-control">
                <br/><br/>

                <label for="">Saturação O2<span style="color: red">*</span></label>
                <input value="{{old('saturacaoO2')}}" name="saturacaoO2" id="" type="text" class="form-control">
                <br/><br/>

                <h6>Capacidade Vital</h6>
                <br/>
                <label for="">Valor 1<span style="color: red">*</span></label>
                <input value="{{old('capacidadeVital1')}}" type='number' id='' name='capacidadeVital1' class="form-control">
                <br/>
                <label for="">Valor 2<span style="color: red">*</span></label>
                <input value="{{old('capacidadeVital2')}}" type='number' id='' name='capacidadeVital2' class="form-control">
                <br/>
                <label for="">Valor 3<span style="color: red">*</span></label>
                <input value="{{old('capacidadeVital3')}}" type='number' id='' name='capacidadeVital3' class="form-control">
                <br/><br/>


                <h4>Antropometria</h4>
                <br/>
                <label for="">Massa Corporal (kg)<span style="color: red">*</span></label>
                <input value="{{old('massaCorporal')}}" type='number' id='' name='massaCorporal' class="form-control">
                <br/>

                <label for="">Estatura (cm)<span style="color: red">*</span></label>
                <input value="{{old('estaturaCm')}}" type='number' id='' name='estaturaCm' class="form-control">
                <br/>

                <label for="">Circunferência da cintura (cm)<span style="color: red">*</span></label>
                <input value="{{old('circunferenciaCintura')}}" type='number' id='' name='circunferenciaCintura' class="form-control">
                <br/>

                <label for="">Circunferência do pescoço (cm)<span style="color: red">*</span></label>
                <input value="{{old('circunferenciaPescoco')}}" type='number' id='' name='circunferenciaPescoco' class="form-control">
                <br/><br/>

                <h4>Bioimpedância</h4>
                <br/>
                <label for="">Massa magra (%)<span style="color: red">*</span></label>
                <input value="{{old('massaMagra')}}" type='number' id='' name='massaMagra' class="form-control">
                <br/>

                <label for="">Gordura (%)<span style="color: red">*</span></label>
                <input value="{{old('gordura')}}" type='number' id='' name='gordura' class="form-control">
                <br/>

                <label for="">H20 (%)<span style="color: red">*</span></label>
                <input value="{{old('h2o')}}" type='number' id='' name='h2o' class="form-control">
                <br/>

                <label for="">TMB (kcal)<span style="color: red">*</span></label>
                <input value="{{old('tmb')}}" type='number' id='' name='tmb' class="form-control">
                <br/>

                <h4>Flexibilidade</h4>
                <br/>
                <label for="">Sentar-e-alcançar (cm) : Maior valor<span style="color: red">*</span></label>
                <input value="{{old('sentarEAlcancarMaior')}}" type='number' id='' name='sentarEAlcancarMaior' class="form-control">
                <br/>

                <label for="">Ombro direito (cm)<span style="color: red">*</span></label>
                <input value="{{old('ombroDireito')}}" type='number' id='' name='ombroDireito' class="form-control">
                <br/>

                <label for="">Ombro esquerdo (cm)<span style="color: red">*</span></label>
                <input value="{{old('ombroEsquerdo')}}" type='number' id='' name='ombroEsquerdo' class="form-control">
                <br/>


                <h4>Equilíbrio</h4>
                <br/>

                <label for="">Apoio unipodal Direita (seg)<span style="color: red">*</span></label>
                <input value="{{old('apoioUnipodalDireita')}}" type='number' id='' name='apoioUnipodalDireita' class="form-control">
                <br/>

                <label for="">Apoio unipodal Esquerda (seg)<span style="color: red">*</span></label>
                <input value="{{old('apoioUnipodalEsquerda')}}" type='number' id='' name='apoioUnipodalEsquerda' class="form-control">
                <br/>

                <label for="">Alcance funcional (cm)<span style="color: red">*</span></label>
                <input value="{{old('alcanceFuncional')}}" type='number' id='' name='alcanceFuncional' class="form-control">
                <br/>

                <h4>Força e resistência</h4>
                <br/>

                <label for="">Preensão manual Direita (kg)<span style="color: red">*</span></label>
                <input value="{{old('pressaoManualDireita')}}" type='number' id='' name='pressaoManualDireita' class="form-control">
                <br/>

                <label for="">Preensão manual Esquerda (kg)<span style="color: red">*</span></label>
                <input value="{{old('pressaoManualEsquerda')}}" type='number' id='' name='pressaoManualEsquerda' class="form-control">
                <br/><br/>

                <h4>Sentar-levantar cadeira</h4>
                <br/>
                <label for="">Rep<span style="color: red">*</span></label>
                <input value="{{old('sentarLevantarCadeiraRep')}}" type='number' id='' name='sentarLevantarCadeiraRep'
                       class="form-control">
                <br/>

                <label for="">FCmáx<span style="color: red">*</span></label>
                <input value="{{old('sentarLevantarCadeiraFCMax')}}" type='number' id='' name='sentarLevantarCadeiraFCMax'
                       class="form-control">
                <br/>

                <h4>Resistência Aeróbica</h4>
                <br/>
                <label for="">Distância teste de 6 min (m)<span style="color: red">*</span></label>
                <input value="{{old('distanciaTeste6Min')}}" type='number' id='' name='distanciaTeste6Min' class="form-control">
                <br/>
                <label for="">Pedômetro teste de 6 min<span style="color: red">*</span></label>
                <input value="{{old('pedometroTeste6Min')}}" type='number' id='' name='pedometroTeste6Min' class="form-control">
                <br/>

                <h4>FC teste de 6 minutos</h4>
                <br/>
                <label for="">Minuto 1<span style="color: red">*</span></label>
                <input value="{{old('fcTeste6Min1')}}" type='number' id='' name='fcTeste6Min1' class="form-control">
                <br/>
                <label for="">Minuto 2<span style="color: red">*</span></label>
                <input value="{{old('fcTeste6Min2')}}" type='number' id='' name='fcTeste6Min2' class="form-control">
                <br/>
                <label for="">Minuto 3<span style="color: red">*</span></label>
                <input value="{{old('fcTeste6Min3')}}" type='number' id='' name='fcTeste6Min3' class="form-control">
                <br/>
                <label for="">Minuto 4<span style="color: red">*</span></label>
                <input value="{{old('fcTeste6Min4')}}" type='number' id='' name='fcTeste6Min4' class="form-control">
                <br/>
                <label for="">Minuto 5<span style="color: red">*</span></label>
                <input value="{{old('fcTeste6Min5')}}" type='number' id='' name='fcTeste6Min5' class="form-control">
                <br/>
                <label for="">Minuto 6<span style="color: red">*</span></label>
                <input value="{{old('fcTeste6Min6')}}" type='number' id='' name='fcTeste6Min6' class="form-control">
                <br/><br/>

                <h4>FC Recuperação</h4>
                <br/>
                <label for="">Minuto 1<span style="color: red">*</span></label>
                <input value="{{old('fcRecuperacaoUmMin')}}" type='number' id='' name='fcRecuperacaoUmMin' class="form-control">
                <br/>
                <label for="">Minuto 5<span style="color: red">*</span></label>
                <input value="{{old('fcRecuperacaoTresMin')}}" type='number' id='' name='fcRecuperacaoTresMin' class="form-control">
                <br/>
                <label for="">Minuto 10<span style="color: red">*</span></label>
                <input value="{{old('fcRecuperacaoCincoMin')}}" type='number' id='' name='fcRecuperacaoCincoMin' class="form-control">
                <br/><br/>

                <h4>PAS Teste 6 minutos (mmHg)</h4>
                <br/>
                <label for="">Minuto 1<span style="color: red">*</span></label>
                <input value="{{old('pasTesteUmMin')}}" type='number' id='' name='pasTesteUmMin' class="form-control">
                <br/>
                <label for="">Minuto 5<span style="color: red">*</span></label>
                <input value="{{old('pasTesteCincoMin')}}" type='number' id='' name='pasTesteCincoMin' class="form-control">
                <br/>
                <label for="">Minuto 10<span style="color: red">*</span></label>
                <input value="{{old('pasTesteDezMin')}}" type='number' id='' name='pasTesteDezMin' class="form-control">
                <br/><br/>

                <h4>PAD Teste 6 minutos (mmHg)</h4>
                <br/>
                <label for="">Minuto 1<span style="color: red">*</span></label>
                <input value="{{old('padTesteUmMin')}}" type='number' id='' name='padTesteUmMin' class="form-control">
                <br/>
                <label for="">Minuto 5<span style="color: red">*</span></label>
                <input value="{{old('padTesteCincoMin')}}" type='number' id='' name='padTesteCincoMin' class="form-control">
                <br/>
                <label for="">Minuto 10<span style="color: red">*</span></label>
                <input value="{{old('padTesteDezMin')}}" type='number' id='' name='padTesteDezMin' class="form-control">
                <br/><br/>

                <label for="">Teste extra 1</label>
                <input value="{{old('testeExtra1')}}" type='text' id='' name='testeExtra1' class="form-control">

                <label for="">Resposta teste extra 1</label>
                <input value="{{old('respostaTesteExtraUm')}}" type='text' id='' name='respostaTesteExtraUm' class="form-control">

                <label for="">Teste extra 2</label>
                <input value="{{old('testeExtra2')}}" type='text' id='' name='testeExtra2' class="form-control">

                <label for="">Resposta teste extra 2</label>
                <input value="{{old('respostaTesteExtraDois')}}" type='text' id='' name='respostaTesteExtraDois' class="form-control">

                <label for="">Teste extra 3</label>
                <input value="{{old('testeExtra3')}}" type='text' id='' name='testeExtra3' class="form-control">

                <label for="">Resposta teste extra 3</label>
                <input value="{{old('respostaTesteExtraTres')}}" type='text' id='' name='respostaTesteExtraTres' class="form-control">

                <label for="">Teste extra 4</label>
                <input value="{{old('testeExtra4')}}" type='text' id='' name='testeExtra4' class="form-control">

                <label for="">Resposta teste extra 4</label>
                <input value="{{old('respostaTesteExtraQuatro')}}" type='text' id='' name='respostaTesteExtraQuatro' class="form-control">


                <button class="btn blue"> FINALIZAR &raquo</button>
                <br/><br/><br/><br/>

            </form>


        </div>
    </div>
    </div>



@endsection
