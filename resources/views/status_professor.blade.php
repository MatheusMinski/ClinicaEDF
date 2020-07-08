@extends('layout.site')

@section('titulo','Cursos')
@section('conteudo')
    <div class="container">
        <br/>
        <h3 class="center">Histórico do Professor</h3>
        <div style="padding: 30px; color: red" class="center">
            @if(isset($errors) && count ($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="row">
            <table>
                <thead>
                <tr>
                    <th class="center" >Histórico</th>
                    <th class="center">Data</th>

                </tr>
                </thead>
                <tbody>
                @foreach($datas as $data)
                    <tr >
                        <td class="center">{{ $data->is_active }}</td>
                        <td class="center">{{ $data->date }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row" align="center">
            {{$datas->links('vendor.pagination.materializecss')}}
        </div>


    </div>



@endsection
