@extends('layouts.master')

@section('content')
<div class="page-header" style="margin-top: 80px">
    <div class="row">
        <div class="col-lg-12">
        <h1>Edit Category</h1>

        @if (count($errors))
           <div class="alert alert-info">
              <ul>
                  @foreach($errors->all() as $error)

                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
     
          <form name="products" action="{{ URL::to('products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          {{ method_field('PATCH') }}
          
          <div class="form-group col-lg-6"> 
            <label>Product Category</label>
              <select class="form-control" name="category">

              <option value="{{ old('category') }}">Choose category</option>

                @foreach($categories as $c)
                  <option value="{{ $c->id }}" @if($product->category_id == $c->id) selected @endif>{{ $c->name }}</option>
                @endforeach

              </select>
            </div>


            <div class="form-group col-lg-6"> 
            <label>Product Name</label>
              <input type="text" name="product" placeholder="Product" class="form-control" value="{{ $product->product }}">
            </div>

            <div class="form-group col-lg-6"> 
            <label>Product Number</label>
              <input type="text" name="product_number" placeholder="Product number" class="form-control" value="{{ $product->product_number }}">
            </div>


            <div class="form-group col-lg-6"> 
            <label>Price</label>
              <input type="text" name="price" placeholder="Price" class="form-control" value="{{ $product->price }}">
            </div>


            <div class="form-group col-lg-6"> 
            <label>Image</label>
              <input type="file" name="image" placeholder="Image" class="form-control">
            </div>

            <div class="form-group col-lg-12">
            <button type="submit" class="btn btn-success">Edit Product</button>
            </div>
          </form>
 
        </div>
    </div>
</div>
 @endsection