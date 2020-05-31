@extends('layout.site')

@section('titulo','Exames Adicionais')

@section('conteudo')
<div class="container">
    <!--FORMULÁRIO DE CADASTRO-->
    <div id="cadastro">
        <form method="post" action="{{route('salvar.professor')}}">
            {{csrf_field()}}

            <br /><br />
            <h4>Cadastro de Aluno - Exames Adicionais. <br />
                <h6>(Ex: Teste Ergométrico; ECG; imagem; Procedimento
                    cirúrgico; Outro)</h6>
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

            <label for="">Tipo do exame</label>
            <input value="" name="" class="form-control" required="required" maxlength="50" type="text" placeholder="" />
            <br /><br />

            <label for="">Data que foi realizado</label>
            <input value="" name="" class="form-control" required="required" maxlength="50" type="date" placeholder="" />
            <br /><br />


            <label for="">Resultados principais</label>
            <textarea value="" name="" class="form-control" required="required" maxlength="50" type="date" placeholder=""></textarea>
            <br /><br />


            <button class="btn blue"> Adicionar mais um exame &raquo</button>
            <button class="btn blue"> Finalizar &raquo</button>
            <br /><br /><br /><br />

        </form>


    </div>
</div>
</div>



@endsection