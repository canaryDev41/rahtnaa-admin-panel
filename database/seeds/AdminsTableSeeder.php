<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            0 => [
                'name' => 'مدير النظام',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
