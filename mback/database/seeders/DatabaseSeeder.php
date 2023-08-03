<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Agprecio;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //$this->call([
       //     Agprecio::class,]);
        $this->call([
            CooperativaSeeder::class,
            ClienteSeeder::class,
            DiariaSeeder::class,
            QuincenaSeeder::class,
//            LoteSeeder::class,
//            AgprecioSeeder::class,
//            UserSeeder::class,
        ]);
    }
}
