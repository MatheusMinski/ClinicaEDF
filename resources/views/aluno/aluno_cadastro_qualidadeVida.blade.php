@extends('layout.site')

@section('titulo','Qualidade de Vida')

@section('conteudo')
<div class="container">
    <!--FORMULÁRIO DE CADASTRO-->
    <div id="cadastro">
        <form method="post" action="{{route('')}}">
            {{csrf_field()}}

            <br /><br />
            <h4>Cadastro de Aluno - Qualidade de Vida</h4>
            <br /><br />
            @if(isset($errors) && count ($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{$error}}</p>
                @endforeach
            </div>
            @endif
            <br /><br />


            <h4>Sáude geral</h4>
            <br /><br />
            <label for="">Em geral como voce diria que sua saúde é?</label>
            <select id='' name="suaSaudeEmGeral" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">Excelente</option>
                <option value="2">Muito boa</option>
                <option value="3">Boa</option>
                <option value="4">Ruim</option>
                <option value="5">Muito ruim</option>
            </select>
            <br /><br />

            <label for="">Saúde comparada a um ano atrás?</label>
            <select id='' name="saudeComparadaUmAnoAtras" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">Melhor agora</option>
                <option value="2">Um pouco melhor agora</option>
                <option value="3">Quase a mesma</option>
                <option value="4">Um pouco pior agora</option>
                <option value="5">Muito pior agora</option>
            </select>
            <br /><br />

            <h4>Dificuldades:</h4>
            <br /><br />
            <label for="">Possui dificuldade para realizar atividades rigorosas?</label>
            <select id='' name="atividadesRigorosas" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">Sim, dificulta muito</option>
                <option value="2">Sim, dificulta pouco</option>
                <option value="3">Não, nenhuma dificuldade</option>

            </select>
            <br /><br />

            <label for="">Possui dificuldade para realizar atividades moderadas?</label>
            <select id='' name="atividadesModeradas" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">Sim, dificulta muito</option>
                <option value="2">Sim, dificulta pouco</option>
                <option value="3">Não, nenhuma dificuldade</option>

            </select>
            <br /><br />

            <label for="">Possui dificuldade para levantar ou carregar Mantimentos?</label>
            <select id='' name="levantarOuCarregarMantimentos" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">Sim, dificulta muito</option>
                <option value="2">Sim, dificulta pouco</option>
                <option value="3">Não, nenhuma dificuldade</option>

            </select>
            <br /><br />

            <label for="">Possui dificuldade para subir vários lances de escada?</label>
            <select id='' name="subirVariosLancesDeEscada" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">Sim, dificulta muito</option>
                <option value="2">Sim, dificulta pouco</option>
                <option value="3">Não, nenhuma dificuldade</option>

            </select>
            <br /><br />

            <label for="">Possui dificuldade para subir um lance de escada?</label>
            <select id='' name="subirUmLanceDeEscada" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">Sim, dificulta muito</option>
                <option value="2">Sim, dificulta pouco</option>
                <option value="3">Não, nenhuma dificuldade</option>

            </select>
            <br /><br />

            <label for="">Possui dificuldade ao se curvar/ajoelhar?</label>
            <select id='' name="curvarAjoelharDobrar" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">Sim, dificulta muito</option>
                <option value="2">Sim, dificulta pouco</option>
                <option value="3">Não, nenhuma dificuldade</option>

            </select>
            <br /><br />

            <label for="">Possui dificuldade para andar mais de 1 km</label>
            <select id='' name="andarMaisDeUmKm" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">Sim, dificulta muito</option>
                <option value="2">Sim, dificulta pouco</option>
                <option value="3">Não, nenhuma dificuldade</option>

            </select>
            <br /><br />

            <label for="">Possui dificuldade para andar 1 quarteirão?</label>
            <select id='' name="andarUmQuarteirao" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">Sim, dificulta muito</option>
                <option value="2">Sim, dificulta pouco</option>
                <option value="3">Não, nenhuma dificuldade</option>

            </select>
            <br /><br />

            <label for="">Possui dificuldade para andar vários quarteirões?</label>
            <select id='' name="andarVariosQuarteiroes" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">Sim, dificulta muito</option>
                <option value="2">Sim, dificulta pouco</option>
                <option value="3">Não, nenhuma dificuldade</option>

            </select>
            <br /><br />

            <label for="">Possui dificuldade ao tomar banho ou ao vestir-se?</label>
            <select id='' name="tomarBanhoOuVestirse" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">Sim, dificulta muito</option>
                <option value="2">Sim, dificulta pouco</option>
                <option value="3">Não, nenhuma dificuldade</option>
            </select>
            <br /><br />

            <h4>Problemas com trabalho ou atividade diária regular:</h4>
            <br /><br />

            <label for="">Diminuiu o tempo que se dedicava ao trabalho ou outras ativadades?</label>
            <select id='' name="diminuiuTempoTrabalhoAtividadesFisica" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br /><br />

            <label for="">Realizou menos tarefas do que gostaria?</label>
            <select id='' name="menosTarefasGostariaFisica" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br /><br />

            <label for="">Não trabalhou ou não fez qualquer atividade como tanto cuidado como geralmente faz?</label>
            <select id='' name="limitadoTempoTrabalhoOutrosFisica" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>
            <br /><br />

            <label for="">Durante as ultimas 4 semanas,de que maneira sua saúde física ou problemas emocionais interferiam nas atividades sociais normais, em relação à família,
                vizinhos, amigos ou em grupo??</label>
            <select id='' name="diminuiuTempoTrabalhoAtividadesEmocional" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">De forma nenhuma</option>
                <option value="2">Ligeiramente</option>
                <option value="3">Moderadamente</option>
                <option value="4">Bastante</option>
                <option value="5">Extremamente</option>
            </select>
            <br /><br />

            <h4>Dores:</h4>
            <br /><br />

            <label for="">Quanta dor no corpo teve durante as últimas 4 semanas?</label>
            <select id='' name="dorNoCorpoQuatroSemanas" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">Nenhuma</option>
                <option value="2">Muito leve</option>
                <option value="3">Leve</option>
                <option value="4">Moderada</option>
                <option value="5">Grave</option>
                <option value="6">Muito Grave</option>
            </select>
            <br /><br />

            <label for="">Durante as ultimas 4 semanas,quanto a dor interferiu com o seu
                trabalho normal (incluindo tanto o trabalho, fora de casa e dentro de casa)?</label>
            <select id='' name="quantoADorInterferiuTrabalho" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">De forma nenhuma</option>
                <option value="2">Ligeiramente</option>
                <option value="3">Moderadamente</option>
                <option value="4">Bastante</option>
                <option value="5">Extremamente</option>
            </select>
            <br /><br />

            <h4>Como se sente e como tudo tem acontecido durante as 4 últimas semanas:</h4>
            <br /><br />

            <label for="">Quanto tempo você tem se sentido cheio de vigor, cheio de vontade, cheio de força?</label>
            <select id='' name="quantoTempoVigor" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">O tempo todo</option>
                <option value="2">Maior parte do tempo</option>
                <option value="3">Uma boa parte do tempo</option>
                <option value="4">Uma pequena parte do tempo</option>
                <option value="5">Nunca</option>
            </select>
            <br /><br />

            <label for="">Quanto tempo você tem se sentido uma pessoa muito nervosa?</label>
            <select id='' name="quantoTempoMuitoNervosa" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">O tempo todo</option>
                <option value="2">Maior parte do tempo</option>
                <option value="3">Uma boa parte do tempo</option>
                <option value="4">Uma pequena parte do tempo</option>
                <option value="5">Nunca</option>
            </select>
            <br /><br />

            <label for="">Quanto tempo você tem se sentido tão deprimido que nada pode animá-lo?</label>
            <select id='' name="quantoTempoDeprimido" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">O tempo todo</option>
                <option value="2">Maior parte do tempo</option>
                <option value="3">Uma boa parte do tempo</option>
                <option value="4">Uma pequena parte do tempo</option>
                <option value="5">Nunca</option>
            </select>
            <br /><br />

            <label for="">Quanto tempo você tem se sentido calmo ou tranquilo?</label>
            <select id='' name="quantoTempoCalmo" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">O tempo todo</option>
                <option value="2">Maior parte do tempo</option>
                <option value="3">Uma boa parte do tempo</option>
                <option value="4">Uma pequena parte do tempo</option>
                <option value="5">Nunca</option>
            </select>
            <br /><br />

            <label for="">Quanto tempo você tem se sentido com muita energia?</label>
            <select id='' name="quantoTempoMuitaEnergia" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">O tempo todo</option>
                <option value="2">Maior parte do tempo</option>
                <option value="3">Uma boa parte do tempo</option>
                <option value="4">Uma pequena parte do tempo</option>
                <option value="5">Nunca</option>
            </select>
            <br /><br />

            <label for="">Quanto tempo você tem se sentido desanimado e abatido?</label>
            <select id='' name="quantoTempoDesanimadoAbatido" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">O tempo todo</option>
                <option value="2">Maior parte do tempo</option>
                <option value="3">Uma boa parte do tempo</option>
                <option value="4">Uma pequena parte do tempo</option>
                <option value="5">Nunca</option>
            </select>
            <br /><br />

            <label for="">Quanto tempo você tem se sentido esgotado?</label>
            <select id='' name="quantoTempoEsgotado" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">O tempo todo</option>
                <option value="2">Maior parte do tempo</option>
                <option value="3">Uma boa parte do tempo</option>
                <option value="4">Uma pequena parte do tempo</option>
                <option value="5">Nunca</option>
            </select>
            <br /><br />

            <label for="">Quanto tempo você tem se sentido uma pessoa feliz?</label>
            <select id='' name="quantoTempoFeliz" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">O tempo todo</option>
                <option value="2">Maior parte do tempo</option>
                <option value="3">Uma boa parte do tempo</option>
                <option value="4">Uma pequena parte do tempo</option>
                <option value="5">Nunca</option>
            </select>
            <br /><br />

            <label for="">Quanto tempo você tem se sentido cansado?</label>
            <select id='' name="quantoTempoCansado" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">O tempo todo</option>
                <option value="2">Maior parte do tempo</option>
                <option value="3">Uma boa parte do tempo</option>
                <option value="4">Uma pequena parte do tempo</option>
                <option value="5">Nunca</option>
            </select>
            <br /><br />

            <label for="">Durante as últimas 4 semanas, quanto do seu tempo a sua saúde física ou problemas emocionais interferiram com as suas atividades sociais (como visitar
                amigos, parentes, etc)?</label>
            <select id='' name="tempoSaudeAfetouSocial" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">O tempo todo</option>
                <option value="2">Maior parte do tempo</option>
                <option value="3">Alguma parte do tempo</option>
                <option value="4">Uma pequena parte do tempo</option>
                <option value="5">Nunca</option>
            </select>
            <br /><br />

            <h4>O quanto verdadeiro ou falso é cada uma das afirmações para você:</h4>
            <br /><br />

            <label for="">Eu costumo adoecer um pouco mais facilmente que as outras pessoas</label>
            <select id='' name="costumaAdoecerFacil" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">O tempo todo</option>
                <option value="2">Maior parte do tempo</option>
                <option value="3">Uma boa parte do tempo</option>
                <option value="4">Alguma parte do tempo</option>
                <option value="5">Uma pequena parte do tempo</option>
            </select>
            <br /><br />

            <label for="">Eu sou tão saudável quanto qualquer pessoa que eu conheço</label>
            <select id='' name="taoSaudavelQuantoOutrasPessoas" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">O tempo todo</option>
                <option value="2">Maior parte do tempo</option>
                <option value="3">Uma boa parte do tempo</option>
                <option value="4">Alguma parte do tempo</option>
                <option value="5">Uma pequena parte do tempo</option>
            </select>
            <br /><br />

            <label for="">Eu acho que a minha saúde vai piorar</label>
            <select id='' name="minhaSaudeVaiPiorar" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">O tempo todo</option>
                <option value="2">Maior parte do tempo</option>
                <option value="3">Uma boa parte do tempo</option>
                <option value="4">Alguma parte do tempo</option>
                <option value="5">Uma pequena parte do tempo</option>
            </select>
            <br /><br />

            <label for="">Minha saúde é excelente</label>
            <select id='' name="minhaSaudeEExcelente" class="browser-default">
                <option disabled selected value>Selecione Uma Opção</option>
                <option value="1">O tempo todo</option>
                <option value="2">Maior parte do tempo</option>
                <option value="3">Uma boa parte do tempo</option>
                <option value="4">Alguma parte do tempo</option>
                <option value="5">Uma pequena parte do tempo</option>
            </select>
            <br /><br />




            <button class="btn blue"> CONTINUAR &raquo</button>
            <br /><br /><br /><br />

        </form>


    </div>
</div>
</div>



@endsection