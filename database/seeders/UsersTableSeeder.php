<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            //Admin
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password'=>Hash::make('12345678'),
                'role' => 'admin',
                'status' => 'active'
            ],
            [
            //User
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password'=>Hash::make('123456789'),
            'role' =>   'user',
            'status' => 'active',
            ]
            ]);
    }
}
