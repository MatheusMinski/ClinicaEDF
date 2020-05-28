@extends('layout.site')

@section('titulo','Cursos')

@section('conteudo')
    <div class="container" >
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form method="post" action="{{route('salvar.professor')}}">
                {{csrf_field()}}

                <br/><br/>
                <h4>Cadastro de Aluno - Qualidade de Vida</h4>
                <br/><br/>
                @if(isset($errors) && count ($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <br/><br/>

                <select name="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>


                <button class="btn blue"> CONTINUAR &raquo</button>
                <br/><br/><br/><br/>

            </form>


        </div>
    </div>
    </div>



@endsection
