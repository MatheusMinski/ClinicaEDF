@extends ('layout.site')

@section('titulo', 'Emprestimo')

@section('conteudo')
    <div class="container" >
        <!--FORMULÁRIO DE LOGIN-->
        <div id="login" align="center">
            <form method="post" action="{{route('salvar.pessoa')}}">
                {{csrf_field()}}
                <br/><br/>
                <h4>Cadastro<br/> para<br/> Empréstimo</h4>
                <br/><br/>


                <input name="nomePessoa" id="epname" height="10px" style="width:350px" type="text" class="validate" placeholder="Nome Completo"/>
                <br/><br/>

                <input name="cpfPessoa" style="width: 350px" type="text" class="form-control cpf-mask" placeholder="CPF">
                <br/><br/>

                <div align="center">
                    <div><button name="epbtn" type="submit">Cadastrar</button></div>
                </div>

            </form>


            <br/><br/><br/><br/>

        </div>
    </div>
    </div>

@endsection
