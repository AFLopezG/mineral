<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("diarias")->insert([
            [ "plata"=>24.4100,"zinc"=>1.1462,"plomo"=>0.9725,"estano"=>12.3604,"fecha"=>'2023-08-02']
        ]);
    }
}
