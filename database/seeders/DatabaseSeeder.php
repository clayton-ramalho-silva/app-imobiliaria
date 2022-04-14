<?php

namespace Database\Seeders;

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
        /* Criar os tipos seeder
            rodar php artisan db:seed para rodar todas as seeds
         */
        // \App\Models\User::factory(10)->create();

        $this->call([
            TipoSeeder::class,
            FinalidadeSeeder::class,
            ProximidadeSeeder::class
        ]);
    }
}
