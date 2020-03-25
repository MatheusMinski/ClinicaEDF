<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilBioquimico extends Model
{
    protected $fillable = [
        'idAluno', 'glicemiaDataUm', 'glicemiaValorUm', 'glicemiaDataDois', 'glicemiaValorDois', 'insulinaDataUm', 'insulinaValorUm',
        'insulinaDataDois', 'insulinaValorDois', 'creatinaDataUm', 'creatinaValorUm', 'creatinaDataDois', 'creatinaValorDois', 'ctDataUm',
        'ctValorUm', 'ctDataDois', 'ctValorDois', 'hdlDataUm', 'hdlValorUm', 'hdlDataDois', 'hdlValorDois',
        'ldlDataUm', 'ldlValorUm', 'ldlDataDois', 'ldlValorDois', 'tgDataUm', 'tgValorUm', 'tgDataDois', 'tgValorDois'
    ];


}
