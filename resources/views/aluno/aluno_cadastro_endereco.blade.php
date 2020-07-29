@extends('layout.site')

@section('titulo','Endereço')

@section('conteudo')
    <div class="container" >
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">


            <form method="post" action="{{route('aluno.cadastro.endereco.salvar')}}">

                {{csrf_field()}}

                <br/><br/>
                <h4>Cadastro de Aluno - Endereço</h4>
                <br/><br/>
                @if(isset($errors) && count ($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <br/><br/>

                <input name="idAluno" value="{{$idAluno}}" type="hidden"/>


                <label for="">Rua</label>
                <input value="" name="rua" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <label for="">Número</label>
                <input id="" value="" name="numero" required="required" type="number" placeholder="" class="validate"/>
                <br/><br/>

                <label for="">Bairro</label>
                <input name="bairro" id="" value="" type="text" class="form-control" placeholder="">
                <br/><br/>

                <label for="">Cidade</label>
                <input name="cidade" id="" value="" type="text" class="form-control" placeholder="">
                <br/><br/>

                <label for="">CEP</label>
                <input name="cep" id="cep" value="" type="text" class="form-control" placeholder="">
                <br/><br/>


                <button type="submit" class="btn blue" >Finalizar &raquo</button>
                <br/><br/><br/><br/>

            </form>


        </div>
    </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#cep').mask('00.000-000');
        });
    </script>


@endsection
