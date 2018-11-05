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
//         $this->call(CityTableSeeder::class);
//         $this->call(CategoriesTableSeeder::class);
//         $this->call(AdminsTableSeeder::class);
         $this->call(UsersTableSeeder::class);
    }
}
