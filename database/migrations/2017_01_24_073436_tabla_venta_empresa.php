<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaVentaEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_empresa', function (Blueprint $table){
            $table->integer('id_venta')->unsigned();
            $table->integer('id_empresa')->unsigned();
            $table->softDeletes();


            $table->foreign('id_venta')->references('id_venta')->on('venta')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_empresa')->references('id_empresa')->on('empresa')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['id_venta','id_empresa']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta_empresa');
    }
}
