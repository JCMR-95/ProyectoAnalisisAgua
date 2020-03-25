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
			
			$table->string('idPuntoRio')->nullable();
            $table->string('nombreEstacion')->nullable();
            $table->string('codBNA')->nullable();
            $table->string('altitud')->nullable();
            $table->string('cuenca')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('utmNorte')->nullable();
            $table->string('unidadNorteUTM')->nullable();
            $table->string('utmEste')->nullable();
            $table->string('unidadEsteUTM')->nullable();
            
            
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
