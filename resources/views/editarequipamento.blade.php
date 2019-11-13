@extends ('layout.site')

@section('titulo', 'Cadastro De Professores')

@section('conteudo')

    <div class="container" >
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form method="post" action="{{route('equipamentos.editar.salvar', $registro->id)}}">
                {{csrf_field()}}

                <input type="hidden" name="_method" value="put">

                <br/><br/>
                <h4>Edição de Equipamento</h4>
                <br/><br/>

                <label >Nome ou Descrição</label><br/>
                <input style="width: 430px" name="nomeEquipamento" class="form-control" required value ="{{$registro->nomeEquipamento}}" type="text" placeholder=""  />
                <br/><br/>


                <label>Adicionar Quantidade</label><br/>
                <input style="width: 60px" name="quantidadeAdicionar" min="1" type="number" placeholder="Ex.: 3">
                <br/><br/>

                <label>Remover Quantidade</label><br/>
                <input style="width: 60px" name="quantidadeRemover" min="1" type="number" placeholder="Ex.: 3">
                <br/><br/>


                <button class="next"> Salvar &raquo</button>
                <br/><br/><br/><br/>

            </form>



        </div>
    </div>
    </div>

@endsection


