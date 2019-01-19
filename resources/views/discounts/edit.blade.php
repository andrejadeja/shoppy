@extends('layouts.master')

@section('content')
<div class="page-header" style="margin-top: 80px">
    <div class="row">
        <div class="col-lg-12">
        <h1>Add Discount</h1>

          @if (count($errors))
           <div class="alert alert-info">
              <ul>
                  @foreach($errors->all() as $error)

                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
                
          <form name="discounts" action="{{ URL::to('discounts/'.$discount->id) }}" method="POST">
          @csrf

          {{ method_field('PATCH') }}
            
            <input type="hidden" name="sale" value="{{ $discount->sale_id }}">
            <input type="hidden" name="product" class="form-control" value="{{ $discount->product_id }}">

            <div class="form-group col-lg-6"> 
            <label>Product</label>
              <input type="text" name="discount" class="form-control" value="{{ $discount->product->product }}" disabled>
            </div>

            <div class="form-group col-lg-3"> 
            <label>Discount %</label>
              <input type="text" name="discount" placeholder="Discount %" class="form-control" value="{{ $discount->discount }}">
            </div>

            <div class="form-group col-lg-8">
     
            <button type="submit" class="btn btn-success">Edit Discount</button>
            </div>
          </form>
    
        </div>
    </div>
</div>
 @endsection