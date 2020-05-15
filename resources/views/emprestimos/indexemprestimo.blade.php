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
            <input value="{!! old('cpfPessoaEmprestimo') !!}" name="cpfPessoaEmprestimo" id="cpfPessoaEmprestimo" style="width:250px" id="cpfEmp" type="text" class="form-control cpf-mask"
                   placeholder="Ex.: 000.000.000-00">
        </div>

        <div style="padding-bottom: 20px; padding-top: 20px">
            <label  for="example1" class="sr-only">Data de Devolução</label><br/>
            <input value="{!! old('dataDevolucao') !!}" type="text" name="dataDevolucao" id="dataDevolucao" style="width:250px" class="form-control date-mask" id="example1"
                   placeholder="dd/mm/aaaa">
        </div>
        <div>
            <label>Quantidade</label><br/>
            <input value="{!! old('quantidade') !!}" style="width: 250px" name="quantidade" type="number" min="1" placeholder="Ex.: 3"></input><br/>

            <label  style="height: 10px; display: block;  padding-top: 25px; font-size: large; font-weight: bold"  name="nomeEquipamento">Item
                selecionado: {{$registro->nomeEquipamento}} </label><br/><br/>

            <input type="hidden" style="width: 200px" name="nomeEquipamento" required
                   value="{{$registro->nomeEquipamento}}"></input><br/>
            <input type="hidden" style="width: 200px" name="idEquipamento" required
                   value="{{$registro->id}}"></input>

        </div>


        <br/>
        <div>
            <button type="submit" class="btn blue">Finalizar Empréstimo</button>
        </div><br/>

    </form>
    <script>
        $(document).ready(function(){
            $('#dataDevolucao').mask('99/99/9999');
        });
        $(document).ready(function(){
            $('#cpfPessoaEmprestimo').mask('999.999.999-99');
        });
    </script>

@endsection
