<?php

namespace App\Http\Controllers;

use Carbon\Carbon;


class DataAdapter extends Controller
{
    public function formatarDataArmazenarPerfilBioquimico($dados){

        $dados['glicemiaDataUm'] = Carbon::createFromFormat('d/m/Y',$dados['glicemiaDataUm']);
        $dados['glicemiaDataDois'] = Carbon::createFromFormat('d/m/Y',$dados['glicemiaDataDois']);
        $dados['insulinaDataUm'] = Carbon::createFromFormat('d/m/Y',$dados['insulinaDataUm']);
        $dados['insulinaDataDois']  = Carbon::createFromFormat('d/m/Y',$dados['insulinaDataDois']);
        $dados['creatinaDataUm'] = Carbon::createFromFormat('d/m/Y',$dados['creatinaDataUm']);
        $dados['creatinaDataDois'] = Carbon::createFromFormat('d/m/Y',$dados['creatinaDataDois']);
        $dados['ctDataUm'] = Carbon::createFromFormat('d/m/Y',$dados['ctDataUm']);
        $dados['ctDataDois'] = Carbon::createFromFormat('d/m/Y',$dados['ctDataDois']);
        $dados['hdlDataUm'] = Carbon::createFromFormat('d/m/Y',$dados['hdlDataUm']);
        $dados['hdlDataDois'] = Carbon::createFromFormat('d/m/Y',$dados['hdlDataDois']);
        $dados['ldlDataUm'] = Carbon::createFromFormat('d/m/Y',$dados['ldlDataUm']);
        $dados['ldlDataDois'] = Carbon::createFromFormat('d/m/Y',$dados['ldlDataDois']);
        $dados['tgDataUm'] = Carbon::createFromFormat('d/m/Y',$dados['tgDataUm']);
        $dados['tgDataDois'] = Carbon::createFromFormat('d/m/Y',$dados['tgDataDois']);

        return $dados;
    }

    public function formatarDataArmazenarAnamnese($dados)
    {
        $dados['data'] = Carbon::createFromFormat('d/m/Y',$dados['data']);
    }

    public function formatarDataUsoMedicamentosContinuos($dados)
    {
        $dados['inicio'] = Carbon::createFromFormat('d/m/Y',$dados['inicio']);
    }

    public function formatarDataExamesAdicionais($dados)
    {
        $dados['dataExame'] = Carbon::createFromFormat('d/m/Y',$dados['dataExame']);
    }

    public function formatarDataConsultasMedicas($dados)
    {
        $dados['dataAproximada'] = Carbon::createFromFormat('d/m/Y',$dados['dataAproximada']);
    }

}
