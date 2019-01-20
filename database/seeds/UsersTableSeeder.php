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

    	$faker = \Faker\Factory::create();

        for ($i=0; $i < 5; $i++) { 

        	$role = \App\Role::inRandomOrder()->first();

        	DB::table('users')->insert([
	            'name' => $faker->name,
		        'email' => $faker->unique()->safeEmail,
		        'email_verified_at' => now(),
		        'role_id' => $role->id,
		        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
		        'remember_token' => str_random(10),
		        'created_at' => date('Y-m-d H:i:s')
        	]);
        }
        
    }
}
