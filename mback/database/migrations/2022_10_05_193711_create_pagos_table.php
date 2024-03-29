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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            //ultim pasrte es liquidacion
            $table->date('fecha');
            $table->double('merma');
            $table->double('pnh'); // peso neto humedo
            $table->double('pns'); // peso neto seco
            $table->double('precioNeto',11,2)->comment('precio sacado por tablas');
            $table->double('precioBruto',11,2);
            $table->unsignedBigInteger('lote_id');
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
        Schema::dropIfExists('pagos');
    }
};
