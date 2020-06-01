@extends('layout.site')

@section('titulo','Endereço')

@section('conteudo')
    <div class="container" >
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
<<<<<<< HEAD
            <form method="post" action="{{route('aluno.cadastro.salvar')}}">
=======
            <form method="post" action="{{route('')}}">
>>>>>>> 921f55f139fdcb02c4281b08eb1eb8d96a5768bf
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
                <input name="cep" id="" value="" type="text" class="form-control" placeholder="">
                <br/><br/>


<<<<<<< HEAD
                <button class="btn blue">Finalizar</button>
=======

                // TODO: Após finalizar esse form, redirecionar para a página de status do aluno cadastrado.
                <a class="btn blue" href="{{route('home')}}">Finalizar &raquo</a>
>>>>>>> 921f55f139fdcb02c4281b08eb1eb8d96a5768bf
                <br/><br/><br/><br/>

            </form>


        </div>
    </div>
    </div>



@endsection
