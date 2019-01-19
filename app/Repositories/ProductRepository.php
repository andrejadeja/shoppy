<?php namespace App\Repositories;

use \App\Repositories\Contracts\ProductRepositoryInterface;
use \App\Product;
use Auth;
use Storage;

class ProductRepository implements ProductRepositoryInterface{


	public function all(){

		$product = Product::all();

		return $product;
	}


    public function create($request){

        Storage::disk('public')->putFileAs('', $request->file('image'), $request->file('image')->getClientOriginalName());

        $product = new Product;
        $product->category_id = $request->category;
        $product->product = $request->product;
        $product->product_number = $request->product_number;
        $product->price = $request->price;
        $product->image = url('/').'/uploads/'.$request->file('image')->getClientOriginalName();
        $product->create_user_id = Auth::user()->id;
        $product->save();
    }

    public function update($request, $id){
        
        $product = Product::find($id);
        $product->category_id = $request->category;
        $product->product = $request->product;
        $product->product_number = $request->product_number;
        $product->price = $request->price;

        if($request->file('image'))
        $product->image = url('/').'/uploads/'.$request->file('image')->getClientOriginalName();

        $product->update_user_id = Auth::user()->id;
        $product->save();
    }

    public function delete($id){

    	$product = Product::destroy($id);

    }

    public function show($id){

    	$product = Product::find($id);
        
    }
}