@extends ('layout.site')

@section('titulo', 'Dados do Emprestimo')

@section('conteudo')
    <div class="card horizontal" style="width: 50%; margin: auto; margin-top: 3%">
        <div class="card-stacked">
            <div class="card-content center" style="box-shadow:  15px 15px 27px #e1e1e3, 15px 15px 27px #ffffff;">
                <h3>Dados do empréstimo:</h3>
                <div style="padding-top: 50px; text-align: left" class="container">
                    <h5 style="padding-bottom: 40px">Professor: {{$dados->nomeProfessorEmprestimo}}</h5>
                    <h5 style="padding-bottom: 10px">Dados do aluno:</h5>
                    <h6 style="padding-bottom: 10px">Nome: {{$dados->nomePessoaEmprestimo}}</h6>
                    <h6 style="padding-bottom: 10px">Cpf: {{$dados->cpfPessoaEmprestimo}}</h6>
                    <h6 style="padding-bottom: 10px">Contato: {{$dados->contato}}</h6>
                    <h6 style="padding-bottom: 10px">Equipamento emprestado: {{$dados->nomeEquipamentoEmprestimo}}</h6>
                    <h6 style="padding-bottom: 10px">Data do empréstimo: {{ $dados->created_at->format('d/m/Y') }}</h6>
                    <h6 style="padding-bottom: 10px">Data da devolução: {{date('d/m/Y', strtotime($dados->dataDevolucao)) }}</h6>
                </div>


            </div>
        </div>
    </div>

@endsection
