@extends('layouts.master')

@section('content')
<div class="page-header" style="margin-top: 80px">
    <div class="row">
        <div class="col-lg-12">
        <h1>New Category</h1>

          @if (count($errors))
           <div class="alert alert-info">
              <ul>
                  @foreach($errors->all() as $error)

                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
                
          <form name="products" action="{{ URL::to('products') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group col-lg-6"> 
            <label>Product Category</label>
              <select class="form-control" name="category">

              <option value="{{ old('category') }}">Choose category</option>

                @foreach($categories as $c)
                  <option value="{{ $c->id }}" @if(old('category') && old('category') == $c->id) selected @endif>{{ $c->name }}</option>
                @endforeach

              </select>
            </div>


            <div class="form-group col-lg-6"> 
            <label>Product Name</label>
              <input type="text" name="product" placeholder="Product" class="form-control" value="{{ old('product') }}">
            </div>

            <div class="form-group col-lg-6"> 
            <label>Product Number</label>
              <input type="text" name="product_number" placeholder="Product number" class="form-control" value="{{ old('product_number') }}">
            </div>


            <div class="form-group col-lg-6"> 
            <label>Price</label>
              <input type="text" name="price" placeholder="Price" class="form-control" value="{{ old('price') }}">
            </div>


            <div class="form-group col-lg-6"> 
            <label>Image</label>
              <input type="file" name="image" placeholder="Image" class="form-control">
            </div>

            <div class="form-group col-lg-12">
            <button type="submit" class="btn btn-success">Add New Product</button>
            </div>
          </form>
      
        </div>
    </div>
</div>
 @endsection