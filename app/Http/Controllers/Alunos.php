<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Alunos extends Controller
{
    public function listaEspera ()
    {
        return view('listaespera');
    }
}
