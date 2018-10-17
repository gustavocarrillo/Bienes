<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToBienesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bienes', function (Blueprint $table) {
            $table->unsignedInteger('direccion')->after('elemento');
            $table->unsignedInteger('departamento')->nullable()->after('direccion');
            $table->string('estatus')->default('activo');

            $table->foreign('direccion')
                ->references('id')
                ->on('direcciones')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('departamento')
                ->references('id')
                ->on('departamentos')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bienes', function (Blueprint $table) {
            //
        });
    }
}
