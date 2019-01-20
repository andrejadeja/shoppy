<?php namespace App\Repositories;

use \App\Repositories\Contracts\SaleRepositoryInterface;
use \App\Sale;
use Auth;
use Carbon\Carbon;

class SaleRepository implements SaleRepositoryInterface{


	public function all(){

		$sale = Sale::ofRole()->get();

		return $sale;
	}


    public function create($request){

        $valid = explode('/', $request->valid_until);
        $sale = new Sale;

        if(Auth::user()->shop)
        $sale->shop_id = Auth::user()->shop->id;

        $sale->title = $request->title;
        $sale->valid_until = $valid[2].'-'.$valid[1].'-'.$valid[0];
        $sale->create_user_id = Auth::user()->id;
        $sale->save();
    }

    public function update($request, $id){
        
        $valid = explode('/', $request->valid_until);

        $sale = Sale::find($id);
        $sale->title = $request->title;
        $sale->valid_until = $valid[2].'-'.$valid[1].'-'.$valid[0];
        $sale->update_user_id = Auth::user()->id;
        $sale->save();
    }

    public function delete($id){

    	$sale = Sale::destroy($id);

    }

    public function show($id){

    	$sale = Sale::find($id);

        return $sale;
        
    }
}