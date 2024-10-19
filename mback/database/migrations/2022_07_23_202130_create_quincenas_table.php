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
        Schema::create('quincenas', function (Blueprint $table) {
            $table->id();
//            http://pimm.mineria.gob.bo/PyoServicios/
//            coticacion quincenal de minerales 1 de cada mes y 16 de cada mes
            $table->decimal('plata', 10, 3)->nullable()->default(1.1);
            $table->decimal('plomo', 10, 3)->nullable()->default(1.1);
            $table->decimal('zinc', 10, 3)->nullable()->default(1.1);
            $table->decimal('estano', 10, 3)->nullable()->default(1.1);
// alicuota
           
            $table->decimal('explata', 10, 3)->nullable()->default(6.500);
            $table->decimal('explomo', 10, 3)->nullable()->default(5.000);
            $table->decimal('exzinc', 10, 3)->nullable()->default(5.000);
            $table->decimal('exestano', 10, 3)->nullable()->default(5.000);
            $table->date('fecha');
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
        Schema::dropIfExists('quincenas');
    }
};
