@extends ('layout.site')

@section('titulo', 'Cadastro De Professores')

@section('conteudo')

    <form>
        <fieldset>
            <div class="form-group">
                <label>CPF</label>
                <br/>
                <input  name="cpfEmp" style="width:150px" id="cpfEmp" type="text" class="form-control cpf-mask" placeholder="Ex.: 000.000.000-00">
            </div>
            <br/>
            <div>
                <label>Selecionar Itens</label><br/>
                <input type="checkbox" />
                <span>Cama Elástica</span>
            </div>
            <br/>

            <div class="input-group datepicker" >
                <label for="example1" class="sr-only">Data de Devolução</label><br/>
                <input type="text" style="width:150px" class="form-control date-mask" id="example1" placeholder="dd/mm/aaaa">
            </div>

            <div >
                <a name="EmpCad" class="btn btn-default"  href="{{route('cadastro.emprestimo')}}">Não possui cadastro?</a>
            </div>
            <br/>
            <div >
                <button name="finalEmp" type="submit" class="btn btn-default">Finalizar Empréstimo</button>
            </div>

        </fieldset>
    </form>


@endsection
