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

            $table->float('aluminio')->nullable();
            $table->string('unidadAluminio')->nullable();

            $table->float('arsenico')->nullable();
            $table->string('unidadArsenico')->nullable();

            $table->float('boro')->nullable();
            $table->string('unidadBoro')->nullable();

            $table->float('cloro')->nullable();
            $table->string('unidadCloro')->nullable();

            $table->float('cadmio')->nullable();
            $table->string('unidadCadmio')->nullable();

            $table->float('calcio')->nullable();
            $table->string('unidadCalcio')->nullable();

            $table->float('cobre')->nullable();
            $table->string('unidadCobre')->nullable();

            $table->float('cromo')->nullable();
            $table->string('unidadCromo')->nullable();

            $table->float('hierro')->nullable();
            $table->string('unidadHierro')->nullable();

            $table->float('fosfato')->nullable();
            $table->string('unidadFosfato')->nullable();

            $table->float('magnesio')->nullable();
            $table->string('unidadMagnesio')->nullable();

            $table->float('manganeso')->nullable();
            $table->string('unidadManganeso')->nullable();

            $table->float('molibdeno')->nullable();
            $table->string('unidadMolibdeno')->nullable();

            $table->float('nitrato')->nullable();
            $table->string('unidadNitrato')->nullable();

            $table->float('niquel')->nullable();
            $table->string('unidadNiquel')->nullable();

            $table->float('oxigeno')->nullable();
            $table->string('unidadOxigeno')->nullable();

            $table->float('ph')->nullable();
            $table->string('unidadPH')->nullable();

            $table->float('plata')->nullable();
            $table->string('unidadPlata')->nullable();

            $table->float('plomo')->nullable();
            $table->string('unidadPlomo')->nullable();

            $table->float('potasio')->nullable();
            $table->string('unidadPotasio')->nullable();

            $table->float('selenio')->nullable();
            $table->string('unidadSelenio')->nullable();

            $table->float('sodio')->nullable();
            $table->string('unidadSodio')->nullable();

            $table->float('zinc')->nullable();
            $table->string('unidadZinc')->nullable();

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
