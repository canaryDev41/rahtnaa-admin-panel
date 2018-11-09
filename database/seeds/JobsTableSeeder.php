<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            0 => [
                'name' => 'job 1',
                'category_id' => 1,
                'image' => '',
            ],
            1 => [
                'name' => 'job 2',
                'category_id' => 1,
                'image' => '',
            ],
            2 => [
                'name' => 'job 3',
                'category_id' => 2,
                'image' => '',
            ],
            3 => [
                'name' => 'job 4',
                'category_id' => 3,
                'image' => '',
            ]
        ]);
    }
}
