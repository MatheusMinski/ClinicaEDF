@extends ('layout.site')

@section('titulo', 'Cadastro De Professores')

@section('conteudo')
    <div class="container">
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form method="post" action="{{route('lista.espera.store')}}" autocomplete="off">
                {{csrf_field()}}

                <br/><br/>
                <h4>Cadastro de Novo Aluno na Lista de espera</h4>
                <div style="padding: 30px; color: red" class="center">
                    @if(isset($errors) && count ($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                </div>

                <label>Nome</label>
                <input name="nomeAlunoEspera" class="form-control"  value="{{$aluno->nomeAlunoEspera ?? old('nomeAlunoEspera')}}" required="required" type="text" placeholder=""/>
                <br/><br/>


                <label for="">Prioridade</label>
                <select id='' name="prioridade" class="browser-default" required="required">
                    <option enabled selected value="{{$aluno->prioridade ?? " "}}">{{$aluno->prioridade ?? " "}}</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                </select>
                <br/><br/>


                <label>Telefone</label>
                <input name="telefone" type="text" min="1"  value="{{$aluno->telefone ?? old('telefone')}}" class="telefone" required="required">
                <br/><br/>

                <label>Outro contato</label>
                <input name="outroContato" type="text" min="1" value="{{$aluno->outroContato ?? old('outroContato')}}" required="required">
                <br/><br/>


                <button class="btn blue"> Finalizar Cadastro &raquo</button>
                <br/><br/><br/><br/>

            </form>


        </div>
    </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.telefone').mask('(99) 9 9999-9999');
        });
    </script>

@endsection


