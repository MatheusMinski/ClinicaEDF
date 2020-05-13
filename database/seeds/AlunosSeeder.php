<?php

use Illuminate\Database\Seeder;

class AlunosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Alunos')->insert([
            'nome' => 'Matheus Minski',
            'dataNasc' =>'10/10/1997',
            'idade' =>'22',
            'sexo' =>'Masculino',
            'email' =>'minskisantos@lalala.com',
            'profissao' =>'Estudante',
            'aposentado' =>'False',
            'estadoCivil' =>'Solteiro',
            'escolaridade' =>'Médio completo',
            'classeSocialFamilia' =>'B',

        ]);
    }
}
