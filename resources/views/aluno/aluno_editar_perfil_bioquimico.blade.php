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
                <input value="{{ $dadosPerfilBioquimico->glicemiaDataUm ? date('d/m/Y', strtotime($dadosPerfilBioquimico->glicemiaDataUm)) : old('glicemiaDataUm')}}" name="glicemiaDataUm" class="form-control"   maxlength="50" id = "Data1" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{$dadosPerfilBioquimico->glicemiaValorUm ?? old('glicemiaValorUm')}}" name="glicemiaValorUm" class="form-control"   maxlength="50" type="text"  />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{ $dadosPerfilBioquimico->glicemiaDataDois ? date('d/m/Y', strtotime($dadosPerfilBioquimico->glicemiaDataDois)) : old('glicemiaDataDois')}}" id = "Data2" name="glicemiaDataDois" class="form-control"   maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{$dadosPerfilBioquimico->glicemiaValorDois ?? old('glicemiaValorDois')}}" name="glicemiaValorDois" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>Insulina</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="{{ $dadosPerfilBioquimico->insulinaDataUm ? date('d/m/Y', strtotime($dadosPerfilBioquimico->insulinaDataUm)) : old('insulinaDataUm')}}" name="insulinaDataUm" class="form-control"   maxlength="50" id = "Data3" placeholder="00/00/0000"/>
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{$dadosPerfilBioquimico->insulinaValorUm ?? old('insulinaValorUm')}}" name="insulinaValorUm" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{ $dadosPerfilBioquimico->insulinaDataDois ? date('d/m/Y', strtotime($dadosPerfilBioquimico->insulinaDataDois)) : old('insulinaDataDois')}}" id = "Data4" name="insulinaDataDois" class="form-control"   maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{$dadosPerfilBioquimico->insulinaValorDois ?? old('insulinaValorDois')}}" name="insulinaValorDois" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>Creatinina</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="{{ $dadosPerfilBioquimico->creatinaDataUm ? date('d/m/Y', strtotime($dadosPerfilBioquimico->creatinaDataUm)) : old('creatinaDataUm')}}" id = "Data5" name="creatinaDataUm" class="form-control"   maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{$dadosPerfilBioquimico->creatinaValorUm ?? old('creatinaValorUm')}}"  name="creatinaValorUm" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{ $dadosPerfilBioquimico->creatinaDataDois ? date('d/m/Y', strtotime($dadosPerfilBioquimico->creatinaDataDois)) : old('creatinaDataDois')}}" id = "Data6" name="creatinaDataDois" class="form-control"   maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{$dadosPerfilBioquimico->creatinaValorDois ?? old('creatinaValorDois')}}" name="creatinaValorDois" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>CT</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="{{ $dadosPerfilBioquimico->ctDataUm ? date('d/m/Y', strtotime($dadosPerfilBioquimico->ctDataUm)) : old('ctDataUm')}}" id = "Data7" name="ctDataUm" class="form-control"   maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{$dadosPerfilBioquimico->ctValorUm ?? old('ctValorUm')}}" name="ctValorUm" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{ $dadosPerfilBioquimico->ctDataDois ? date('d/m/Y', strtotime($dadosPerfilBioquimico->ctDataDois)) : old('ctDataDois')}}" name="ctDataDois" class="form-control"   maxlength="50" id = "Data8" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{$dadosPerfilBioquimico->ctValorDois ?? old('ctValorDois')}}" name="ctValorDois" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>HDL</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="{{ $dadosPerfilBioquimico->hdlDataUm ? date('d/m/Y', strtotime($dadosPerfilBioquimico->hdlDataUm)) : old('hdlDataUm')}}" id = "Data9" name="hdlDataUm" class="form-control"   maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{$dadosPerfilBioquimico->hdlValorUm ?? old('hdlValorUm')}}" name="hdlValorUm" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{ $dadosPerfilBioquimico->hdlDataDois ? date('d/m/Y', strtotime($dadosPerfilBioquimico->hdlDataDois)) : old('hdlDataDois')}}" id = "Data10" name="hdlDataDois" class="form-control"   maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{$dadosPerfilBioquimico->hdlValorDois ?? old('hdlValorDois')}}" name="hdlValorDois" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>LDL</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="{{ $dadosPerfilBioquimico->ldlDataUm ? date('d/m/Y', strtotime($dadosPerfilBioquimico->ldlDataUm)) : old('ldlDataUm')}}" id = "Data11" name="ldlDataUm" class="form-control"   maxlength="50"  placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{$dadosPerfilBioquimico->ldlValorUm ?? old('ldlValorUm')}}" name="ldlValorUm" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{ $dadosPerfilBioquimico->ldlDataDois ? date('d/m/Y', strtotime($dadosPerfilBioquimico->ldlDataDois)) : old('ldlDataDois')}}" id = "Data12" name="ldlDataDois" class="form-control"   maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{$dadosPerfilBioquimico->ldlValorDois ?? old('ldlValorDois')}}" name="ldlValorDois" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>TG</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="{{ $dadosPerfilBioquimico->tgDataUm ? date('d/m/Y', strtotime($dadosPerfilBioquimico->tgDataUm)) : old('tgDataUm')}}" id = "Data13" name="tgDataUm" class="form-control"   maxlength="50"  placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{$dadosPerfilBioquimico->tgValorUm ?? old('tgValorUm')}}" name="tgValorUm" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{ $dadosPerfilBioquimico->tgDataDois ? date('d/m/Y', strtotime($dadosPerfilBioquimico->tgDataDois)) : old('tgDataDois')}}" id = "Data14" name="tgDataDois" class="form-control"   maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{$dadosPerfilBioquimico->tgValorDois ?? old('tgValorDois')}}" name="tgValorDois" class="form-control"   maxlength="50" type="text" placeholder="" />
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
