<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('score')->delete();

        $users =  DB::table('users')->get();
        foreach ($users as $key => $user) {
        	
			DB::table('score')->insert([
			    ['user_id'=>$user->id,'score'=>rand(5,100)],
			    ['user_id'=>$user->id,'score'=>rand(5,100)],
			    ['user_id'=>$user->id,'score'=>rand(5,100)],
			    ['user_id'=>$user->id,'score'=>rand(5,100)],
			    ['user_id'=>$user->id,'score'=>rand(5,100)],
			]);
		 
        }
        
    }
}
