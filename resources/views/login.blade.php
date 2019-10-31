@extends ('layout.site')

@section('titulo', 'Login')

@section('conteudo')

    <div class="container" >
        <!--FORMULÁRIO DE LOGIN-->
        <div id="login" align="center">
            <form action="{{route('emprestimo')}}" method="post" >

                <br/><br/>
                <h4>Login</h4>
                <br/><br/>

                <input id="email" name="email" height="10px" style="width:350px" type="email" class="validate" placeholder="E-mail"/>
                <br/><br/>



                <input id="password" type="password" height="10px" style="width:350px"class="validate" placeholder="Senha">
                <br/><br/>

                <div align="center">
                    <div><button type="submit">Entrar</button></div>
                </div>

            </form>


            <br/><br/><br/><br/>

        </div>
    </div>
    </div>

@endsection
