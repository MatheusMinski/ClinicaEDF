@extends ('layout.site')

@section('titulo', 'Cadastro De Professores')

@section('conteudo')

    <div class="container" >
            <!--FORMULÁRIO DE CADASTRO-->
            <div id="cadastro">
                <form method="post" action="{{route('salvar.professor')}}">
                    {{csrf_field()}}

                    <br/><br/>
                    <h4>Cadastro de Professor</h4>

                    <div style="padding: 30px; color: red" class="center">
                        @if(isset($errors) && count ($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <label for="nome_cad">Nome Completo</label>
                    <input value="{!! old('nome') !!}" name="nome" class="form-control"  required="required" maxlength="50" type="text" placeholder="" />
                    <br/><br/>

                    <label for="email_cad">E-mail</label>
                    <input id="email_cad" value="{!! old('email') !!}" name="email" required="required" type="email" placeholder="contato@gmail.com" class="validate"/>
                    <br/><br/>

                    <div class="form-inline">
                        <div class="form-group">
                            <label class="control-label" for="user_password2">Senha</label>
                            <p class="info-label">Senha entre 6 a 21 caracteres, contendo letras e números</p>
                            <div>
                                <div class="input-group col-md-4 f-left">
                                    <input required minlength="6" maxlength="21" name="password" class="password form-control" id="user_password2" data-component="password-strength" data-monitor-id="password-strength-monitor" type="password">
                                </div>
                            </div>

                        </div>
                    </div>
                    <br/><br/><br/>

                    <label for="cpf">CPF</label>
                    <input name="cpf" id="cpf" value="{!! old('cpf') !!}" type="text" class="form-control cpf-mask" placeholder="Ex.: 000.000.000-00">
                    <br/><br/>


                    <label for="phone">Telefone</label>
                    <input  name="telefone" id="telefone" value="{!! old('telefone') !!}" type="text" class="form-control cel-sp-mask" placeholder="Ex.: (00) 00000-0000">
                    <br/><br/>

                    <label for="datanasc"><h6>Data de Nascimento</h6></label>
                    <input  name="dataNasc" id="datanasc" value="{!! old('dataNasc') !!}" type="text" class="form-control date-mask" placeholder="Ex.: MM/DD/YYYY">
                    <br/><br/>

                    <button class="btn blue"> Finalizar Cadastro &raquo</button>
                    <br/><br/><br/><br/>

                </form>


            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#telefone').mask('(99) 9 9999-9999');
        });
        $(document).ready(function(){
            $('#cpf').mask('999.999.999-99');
        });
        $(document).ready(function(){
            $('#datanasc').mask('99/99/9999');
        });
    </script>

@endsection


