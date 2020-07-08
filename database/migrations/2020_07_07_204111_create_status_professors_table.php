<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_professors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_professor');
            $table->string('is_active',10);
            $table->date('date');

            $table->foreign('id_professor')->references('idProfessor')->on('Users');
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
        Schema::dropIfExists('status_professors');
    }
}
