<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifOrdenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordenes', function (Blueprint $table) {
            $table->integer('proveedor')->unsigned()->after('fecha');
            $table->date('f_factura')->after('proveedor');
            $table->integer('nro_factura')->after('f_factura');
            $table->integer('nro_control')->after('nro_factura');
            $table->decimal('total',12,2)->after('nro_control');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordenes', function (Blueprint $table) {
            $table->dropColumn(['proveedor','f_factura','nro_factura','nro_control','total']);
        });
    }
}
