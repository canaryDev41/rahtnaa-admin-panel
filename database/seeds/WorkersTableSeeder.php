<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workers')->insert([
            0 => [
                'name' => 'اماني الطيب',
                'email' => 'test@gmail.com',
                'city_id' => 1,
                'phone' => '0920733301',
                'image' => '',
                'status' => 1,
                'national_id_image' => ''
            ],
            1 => [
                'name' => 'ساره محي الدين',
                'email' => 'test1@gmail.com',
                'city_id' => 1,
                'phone' => '0920733301',
                'image' => '',
                'status' => 1,
                'national_id_image' => ''
            ],
            2 => [
                'name' => 'اسماء عبدالله',
                'email' => 'test2@gmail.com',
                'city_id' => 1,
                'phone' => '0920733301',
                'image' => '',
                'status' => 1,
                'national_id_image' => ''
            ],

            3 => [
                'name' => 'سامرين مبارك',
                'email' => 'test3@gmail.com',
                'city_id' => 1,
                'phone' => '0920733301',
                'image' => '',
                'status' => 1,
                'national_id_image' => ''
            ]
        ]);
    }
}
