<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearBienes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('codigo',50)->unique();
            $table->string('descripcion','255');
            $table->date('fecha_incorp');
            $table->decimal('valor',8,2);
            $table->decimal('valor_actual',8,2);
            $table->integer('nro_orden')->unsigned();
            $table->Integer('elemento')->unsigned();
            $table->integer('usuario')->unsigned()->nullable();

            $table->foreign('nro_orden')->references('id')->on('ordenes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('usuario')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('elemento')->references('id')->on('elementos')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('bienes');
    }
}
