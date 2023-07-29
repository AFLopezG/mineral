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
        Schema::create('anticipos', function (Blueprint $table) {
            $table->id();
//            un lore puede tener varios anticipos
            $table->string('tipo');
            $table->unsignedBigInteger('lote_id');
            $table->foreign('lote_id')->references('id')->on('lotes');
            $table->double('monto')->default(0);
            $table->date('fecha')->nullable();
            $table->string('nombreChofer')->nullable();
            $table->string('ciChofer')->nullable();
            $table->string('placa')->nullable();
            $table->string('tipoVehiculo')->nullable();
            $table->string('descripcion')->nullable();
//            $table->string('anticipo')->nullable()->comment('contra carga (contra el pago del mineral) o contra transporte (contra el pago del transporte)');
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
        Schema::dropIfExists('anticipos');
    }
};
