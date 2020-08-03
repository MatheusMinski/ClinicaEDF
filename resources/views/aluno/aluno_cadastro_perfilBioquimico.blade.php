@extends('layout.site')

@section('titulo','Perfil Bioquimico')

@section('conteudo')
    <div class="container" >
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form method="post" action="{{route('aluno.cadastro.perfilBioquimico.salvar')}}">
                {{csrf_field()}}

                <br/><br/>
                <h4>Cadastro de Aluno - Contato de Emergência</h4>
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

                <h4>Glicemia</h4>
                <br/><br/>
                <label for="" >Data 1</label>
                <input value="" name="glicemiaDataUm" class="form-control"  required="required" maxlength="50" id = "Data" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="" name="glicemiaValorUm" class="form-control"  required="required" maxlength="50" type="text"  />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="" id = "Data" id = "Data" name="glicemiaDataDois" class="form-control"  required="required" maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="" name="glicemiaValorDois" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>Insulina</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="" id = "Data" name="insulinaDataUm" class="form-control"  required="required" maxlength="50" id = "Data" placeholder="00/00/0000"/>
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="" name="insulinaValorUm" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="" id = "Data" name="insulinaDataDois" class="form-control"  required="required" maxlength="50" id = "Data" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="" name="insulinaValorDois" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>Creatinina</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="" id = "Data" name="creatinaDataUm" class="form-control"  required="required" maxlength="50" id = "Data" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value=""  name="creatinaValorUm" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="" id = "Data" name="creatinaDataDois" class="form-control"  required="required" maxlength="50" id = "Data" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="" name="creatinaValorDois" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>CT</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="" id = "Data" name="ctDataUm" class="form-control"  required="required" maxlength="50" id = "Data" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="" name="ctValorUm" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="" id = "Data" name="ctDataDois" class="form-control"  required="required" maxlength="50" id = "Data" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="" name="ctValorDois" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>HDL</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="" id = "Data" name="hdlDataUm" class="form-control"  required="required" maxlength="50" id = "Data" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="" name="hdlValorUm" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="" id = "Data" name="hdlDataDois" class="form-control"  required="required" maxlength="50" id = "Data" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="" name="hdlValorDois" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>LDL</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="" id = "Data" name="ldlDataUm" class="form-control"  required="required" maxlength="50" id = "Data" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="" name="ldlValorUm" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="" id = "Data" name="ldlDataDois" class="form-control"  required="required" maxlength="50" id = "Data" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="" name="ldlValorDois" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>TG</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="" id = "Data" name="tgDataUm" class="form-control"  required="required" maxlength="50" id = "Data" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="" name="tgValorUm" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="" id = "Data2" name="tgDataDois" class="form-control"  required="required" maxlength="50" id = "Data" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="" name="tgValorDois" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <button class="btn blue"> Finalizar &raquo</button>
                <br /><br /><br /><br />



            </form>


        </div>
    </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#Data').mask('99/99/9999');
        });

        $(document).ready(function(){
            $('#Data2').mask('99/99/9999');
        });
    </script>


@endsection
