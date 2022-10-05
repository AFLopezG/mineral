<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgprecioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("agprecios")->insert([
            [ "ley"=>0,"lme"=>0],
            [ "ley"=>2,"lme"=>4.5],
        ]);
    }
}
