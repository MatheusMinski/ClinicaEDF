<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts</title>
</head>

<body>
@if($posts->count())
    @foreach ($posts as $post)
        <tr>
            <td>{{ $post->nomeEquipamento }}</td>
            <td>{{ $post->quantidadeTotal }}</td>
            <td>{{ $post->quantidadeDisponivel }}</td>
            <td>
                <a class="btn deep orange" href="{{route('emprestimo',$post->id)}}">Emprestar</a>
            </td>
            <td>
                <a class="btn deep green" href="{{route('equipamentos.editar',$post->id)}}">Editar</a>
            </td>

            <td>
                <a class="btn red" href="{{route('equipamentos.deletar',$post->id)}}">Deletar</a>
            </td>
        </tr>
    @endforeach

    {{$posts->render()}}
@endif
</body>

</html>
//o de antes
@foreach($equipamentos as $equipamento)
    <tr>
        <td>{{ $equipamento->nomeEquipamento }}</td>
        <td>{{ $equipamento->quantidadeTotal }}</td>
        <td>{{ $equipamento->quantidadeDisponivel }}</td>
        <td>
            <a class="btn deep orange" href="{{route('emprestimo',$equipamento->id)}}">Emprestar</a>
        </td>
        <td>
            <a class="btn deep green" href="{{route('equipamentos.editar',$equipamento->id)}}">Editar</a>
        </td>

        <td>
            <a class="btn red" href="{{route('equipamentos.deletar',$equipamento->id)}}">Deletar</a>
        </td>
    </tr>

@endforeach

</tbody>
    </table>
    </div>
    <div class="row">
        <a class="btn blue" href="{{route('cadastro.equipamento')}}">Cadastrar novo Equipamento</a>
    </div>
    <div class="row" align="center">
        {{$equipamentos->links()}}
    </div>
