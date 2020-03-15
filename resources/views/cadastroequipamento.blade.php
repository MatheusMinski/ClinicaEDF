@extends ('layout.site')

@section('titulo', 'Cadastro De Professores')

@section('conteudo')

    <div class="container" >
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form method="post" action="{{route('salvar.equipamento')}}">
                {{csrf_field()}}

                <br/><br/>
                <h4>Cadastro de Novo Equipamento</h4>
                <br/><br/>

                <label >Nome ou Descrição</label>
                <input name="nomeEquipamento" class="form-control" required="required" type="text" placeholder="" />
                <br/><br/>


                <label>Unidades Disponíveis</label>
                <input name="quantidadeDisponivel" type="number" min="1" placeholder="Ex.: 3">
                <br/><br/>


                <button class="next"> Finalizar Cadastro &raquo</button>
                <br/><br/><br/><br/>

            </form>



        </div>
    </div>
    </div>

@endsection


