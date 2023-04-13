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
        Schema::create('descuentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->double('porcentaje')->default(0);
            $table->double('fijo')->default(0);
            $table->boolean('activo')->default(true);
            $table->unsignedBigInteger('cooperativa_id');
            $table->foreign('cooperativa_id')->references('id')->on('cooperativas');
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
        Schema::dropIfExists('descuentos');
    }
};
