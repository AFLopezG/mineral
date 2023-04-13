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
        Schema::create('cooperativas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('representante');
            $table->string('nim');
            $table->string('nit');
            $table->string('celular')->nullable();
            $table->string('estado');

            //$table->string('cliente')->nullable();
            //$table->unsignedBigInteger('cliente_id');
            //$table->foreign('cliente_id')->references('id')->on('clientes');
            $table->timestamps();
           // $table->foreign('cooperativa_id')->references('id')->on('cooperativas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cooperativas');
    }
};
