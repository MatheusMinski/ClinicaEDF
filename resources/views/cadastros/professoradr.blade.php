@extends ('layout.site')

@section('titulo', 'Cadastro De Professores')

@section('conteudo')


    <br/><br/>
    <h4>Endereço</h4>
    <br/><br/>

    <label>Rua</label>
    <input name="rua" class="form-control" required="required" type="text" placeholder="Ex. das Laranjeiras"/>
    <br/><br/>

    <label>Número</label>
    <input name="numero" class="form-control" required="required" type="text" placeholder="Ex. 605"/>
    <br/><br/>

    <label>Bairro</label>
    <input name="bairro" class="form-control" required="required" type="text" placeholder="Ex. Dos Estados"/>
    <br/><br/>

    <labe>Cidade</labe>
    <input name="cidade" class="form-control" type="text" placeholder="Ex. Guarapuava"/>
    <br/><br/>

    <labe>CEP</labe>
    <input name="cep" class="form-control cep-mask" type="text" placeholder="Ex. 00000-000"/>
    <br/><br/>

@endsection
