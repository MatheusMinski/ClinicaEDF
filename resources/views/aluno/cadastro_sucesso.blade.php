@extends('layout.site')

@section('titulo','Treinamentos')

@section('conteudo')
    <div class="container">
    <h2 class="center">Dados cadastrados com sucesso!</h2>
        <h6 class="center">Você será redirecionado em breve...</h6>
    </div>

<script>
    $(document).ready(function () {
        // Handler for .ready() called.
        var jobs = {!! json_encode($idAluno) !!};
        if((jobs == "Lista de Alunos")){
            window.setTimeout(function () {
                location.href = '{{route('aluno.lista')}}';
            }, 3000);
        }else{
            window.setTimeout(function () {
                location.href = '{{route('aluno.cadastro.endereco', ['idAluno' => $idAluno])}}';
            }, 3000);
        }


    });
</script>
@endsection
