@extends('layout.site')

@section('titulo','Perfil Bioquimico')

@section('conteudo')
    <div class="container" >
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form method="post" action="{{route('aluno.cadastro.perfilBioquimico.update')}}">
                {{csrf_field()}}

                <br/><br/>
                <h4>Perfil Bioquímico</h4>
                <br/><br/>
                @if(isset($errors) && count ($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <br/><br/>

                <input type="hidden" name="idTreinamento" value="{{$dadosPerfilBioquimico->idTreinamento}}">

                <h4>Glicemia</h4>
                <br/><br/>
                <label for="" >Data 1</label>
                <input value="{{date('d/m/Y', strtotime($dadosPerfilBioquimico->glicemiaDataUm))}}" name="glicemiaDataUm" class="form-control"  required="required" maxlength="50" id = "Data1" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{$dadosPerfilBioquimico->glicemiaValorUm}}" name="glicemiaValorUm" class="form-control"  required="required" maxlength="50" type="text"  />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{date('d/m/Y', strtotime($dadosPerfilBioquimico->glicemiaDataDois))}}" id = "Data2" name="glicemiaDataDois" class="form-control"  required="required" maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{$dadosPerfilBioquimico->glicemiaValorDois}}" name="glicemiaValorDois" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>Insulina</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="{{date('d/m/Y', strtotime($dadosPerfilBioquimico->insulinaDataUm))}}" name="insulinaDataUm" class="form-control"  required="required" maxlength="50" id = "Data3" placeholder="00/00/0000"/>
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{$dadosPerfilBioquimico->insulinaValorUm}}" name="insulinaValorUm" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{date('d/m/Y', strtotime($dadosPerfilBioquimico->insulinaDataDois))}}" id = "Data4" name="insulinaDataDois" class="form-control"  required="required" maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{$dadosPerfilBioquimico->insulinaValorDois}}" name="insulinaValorDois" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>Creatinina</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="{{date('d/m/Y', strtotime($dadosPerfilBioquimico->creatinaDataUm))}}" id = "Data5" name="creatinaDataUm" class="form-control"  required="required" maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{$dadosPerfilBioquimico->creatinaValorUm}}"  name="creatinaValorUm" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{date('d/m/Y', strtotime($dadosPerfilBioquimico->creatinaDataDois))}}" id = "Data6" name="creatinaDataDois" class="form-control"  required="required" maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{$dadosPerfilBioquimico->creatinaValorDois}}" name="creatinaValorDois" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>CT</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="{{date('d/m/Y', strtotime($dadosPerfilBioquimico->ctDataUm))}}" id = "Data7" name="ctDataUm" class="form-control"  required="required" maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{$dadosPerfilBioquimico->ctValorUm}}" name="ctValorUm" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{date('d/m/Y', strtotime($dadosPerfilBioquimico->ctDataDois))}}" name="ctDataDois" class="form-control"  required="required" maxlength="50" id = "Data8" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{$dadosPerfilBioquimico->ctValorDois}}" name="ctValorDois" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>HDL</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="{{date('d/m/Y', strtotime($dadosPerfilBioquimico->hdlDataUm))}}" id = "Data9" name="hdlDataUm" class="form-control"  required="required" maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{$dadosPerfilBioquimico->hdlValorUm}}" name="hdlValorUm" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{date('d/m/Y', strtotime($dadosPerfilBioquimico->hdlDataDois))}}" id = "Data10" name="hdlDataDois" class="form-control"  required="required" maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{$dadosPerfilBioquimico->hdlValorDois}}" name="hdlValorDois" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>LDL</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="{{date('d/m/Y', strtotime($dadosPerfilBioquimico->ldlDataUm))}}" id = "Data11" name="ldlDataUm" class="form-control"  required="required" maxlength="50"  placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{$dadosPerfilBioquimico->ldlValorUm}}" name="ldlValorUm" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{date('d/m/Y', strtotime($dadosPerfilBioquimico->ldlDataDois))}}" id = "Data12" name="ldlDataDois" class="form-control"  required="required" maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{$dadosPerfilBioquimico->ldlValorDois}}" name="ldlValorDois" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>TG</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="{{date('d/m/Y', strtotime($dadosPerfilBioquimico->tgDataUm))}}" id = "Data13" name="tgDataUm" class="form-control"  required="required" maxlength="50"  placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{$dadosPerfilBioquimico->tgValorUm}}" name="tgValorUm" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{date('d/m/Y', strtotime($dadosPerfilBioquimico->tgDataDois))}}" id = "Data14" name="tgDataDois" class="form-control"  required="required" maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{$dadosPerfilBioquimico->tgValorDois}}" name="tgValorDois" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <button class="btn blue"> Finalizar &raquo</button>
                <br /><br /><br /><br />



            </form>


        </div>
    </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#Data1').mask('99/99/9999');
        });

        $(document).ready(function(){
            $('#Data2').mask('99/99/9999');
        });
        $(document).ready(function(){
            $('#Data3').mask('99/99/9999');
        });
        $(document).ready(function(){
            $('#Data4').mask('99/99/9999');
        });
        $(document).ready(function(){
            $('#Data5').mask('99/99/9999');
        });
        $(document).ready(function(){
            $('#Data6').mask('99/99/9999');
        });
        $(document).ready(function(){
            $('#Data7').mask('99/99/9999');
        });
        $(document).ready(function(){
            $('#Data8').mask('99/99/9999');
        });
        $(document).ready(function(){
            $('#Data9').mask('99/99/9999');
        });
        $(document).ready(function(){
            $('#Data10').mask('99/99/9999');
        });
        $(document).ready(function(){
            $('#Data11').mask('99/99/9999');
        });
        $(document).ready(function(){
            $('#Data12').mask('99/99/9999');
        });
        $(document).ready(function(){
            $('#Data13').mask('99/99/9999');
        });
        $(document).ready(function(){
            $('#Data14').mask('99/99/9999');
        });

    </script>


@endsection
