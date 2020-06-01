@extends('layout.site')

@section('titulo','Cursos')

@section('conteudo')
    <div class="container" >
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form method="post" action="{{route('aluno.cadastro.endereco')}}">
                {{csrf_field()}}

                <br/><br/>
                <h4>Cadastro de Aluno - Dados Pessoais</h4>
                <br/><br/>
                @if(isset($errors) && count ($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <br/><br/>

                <label for="">Nome</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <label for="">Data de Nascimento</label>
                <input id="" value="" name="" required="required" type="date" placeholder="" class="validate"/>
                <br/><br/>


                // TODO: Switch options<br/>
                <label for="">Sexo</label>
                <input name="" id="" value="" type="text" class="form-control" placeholder="">
                <br/><br/>

                <label for="">Email, se tiver</label>
                <input name="" id="" value="" type="text" class="form-control" placeholder="">
                <br/><br/>

                <label for="">Profissão</label>
                <input name="" id="" value="" type="text" class="form-control" placeholder="">
                <br/><br/>

                // TODO: Switch options<br/>
                <label for="">É aposentado?</label>
                <input name="" id="" value="" type="text" class="form-control" placeholder="">
                <br/><br/>

                // TODO: Switch options<br/>
                <label for="">Estado Civil</label>
                <input name="" id="" value="" type="text" class="form-control" placeholder="">
                <br/><br/>

                // TODO: Switch options<br/>
                <label for="">Escolaridade</label>
                <input name="" id="" value="" type="text" class="form-control" placeholder="">
                <br/><br/>

                // TODO: Switch options<br/><br/>

                <select name="select" class="browser-default">
                    <option value="valor1">Valor 1</option>
                    <option value="valor2" selected>Valor 2</option>
                    <option value="valor3">Valor 3</option>
                </select>
                <br/><br/>

                <label for="">Classe Social Familia</label>
                <input name="" id="" value="" type="text" class="form-control" placeholder="">
                <br/><br/>


                <div class="row">
                    <button class="btn blue">CONTINUAR &raquo</button>
                </div>
                <br/><br/><br/><br/>

            </form>


        </div>
    </div>
    </div>



@endsection


