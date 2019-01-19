<?php namespace App\Repositories;

use \App\Repositories\Contracts\SaleRepositoryInterface;
use \App\Sale;
use Auth;


class SaleRepository implements SaleRepositoryInterface{


	public function all(){

		$sale = Sale::all();

		return $sale;
	}


    public function create($request){

        $sale = new Sale;
        $sale->title = $request->title;
        $sale->valid_until = date('Y-m-d', strtotime($request->valid_until));
        $sale->create_user_id = Auth::user()->id;
        $sale->save();
    }

    public function update($request, $id){
        
        $sale = Sale::find($id);
        $sale->title = $request->title;
        $sale->valid_until = date('Y-m-d', strtotime($request->valid_until));
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