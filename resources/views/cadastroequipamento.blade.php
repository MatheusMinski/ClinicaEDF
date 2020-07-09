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
                <div style="padding: 30px; color: red" class="center">
                    @if(isset($errors) && count ($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
                <label >Nome ou Descrição</label>
                <input name="nomeEquipamento" class="form-control" required="required" type="text" placeholder="" />
                <br/><br/>

                <label >Classificação</label>
                <input name="classificacao" class="form-control" required="required" type="text" placeholder="" />
                <a class="btn blue-grey" href="javascript:newPopup()">Classificações</a>
                <br/><br/>

                <label >Número do patrimônio</label>
                <input name="numeroPatrimonio" class="form-control" required="required" type="text" placeholder="" />
                <br/><br/>



                <label>Unidades Disponíveis</label>
                <input name="quantidadeDisponivel" type="number" min="1" placeholder="Ex.: 3">
                <br/><br/>


                <button class="btn blue"> Finalizar Cadastro &raquo</button>
                <br/><br/><br/><br/>

            </form>



        </div>
    </div>
    </div>

    <script>
        function newPopup(){
            varWindow = window.open ('{{route('equipamentos.classificacao')}}', 'popup', "width=350, height=255, top=100, left=110, scrollbars=no " )
        }
    </script>

@endsection


