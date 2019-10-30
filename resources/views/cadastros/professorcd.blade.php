@extends ('layout.site')

@section('titulo', 'Cadastro De Professores')

@section('conteudo')

    <div class="container" >
            <!--FORMULÁRIO DE CADASTRO-->
            <div id="cadastro">
                <form method="post" action="{{route('salvar.professor')}}">

                    <br/><br/>
                    <h4>Cadastro de Professor</h4>
                    <br/><br/>

                    <label for="nome_cad">Nome Completo</label>
                    <input name="nome" class="form-control" required="required" type="text" placeholder="" />
                    <br/><br/>

                    <label for="email_cad">E-mail</label>
                    <input id="email_cad" name="email" required="required" type="email" placeholder="contato@gmail.com" class="validate"/>
                    <br/><br/>

                    <div class="form-inline">
                        <div class="form-group">
                            <label class="control-label" for="user_password2">Senha</label>
                            <p class="info-label">Senha entre 8 a 14 caracteres, contendo letras e números</p>
                            <div>
                                <div class="input-group col-md-4 f-left">
                                    <input name="passw" class="password form-control" id="user_password2" data-component="password-strength" data-monitor-id="password-strength-monitor" type="password">
                                    <a class=" input-group-addon toggle-pass ico-eye" data-classtoggle="ico-eye,ico-eye-blocked" data-target="#user_password2" href="#"></a>
                                </div>

                                <div class="password-strength">
                                    <p>Força da senha</p>
                                    <div id="password-strength-monitor" class="monitor"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <br/><br/><br/>

                    <label for="cpf">CPF</label>
                    <input name="cpf"  type="text" class="form-control cpf-mask" placeholder="Ex.: 000.000.000-00">
                    <br/><br/>


                    <label for="phone">Telefone</label>
                    <input name="telefone" type="text" class="form-control cel-sp-mask" placeholder="Ex.: (00) 00000-0000">
                    <br/><br/>

                    <label for="datanasc"><h6>Data de Nascimento</h6></label>
                    <input name="dataNasc" type="text" class="form-control date-mask" placeholder="Ex.: 00/00/0000">
                    <br/><br/>

                    <br/><br/>
                    <h4>Endereço</h4>
                    <br/><br/>

                    <label >Rua</label>
                    <input name="rua" class="form-control" required="required" type="text" placeholder="Ex. das Laranjeiras" />
                    <br/><br/>

                    <label>Número</label>
                    <input name="numero" class="form-control" required="required" type="text" placeholder="Ex. 605" />
                    <br/><br/>

                    <label>Bairro</label>
                    <input name="bairro" class="form-control" required="required" type="text" placeholder="Ex. Dos Estados" />
                    <br/><br/>

                    <labe>Cidade</labe>
                    <input name="cidade" class="form-control"  type="text" placeholder="Ex. Guarapuava" />
                    <br/><br/>

                    <labe>CEP</labe>
                    <input name="cep" class="form-control cep-mask"  type="text" placeholder="Ex. 00000-000" />
                    <br/><br/>

                    <button class="next"> Finalizar Cadastro &raquo</button>
                    <br/><br/><br/><br/>

                </form>



            </div>
        </div>
    </div>

@endsection
