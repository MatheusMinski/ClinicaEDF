@extends('layout.site')

@section('titulo','Contato de Emergência')

@section('conteudo')
    <div class="container" >
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form method="post" action="{{route('aluno.cadastro.emergencia.update')}}">
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

                <input type="hidden" name="id" value="{{$dadosEmergencia->id}}">
                <input type="hidden" name="idAluno" value="{{$dadosEmergencia->idAluno}}">

                <label for="">Nome do Contato</label>
                <input value="{{$dadosEmergencia->nome}}" name="nome" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <label for="">Parentesco</label>
                <input id="" value="{{$dadosEmergencia->parentesco}}" name="parentesco" required="required" type="text" placeholder="" class="validate"/>
                <br/><br/>

                <label for="">Telefone</label>
                <input name="telefone" id="telefone" value="{{$dadosEmergencia->telefone}}" type="text" class="form-control" placeholder="">
                <br/><br/>


                <button class="btn blue">CONTINUAR &raquo</button>
                <br/><br/><br/><br/>

            </form>


        </div>
    </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#telefone').mask('(99) 9 9999-9999');
        });
    </script>


@endsection
