<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{	


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {	
    	$category = factory(\App\Product::class, 3)->create();

        $this->assertCount(3, $category);
    }
}
