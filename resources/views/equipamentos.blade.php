@extends ('layout.site')

@section('titulo', 'Equipamentos')

@section('conteudo')
    <div class="container">
        <h3 class="center">Lista de Equipamentos</h3>
        <div class="row">
            <table>
              <thead>
                <tr>
                    <th>Nome do Equipamento</th>
                    <th>Quantidade</th>
                    <th>Disponíveis</th>
                    <th>Emprestados</th>
                    <th>Info</th>
                </tr>
              </thead>   
            </table>
        </div>
    </div>

@endsection 