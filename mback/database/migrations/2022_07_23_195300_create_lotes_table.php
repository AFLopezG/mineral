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
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
//            $table->string('codigo')->nullable();
//            $table->string('material')->nullable()->comment('puede ser enbrozar o concentrado o gianina');
//            $table->double('pesobruto',11,2)->nullable()->comment('peso brutos de los sacos');
//            $table->integer('saco')->nullable()->comment('cantidad de sacos');
////            $table->double('tara')->nullable();
//            $table->double('pesohumedo',11,2)->nullable()->comment('peso saco*0.5');
////            $table->string('tipo'); // brosa  concentrado
//            $table->date('fecha')->nullable();
////            $table->string('estado')->default('EN CURSO');
//
////            mostrar aparte
//            //de nosotro nuestras leyes de empresa
//            $table->string('codigolab')->nullable();
//            $table->string('nombre')->nullable();
//            $table->double('plata')->nullable()->default(0);
//            $table->double('plomo')->nullable()->default(0);
//            $table->double('zinc')->nullable()->default(0);
//            $table->double('estano')->nullable()->default(0);
//            $table->double('agua')->nullable()->default(0);
//            //leyes del coperativista del cliente
//            $table->double('clplata')->nullable();
//            $table->double('clplomo')->nullable();
//            $table->double('clzinc')->nullable();
//            $table->double('clestano')->nullable();
//            $table->double('clagua')->nullable();
//            //leyes oficiales
//            $table->double('finplata')->nullable()->comment('(plata + clplata)/2');
//            $table->double('finplomo')->nullable()->comment('(plomo + clplomo)/2');
//            $table->double('finzinc')->nullable()->comment('(zinc + clzinc)/2');
//            $table->double('finestano')->nullable()->comment('(estano + clestano)/2');
//            $table->double('finagua')->nullable()->comment('(agua + clagua)/2');
//
//            $table->unsignedBigInteger('cliente_id');
//            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->string('mineral')->nullable();
            $table->string('codigo')->nullable();
            $table->string('tipo')->nullable();
            $table->double("peso",11,2)->nullable();
            $table->integer("saco")->nullable();
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->unsignedBigInteger('cooperativa_id')->nullable();
            $table->foreign('cooperativa_id')->references('id')->on('cooperativas');
            $table->date('fecha')->nullable();
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
        Schema::dropIfExists('lotes');
    }
};
