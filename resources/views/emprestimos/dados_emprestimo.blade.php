@extends ('layout.site')

@section('titulo', 'Emprestimo')

@section('conteudo')
    <div class="container" >
        <!--FORMULÁRIO DE LOGIN-->
        <div id="login" align="center">
            <h3>Dados do empréstimo:</h3>
            <div style="padding-top: 50px; text-align: justify" class="container">
                <h5 style="padding-bottom: 10px">Nome do professor: {{$dados->nomeProfessorEmprestimo}}</h5>
                <h5 style="padding-bottom: 10px">Nome da pessoa que emprestou: {{$dados->nomePessoaEmprestimo}}</h5>
                <h5 style="padding-bottom: 10px">Cpf da pessoa que emprestou: {{$dados->cpfPessoaEmprestimo}}</h5>
                <h5 style="padding-bottom: 10px">Equipamento emprestado: {{$dados->nomeEquipamentoEmprestimo}}</h5>
                <h5 style="padding-bottom: 10px">Data do empréstimo: {{ $dados->created_at->format('d/m/Y') }}</h5>
                <h5 style="padding-bottom: 10px">Data da devolução: {{date('d/m/Y', strtotime($dados->dataDevolucao)) }}</h5>
            </div>


        </div>
    </div>
    </div>

@endsection
