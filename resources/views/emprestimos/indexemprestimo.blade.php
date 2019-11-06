@extends ('layout.site')

@section('titulo', 'Cadastro De Professores')

@section('conteudo')

    <form align="center">

        <br/><br/><br/><br/>


        <div class="form-group">
            <label>Nome Completo</label>
            <br/>
            <input name="nomePessoa" id="epname" style="width:250px" height="10px" style="width:350px" type="text" class="validate"
                   placeholder="Nome Completo"/>
        </div>

        <div class="form-group">
            <label>CPF</label>
            <br/>
            <input name="cpfPessoa" style="width:250px" id="cpfEmp" type="text" class="form-control cpf-mask"
                   placeholder="Ex.: 000.000.000-00">
        </div>
        <br/>

        <br/>

        <div >
            <label for="example1" class="sr-only">Data de Devolução</label><br/>
            <input type="text" style="width:150px" class="form-control date-mask" id="example1"
                   placeholder="dd/mm/aaaa">
        </div>
        <div>
            <label style="width: 200px">Item selecionado: {{$registro->nomeEquipamento}}</label><br/>

        </div>


        <br/>
        <div>
            <button name="finalEmp" type="submit" class="btn btn-default">Finalizar Empréstimo</button>
        </div>

    </form>


@endsection
