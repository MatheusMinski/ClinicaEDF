@extends ('layout.site')

@section('titulo', 'Cadastro De Professores')

@section('conteudo')

    <form align="center" action="{{route('emprestimo.finalizar', $registro)}}">

        <br/>

        @if(isset($errors) && count ($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
        <br/><br/>

        <div class="form-group">
            <label>Nome Completo</label>
            <br/>
            <input value="{!! old('nomePessoaEmprestimo') !!}" name="nomePessoaEmprestimo" id="epname" style="width:250px" height="10px" style="width:350px"
                   type="text" class="validate"
                   placeholder="Nome Completo"/>
        </div>

        <div class="form-group">
            <label>CPF</label>
            <br/>
            <input value="{!! old('cpfPessoaEmprestimo') !!}" name="cpfPessoaEmprestimo" style="width:250px" id="cpfEmp" type="text" class="form-control cpf-mask"
                   placeholder="Ex.: 000.000.000-00">
        </div>
        <br/>

        <br/>

        <div>
            <label for="example1" class="sr-only">Data de Devolução</label><br/>
            <input value="{!! old('dataDevolucao') !!}" type="text" name="dataDevolucao" style="width:250px" class="form-control date-mask" id="example1"
                   placeholder="dd/mm/aaaa">
        </div>
        <div>
            <label style="width: 200px" name="nomeEquipamento">Item
                selecionado: {{$registro->nomeEquipamento}}</label><br/><br/>

            <label>Quantidade</label><br/>
            <input value="{!! old('quantidade') !!}" style="width: 250px" name="quantidade" type="number" min="1" placeholder="Ex.: 3"></input><br/>

            <input type="hidden" style="width: 200px" name="nomeEquipamento" required
                   value="{{$registro->nomeEquipamento}}"></input><br/>
            <input type="hidden" style="width: 200px" name="idEquipamento" required
                   value="{{$registro->id}}"></input>

        </div>


        <br/>
        <div>
            <button type="submit" class="btn btn-default">Finalizar Empréstimo</button>
        </div><br/>

    </form>


@endsection
