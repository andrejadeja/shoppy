<?php namespace App\Repositories;

use \App\Repositories\Contracts\ShopRepositoryInterface;
use \App\Shop;
use Auth;
use Session;


class ShopRepository implements ShopRepositoryInterface{


	public function all(){

		$shop = Shop::all();

		return $shop;
	}


    public function create($request){

        $check = Shop::where('owner_id', $request->owner)->count();

        if($check == 0){

            $shop = new Shop;
            $shop->name = $request->name;
            $shop->owner_id = $request->owner;
            $shop->create_user_id = Auth::user()->id;
            $shop->save();
        }

        else
            Session::flash('message','This user already own one shop!');
        
       
    }

    public function update($request, $id){
        
        $shop = Shop::find($id);
        $shop->name = $request->name;
        $shop->update_user_id = Auth::user()->id;
        $shop->save();
    }

    public function delete($id){

    	$shop = Shop::destroy($id);

    }

    public function show($id){

    	$shop = Shop::find($id);
        
        return $shop;
    }
}