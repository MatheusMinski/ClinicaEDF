@extends('layout.site')

@section('titulo','Medicamentos Continuos')

@section('conteudo')
<div class="container">
    <!--FORMULÁRIO DE CADASTRO-->
    <div id="cadastro">
        <form method="post" action="{{route('aluno.cadastro.medicamentos.salvar')}}">
            {{csrf_field()}}

            <br /><br />
            <h4>Cadastro de Aluno - Medicamentos Contínuos</h4>
            <br /><br />
            @if(isset($errors) && count ($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{$error}}</p>
                @endforeach
            </div>
            @endif
            <br /><br />

            <input name="idTreinamento" value="{{$idTreinamento}}" type="hidden"/>


            <div class="row">
                <div class="col s6">
                    <label for="">Nome Comercial do Medicamento</label>
                    <input value="" name="nomeComercial" class="form-control"  maxlength="50" type="text" placeholder="" />
                </div>
                <div class="col s6">
                    <label for="">Nome Cientifico do Medicamento</label>
                    <input value="" name="nomeCientifico" class="form-control"  maxlength="50" type="text" placeholder="" />

                </div>
            </div>
            <div class="row">
                <div class="col s3">
                    <label for="">Dosagem</label>
                    <input value="" name="dosagem" class="form-control"  maxlength="50" type="text" placeholder="" />

                </div>
                <div class="col s6">
                    <label for="">Posologia</label>
                    <input value="" name="posologia" class="form-control"  maxlength="50" type="text" placeholder="" />

                </div>
                <div class="col s3">
                    <label for="">Data de início</label>
                    <input value="" name="inicio" class="form-control"  maxlength="50" id="Data" placeholder="00/00/0000" />
                </div>
            </div>

            <div class="row">
                <button class="btn blue">Adicionar</button>
            </div>
        </form>

    </div>

</div>
<div style="padding-top: 10%; padding-bottom: 15%; width: 90%; margin: auto">

    <h5 class="center">Medicamentos Cadastrados</h5>
    <table>
        <thead>
        <th style="width: 30%">Nome Comercial</th>
        <th style="width: 30%">Nome Científico</th>
        <th style="width: 10%">Dosagem</th>
        <th style="width: 10%">Posologia</th>
        <th style="width: 10%">Data Início</th>

        </thead>
        <tbody>
        @foreach($dadosMedicamentos as $medicamento)
            <tr>
                <td>{{ $medicamento->nomeComercial }}</td>
                <td>{{ $medicamento->nomeCientifico }}</td>
                <td>{{ $medicamento->dosagem }}</td>
                <td>{{ $medicamento->posologia }}</td>
                <td>{{ $medicamento->inicio ? date('d/m/Y', strtotime($medicamento->inicio)) : ''}}</td>
                <td>
                    <a class="btn orange" href="{{route('aluno.cadastro.medicamentos.editar', ['idExame' => $medicamento->id,'idTreinamento' => $idTreinamento])}}">Editar</a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

</div>


<script>
    $(document).ready(function(){
        $('#Data').mask('99/99/9999');
    });
</script>



@endsection
