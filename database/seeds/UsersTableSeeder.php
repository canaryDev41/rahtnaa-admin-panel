<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            0 => [
                'name' => 'اماني الطيب',
                'email' => 'test@gmail.com',
                'password' => null,
                'city_id' => 1,
                'phone' => '0920733301',
                'image' => '',
                'status' => 1
            ],
            1 => [
                'name' => 'ساره محي الدين',
                'email' => 'test1@gmail.com',
                'password' => null,
                'city_id' => 1,
                'phone' => '0920733301',
                'image' => '',
                'status' => 1
            ],
            2 => [
                'name' => 'اسماء عبدالله',
                'email' => 'test2@gmail.com',
                'password' => null,
                'city_id' => 1,
                'phone' => '0920733301',
                'image' => '',
                'status' => 1
            ],

            3 => [
                'name' => 'سامرين مبارك',
                'email' => 'test3@gmail.com',
                'password' => null,
                'city_id' => 1,
                'phone' => '0920733301',
                'image' => '',
                'status' => 1
            ]
        ]);
    }
}
