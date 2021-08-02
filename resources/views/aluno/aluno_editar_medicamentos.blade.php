@extends('layout.site')

@section('titulo','Medicamentos Continuos')

@section('conteudo')
    <div class="container">
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form method="post" action="{{route('aluno.cadastro.medicamentos.update')}}">
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

                <input name="id" value="{{$dadosMedicamentos->id}}" type="hidden"/>
                <input name="idTreinamento" value="{{$idTreinamento}}" type="hidden"/>


                <div class="row">
                    <div class="col s6">
                        <label for="">Nome Comercial do Medicamento</label>
                        <input value="{{$dadosMedicamentos->nomeComercial}}" name="nomeComercial" class="form-control"  maxlength="50" type="text" placeholder="" />
                    </div>
                    <div class="col s6">
                        <label for="">Nome Cientifico do Medicamento</label>
                        <input value="{{$dadosMedicamentos->nomeCientifico}}" name="nomeCientifico" class="form-control"  maxlength="50" type="text" placeholder="" />

                    </div>
                </div>
                <div class="row">
                    <div class="col s3">
                        <label for="">Dosagem</label>
                        <input value="{{$dadosMedicamentos->dosagem}}" name="dosagem" class="form-control"  maxlength="50" type="text" placeholder="" />

                    </div>
                    <div class="col s6">
                        <label for="">Posologia</label>
                        <input value="{{$dadosMedicamentos->posologia}}" name="posologia" class="form-control"  maxlength="50" type="text" placeholder="" />

                    </div>
                    <div class="col s3">
                        <label for="">Data de início</label>
                        <input value="{{$dadosMedicamentos->inicio ? date('d/m/Y', strtotime($dadosMedicamentos->inicio)) : ''}}" name="inicio" class="form-control"  maxlength="50" id="Data" placeholder="00/00/0000" />
                    </div>
                </div>

                <div class="row">
                    <button class="btn blue">Adicionar</button>
                </div>
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
