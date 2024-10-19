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
        Schema::create('leys', function (Blueprint $table) {
            $table->id();
//
//            $table->unsignedBigInteger('cliente_id');
//            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->decimal('plomo', total: 5, places: 2);
            $table->decimal('plata', total: 5, places: 2);
            $table->decimal('zinc', total: 8, places: 2);
            $table->decimal('estaño', total: 8, places: 2);
            $table->decimal('humedad', total: 8, places: 2);

            // $table->integer("saco")->nullable();
            // $table->string('liquidado')->nullable();
            // $table->string('conjunto')->nullable();
            // $table->unsignedBigInteger('cliente_id')->nullable();
            // $table->foreign('cliente_id')->references('id')->on('clientes');
            // $table->unsignedBigInteger('cooperativa_id')->nullable();
            // $table->foreign('cooperativa_id')->references('id')->on('cooperativas');
            $table->unsignedBigInteger('lote_id')->nullable();
            $table->foreign('lote_id')->references('id')->on('lotes');
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
        Schema::dropIfExists('leys');
    }
};
