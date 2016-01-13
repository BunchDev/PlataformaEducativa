<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaPersonajesABP extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('personajes_ABP', function (Blueprint $table) {
            $table->increments('idPersonajesABP');
            $table->string('Nombre');
            $table->integer('fk_idABP')->unsigned();
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
       Schema::drop('personajes_ABP');
    }
}
