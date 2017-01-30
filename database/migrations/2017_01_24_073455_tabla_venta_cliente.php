<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaVentaCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_cliente', function (Blueprint $table){
            $table->integer('id_venta')->unsigned();
            $table->integer('id_cliente')->unsigned();


            $table->foreign('id_venta')->references('id_venta')->on('venta')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_cliente')->references('id_cliente')->on('cliente')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['id_venta','id_cliente']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta_cliente');
    }
}
