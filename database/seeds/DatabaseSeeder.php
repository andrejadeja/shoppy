<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

	protected $truncate = ['products','categories' ,'users'];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	foreach ($this->truncate as $t) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    		DB::table($t)->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    	}
       $user = factory(App\User::class, 5)->create();
       $categories = factory(App\Category::class, 3)->create();
       $products = factory(App\Product::class, 5)->create();
    }
}
