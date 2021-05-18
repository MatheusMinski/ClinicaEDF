<?php

namespace App\Http\Controllers\Exportar;

use App\Aluno;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportarDadosAluno implements FromView
{
    public function view(): View
    {
        $alunos = Aluno::query()
            ->leftJoin('AlunoTreinamentos', 'Alunos.id', '=', 'idAluno')
            ->leftJoin('Anamnese', 'Anamnese.idTreinamento', '=', 'AlunoTreinamentos.idAluno')
            ->leftJoin('AvaliacaoFuncional', 'AvaliacaoFuncional.idTreinamento', '=', 'AlunoTreinamentos.idAluno')
            ->leftJoin('PerfilBioquimico', 'PerfilBioquimico.idTreinamento', '=', 'AlunoTreinamentos.idAluno')
            ->leftJoin('QualidadeDeVidas', 'QualidadeDeVidas.idTreinamento', '=', 'AlunoTreinamentos.idAluno')
        ->get();

        return view('aluno.export_aluno', [
            'alunos' => $alunos
        ]);
    }
}
