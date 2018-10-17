<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearMovimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('bien')->unsigned();
            $table->Integer('t_movimiento')->unsigned();
            $table->date('fecha');
            $table->Integer('direccion')->unsigned();
            $table->Integer('departamento')->unsigned()->nullable();
            $table->string('idU')->unique();
            $table->string('observacion')->nullable();
            $table->integer('usuario')->nullable()->unsigned();

            $table->foreign('bien')->references('id')->on('bienes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('departamento')->references('id')->on('departamentos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('direccion')->references('id')->on('direcciones')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('t_movimiento')->references('id')->on('tipo_movimientos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('usuario')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');

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
        Schema::dropIfExists('movimientos');
    }
}
