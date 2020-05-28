@extends('layout.site')

@section('titulo','Cursos')

@section('conteudo')
    <div class="container" >
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form method="post" action="{{route('salvar.professor')}}">
                {{csrf_field()}}

                <br/><br/>
                <h4>Cadastro de Aluno - Anamnese</h4>
                <br/><br/>
                @if(isset($errors) && count ($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <br/><br/>

                <label for="">Nome do Profissional</label>
                <input value="" name="" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                <br/><br/>

                <label for="">Especialidade Profissional</label>
                <input id="" value="" name="" required="required" type="number" placeholder="" class="validate"/>
                <br/><br/>


                 TODO : Adicionar opçoes aqui
                <label for="">Encaminhamento</label>
                <input name="" id="" value="" type="text" class="form-control" placeholder="">
                <br/><br/>

                <label for="">Motivo Encaminhamento</label>
                <input name="" id="" value="" type="text" class="form-control" placeholder="">
                <br/><br/>

                <div class="switch">
                    <label for="">Fuma?</label>
                    <br/><br/>
                    <label>
                        Não
                        <input type="checkbox">
                        <span class="lever"></span>
                        Sim
                    </label>
                </div>
                <br/><br/>

                <label for="">Se sim, quantidade:</label>
                <input name="" id="" value="" type="number" class="form-control" placeholder="">
                <br/><br/>

                <div class="switch">
                    <label for="">Ja fumou?</label>
                    <br/><br/>
                    <label>
                        Não
                        <input type="checkbox">
                        <span class="lever"></span>
                        Sim
                    </label>
                </div>
                <br/><br/>

                <label for="">Se sim, por quantos anos:</label>
                <input name="" id="" value="" type="number" class="form-control" placeholder="">
                <br/><br/>

                <label for="">Se sim, parou a quantos anos:</label>
                <input name="" id="" value="" type="number" class="form-control" placeholder="">
                <br/><br/>

                <label for="">Descrição Problemas de saúde:</label>
                <input name="" id="" value="" type="text" class="form-control" placeholder="">
                <br/><br/>

                <div class="switch">
                    <label for="">Caiu nos ultimos 12 meses?</label>
                    <br/><br/>
                    <label>
                        Não
                        <input type="checkbox">
                        <span class="lever"></span>
                        Sim
                    </label>
                </div>
                <br/><br/>

                <label for="">Se sim, quantas vezes:</label>
                <input name="" id="" value="" type="number" class="form-control" placeholder="">
                <br/><br/>


                <div class="row">
                    <a class="btn blue" href="{{route('aluno.cadastro.emergencia')}}">CONTINUAR &raquo</a>
                </div>
                <br/><br/><br/><br/>

            </form>


        </div>
    </div>
    </div>



@endsection
