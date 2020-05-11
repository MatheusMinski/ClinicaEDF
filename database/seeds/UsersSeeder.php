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
            'nome' => 'Claudiney',
            'telefone' =>'33265986',
            'dataNasc' =>'07/07/2000',
            'email'=> 'admin@admin.com',
            'password' => bcrypt('lucasflamenguista'),
            'cpf' => '123.456.789-19',
            'type' => 'admin',
        ]);

    }


}
