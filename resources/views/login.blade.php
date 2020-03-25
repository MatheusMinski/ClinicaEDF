@extends ('layout.site')

@section('titulo', 'Login')

@section('conteudo')

    <div class="container" >
        <!--FORMULÁRIO DE LOGIN-->
        <div id="login" align="center">
            <form  method="post" action="{{route('entrar')}}">
                {{csrf_field()}}

                <br/>



                <h4>Login</h4>
                <br/><br/>

                @if(isset($errors) && count ($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif

                <div class="input-field" >
                <input id="email" required name="email" height="10px" style="width:350px" type="text" class="validate" placeholder="E-mail"/>
                </div>

                <br/><br/>


                <div class="input-field">
                <input id="password" required type="password" name="password" height="10px" style="width:350px"class="validate" placeholder="Senha">
                </div>

                <br/><br/>

                <div align="center" class="row">
                    <div><button type="submit">Entrar</button></div>
                    <div><a href="{{route('password.request')}}">Esqueci minha senha</a></div>
                </div>

            </form>


            <br/><br/><br/><br/>

        </div>
    </div>
    </div>

@endsection
