<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\EditProduct;
use App\Policies\ProductPolicy;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $product;
    protected $category;

    public function __construct(ProductRepositoryInterface $product, CategoryRepositoryInterface $category){

        $this->product = $product;
        $this->category = $category;
    }


    public function index()
    {
        $products = $this->product->all();

       return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = $this->category->all();

        return view('products.create', compact('categories')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        //add product to db
        $product = $this->product->create($request);

       return redirect('products'); 
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id)
    {   
        $categories = $this->category->all();
        $product = $this->product->show($id);

        $this->authorize('change', $product);

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(EditProduct $request, $id)
    {
        //edit category
        $product = $this->product->update($request, $id);

        return redirect('products'); 
    }


    public function destroy($id)
    {    
        $product = $this->product->show($id);
        $this->authorize('change', $product);

        
        $product = $this->product->delete($id);

        return redirect('products');
    }
}
