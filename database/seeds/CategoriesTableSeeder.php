<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 3; $i++) { 

        	$user = \App\User::inRandomOrder()->first();

        	DB::table('categories')->insert([
	            'name' => $faker->word,
        		'create_user_id' => $user->id,
        		'created_at' => date('Y-m-d H:i:s')
        	]);
        }
    }
}
