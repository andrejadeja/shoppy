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
                
          <form name="discounts" action="{{ URL::to('discounts') }}" method="POST">
          @csrf
            
            <input type="hidden" name="sale" value="{{ $sale->id }}">
            <div class="form-group col-lg-6"> 
            <label>Products</label>
              <select class="form-control" name="product">

              <option value="{{ old('product') }}">Choose product</option>

                @foreach($products as $p)
                  @if(!$p->discount)
                    <option value="{{ $p->id }}" @if(old('product') && old('product') == $p->id) selected @endif>{{ $p->product }}</option>
                  @endif
                @endforeach

              </select>
            </div>

            <div class="form-group col-lg-3"> 
            <label>Discount %</label>
              <input type="text" name="discount" placeholder="Discount %" class="form-control">
            </div>

            <div class="form-group col-lg-8">
     
            <button type="submit" class="btn btn-success">Add Discount</button>
            </div>
          </form>
    
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
        <h1>Products on sale</h1>

        

          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th width="5%">#</th>
                <th>Image</th>

                @if(Auth::user()->isAdmin()) 
                  <th>Shop</th>
                @endif

                <th>Product</th>
                <th>Product number</th>
                <th>Description</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Category</th>
                <th>Created by</th>
                <th>Create Date</th>
                <th>Updated by</th>
                <th>Update Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($discounts as $d)

              <tr>
                <td>{{ $d->id }}</td>
                <td><img src="{{ $d->product->image }}" width="50px"></td>
                <td>
                  @if($d->shop && Auth::user()->isAdmin()) 
                    {{ $d->shop->name }}
                  @endif
                </td>
                <td>{{ $d->product->product }}</td>
                <td>{{ $d->product->product_number }}</td>
                <td>{{ $d->product->description }}</td>
                <td>
                <p style="text-decoration: line-through; color:gray">{{ $d->product->price }}€</p>
                {{ $d->product->price - $d->product->price*$d->discount/100 }}€</td>
                <td>{{ $d->discount }}%</td>
                <td>{{ $d->product->category->name }}</td>
                <td>{{ $d->user_create->name }}</td>
                <td>{{ date('d/m/Y', strtotime($d->created_at)) }}</td>
                <td>
                    @if($d->user_update)
                      {{ $d->user_update->name }}
                    @endif
                </td>
                <td>

                    @if($d->user_update)
                      {{ date('d/m/Y', strtotime($d->updated_at)) }}
                    @endif
                 </td>
                <td>

                  <a href="{{ URL::to('discounts/'.$d->id.'/edit')}}" class="btn btn-md btn-primary">Edit</a>

                  <form action="{{ url('discounts/'.$d->id)}}" method="post">
                  @csrf
                      <input type="submit" class="btn btn-md btn-danger" value="Delete" />
                      <input type="hidden" name="_method" value="delete" />

                  </form>
                
                </td>
              </tr>

            @endforeach
              
            </tbody>
          </table>
        </div>
    </div>
</div>
 @endsection