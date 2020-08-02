@extends('layout.site')

@section('titulo','Anamnese Editar')

@section('conteudo')
    <div class="container">
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form method="post" action="{{route('aluno.cadastro.anamnese.update')}}">
                {{csrf_field()}}

                <br /><br />
                <h4>Anamnese</h4>
                <br /><br />
                @if(isset($errors) && count ($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <br /><br />

                <input type="hidden" name="idTreinamento" value="{{$dadosAnamnese->idTreinamento}}">

                <label for="">Como considera sua saúde?</label>
                <select id='' name="saudeGeral" class="browser-default" >
                    <option enabled selected value="{{$dadosAnamnese->saudeGeral}}">{{$dadosAnamnese->saudeGeral}}</option>
                    <option value="Excelente">Excelente</option>
                    <option value="Muito boa">Muito boa</option>
                    <option value="Boa">Boa</option>
                    <option value="Ruim">Ruim</option>
                    <option value="Muito ruim">Muito ruim</option>
                </select>
                <br /><br />

                <label for="">Encaminhamento</label>
                <select id='' name="encaminhamento" class="browser-default">
                    <option enabled selected value="{{$dadosAnamnese->encaminhamento}}">{{$dadosAnamnese->encaminhamento}}</option>
                    <option value="CEFISIO">CEFISIO</option>
                    <option value="CENUT">CENUT</option>
                    <option value="SSG">SSG</option>
                    <option value="CEFAR">CEFAR</option>
                    <option value="Outro">Outro</option>
                </select>
                <br /><br />

                <label for="">Nome do Profissional</label>
                <input name="nomeDoProfissional" class="form-control" value="{{$dadosAnamnese->nomeDoProfissional}}" required="required" maxlength="50" type="text" placeholder="" />
                <br /><br />

                <label for="">Especialidade Profissional</label>
                <input name="especialidadeDoProfissional" required="required" type="text" placeholder="" class="validate" value="{{$dadosAnamnese->especialidadeDoProfissional}}" />
                <br /><br />


                <label for="">Motivo Encaminhamento</label>
                <textarea name="motivoEncaminhamento" type="text" class="form-control" placeholder="">{{$dadosAnamnese->motivoEncaminhamento}}</textarea>
                <br /><br />


                <label for="">Fuma?</label>
                <select id='' name="fumaCigarro" class="browser-default">
                    <option enabled selected value="{{$dadosAnamnese->fumaCigarro}}">{{$converted_res = $dadosAnamnese->fumaCigarro ? 'Sim' : 'Não'}}</option>
                    <option value="true">Sim</option>
                    <option value="false">Não</option>
                </select>
                <br /><br />


                <label for="">Se sim, quantidade de cigarros por dia:</label>

                <input name="fumaCigarroQuantidadeDia"  value="{{$dadosAnamnese->fumaCigarroQuantidadeDia}}" type="number" class="form-control" placeholder="">
                <br /><br />

                <label for="">Já fumou?</label>
                <select id='' name="jaFumou" class="browser-default">
                    <option enabled selected value="{{$dadosAnamnese->jaFumou}}">{{$converted_res = $dadosAnamnese->jaFumou ? 'Sim' : 'Não'}}</option>
                    <option value="true">Sim</option>
                    <option value="false">Não</option>
                </select>
                <br /><br />

                <label for="">Se sim, por quantos anos:</label>
                <input name="jaFumouQuantidadeAnos" value="{{$dadosAnamnese->jaFumouQuantidadeAnos}}"  type="number" class="form-control" placeholder="">
                <br /><br />

                <label for="">Se sim, parou a quantos anos:</label>
                <input name="jaFumouParouAQuantoTempoAnos" value="{{$dadosAnamnese->jaFumouParouAQuantoTempoAnos}}" type="number" class="form-control" placeholder="">
                <br /><br />

                <label for="">Descrição Problemas de saúde:</label>
                <textarea name="descricaoProblemaSaude"  type="text" class="form-control" placeholder="">{{$dadosAnamnese->descricaoProblemaSaude}}</textarea>
                <br /><br />

                <label for="">Caiu nos ultimos 12 meses?</label>
                <select id='' name="caiu12Meses" class="browser-default">
                    <option enabled selected value="{{$dadosAnamnese->caiu12Meses}}">{{$converted_res = $dadosAnamnese->caiu12Meses ? 'Sim' : 'Não'}}</option>
                    <option value="true">Sim</option>
                    <option value="false">Não</option>
                </select>
                <br /><br />

                <label for="">Se sim, quantas vezes:</label>
                <input name="quantasQuedas" id="" value="{{$dadosAnamnese->quantasQuedas}}"type="number" class="form-control" placeholder="">
                <br /><br />

                <label for="">Se sim, em que data:</label>
                <input name="data"  value="{{date('d/m/Y', strtotime($dadosAnamnese->data))}}" class="form-control" id = "Data" placeholder="00/00/0000">
                <br /><br />

                <label for="">Se sim, qual a razão da queda?</label>
                <select id='' name="razaoQueda" class="browser-default">
                    <option enabled selected value="{{$dadosAnamnese->razaoQueda}}">{{$dadosAnamnese->razaoQueda}}</option>
                    <option value="Chão irregular">Calçada ou piso irregular</option>
                    <option value="Local molhado">Local Molhado</option>
                    <option value="Tapete/Gramado">Tapete/Gramado</option>
                    <option value="Degrau/Escada">Degrau/Escada</option>
                    <option value="Não lembra">Não lembra</option>
                    <option value="Outro motivo">Outro motivo</option>
                </select>
                <br /><br />

                <label for="">Se sim, qual o local?</label>
                <select id='' name="localQueda" class="browser-default">
                    <option enabled selected value="{{$dadosAnamnese->localQueda}}">{{$dadosAnamnese->localQueda}}</option>
                    <option value="casa">Em casa</option>
                    <option value="fora de casa">Fora de casa</option>
                    <option value="outro">Outro</option>
                </select>
                <br /><br />

                <label for="">Se sim, foi hospitalizado?</label>
                <select id='' name="hospitalizacao" class="browser-default" required>
                    <option enabled selected value="{{$dadosAnamnese->hospitalizacao}}">{{$dadosAnamnese->hospitalizacao}}</option>
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                </select>
                <br /><br />

                <label for="">Descrever objetivos ao procurar a clínica:</label>
                <textarea name="objetivosAoProcurarAClinica" id="" type="text" class="form-control"> {{$dadosAnamnese->objetivosAoProcurarAClinica}}</textarea>
                <br /><br />

                <label for="">Já tentou resolver isto antes?</label>
                <input name="jaTentouResolverAntes" type="text" value="{{$dadosAnamnese->jaTentouResolverAntes}}" class="form-control" id = "" placeholder="Sim, não, quanto tempo?">

                <br /><br />

                <label for="">Se sim, quantas vezes:</label>
                <input name="quantasVezes" id="" value="{{$dadosAnamnese->quantasVezes}}" type="number" class="form-control" placeholder="">
                <br /><br />

                <label for="">Já desistiu?</label>
                <select id='' name="jaDesistiu" class="browser-default">
                    <option enabled selected value="{{$dadosAnamnese->jaDesistiu}}">{{$converted_res = $dadosAnamnese->jaDesistiu ? 'Sim' : 'Não'}}</option>
                    <option value="true">Sim</option>
                    <option value="false">Não</option>
                </select>
                <br /><br />

                <label for="">Se sim, qual o motivo da desistência:</label>
                <textarea name="motivoDesistencia" id=""  type="text" class="form-control" placeholder="">{{$dadosAnamnese->motivoDesistencia}}</textarea>
                <br /><br />



                <label for="">Alguma dor em alguma região do corpo?</label>
                <input name="dorRegiaoDoCorpo" id="" value="{{$dadosAnamnese->dorRegiaoDoCorpo}}" type="text" class="form-control" placeholder="">
                <br /><br />

                <label for="">Descreva o Sintoma ou dor</label>
                <input name="descricaoSintomaDor1" id="" value="{{$dadosAnamnese->descricaoSintomaDor1}}" type="text" class="form-control" placeholder="">
                <br /><br />

                <label for="">Profissional que tratou essa dor</label>
                <input name="ProfissionalQueTratou1" id="" value="{{$dadosAnamnese->ProfissionalQueTratou1}}" type="text" class="form-control" placeholder="">
                <br /><br />

                <label for="">Quando foi o início e fim desse tratamento?</label>
                <input name="inicioFim1" id="" value="{{$dadosAnamnese->inicioFim1}}" type="text" class="form-control" placeholder="">
                <br /><br />

                <label for="">Selecione 1 para pouca dor e 10 para muita dor</label>
                <select id='' name="EVA1" class="browser-default">
                    <option enabled selected value="{{$dadosAnamnese->EVA1}}">{{$dadosAnamnese->EVA1}}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>

                <br /><br />

                <label for="">Descreva o Sintoma ou dor</label>
                <input name="descricaoSintomaDor2" id="" value="{{$dadosAnamnese->descricaoSintomaDor2}}" type="text" class="form-control" placeholder="">
                <br /><br />

                <label for="">Profissional que tratou essa dor</label>
                <input name="ProfissionalQueTratou2" id="" value="{{$dadosAnamnese->ProfissionalQueTratou2}}" type="text" class="form-control" placeholder="">
                <br /><br />

                <label for="">Quando foi o início e fim desse tratamento?</label>
                <input name="inicioFim2" id="" value="{{$dadosAnamnese->inicioFim2}}" type="text" class="form-control" placeholder="">
                <br /><br />

                <label for="">Selecione 1 para pouca dor e 10 para muita dor</label>
                <select id='' name="EVA2" class="browser-default">
                    <option enabled selected value="{{$dadosAnamnese->EVA2}}">{{$dadosAnamnese->EVA2}}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>

                <br /><br />

                <label for="">Descreva o Sintoma ou dor</label>
                <input name="descricaoSintomaDor3" id="" value="{{$dadosAnamnese->descricaoSintomaDor3}}" type="text" class="form-control" placeholder="">
                <br /><br />

                <label for="">Profissional que tratou essa dor</label>
                <input name="ProfissionalQueTratou3" id="" value="{{$dadosAnamnese->ProfissionalQueTratou3}}" type="text" class="form-control" placeholder="">
                <br /><br />

                <label for="">Quando foi o início e fim desse tratamento?</label>
                <input name="inicioFim3" id="" value="{{$dadosAnamnese->inicioFim3}}" type="text" class="form-control" placeholder="">
                <br /><br />

                <label for="">Selecione 1 para pouca dor e 10 para muita dor</label>
                <select id='' name="EVA3" class="browser-default">
                    <option enable selected value="{{$dadosAnamnese->EVA3}}">{{$dadosAnamnese->EVA3}}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>

                <br /><br />

                <label for="">Descreva o Sintoma ou dor</label>
                <input name="descricaoSintomaDor4" id="" value="{{$dadosAnamnese->descricaoSintomaDor4}}" type="text" class="form-control" placeholder="">
                <br /><br />

                <label for="">Profissional que tratou essa dor</label>
                <input name="ProfissionalQueTratou4" id="" value="{{$dadosAnamnese->ProfissionalQueTratou4}}" type="text" class="form-control" placeholder="">
                <br /><br />

                <label for="">Quando foi o início e fim desse tratamento?</label>
                <input name="inicioFim4" id="" value="{{$dadosAnamnese->inicioFim4}}" type="text" class="form-control" placeholder="">
                <br /><br />

                <label for="">Selecione 1 para pouca dor e 10 para muita dor</label>
                <select id='' name="EVA4" class="browser-default">
                    <option enabled selected value="{{$dadosAnamnese->EVA4}}">{{$dadosAnamnese->EVA4}}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>

                <br /><br />

                <label for="">Esforço para realizar tarefas de casa</label>
                <select id='' name="esforcosTarefaCasa" class="browser-default">
                    <option enabled selected value="{{$dadosAnamnese->esforcosTarefaCasa}}">{{$dadosAnamnese->esforcosTarefaCasa}}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>

                <br /><br />

                <label for="">Esforço para realizar tarefas de casa</label>
                <select id='' name="esforcoAndarForaDeCasa" class="browser-default">
                    <option enabled selected value="{{$dadosAnamnese->esforcoAndarForaDeCasa}}">{{$dadosAnamnese->esforcoAndarForaDeCasa}}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>

                <br /><br />

                <label for="">Esforço para realizar tarefas de casa</label>
                <select id='' name="esforcoLazer" class="browser-default">
                    <option enabled selected value="{{$dadosAnamnese->esforcoLazer}}">{{$dadosAnamnese->esforcoLazer}}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>

                <br /><br />

                <label for="">Esforço para realizar tarefas de casa</label>
                <select id='' name="esforcoTrabalho" class="browser-default">
                    <option enabled selected value="{{$dadosAnamnese->esforcoTrabalho}}">{{$dadosAnamnese->esforcoTrabalho}}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>

                <br /><br />

                <label for="">Faz algum tipo de exercício regular? Qual?</label>
                <input name="exercicioFisicoRegular" id="" value="{{$dadosAnamnese->exercicioFisicoRegular}}" type="text" class="form-control" placeholder="Não ou Nome do Exercício">
                <br /><br />

                <label for="">Quantas vezes por semana?</label>
                <select id='' name="quantasVezesSemana" class="browser-default">
                    <option enabled selected value="{{$dadosAnamnese->quantasVezesSemana}}">{{$dadosAnamnese->quantasVezesSemana}}</option>
                    <option value="1x por semana">1x por semana</option>
                    <option value="2x por semana">2x por semana</option>
                    <option value="3x por semana ou mais">3x por semana ou mais</option>
                </select>

                <br /><br />

                <label for="">Esforço para realizar esse exercício</label>
                <select id='' name="esforcoParaEsseExercicio" class="browser-default">
                    <option enabled selected value="{{$dadosAnamnese->esforcoParaEsseExercicio}}">{{$dadosAnamnese->esforcoParaEsseExercicio}}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>



                <button class="btn blue" >Salvar &raquo</button>
                <br /><br /><br /><br />

            </form>


        </div>
    </div>
    </div>


    <script>
        $(document).ready(function(){
            $('#Data').mask('99/99/9999');
        });
    </script>

@endsection
