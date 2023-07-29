<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CooperativaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("cooperativas")->insert([
            [
                'nombre'=>"COOPERATIVA 1",
                'direccion'=>"DIRECCION 1",
                'representante'=>"REPRESENTANTE 1",
                'nim'=>"NIM 1",
                'nit'=>"NIT 1",
                'celular'=>"CELULAR 1",
                'estado'=>"ACTIVO"
            ],
            [
                'nombre'=>"COOPERATIVA 2",
                'direccion'=>"DIRECCION 2",
                'representante'=>"REPRESENTANTE 2",
                'nim'=>"NIM 2",
                'nit'=>"NIT 2",
                'celular'=>"CELULAR 2",
                'estado'=>"ACTIVO"
            ],
            [
                'nombre'=>"COOPERATIVA 3",
                'direccion'=>"DIRECCION 3",
                'representante'=>"REPRESENTANTE 3",
                'nim'=>"NIM 3",
                'nit'=>"NIT 3",
                'celular'=>"CELULAR 3",
                'estado'=>"ACTIVO"
            ],
            [
                'nombre'=>"COOPERATIVA 4",
                'direccion'=>"DIRECCION 4",
                'representante'=>"REPRESENTANTE 4",
                'nim'=>"NIM 4",
                'nit'=>"NIT 4",
                'celular'=>"CELULAR 4",
                'estado'=>"ACTIVO"
            ],
            [
                'nombre'=>"COOPERATIVA 5",
                'direccion'=>"DIRECCION 5",
                'representante'=>"REPRESENTANTE 5",
                'nim'=>"NIM 5",
                'nit'=>"NIT 5",
                'celular'=>"CELULAR 5",
                'estado'=>"ACTIVO"
            ],
            [
                'nombre'=>"COOPERATIVA 6",
                'direccion'=>"DIRECCION 6",
                'representante'=>"REPRESENTANTE 6",
                'nim'=>"NIM 6",
                'nit'=>"NIT 6",
                'celular'=>"CELULAR 6",
                'estado'=>"ACTIVO"
            ],
            [
                'nombre'=>"COOPERATIVA 7",
                'direccion'=>"DIRECCION 7",
                'representante'=>"REPRESENTANTE 7",
                'nim'=>"NIM 7",
                'nit'=>"NIT 7",
                'celular'=>"CELULAR 7",
                'estado'=>"ACTIVO"
            ],
        ]);
    }
}
