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
        DB::table('ListaDeEspera')->insert([
            'id' => 1,
            'nomeAlunoEspera' => "Joaquim",
            'prioridade' => 1,
            'telefone' => '372918798',
            'outroContato' => '732197897',
            'contatado' => true
        ]);

        DB::table('ListaDeEspera')->insert([
            'id' => 2,
            'nomeAlunoEspera' => "Jairson",
            'prioridade' => 2,
            'telefone' => '6654244',
            'outroContato' => '65424',
            'contatado' => false
        ]);

        DB::table('ListaDeEspera')->insert([
            'id' => 3,
            'nomeAlunoEspera' => "Jornei",
            'prioridade' => 2,
            'telefone' => '321321',
            'outroContato' => '4553543',
            'contatado' => false
        ]);

        DB::table('ListaDeEspera')->insert([
            'id' => 4,
            'nomeAlunoEspera' => "Jornei",
            'prioridade' => 1,
            'telefone' => '321321',
            'outroContato' => '4553543',
            'contatado' => false
        ]);

        DB::table('ListaDeEspera')->insert([
            'id' => 5,
            'nomeAlunoEspera' => "Jornei",
            'prioridade' => 3,
            'telefone' => '321321',
            'outroContato' => '4553543',
            'contatado' => false
        ]);

        DB::table('ListaDeEspera')->insert([
            'id' => 6,
            'nomeAlunoEspera' => "Jornei",
            'prioridade' => 3,
            'telefone' => '321321',
            'outroContato' => '4553543',
            'contatado' => false
        ]);
    }
}
