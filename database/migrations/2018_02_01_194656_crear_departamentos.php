<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearDepartamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('codigo',5)->unique();
            $table->string('descripcion','255');
            $table->string('responsable','255');
            $table->string('cargo_responsable','255')->default('director');
            $table->string('resolucion','255');
            $table->Integer('direccion')->unsigned();

            $table->foreign('direccion')->references('id')->on('direcciones')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
}
