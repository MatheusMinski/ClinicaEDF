@extends('layout.site')

@section('titulo','Exames Adicionais')

@section('conteudo')
    <div class="container">
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro" >
            <form method="post" action="{{route('aluno.cadastro.exames.update')}}">
                {{csrf_field()}}

                <br /><br />
                <h4 style="text-align: center">Exames Adicionais Editar<br />
                    <h6 style="text-align: center">(Ex: Teste Ergométrico; ECG; imagem; Procedimento
                        cirúrgico; Outro)</h6>
                </h4>
                @if(isset($errors) && count ($errors) > 0)
                    <div style="padding: 30px; color: red" class="center">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <br /><br />

                <input name="id" value="{{$dadosExameAdicional->id}}" type="hidden"/>
                <input name="idTreinamento" value="{{$idTreinamento}}" type="hidden"/>


                <div class="row">
                    <div class="col s8">
                        <label for="">Tipo do exame</label>
                        <input value="{{$dadosExameAdicional->tipoDoExame}}" name="tipoDoExame" class="form-control" required="required" maxlength="50" type="text" placeholder="" />

                    </div>
                    <div class="col s4">
                        <label for="">Data que foi realizado</label>
                        <input value="{{ date('d/m/Y', strtotime($dadosExameAdicional->dataExame))}}" name="dataExame" class="form-control" required="required" maxlength="50" id="Data" placeholder="00/00/0000" />
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <label for="">Resultados principais</label>
                        <textarea style="padding-bottom: 3%" name="resultadosPrincipais" class="form-control" required="required" maxlength="50"  placeholder="">{{$dadosExameAdicional->resultadosPrincipais}}</textarea>
                        <button  class="btn blue"> Adicionar </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $('#Data').mask('99/99/9999');
        });
    </script>


@endsection
