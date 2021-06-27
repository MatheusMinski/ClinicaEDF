<?php

use Illuminate\Database\Seeder;

class EnderecosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Endereco::query()->create([
            'idALuno' => 1,
            'idEndereco' => 1,
            'rua'=> 'asdsad',
            'numero'=> '12',
            'bairro'=>'trianon',
            'cidade'=>'gorpa',
            'cep'=>'12345678',
        ]);
    }
}
