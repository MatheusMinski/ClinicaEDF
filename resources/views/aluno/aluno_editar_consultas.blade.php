@extends('layout.site')

@section('titulo','Consultas')

@section('conteudo')
    <div class="container">
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form method="post" action="{{route('aluno.cadastro.consultas.update')}}">
                {{csrf_field()}}

                <input name="id" value="{{$dadosConsulta->id}}" type="hidden"/>
                <input name="idTreinamento" value="{{$idTreinamento}}" type="hidden"/>

                <div class="row" style="padding-top: 5%">
                    <div class="col s12 center">
                        <h4>Consultas médicas nos últimos 12 meses</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        @if(isset($errors) && count ($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col s8">
                        <label for="">Especialidade</label>
                        <input value="{{$dadosConsulta->especialidade}}" name="especialidade" class="form-control" required="required" maxlength="50" type="text" placeholder="" />
                    </div>
                    <div class="col s4">
                        <label for="">Data Aproximada</label>
                        <input value="{{date('d/m/Y', strtotime($dadosConsulta->dataAproximada))}}" name="dataAproximada" class="form-control" required="required" maxlength="50" id="Data" placeholder="00/00/0000" />
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <label for="">Motivo</label>
                        <textarea name="motivo" class="form-control" required="required" maxlength="50" type="text" placeholder="">{{$dadosConsulta->motivo}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
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
