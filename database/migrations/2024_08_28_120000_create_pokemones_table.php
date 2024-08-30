<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonesTable extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemones', function (Blueprint $table) {
            $table->id(); 
            $table->string('nombre'); 
            $table->string('tipo'); 
            $table->integer('nivel'); 
            $table->integer('puntos_de_salud'); 
            $table->integer('ataque'); 
            $table->integer('defensa'); 
            $table->integer('velocidad'); 
            $table->boolean('eliminado')->default(false); 
            $table->string('url')->nullable(); 
            $table->timestamps(); 
        });
    }

    /**
     * Revierte las migraciones.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemones');
    }
}
