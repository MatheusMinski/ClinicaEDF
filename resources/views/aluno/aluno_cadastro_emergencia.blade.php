@extends('layout.site')

@section('titulo','Cursos')

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

                <label for="">Nome do Contato</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <label for="">Parentesco</label>
                <input id="" value="" name="" required="required" type="number" placeholder="" class="validate"/>
                <br/><br/>

                <label for="">Telefone</label>
                <input name="" id="" value="" type="text" class="form-control" placeholder="">
                <br/><br/>


                <div class="row">
                    <a class="btn blue" href="{{route('aluno.cadastro.endereco')}}">CONTINUAR &raquo</a>
                </div>
                <br/><br/><br/><br/>

            </form>


        </div>
    </div>
    </div>



@endsection
