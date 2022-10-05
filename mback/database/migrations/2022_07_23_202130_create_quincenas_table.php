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
            $table->decimal('plata', 10, 2)->nullable()->default(1.1);
            $table->decimal('plomo', 10, 2)->nullable()->default(1.1);
            $table->decimal('zinc', 10, 2)->nullable()->default(1.1);
            $table->decimal('estano', 10, 2)->nullable()->default(1.1);
            $table->decimal('alplata', 10, 3)->nullable()->default(3.600);
            $table->decimal('alplomo', 10, 3)->nullable()->default(3.000);
            $table->decimal('alzinc', 10, 3)->nullable()->default(3.000);
            $table->decimal('alestano', 10, 3)->nullable()->default(3.000);
            $table->decimal('explata', 10, 3)->nullable()->default(3.600);
            $table->decimal('explomo', 10, 3)->nullable()->default(3.000);
            $table->decimal('exzinc', 10, 3)->nullable()->default(3.000);
            $table->decimal('exestano', 10, 3)->nullable()->default(3.000);
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
