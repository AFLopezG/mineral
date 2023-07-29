<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("clientes")->insert([
            [
                'nombre'=>"CLIENTE 1",
                'ci'=>"CI 1",
                'telefono'=>"TELEFONO 1",
                'celular'=>"CELULAR 1",
                'activo'=>1,
                'fecha'=>"2021-07-23 19:51:26",
                'cooperativa_id'=>"1"
            ],
            [
                'nombre'=>"CLIENTE 2",
                'ci'=>"CI 2",
                'telefono'=>"TELEFONO 2",
                'celular'=>"CELULAR 2",
                'activo'=>1,
                'fecha'=>"2021-07-23 19:51:26",
                'cooperativa_id'=>"2"
            ],
            [
                'nombre'=>"CLIENTE 3",
                'ci'=>"CI 3",
                'telefono'=>"TELEFONO 3",
                'celular'=>"CELULAR 3",
                'activo'=>1,
                'fecha'=>"2021-07-23 19:51:26",
                'cooperativa_id'=>"3"
            ],
            [
                'nombre'=>"CLIENTE 4",
                'ci'=>"CI 4",
                'telefono'=>"TELEFONO 4",
                'celular'=>"CELULAR 4",
                'activo'=>1,
                'fecha'=>"2021-07-23 19:51:26",
                'cooperativa_id'=>"4"
            ],
            [
                'nombre'=>"CLIENTE 5",
                'ci'=>"CI 5",
                'telefono'=>"TELEFONO 5",
                'celular'=>"CELULAR 5",
                'activo'=>1,
                'fecha'=>"2021-07-23 19:51:26",
                'cooperativa_id'=>"5"
            ],
        ]);
    }
}
