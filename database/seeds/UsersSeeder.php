<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->insert([
            'idProfessor'=> 0,
            'nome' => 'Marcos Roberto Queiroga',
            'telefone' =>'999999999',
            'dataNasc' =>'07/07/1990',
            'email'=> 'queiroga@unicentro.br',
            'password' => bcrypt('novaSenha'),
            'cpf' => '123.456.789-19',
            'type' => 'admin',
        ]);

    }


}
