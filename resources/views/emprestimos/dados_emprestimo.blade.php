@extends ('layout.site')

@section('titulo', 'Dados do Emprestimo')

@section('conteudo')
    <div class="container" >
        <!--FORMULÁRIO DE LOGIN-->
        <div id="login" align="center">
            <h3>Dados do empréstimo:</h3>
            <div style="padding-top: 50px; text-align: justify" class="container">
                <h5 style="padding-bottom: 40px">Nome do professor: {{$dados->nomeProfessorEmprestimo}}</h5>
                <h5 style="padding-bottom: 10px">Dados do aluno:</h5>
                <h6 style="padding-bottom: 10px">Nome: {{$dados->nomePessoaEmprestimo}}</h6>
                <h6 style="padding-bottom: 10px">Cpf: {{$dados->cpfPessoaEmprestimo}}</h6>
                <h6 style="padding-bottom: 10px">Contato: {{$dados->cpfPessoaEmprestimo}}</h6>
                <h6 style="padding-bottom: 10px">Equipamento emprestado: {{$dados->nomeEquipamentoEmprestimo}}</h6>
                <h6 style="padding-bottom: 10px">Data do empréstimo: {{ $dados->created_at->format('d/m/Y') }}</h6>
                <h6 style="padding-bottom: 10px">Data da devolução: {{date('d/m/Y', strtotime($dados->dataDevolucao)) }}</h6>
            </div>


        </div>
    </div>
    </div>

@endsection
