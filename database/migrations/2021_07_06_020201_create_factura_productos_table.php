<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('factura_id');
            $table->unsignedInteger('producto_id');
            $table->integer('cantidad');
            $table->float('subTotal');
            $table->float('total');
            $table->timestamps();

            $table->foreign('factura_id')->references('id')->on('facturas');
            $table->foreign('producto_id')->references('id')->on('productos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura_productos');
    }
}
