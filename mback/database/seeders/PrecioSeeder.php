<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrecioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("precios")->insert([
            [ "mineral"=>"ZN","porcentaje"=>5,"lme"=>18],
            [ "mineral"=>"ZN","porcentaje"=>6,"lme"=>18.5],
            [ "mineral"=>"ZN","porcentaje"=>7,"lme"=>19],
            [ "mineral"=>"ZN","porcentaje"=>8,"lme"=>19.50],
            [ "mineral"=>"ZN","porcentaje"=>9,"lme"=>20.00],
            [ "mineral"=>"ZN","porcentaje"=>10,"lme"=>20.50],
            [ "mineral"=>"ZN","porcentaje"=>11,"lme"=>21.00],
            [ "mineral"=>"ZN","porcentaje"=>12,"lme"=>21.50],
            [ "mineral"=>"ZN","porcentaje"=>13,"lme"=>22.00],
            [ "mineral"=>"ZN","porcentaje"=>14,"lme"=>22.10],
            [ "mineral"=>"ZN","porcentaje"=>15,"lme"=>22.20],
            [ "mineral"=>"ZN","porcentaje"=>16,"lme"=>22.30],
            [ "mineral"=>"ZN","porcentaje"=>17,"lme"=>22.40],
            [ "mineral"=>"ZN","porcentaje"=>18,"lme"=>22.50],
            [ "mineral"=>"ZN","porcentaje"=>19,"lme"=>22.60],
            [ "mineral"=>"ZN","porcentaje"=>20,"lme"=>22.70],
            [ "mineral"=>"ZN","porcentaje"=>21,"lme"=>22.80],
            [ "mineral"=>"ZN","porcentaje"=>22,"lme"=>22.90],
            [ "mineral"=>"ZN","porcentaje"=>23,"lme"=>23.00],
            [ "mineral"=>"ZN","porcentaje"=>24,"lme"=>23.10],
            [ "mineral"=>"ZN","porcentaje"=>25,"lme"=>23.20],
            [ "mineral"=>"ZN","porcentaje"=>26,"lme"=>23.30],
            [ "mineral"=>"ZN","porcentaje"=>27,"lme"=>23.40],
            [ "mineral"=>"ZN","porcentaje"=>28,"lme"=>23.50],
            [ "mineral"=>"ZN","porcentaje"=>29,"lme"=>23.60],
            [ "mineral"=>"ZN","porcentaje"=>30,"lme"=>23.70],
            [ "mineral"=>"ZN","porcentaje"=>31,"lme"=>23.80],
            [ "mineral"=>"ZN","porcentaje"=>32,"lme"=>23.90],
            [ "mineral"=>"ZN","porcentaje"=>33,"lme"=>24.00],
            [ "mineral"=>"ZN","porcentaje"=>34,"lme"=>24.10],
            [ "mineral"=>"ZN","porcentaje"=>35,"lme"=>24.20],
            [ "mineral"=>"ZN","porcentaje"=>36,"lme"=>24.30],
            [ "mineral"=>"ZN","porcentaje"=>37,"lme"=>24.40],
            [ "mineral"=>"ZN","porcentaje"=>38,"lme"=>24.50],
            [ "mineral"=>"ZN","porcentaje"=>39,"lme"=>24.60],
            [ "mineral"=>"ZN","porcentaje"=>40,"lme"=>24.70],
            [ "mineral"=>"ZN","porcentaje"=>41,"lme"=>24.80],
            [ "mineral"=>"ZN","porcentaje"=>42,"lme"=>24.90],
            [ "mineral"=>"ZN","porcentaje"=>43,"lme"=>25.00],
            [ "mineral"=>"ZN","porcentaje"=>44,"lme"=>25.10],
            [ "mineral"=>"ZN","porcentaje"=>45,"lme"=>25.20],
        ]);
    }
}
