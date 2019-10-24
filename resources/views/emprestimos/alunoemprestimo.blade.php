@extends ('layout.site')

@section('titulo', 'Emprestimo')

@section('conteudo')
    <div class="container" >
        <!--FORMULÁRIO DE LOGIN-->
        <div id="login" align="center">
            <form method="post" action="">

                <br/><br/>
                <h4>Cadastro<br/> para<br/> Empréstimo</h4>
                <br/><br/>


                <input name="epname" id="epname" height="10px" style="width:350px" type="text" class="validate" placeholder="Nome Completo"/>
                <br/><br/>

                <input name="cpfPessoaEmprestimo" style="width: 350px" type="text" class="form-control cpf-mask" placeholder="Ex.: 000.000.000-00">
                <br/><br/>


            </form>

            <div align="center">
                <div><a name="epbtn" type="submit">Cadastrar</a></div>
            </div>
            <br/><br/><br/><br/>

        </div>
    </div>
    </div>

@endsection