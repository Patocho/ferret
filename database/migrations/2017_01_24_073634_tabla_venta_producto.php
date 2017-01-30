<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaVentaProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_producto', function (Blueprint $table){
            $table->integer('id_venta')->unsigned();
            $table->integer('id_producto')->unsigned();


            $table->foreign('id_venta')->references('id_venta')->on('venta')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_producto')->references('id_producto')->on('producto')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['id_venta','id_producto']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta_producto');
    }
}
