<?php

use Illuminate\Database\Seeder;

class ListaEsperaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i ++){
            \App\ListaDeEspera::query()->create([
                'nomeAlunoEspera' => "Joaquim" . $i,
                'prioridade' => 1,
                'telefone' => '372918798',
                'outroContato' => '732197897',
                'contatado' => $i % 2
            ]);
        }

    }
}
