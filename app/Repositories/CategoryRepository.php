<?php namespace App\Repositories;

use \App\Repositories\Contracts\CategoryRepositoryInterface;
use \App\Category;
use Auth;

class CategoryRepository implements CategoryRepositoryInterface{


	public function all(){

		$category = Category::all();

		return $category;
	}


    public function create($request){

        $category = new Category;
        $category->name = $request->name;
        $category->create_user_id = Auth::user()->id;
        $category->save();
    }

    public function update($request, $id){
        
        $category = Category::find($id);
        $category->name = $request->name;
        $category->update_user_id = Auth::user()->id;
        $category->save();
    }

    public function delete($id){

    	$category = Category::destroy($id);

    }

    public function show($id){

    	$category = Category::find($id);
        
        return $category;
    }
}