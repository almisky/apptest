<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'username' => 'user1',
        //     'role' => '2',
        //     'nama' => 'User 1',
        //     'email' => 'user1@gmail.com',
        //     'password' => Hash::make('user1pass'),
        // ]);

        DB::table('users')->insert([
            'username' => 'admin1',
            'role' => '1',
            'nama' => 'Admin 1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('admin1pass'),
        ]);
    }
}
