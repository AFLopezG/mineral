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
        Schema::create('diarias', function (Blueprint $table) {
            $table->id();
            // cotizacion diaria
            //http://pimm.mineria.gob.bo/PyoServicios/
            $table->decimal('plata', 10, 2)->nullable()->default(1.1);
            $table->decimal('plomo', 10, 2)->nullable()->default(1.1);
            $table->decimal('zinc', 10, 2)->nullable()->default(1.1);
            $table->decimal('estano', 10, 2)->nullable()->default(1.1);
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
        Schema::dropIfExists('diarias');
    }
};
