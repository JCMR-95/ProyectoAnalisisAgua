<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaHistorico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_historico', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->timestamps();
			
			$table->string('fechaActual')->nullable();
            $table->string('idPuntoRio')->nullable();
            $table->string('fechaRio')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
