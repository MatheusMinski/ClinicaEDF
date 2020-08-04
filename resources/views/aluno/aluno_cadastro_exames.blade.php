@extends('layout.site')

@section('titulo','Exames Adicionais')

@section('conteudo')
    <div class="container">
        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro" >
            <form method="post" action="{{route('aluno.cadastro.exames.salvar')}}">
                {{csrf_field()}}

                <br /><br />
                <h4 style="text-align: center">Exames Adicionais<br />
                    <h6 style="text-align: center">(Ex: Teste Ergométrico; ECG; imagem; Procedimento
                        cirúrgico; Outro)</h6>
                </h4>
                @if(isset($errors) && count ($errors) > 0)
                    <div style="padding: 30px; color: red" class="center">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <br /><br />

                <input name="idTreinamento" value="{{$idTreinamento}}" type="hidden"/>


                <div class="row">
                    <div class="col s8">
                        <label for="">Tipo do exame</label>
                        <input value="" name="tipoDoExame" class="form-control" required="required" maxlength="50" type="text" placeholder="" />

                    </div>
                    <div class="col s4">
                        <label for="">Data que foi realizado</label>
                        <input value="" name="dataExame" class="form-control" required="required" maxlength="50" id="Data" placeholder="00/00/0000" />
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <label for="">Resultados principais</label>
                        <textarea style="padding-bottom: 3%" value="" name="resultadosPrincipais" class="form-control" required="required" maxlength="50"  placeholder=""></textarea>
                        <button  class="btn blue"> Adicionar </button>
                    </div>
                </div>
            </form>
        </div>


        <div style="padding-top: 10%; padding-bottom: 15%">

            <h5 class="center">Exames Cadastrados</h5>
            <table>
                <thead>
                <th style="width: 50%">Tipo do exame</th>
                <th style="width: 20%">Data</th>
                <th style="width: 30%">Resultados Principais</th>

                </thead>
                <tbody>
                @foreach($dadosExamesAdicionais as $exame)
                    <tr>
                        <td>{{ $exame->tipoDoExame }}</td>
                        <td>{{ date('d/m/Y', strtotime($exame->dataExame))}}</td>
                        <td><button data-target="modal1-{{ $exame->id }}" class="btn green modal-trigger">Resultados Principais</button>
                        <td>
                            <a class="btn orange" href="{{route('aluno.cadastro.exames.editar', ['idExame' => $exame->id,'idTreinamento' => $idTreinamento])}}">Editar</a>
                        </td>

                        <div id="modal1-{{ $exame->id }}" class="modal">
                            <div class="modal-content center">
                                <h4>Resultados Principais:</h4>
                                <h6>{{$exame->resultadosPrincipais}}</h6>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Ok</a>
                            </div>
                        </div>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>


    <script>
        $(document).ready(function(){
            $('#Data').mask('99/99/9999');
        });
        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>


@endsection

