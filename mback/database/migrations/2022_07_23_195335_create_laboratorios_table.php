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
            $table->double('plata')->nullable();
            $table->double('plomo')->nullable();
            $table->double('zinc')->nullable();
            $table->double('estano')->nullable();
            $table->double('agua')->nullable();

            $table->double('clplata')->nullable();
            $table->double('clplomo')->nullable();
            $table->double('clzinc')->nullable();
            $table->double('clestano')->nullable();
            $table->double('clagua')->nullable();

            $table->double('finplata')->nullable();
            $table->double('finplomo')->nullable();
            $table->double('finzinc')->nullable();
            $table->double('finestano')->nullable();
            $table->double('finagua')->nullable();

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
