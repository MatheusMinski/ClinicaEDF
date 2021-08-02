<?php

namespace App\Http\Controllers;

use Carbon\Carbon;


class DataAdapter extends Controller
{
    public function formatarDataArmazenarPerfilBioquimico($dados){

        if(isset($dados['glicemiaDataUm'])){
            $dados['glicemiaDataUm'] = Carbon::createFromFormat('d/m/Y',$dados['glicemiaDataUm']);
        }
        if(isset($dados['glicemiaDataDois'])){
            $dados['glicemiaDataDois'] = Carbon::createFromFormat('d/m/Y',$dados['glicemiaDataDois']);
        }
        if(isset($dados['insulinaDataUm'])){
            $dados['insulinaDataUm'] = Carbon::createFromFormat('d/m/Y',$dados['insulinaDataUm']);
        }
        if(isset($dados['insulinaDataDois'])){
            $dados['insulinaDataDois'] = Carbon::createFromFormat('d/m/Y',$dados['insulinaDataDois']);
        }
        if(isset($dados['creatinaDataUm'])){
            $dados['creatinaDataUm'] = Carbon::createFromFormat('d/m/Y',$dados['creatinaDataUm']);
        }
        if(isset($dados['creatinaDataDois'])){
            $dados['creatinaDataDois'] = Carbon::createFromFormat('d/m/Y',$dados['creatinaDataDois']);
        }
        if(isset($dados['ctDataUm'])){
            $dados['ctDataUm'] = Carbon::createFromFormat('d/m/Y',$dados['ctDataUm']);
        }
        if(isset($dados['ctDataDois'])){
            $dados['ctDataDois'] = Carbon::createFromFormat('d/m/Y',$dados['ctDataDois']);
        }
        if(isset($dados['hdlDataUm'])){
            $dados['hdlDataUm'] = Carbon::createFromFormat('d/m/Y',$dados['hdlDataUm']);
        }
        if(isset($dados['hdlDataDois'])){
            $dados['hdlDataDois'] = Carbon::createFromFormat('d/m/Y',$dados['hdlDataDois']);
        }
        if(isset($dados['ldlDataUm'])){
            $dados['ldlDataUm'] = Carbon::createFromFormat('d/m/Y',$dados['ldlDataUm']);
        }
        if(isset($dados['ldlDataDois'])){
            $dados['ldlDataDois'] = Carbon::createFromFormat('d/m/Y',$dados['ldlDataDois']);
        }
        if(isset($dados['tgDataUm'])){
            $dados['tgDataUm'] = Carbon::createFromFormat('d/m/Y',$dados['tgDataUm']);
        }
        if(isset($dados['tgDataDois'])){
            $dados['tgDataDois'] = Carbon::createFromFormat('d/m/Y',$dados['tgDataDois']);
        }

        return $dados;
    }

    public function formatarDataArmazenarAnamnese($dados)
    {
        if(isset($dados['data'])){
            $dados['data'] = Carbon::createFromFormat('d/m/Y',$dados['data']);
        }

        return $dados;
    }

    public function formatarDataUsoMedicamentosContinuos($dados)
    {
        if(isset($dados['inicio'])){
            $dados['inicio'] = Carbon::createFromFormat('d/m/Y',$dados['inicio']);
        }

        return $dados;
    }

    public function formatarDataExamesAdicionais($dados)
    {
        $dados['dataExame'] = Carbon::createFromFormat('d/m/Y',$dados['dataExame']);
        return $dados;
    }

    public function formatarDataConsultasMedicas($dados)
    {
        $dados['dataAproximada'] = Carbon::createFromFormat('d/m/Y',$dados['dataAproximada']);
        return $dados;
    }

}
