<?php

namespace App\Http\Controllers;

use App\Discount;
use Illuminate\Http\Request;
use App\Repositories\Contracts\SaleRepositoryInterface;
use App\Repositories\Contracts\DiscountRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Http\Requests\StoreDiscount;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $sale;
    protected $discount;
    protected $product;

    public function __construct(SaleRepositoryInterface $sale, DiscountRepositoryInterface $discount, ProductRepositoryInterface $product){

        $this->sale = $sale;
        $this->discount = $discount;
        $this->product = $product;
        
    }

    public function index($id)
    {
        $sale = $this->sale->show($id);
        $discounts = $this->discount->all($id);
        $products = $this->product->all();

        return view('discounts.index', compact('sale', 'discounts', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiscount $request)
    {   
        $sale_id = request('sale');
        //add discount to db
        $discount = $this->discount->create($request);

       return redirect('sales/discounts/'.$sale_id); 
    }


    public function edit($id)
    {
        $discount = $this->discount->show($id);

        return view('discounts.edit', compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //edit discount
        $discount = $this->discount->update($request, $id);

        //get sale ID
        $sale_id = $this->discount->show($id)->sale_id;

        return redirect('sales/discounts/'.$sale_id); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        //get sale ID
        $sale_id = $this->discount->show($id)->sale_id;

        $discount = $this->discount->delete($id);

        return redirect('sales/discounts/'.$sale_id);
    }
}
