@extends('layout.site')

@section('titulo','Perfil Bioquimico')

@section('conteudo')
    <div class="container" >
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form method="post" action="{{route('salvar.professor')}}">
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

                <h4>Glicemia</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="date" placeholder="" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="date" placeholder="" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>Insulina</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="date" placeholder="" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="date" placeholder="" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>Creatinina</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="date" placeholder="" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="date" placeholder="" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>CT</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="date" placeholder="" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="date" placeholder="" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>HDL</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="date" placeholder="" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="date" placeholder="" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>LDL</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="date" placeholder="" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="date" placeholder="" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <h4>TG</h4>
                <br/><br/>
                <label for="">Data 1</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="date" placeholder="" />
                <br/><br/>
                <label for="">Valor 1</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>
                <label for="">Data 2</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="date" placeholder="" />
                <br/><br/>
                <label for="">Valor 2</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <button class="btn blue"> Finalizar &raquo</button>
                <br /><br /><br /><br />

                

            </form>


        </div>
    </div>
    </div>



@endsection
