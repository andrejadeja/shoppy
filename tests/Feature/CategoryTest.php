<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{	

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $category = factory(\App\Category::class, 3)->create();

        $this->assertCount(3, $category);
    }
}
