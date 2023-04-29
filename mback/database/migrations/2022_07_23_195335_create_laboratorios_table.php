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
        Schema::create('laboratorios', function (Blueprint $table) {
            $table->id();
            //de nosotro nuestras leyes de empresa
            //YA NO SE USA
            $table->string('codigo');
            $table->string('nombre');
            $table->double('plata')->nullable()->default(0);
            $table->double('plomo')->nullable()->default(0);
            $table->double('zinc')->nullable()->default(0);
            $table->double('estano')->nullable()->default(0);
            $table->double('agua')->nullable()->default(0);
            //leyes del coperativista del cliente
            $table->double('clplata')->nullable();
            $table->double('clplomo')->nullable();
            $table->double('clzinc')->nullable();
            $table->double('clestano')->nullable();
            $table->double('clagua')->nullable();
            //leyes oficiales
            $table->double('finplata')->nullable()->comment('(plata + clplata)/2');
            $table->double('finplomo')->nullable()->comment('(plomo + clplomo)/2');
            $table->double('finzinc')->nullable()->comment('(zinc + clzinc)/2');
            $table->double('finestano')->nullable()->comment('(estano + clestano)/2');
            $table->double('finagua')->nullable()->comment('(agua + clagua)/2');

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
        Schema::dropIfExists('laboratorios');
    }
};
