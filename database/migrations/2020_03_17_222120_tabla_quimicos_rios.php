<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaQuimicosRios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('tabla_quimicos_rios', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->timestamps();
			
			$table->string('idPuntoRio')->nullable();
            $table->string('fecha')->nullable();

            $table->string('arsenico')->nullable();
            $table->string('boro')->nullable();
            $table->string('cloro')->nullable();
            $table->string('cobalto')->nullable();
            $table->string('cobre')->nullable();
            $table->string('cromo')->nullable();
            $table->string('ph')->nullable();
            $table->string('plomo')->nullable();
            $table->string('zinc')->nullable();
            $table->string('consumo')->nullable();
            $table->string('bico3')->nullable();
            $table->string('calidadHumana')->nullable();
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
