<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCierre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cierres', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('direccion');
            $table->string('mes');
            $table->string('ano');
            $table->decimal('monto',16,5)->unsigned();
            $table->timestamps();

            $table->foreign('direccion')
                ->references('id')
                ->on('direcciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cierres');
    }
}
