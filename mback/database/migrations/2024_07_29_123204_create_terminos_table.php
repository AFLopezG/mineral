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
        Schema::create('terminos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('plataPagable',5,2)->nullable()->default(1.1);
            $table->decimal('plomoPagable',5,2)->nullable()->default(1.1);
            $table->decimal('zincPagable',5,2)->nullable()->default(1.1);
            $table->decimal('refino',5,2)->nullable()->default(1.1);
            $table->integer('maquila')->nullable();
            $table->integer('transporte')->nullable();
            $table->integer('base')->nullable();
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
        Schema::dropIfExists('terminos');
    }
};
