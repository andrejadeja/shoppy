<?php namespace App\Repositories;

use \App\Repositories\Contracts\CategoryRepositoryInterface;
use \App\Category;

class CategoryRepository implements CategoryRepositoryInterface{


	public function all(){

		$category = Category::all();

		return $category;
	}


    public function create(array $request){

    }

    public function update(array $request, $id){

    }

    public function delete($id){

    	$category = Category::delete($id);

		return $category;

    }

    public function show($id){

    	$category = Category::find($id);

		return $category;
    }
}