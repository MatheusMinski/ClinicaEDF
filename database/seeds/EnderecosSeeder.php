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
        DB::table('enderecos')->insert([
            'idEndereco' => 1,
            'rua'=> 'asdsad',
            'numero'=> '12',
            'bairro'=>'trianon',
            'cidade'=>'gorpa',
            'cep'=>'asdlkjasd',
        ]);
    }
}
