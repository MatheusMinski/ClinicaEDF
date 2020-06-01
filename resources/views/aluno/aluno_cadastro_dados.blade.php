
@extends('layout.site')

@section('titulo','Dados Principais')

@section('conteudo')

    <div class="container">
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form method="post" action="{{route('aluno.cadastro.dados.salvar')}}">
                {{csrf_field()}}

                <br /><br />
                <h4>Cadastro de Aluno - Dados Pessoais</h4>
                <br /><br />
                @if(isset($errors) && count ($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <br /><br />

                <label for="">Nome</label>
                <input name="nome" class="form-control" required="required" maxlength="50" type="text" placeholder="" />
                <br /><br />

                <label for="">Email</label>
                <input name="email" id="" type="text" class="form-control" placeholder="">
                <br /><br />

                <label for="">Data de Nascimento</label>
                <input id="" name="dataNasc" required="required" type="date" placeholder="" class="validate" />
                <br /><br />


                <label for="">Sexo</label>

                <select id="" name="sexo" class="browser-default">
                    <option disabled selected value>Selecione Uma Opção</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Nenhum">Prefiro não dizer</option>
                </select>
                <br /><br />


                <label for="">Profissão</label>
                <input name="profissao" id="" value="" type="text" class="form-control" placeholder="">
                <br /><br />

                <label for="isAposentado">É aposentado?</label>
                <select id='isAposentado' name="aposentado" class="browser-default">
                    <option disabled selected value>Selecione Uma Opção</option>
                    <option value="true">Sim</option>
                    <option value="false">Não</option>
                </select>
                <br /><br />


                <label for="">Estado Civil</label>
                <select id="" name="estadoCivil" class="browser-default">
                    <option disabled selected value>Selecione Uma Opção</option>
                    <option value="Casado">Casado</option>
                    <option value="Divorciado">Divorciado</option>
                    <option value="Amasiado">Amasiado</option>
                    <option value="Viúvo">Viúvo</option>
                    <option value="Solteiro">Solteiro</option>
                </select>
                <br /><br />


                <label for="">Escolaridade</label>
                <select id="" name="escolaridade" class="browser-default">
                    <option disabled selected value>Selecione Uma Opção</option>
                    <option value="Nenhuma">Nenhuma</option>
                    <option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>
                    <option value="Ensino Fundamental completo">Ensino Fundamental completo</option>
                    <option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
                    <option value="Ensino Médio completo">Ensino Médio completo</option>
                    <option value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
                    <option value="Ensino Superior completo">Ensino Superior completo</option>
                </select>
                <br /><br />


                <label for="">Classe Social Familia</label>
                <select id="" name="classeSocialFamilia" class="browser-default">
                    <option disabled selected value>Selecione Uma Opção</option>
                    <option value="Menos de um salário mínimo">Menos de um salário mínimo</option>
                    <option value="3-5 salários mínimos">Entre 3 e 5 salários mínimos</option>
                    <option value="5-15 salários mínimos">Entre 5 e 15 salários mínimos</option>
                    <option value="Mais de 15 salários mínimos">Mais de 15 salários mínimos</option>
                </select>
                <br /><br />


                <button class="btn blue" type="submit">CONTINUAR &raquo</button>

                <br /><br /><br /><br />

            </form>


        </div>
    </div>
    </div>







@endsection
