<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Http\Requests\StoreCategory;
use App\Policies\CategoryPolicy;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $category;

    public function __construct(CategoryRepositoryInterface $category){

        $this->category = $category;
    }

    public function index()
    {
       $categories = $this->category->all();

       return view('categories.index', compact('categories')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        //add category to db
        $category = $this->category->create($request);

       return redirect('categories');  
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->show($id);

        $this->authorize('change', $category);

        return view('categories.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategory $request, $id)
    {
        //edit category
        $category = $this->category->update($request, $id);

        $this->authorize('change', $category);

        return redirect('categories');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->category->show($id);
        $this->authorize('change', $category);

        $category = $this->category->delete($id);

        return redirect('categories');
    }
}
