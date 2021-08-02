<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnsInTableUsoMedicamentosContinuos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE "UsoMedicamentosContinuos" ALTER COLUMN "nomeComercial" DROP NOT NULL');
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE "UsoMedicamentosContinuos" ALTER COLUMN "nomeCientifico" DROP NOT NULL');
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE "UsoMedicamentosContinuos" ALTER COLUMN "dosagem" DROP NOT NULL');
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE "UsoMedicamentosContinuos" ALTER COLUMN "posologia" DROP NOT NULL');
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE "UsoMedicamentosContinuos" ALTER COLUMN "inicio" DROP NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("UsoMedicamentosContinuos", function (Blueprint $table) {
            //
        });
    }
}
