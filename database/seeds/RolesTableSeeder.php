<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = ['Administrator', 'Worker'];

    	foreach ($roles as $r) {
    		DB::table('roles')->insert([
            'role' => $r,
            'created_at' => date('Y-m-d H:i:s')
        	]);
    	}
       

    }
}
