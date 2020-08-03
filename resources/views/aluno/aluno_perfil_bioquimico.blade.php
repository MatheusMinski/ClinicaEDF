@extends('layout.site')

@section('titulo','Perfil Bioquimico')

@section('conteudo')
    <div class="container" >
        <div class="col s12 m7">

            <div class="card horizontal" style="width: 45%; float: left; margin: 2%">

                <div class="card-stacked">
                    <div class="card-content" style="box-shadow:  15px 15px 27px #e1e1e3, 15px 15px 27px #ffffff;">

                        <h5 style="padding-bottom: 10px">Glicemia</h5>
                        <h6 style="padding-bottom: 10px">Glicemia data (1): {{date('d/m/Y', strtotime($dadosPerfilBioquimico->glicemiaDataUm))}}</h6>
                        <h6 style="padding-bottom: 10px">Glicemia valor (1): {{$dadosPerfilBioquimico->glicemiaValorUm}}</h6>
                        <h6 style="padding-bottom: 10px">Glicemia data (2):{{date('d/m/Y', strtotime( $dadosPerfilBioquimico->glicemiaDataDois ))}}</h6>
                        <h6 style="padding-bottom: 10px">Glicemia valor (2): {{ $dadosPerfilBioquimico->glicemiaValorDois }}</h6>

                        <h5 style="padding-bottom: 10px; padding-top: 10px">Insulina</h5>
                        <h6 style="padding-bottom: 10px">Insulina data (1): {{date('d/m/Y', strtotime($dadosPerfilBioquimico->insulinaDataUm))}}</h6>
                        <h6 style="padding-bottom: 10px">Insulina valor (1): {{$dadosPerfilBioquimico->insulinaValorUm}}</h6>
                        <h6 style="padding-bottom: 10px">Insulina data (2): {{date('d/m/Y', strtotime($dadosPerfilBioquimico->insulinaDataDois))}}</h6>
                        <h6 style="padding-bottom: 10px">Insulina valor (2): {{$dadosPerfilBioquimico->insulinaValorDois}}</h6>

                        <h5 style="padding-bottom: 10px; padding-top: 10px">Creatina</h5>
                        <h6 style="padding-bottom: 10px">Creatina data (1): {{date('d/m/Y', strtotime($dadosPerfilBioquimico->creatinaDataUm))}}</h6>
                        <h6 style="padding-bottom: 10px">Creatina valor (1): {{$dadosPerfilBioquimico->creatinaValorUm}}</h6>
                        <h6 style="padding-bottom: 10px">Cretina data (2):{{date('d/m/Y', strtotime($dadosPerfilBioquimico->creatinaDataDois))}}</h6>
                        <h6 style="padding-bottom: 10px">Creatinha valor (2): {{$dadosPerfilBioquimico->creatinaValorDois}}</h6>

                        <h5 style="padding-bottom: 10px; padding-top: 10px">CT</h5>
                        <h6 style="padding-bottom: 10px">CT data (1): {{date('d/m/Y', strtotime($dadosPerfilBioquimico->ctDataUm))}}</h6>
                        <h6 style="padding-bottom: 10px">CT valor (1): {{$dadosPerfilBioquimico->ctValorUm}}</h6>
                        <h6 style="padding-bottom: 10px">CT data (2): {{date('d/m/Y', strtotime($dadosPerfilBioquimico->ctDataDois))}}</h6>
                        <h6 style="padding-bottom: 10px">CT valor (2): {{$dadosPerfilBioquimico->ctValorDois}}</h6>

                        <h5 style="padding-bottom: 10px; padding-top: 10px">HDL</h5>
                        <h6 style="padding-bottom: 10px">HDL data (1): {{date('d/m/Y', strtotime($dadosPerfilBioquimico->hdlDataUm))}}</h6>
                        <h6 style="padding-bottom: 10px">HDL valor (1): {{$dadosPerfilBioquimico->hdlValorUm}}</h6>
                        <h6 style="padding-bottom: 10px">HDL data (2):{{date('d/m/Y', strtotime($dadosPerfilBioquimico->hdlDataDois))}}</h6>
                        <h6 style="padding-bottom: 10px">HDL valor (2): {{$dadosPerfilBioquimico->hdlValorDois}}</h6>

                        <h5 style="padding-bottom: 10px; padding-top: 10px">LDL</h5>
                        <h6 style="padding-bottom: 10px">LDL data (1): {{date('d/m/Y', strtotime($dadosPerfilBioquimico->ldlDataUm))}}</h6>
                        <h6 style="padding-bottom: 10px">LDL valor (1): {{$dadosPerfilBioquimico->ldlValorUm}}</h6>
                        <h6 style="padding-bottom: 10px">LDL data (2):{{date('d/m/Y', strtotime($dadosPerfilBioquimico->ldlDataDois))}}</h6>
                        <h6 style="padding-bottom: 10px">LDL valor (2): {{$dadosPerfilBioquimico->ldlValorDois}}</h6>

                        <h5 style="padding-bottom: 10px; padding-top: 10px">TG</h5>
                        <h6 style="padding-bottom: 10px">TG data (1): {{date('d/m/Y', strtotime($dadosPerfilBioquimico->tgDataUm))}}</h6>
                        <h6 style="padding-bottom: 10px">TG valor (1): {{$dadosPerfilBioquimico->tgValorUm}}</h6>
                        <h6 style="padding-bottom: 10px">TG data (2): {{date('d/m/Y', strtotime($dadosPerfilBioquimico->tgDataDois))}}</h6>
                        <h6 style="padding-bottom: 10px">TG valor (2): {{$dadosPerfilBioquimico->tgValorDois}}</h6>

                        <a class="btn blue"  href="{{route('aluno.cadastro.perfilBioquimico.editar', $dadosPerfilBioquimico->idTreinamento)}}">Editar</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function(){
                $('#Data').mask('99/99/9999');
            });

            $(document).ready(function(){
                $('#Data2').mask('99/99/9999');
            });
        </script>


@endsection
