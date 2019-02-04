<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

	protected $truncate = ['products','categories' ,'users','roles'];
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

      


      $this->call([
        UsersTableSeeder::class,
        CategoriesTableSeeder::class,
        ProductsTableSeeder::class,
        BouncerSeeder::class,
    
    ]);
    }
}
