<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{	

	use RefreshDatabase;


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {	
    	$product = factory(Product::class, 5)->create();

        $this->assertTrue($product);
    }
}
