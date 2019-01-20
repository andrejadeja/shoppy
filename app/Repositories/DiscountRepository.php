<?php namespace App\Repositories;

use \App\Repositories\Contracts\DiscountRepositoryInterface;
use \App\Discount;
use Auth;

class DiscountRepository implements DiscountRepositoryInterface{


	public function all($id){

		$discount = Discount::where('sale_id', $id)->get();

		return $discount;
	}


    public function create($request){

        $discount = new Discount;

        if(Auth::user()->shop)
        $discount->shop_id = Auth::user()->shop->id;

        $discount->sale_id = $request->sale;
        $discount->product_id = $request->product;
        $discount->discount = $request->discount;
        $discount->create_user_id = Auth::user()->id;
        $discount->save();
    }

    public function update($request, $id){
        
        $discount = Discount::find($id);
        $discount->sale_id = $request->sale;
        $discount->product_id = $request->product;
        $discount->discount = $request->discount;
        $discount->update_user_id = Auth::user()->id;
        $discount->save();
    }

    public function delete($id){

    	$discount = Discount::destroy($id);

    }

    public function show($id){

    	$discount = Discount::find($id);
        
        return $discount;
    }
}