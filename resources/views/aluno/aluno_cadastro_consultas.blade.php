@extends('layout.site')

@section('titulo','Consultas')

@section('conteudo')
<div class="container">
    <!--FORMULÁRIO DE CADASTRO-->
    <div id="cadastro">
        <form method="post" action="{{route('aluno.cadastro.consultas.salvar')}}">
            {{csrf_field()}}

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
                    <input value="" name="especialidade" class="form-control" required="required" maxlength="50" type="text" placeholder="" />
                </div>
                <div class="col s4">
                    <label for="">Data Aproximada</label>
                    <input value="" name="dataAproximada" class="form-control" required="required" maxlength="50" id="Data" placeholder="00/00/0000" />
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <label for="">Motivo</label>
                    <textarea value="" name="motivo" class="form-control" required="required" maxlength="50" type="text" placeholder=""></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <button  class="btn blue"> Adicionar </button>
                </div>
            </div>
        </form>
    </div>

    <div style="padding-top: 10%; padding-bottom: 15%">

        <h5 class="center">Exames Cadastrados</h5>
        <table>
            <thead>
            <th style="width: 20%">Data aproximada</th>
            <th style="width: 50%">Especialidade</th>
            <th style="width: 30%">Resultados Principais</th>

            </thead>
            <tbody>
            @foreach($dadosConsultas as $consulta)
                <tr>
                    <td>{{ date('d/m/Y', strtotime($consulta->dataAproximada))}}</td>
                    <td>{{ $consulta->especialidade }}</td>
                    <td><button data-target="modal1-{{ $consulta->id }}" class="btn green modal-trigger">Motivo</button>
                    <td>
                        <a class="btn orange" href="{{route('aluno.cadastro.consultas.editar', ['idConsulta' => $consulta->id,'idTreinamento' => $idTreinamento])}}">Editar</a>
                    </td>

                    <div id="modal1-{{ $consulta->id }}" class="modal">
                        <div class="modal-content center">
                            <h4 style="padding-bottom: 5%">Motivo:</h4>
                            <h6>{{$consulta->motivo}}</h6>
                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Ok</a>
                        </div>
                    </div>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>


<script>
    $(document).ready(function(){
        $('#Data').mask('99/99/9999');
    });
    $(document).ready(function(){
        $('.modal').modal();
    });
</script>


@endsection
