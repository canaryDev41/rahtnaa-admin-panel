<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            0 => [
                'name' => 'حنانة',
                'status' => true
            ],
            1 => [
                'name' => 'طباخة',
                'status' => true
            ],
            2 => [
                'name' => 'عاملة منزلية',
                'status' => true
            ],
            3 => [
                'name' => 'مكياج منزلي',
                'status' => true
            ]
        ]);
    }
}
