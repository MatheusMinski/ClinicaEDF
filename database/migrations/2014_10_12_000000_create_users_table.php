<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Users', function (Blueprint $table) {

            $table->bigIncrements('idProfessor');
            $table->string('nome', 50);
            $table->string('cpf', 15)->unique();
            $table->string('telefone', 20);
            $table->date('dataNasc');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('ativo')->default(true);
            $table->string('type')->default('default');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Users');
    }
}
