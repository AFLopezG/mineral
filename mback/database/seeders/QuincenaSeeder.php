<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuincenaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("quincenas")->insert([
            [ 
        'plata'=>24.73,
        'plomo'=>0.96,
        'zinc'=>1.10,
        'estano'=>13.06,
        'alplata'=>6,
        'alplomo'=>5,
        'alzinc'=>5,
        'alestano'=>5,
        'explata'=>3.6,
        'explomo'=>3,
        'exzinc'=>3,
        'exestano'=>3,
        'fecha'=>'2023-08-01']
    ]);
}
}
