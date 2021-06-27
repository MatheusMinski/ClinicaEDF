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
                <input value="{{old('glicemiaDataUm')}}" name="glicemiaDataUm" class="form-control data-mask"   maxlength="50"  placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{old('glicemiaValorUm')}}" name="glicemiaValorUm" class="form-control"   maxlength="50" type="text"  />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{old('glicemiaDataDois')}}"   name="glicemiaDataDois" class="form-control data-mask"   maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{old('glicemiaValorDois')}}" name="glicemiaValorDois" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>Insulina</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="{{old('insulinaDataUm')}}" name="insulinaDataUm" class="form-control data-mask"   maxlength="50"  placeholder="00/00/0000"/>
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{old('insulinaValorUm')}}" name="insulinaValorUm" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{old('insulinaDataDois')}}"  name="insulinaDataDois" class="form-control data-mask"   maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{old('insulinaValorDois')}}" name="insulinaValorDois" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>Creatinina</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="{{old('creatinaDataUm')}}" name="creatinaDataUm" class="form-control data-mask"   maxlength="50"  placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{old('creatinaValorUm')}}"  name="creatinaValorUm" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{old('creatinaDataDois')}}"  name="creatinaDataDois" class="form-control data-mask"   maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{old('creatinaValorDois')}}" name="creatinaValorDois" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>CT</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="{{old('ctDataUm')}}"  name="ctDataUm" class="form-control data-mask"   maxlength="50"  placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{old('ctValorUm')}}" name="ctValorUm" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{old('ctDataDois')}}"  name="ctDataDois" class="form-control data-mask"   maxlength="50"  placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{old('ctValorDois')}}" name="ctValorDois" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>HDL</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="{{old('hdlDataUm')}}"  name="hdlDataUm" class="form-control data-mask"   maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{old('hdlValorUm')}}" name="hdlValorUm" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{old('hdlDataDois')}}"  name="hdlDataDois" class="form-control data-mask"   maxlength="50"  placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{old('hdlValorDois')}}" name="hdlValorDois" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>LDL</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="{{old('ldlDataUm')}}"  name="ldlDataUm" class="form-control data-mask"   maxlength="50"  placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{old('ldlValorUm')}}" name="ldlValorUm" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{old('ldlDataDois')}}"  name="ldlDataDois" class="form-control data-mask"   maxlength="50" placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{old('ldlValorDois')}}" name="ldlValorDois" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>TG</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="{{old('tgDataUm')}}"  name="tgDataUm" class="form-control data-mask"   maxlength="50"  placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="{{old('tgValorUm')}}" name="tgValorUm" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="{{old('tgDataDois')}}"  name="tgDataDois" class="form-control data-mask"   maxlength="50" " placeholder="00/00/0000" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="{{old('tgValorDois')}}" name="tgValorDois" class="form-control"   maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <button class="btn blue"> Finalizar &raquo</button>
                <br /><br /><br /><br />



            </form>


        </div>
    </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.data-mask').mask('99/99/9999');
        });

        $(document).ready(function(){
            $('#Data2').mask('99/99/9999');
        });
    </script>


@endsection
