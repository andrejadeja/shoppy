<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ShopRepositoryInterface;
use App\Http\Requests\StoreShop;
use App\Policies\ShopPolicy;
use Session;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $shop;

    public function __construct(ShopRepositoryInterface $shop){

        $this->shop = $shop;

        
    }

    public function index()
    {   
       $this->authorize('index', Shop::class);

       $shops = $this->shop->all();

       return view('shops.index', compact('shops')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $this->authorize('index', Shop::class);

        $users = \App\User::where('role_id', 2)->get();
        return view('shops.create', compact('users')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShop $request)
    {   
        $this->authorize('index', Shop::class);

        //add shop to db
        $shop = $this->shop->create($request);
            

       return redirect('shops');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
       $this->authorize('index', Shop::class);

       $users = \App\User::where('role_id', 2)->get();

       $shop = $this->shop->show($id);

        return view('shops.edit', compact('shop','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(StoreShop $request, $id)
    {   
        $this->authorize('index', Shop::class);

        //edit shop
        $shop = $this->shop->update($request, $id);

        return redirect('shops');  
    }
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

        $this->authorize('index', Shop::class);

        $shop = $this->shop->delete($id);

        return redirect('shops');
    }
}
