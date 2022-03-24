<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([

        ['name'=>'admin', 'email'=>'admin@gmail.com','password'=>Hash::make('1234')],
        ['name'=>'hr','email'=>'hr@gmail.com', 'password'=>Hash::make('1234')],
        ['name'=>'jitender', 'email'=>'jitender@gmail.com', 'password'=>Hash::make('1234')],
        ['name'=>'ankit', 'email'=>'ankit@gmail.com','password'=>Hash::make('1234')],
        ['name'=>'rahul', 'email'=>'rahul@gmail.com','password'=>Hash::make('1234')]

        ]);
    }
}
