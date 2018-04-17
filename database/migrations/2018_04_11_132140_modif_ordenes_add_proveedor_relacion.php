<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifOrdenesAddProveedorRelacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordenes', function (Blueprint $table) {
            $table->foreign('proveedor')->references('id')->on('proveedores')->onDelete('cascade')->onUpdate('cascade');
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
            $table->dropForeign('ordenes_proveedor_foreign');
        });
    }
}
