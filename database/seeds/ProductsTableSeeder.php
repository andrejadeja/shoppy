<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
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

        	$user = \App\User::inRandomOrder()->first();
        	$category = \App\Category::inRandomOrder()->first();

        	DB::table('products')->insert([
	            'category_id' => $category->id,
		        'product_number' => str_random(5),
		        'product' => $faker->word,
		        'description' => $faker->paragraph,
		        'price' => $faker->randomNumber(2),
		        'image' => $faker->imageUrl($width = 640, $height = 480),
		        'create_user_id' => $user->id,
		        'created_at' => date('Y-m-d H:i:s')
        	]);
        }
    }
}
