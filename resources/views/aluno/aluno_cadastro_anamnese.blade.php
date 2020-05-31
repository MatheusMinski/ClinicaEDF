@extends('layout.site')

@section('titulo','Anamnese')

@section('conteudo')
<div class="container">
    <!--FORMULÁRIO DE CADASTRO-->
    <div id="cadastro">
        <form method="post" action="{{route('salvar.professor')}}">
            {{csrf_field()}}

            <br /><br />
            <h4>Cadastro de Aluno - Anamnese</h4>
            <br /><br />
            @if(isset($errors) && count ($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{$error}}</p>
                @endforeach
            </div>
            @endif
            <br /><br />

            <label for="">Nome do Profissional</label>
            <input value="" name="" class="form-control" required="required" maxlength="50" type="text" placeholder="" />
            <br /><br />

            <label for="">Especialidade Profissional</label>
            <input id="" value="" name="" required="required" type="text" placeholder="" class="validate" />
            <br /><br />



            <label for="">Encaminhamento</label>
            <select id='' name="select-encaminhamento" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="CEFISIO">CEFISIO</option>
                <option value="CENUT">CENUT</option>
                <option value="SSG">SSG</option>
                <option value="CEFAR">CEFAR</option>
                <option value="Outro">Outro</option>
            </select>
            <br /><br />

            <label for="">Motivo Encaminhamento</label>
            <textarea name="" id="" value="" type="text" class="form-control" placeholder=""></textarea>
            <br /><br />


            <label for="">Fuma?</label>
            <select id='' name="select-fumante" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br /><br />


            <label for="">Se sim, quantidade:</label>
            <input name="" id="" value="" type="number" class="form-control" placeholder="">
            <br /><br />

            <label for="">Já fumou?</label>
            <select id='' name="select-jaFumou" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br /><br />

            <label for="">Se sim, por quantos anos:</label>
            <input name="" id="" value="" type="number" class="form-control" placeholder="">
            <br /><br />

            <label for="">Se sim, parou a quantos anos:</label>
            <input name="" id="" value="" type="number" class="form-control" placeholder="">
            <br /><br />

            <label for="">Descrição Problemas de saúde:</label>
            <textarea name="" id="" value="" type="text" class="form-control" placeholder=""></textarea>
            <br /><br />

            <label for="">Caiu nos ultimos 12 meses?</label>
            <select id='' name="select-queda" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br /><br />

            <label for="">Se sim, quantas vezes:</label>
            <input name="" id="" value="" type="number" class="form-control" placeholder="">
            <br /><br />

            <label for="">Se sim, em que data:</label>
            <input name="" id="" value="" type="date" class="form-control" placeholder="">
            <br /><br />

            <label for="">Se sim, foi hospitalizado?</label>
            <select id='' name="select-queda" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br /><br />

            <label for="">Se sim, qual a razão da queda?</label>
            <select id='' name="select-queda" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="Chão irregular">Calçada ou piso irregular</option>
                <option value="Local molhado">Local Molhado</option>
                <option value="Tapete/Gramado">Tapete/Gramado</option>
                <option value="Degrau/Escada">Degrau/Escada</option>
                <option value="Não lembra">Não lembra</option>
                <option value="Outro motivo">Outro motivo</option>
            </select>
            <br /><br />

            <label for="">Se sim, qual o local?</label>
            <select id='' name="select-queda" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="casa">Em casa</option>
                <option value="fora de casa">Fora de casa</option>
                <option value="outro">Outro</option>
            </select>
            <br /><br />

            <label for="">Descrever objetivos ao procurar a clínica:</label>
            <textarea name="" id="" value="" type="text" class="form-control" placeholder=""></textarea>
            <br /><br />

            <label for="">Já tentou resolver isto antes?</label>
            <select id='' name="select-queda" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br /><br />

            <label for="">Se sim, quantas vezes:</label>
            <input name="" id="" value="" type="number" class="form-control" placeholder="">
            <br /><br />

            <label for="">Se sim, qual o motivo da desistência:</label>
            <textarea name="" id="" value="" type="text" class="form-control" placeholder=""></textarea>
            <br /><br />

            <label for="">Pratica exercícios físicos?</label>
            <select id='' name="select-queda" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="Manutenção">Sim, por mais de 6 meses</option>
                <option value="Ação">Sim, por menos de 6 meses</option>
                <option value="Preparação">Não, mas pretende começar nos próximos 30 dias</option>
                <option value="Contemplação">Não, mas pretende começar nos próximos 6 meses</option>
                <option value="Pré-Contemplação">Não, e não pretende começar nos próximos 6 meses</option>
            </select>
            <br /><br />

            <label for="">Possui problem cárdiaco supervisionado?</label>
            <select id='' name="select-queda" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br /><br />

            <label for="">Possui dor no peito por atividades?</label>
            <select id='' name="select-queda" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br /><br />

            <label for="">Teve dor no peito no último mês?</label>
            <select id='' name="select-queda" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br /><br />

            <label for="">Teve perde de consciência ou tontura ?</label>
            <select id='' name="select-queda" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br /><br />

            <label for="">Possui problema ósseo ou articular?</label>
            <select id='' name="select-queda" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br /><br />

            <label for="">Faz uso de remédios para pressão ou coração ?</label>
            <select id='' name="select-queda" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br /><br />



            <div class="row">
                <a class="btn blue" href="{{route('aluno.cadastro.emergencia')}}">CONTINUAR &raquo</a>
            </div>
            <br /><br /><br /><br />

        </form>


    </div>
</div>
</div>



@endsection