<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;
use App\Repositories\Contracts\SaleRepositoryInterface;
use App\Http\Requests\StoreSale;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $sale;
    protected $product;

    public function __construct(SaleRepositoryInterface $sale){

        $this->sale = $sale;

    }


    public function index()
    {
       $sales = $this->sale->all();

       return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSale $request)
    {
        //add product to db
        $sale = $this->sale->create($request);

       return redirect('sales'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    public function edit($id)
    {   
        $sale = $this->sale->show($id);

        return view('sales.edit', compact('sale'));
    }

   
    public function update(StoreSale $request, $id)
    {
        //edit sale
        $sale = $this->sale->update($request, $id);

        return redirect('sales'); 
    }

    
    public function destroy($id)
    {
        $sale = $this->sale->delete($id);

        return redirect('sales');
    }



}
