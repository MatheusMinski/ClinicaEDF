@extends('layout.site')

@section('titulo','Medicamentos Continuos')

@section('conteudo')
<div class="container">
    <!--FORMULÁRIO DE CADASTRO-->
    <div id="cadastro">
        <form method="post" action="{{route('')}}">
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

            <label for="">Nome Comercial do Medicamento</label>
            <input value="" name="nomeComercial" class="form-control" required="required" maxlength="50" type="text" placeholder="" />
            <br /><br />

            <label for="">Nome Cientifico do Medicamento</label>
            <input value="" name="nomeCientifico" class="form-control" required="required" maxlength="50" type="text" placeholder="" />
            <br /><br />

            <label for="">Dosagem</label>
            <input value="" name="dosagem" class="form-control" required="required" maxlength="50" type="text" placeholder="" />
            <br /><br />

            <label for="">Posologia</label>
            <input value="" name="posologia" class="form-control" required="required" maxlength="50" type="text" placeholder="" />
            <br /><br />

            <label for="">Data que iniciou o uso do medicamento</label>
            <input value="" name="inicio" class="form-control" required="required" maxlength="50" type="date" placeholder="" />
            <br /><br />


            <button class="btn blue"> Adicionar mais um Medicamento &raquo</button>
            <button class="btn blue"> Finalizar &raquo</button>
            <br /><br /><br /><br />

        </form>


    </div>
</div>
</div>



@endsection