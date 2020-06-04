@extends('layout.site')

@section('titulo','Consultas')

@section('conteudo')
<div class="container">
    <!--FORMULÁRIO DE CADASTRO-->
    <div id="cadastro">
        <form method="post" action="{{route('salvar.professor')}}">
            {{csrf_field()}}

            <br /><br />
            <h4>Cadastro de Aluno - Consultas médicas nos últimos 12 meses
            </h4>
            <br /><br />
            @if(isset($errors) && count ($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{$error}}</p>
                @endforeach
            </div>
            @endif
            <br /><br />

            <label for="">Data Aproximada</label>
            <input value="" name="dataAproximada" class="form-control" required="required" maxlength="50" id="Data" placeholder="00/00/0000" />
            <br /><br />

            <label for="">Especialidade</label>
            <input value="" name="especialidade" class="form-control" required="required" maxlength="50" type="text" placeholder="" />
            <br /><br />


            <label for="">Motivo</label>
            <textarea value="" name="motivo" class="form-control" required="required" maxlength="50" type="text" placeholder=""></textarea>
            <br /><br />


            <button class="btn blue"> Adicionar mais uma consulta &raquo</button>
            <button class="btn blue"> Finalizar &raquo</button>
            <br /><br /><br /><br />

        </form>


    </div>
</div>
</div>

<script>
    $(document).ready(function(){
        $('#Data').mask('99/99/9999');
    });
</script>


@endsection
