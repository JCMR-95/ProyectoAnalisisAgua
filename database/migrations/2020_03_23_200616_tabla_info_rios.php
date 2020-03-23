<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaInfoRios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_info_rios', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->timestamps();
			
			$table->integer('idPuntoRio')->nullable();
            $table->string('puntoMedicion')->nullable();
            $table->float('latitud')->nullable();
            $table->float('longitud')->nullable();
            $table->float('altura')->nullable();

            
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
