@extends ('layout.site')

@section('titulo', 'Login')

@section('conteudo')

    <div class="container" >
        <!--FORMULÁRIO DE LOGIN-->
        <div id="login" align="center">
            <form  method="post" action="{{route('entrar')}}">
                {{csrf_field()}}

                <br/><br/>
                <h4>Login</h4>
                <br/><br/>

                <div class="input-field">
                <input id="email" name="email" height="10px" style="width:350px" type="text" class="validate" placeholder="E-mail"/>
                </div>

                <br/><br/>


                <div class="input-field">
                <input id="password" type="password" name="password" height="10px" style="width:350px"class="validate" placeholder="Senha">
                </div>

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
