<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ModelnamesTableSeeder::class);
        $this->call(AssetsTableSeeder::class);
        $this->call(AssetUserTableSeeder::class);
    }
}