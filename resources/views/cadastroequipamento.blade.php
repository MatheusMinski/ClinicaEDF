@extends ('layout.site')

@section('titulo', 'Cadastro De Professores')

@section('conteudo')

    <div class="container" >
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form method="post" action="{{route('salvar.equipamento')}}" autocomplete="off">
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

                <div class="row">
                    <div class="col s12">
                        <div class="row">
                            <div class="input-field col s12">

                                <input style="width: 50%" type="text" id="autocomplete-input" class="autocomplete" name="classificacao">
                                <button data-target="modal1" class="btn modal-trigger">Classes</button>
                                <label for="autocomplete-input">Classificação</label>

                            </div>
                        </div>
                    </div>
                </div>

                <div id="modal1" class="modal">
                    <div class="modal-content center">
                        <h4>Classificações usadas:</h4>
                        @foreach($classes as $classe)
                            <h5 style="padding-top: 3vh">{{$classe -> classificacao}}</h5>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Ok</a>
                    </div>
                </div>

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
        $(document).ready(function(){
            $('input.autocomplete').autocomplete({
                data: {
                    @foreach($classes as $classe)
                    "{{$classe -> classificacao}}": null,
                    @endforeach
                },
            });
        });
        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>


@endsection


