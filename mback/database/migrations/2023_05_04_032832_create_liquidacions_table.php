<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lote_id')->nullable();
            $table->foreign('lote_id')->references('id')->on('lotes');
            $table->unsignedBigInteger('ley_id')->nullable();
            $table->foreign('ley_id')->references('id')->on('leys');
            $table->unsignedBigInteger('quincena_id')->nullable();
            $table->foreign('quincena_id')->references('id')->on('quincenas');
            $table->unsignedBigInteger('diaria_id')->nullable();
            $table->foreign('diaria_id')->references('id')->on('diarias');
            $table->unsignedBigInteger('anticipo_id')->nullable();
            $table->foreign('anticipo_id')->references('id')->on('anticipos');
            $table->unsignedBigInteger('cooperativa_id')->nullable();
            $table->foreign('cooperativa_id')->references('id')->on('cooperativas');
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->double('valor_bruto');
            $table->double('valor_neto');
            $table->double('liq-pagable');
            $table->double('rm_zinc');
            $table->double('rm_plomo');
            $table->double('rm_plata');
            $table->double('rm_estaño');
            $table->double('total_anticipo');
            $table->double('total_descuento');
            
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
        Schema::dropIfExists('precios');
    }
};
