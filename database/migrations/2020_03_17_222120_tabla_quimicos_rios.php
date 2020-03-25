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

            $table->string('aluminio')->nullable();
            $table->string('unidadAluminio')->nullable();

            $table->string('arsenico')->nullable();
            $table->string('unidadArsenico')->nullable();

            $table->string('boro')->nullable();
            $table->string('unidadBoro')->nullable();

            $table->string('cloro')->nullable();
            $table->string('unidadCloro')->nullable();

            $table->string('cadmio')->nullable();
            $table->string('unidadCadmio')->nullable();

            $table->string('calcio')->nullable();
            $table->string('unidadCalcio')->nullable();

            $table->string('cobre')->nullable();
            $table->string('unidadCobre')->nullable();

            $table->string('cromo')->nullable();
            $table->string('unidadCromo')->nullable();

            $table->string('hierro')->nullable();
            $table->string('unidadHierro')->nullable();

            $table->string('fosfato')->nullable();
            $table->string('unidadFosfato')->nullable();

            $table->string('magnesio')->nullable();
            $table->string('unidadMagnesio')->nullable();

            $table->string('manganeso')->nullable();
            $table->string('unidadManganeso')->nullable();

            $table->string('molibdeno')->nullable();
            $table->string('unidadMolibdeno')->nullable();

            $table->string('nitrato')->nullable();
            $table->string('unidadNitrato')->nullable();

            $table->string('niquel')->nullable();
            $table->string('unidadNiquel')->nullable();

            $table->string('oxigeno')->nullable();
            $table->string('unidadOxigeno')->nullable();

            $table->string('ph')->nullable();
            $table->string('unidadPH')->nullable();

            $table->string('plata')->nullable();
            $table->string('unidadPlata')->nullable();

            $table->string('plomo')->nullable();
            $table->string('unidadPlomo')->nullable();

            $table->string('potasio')->nullable();
            $table->string('unidadPotasio')->nullable();

            $table->string('selenio')->nullable();
            $table->string('unidadSelenio')->nullable();

            $table->string('sodio')->nullable();
            $table->string('unidadSodio')->nullable();

            $table->string('zinc')->nullable();
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
